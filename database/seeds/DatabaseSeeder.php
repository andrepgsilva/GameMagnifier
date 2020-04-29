<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        $adventure = factory(App\Genre::class)->create(['name' => 'Adventure']);
        $racing = factory(App\Genre::class)->create(['name' => 'Car Racing']); 
        $fight = factory(App\Genre::class)->create(['name' => 'Fighting']);
        $rpg = factory(App\Genre::class)->create(['name' => 'RPG']);
        $fps = factory(App\Genre::class)->create(['name' => 'FPS']);
        $action = factory(App\Genre::class)->create(['name' => 'Action']);
        $beat = factory(App\Genre::class)->create(['name' => 'Beat\'n up']);
        $horror = factory(App\Genre::class)->create(['name' => 'Horror']);

        $n64 = factory(App\Platform::class)->create(['name' => 'Nintendo 64']);
        $ps2 = factory(App\Platform::class)->create(['name' => 'Playstation 2']);
        $arcade = factory(App\Platform::class)->create(['name' => 'Arcade']);
        $x360 = factory(App\Platform::class)->create(['name' => 'Xbox 360']);
        $gameCube = factory(App\Platform::class)->create(['name' => 'GameCube']);
        $ps3 = factory(App\Platform::class)->create(['name' => 'Playstation 3']);
        $superNintendo = factory(App\Platform::class)->create(['name' => 'Super Nintendo']);
        $pc = factory(App\Platform::class)->create(['name' => 'PC']);


        $zelda = factory(App\Game::class)->create(['name' => 'The Legend Of Zelda']);
        $nfs = factory(App\Game::class)->create(['name' => 'Need For Speed Most Wanted']);
        $streetFighter = factory(App\Game::class)->create(['name' => 'Street Fighter']);
        $skyrim = factory(App\Game::class)->create(['name' => 'Skyrim']);
        $residentEvilZero = factory(App\Game::class)->create(['name' => 'Resident Evil Zero']);
        $batman = factory(App\Game::class)->create(['name' => 'Batman - Arkham Asylum']);
        $captainCommand = factory(App\Game::class)->create(['name' => 'Captain Command']);
        $counterStrike = factory(App\Game::class)->create(['name' => 'Counter Strike']);

        $zelda->genres()->attach($adventure->id);
        $zelda->platforms()->attach($n64->id);
        $zelda->addCoverImage(asset('img/legend-of-zelda.png'));

        $nfs->genres()->attach($racing->id);
        $nfs->platforms()->attach($ps2->id);
        $nfs->addCoverImage(asset('img/need-for-speed.jpg'));

        $streetFighter->genres()->attach($fight->id);
        $streetFighter->platforms()->attach($arcade->id);
        $streetFighter->addCoverImage(asset('img/street-fighter.jpeg'));
        
        $skyrim->genres()->attach($rpg->id);
        $skyrim->platforms()->attach($x360->id);
        $skyrim->addCoverImage(asset('img/skyrim.jpg'));

        $residentEvilZero->genres()->attach($horror->id);
        $residentEvilZero->platforms()->attach($gameCube->id);
        $residentEvilZero->addCoverImage(asset('img/resident-evil-zero.jpg'));

        $batman->genres()->attach($action);
        $batman->platforms()->attach($ps3);
        $batman->addCoverImage(asset('img/batman-arkham-asylum.jpg'));

        $captainCommand->genres()->attach($beat);
        $captainCommand->platforms()->attach($superNintendo);
        $captainCommand->addCoverImage(asset('img/captain-commando.jpg'));

        $counterStrike->genres()->attach($fps);
        $counterStrike->platforms()->attach($pc);
        $counterStrike->addCoverImage(asset('img/counter-strike.png'));

        factory(App\User::class)->create(['name' => 'Foobar', 'email' => 'foo@example.com']);
    }
}
