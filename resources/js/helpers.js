export default {
  truncateMultilineText(sentence, maxOfChars) {
    if (sentence.length > maxOfChars) {
      return sentence.substr(0, maxOfChars - 3) + '...';  
    }

    return sentence;
  },
};