<?php

namespace App;

use App\User;
use App\Genre;
use App\Platform;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Game extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['name', 'description', 'media'];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['genres', 'platforms', 'mediaPath', 'favoritedUsers:game_id,user_id'];

    /**
     * Games with favorites information
     *
     * Each game have information if it was favorited by user
     *
     * @param App\User $user 
     * 
     * @return Collection
     **/
    public static function withFavoritesInformation($games, $user = null)
    {
        if ($user == null) {
            $user = auth()->user();
        }

        $games = $games->map(function($game) use ($user) {
            $game->favorited = $game->favoritedUsers
                                ->where('user_id', $user->id)
                                ->isNotEmpty();
            return $game;
        });

        return $games;
    }

    public function favoritedUsers() {
        return $this->belongsToMany(User::class,  'game_user', 'game_id', 'user_id')->withTimestamps();
    }

    public function media() : MorphMany{
        return $this->morphMany(Media::class, 'model');
    }

    public function mediaPath() {
        return $this->morphMany(Media::class, 'model')->select(['id', 'model_id', 'file_name']);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'game_genres');
    }

    public function platforms()
    {
        return $this->belongsToMany(Platform::class, 'game_platforms');
    }

    public function addCoverImage($pathToFile) {
        $this->addMediaFromUrl($pathToFile)
            ->preservingOriginal()
            ->toMediaCollection();
    }

    public function getCoverImage() {
        return asset('img/' . $this->getFirstMedia()->file_name);
    }
}
