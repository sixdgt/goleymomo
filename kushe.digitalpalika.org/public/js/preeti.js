var all_rules = {
  "preeti": {
    "name": "Preeti",
    "post-rules": [
      ["्ा", ""], ["(त्र|त्त)([^उभप]+?)m", "$1m$2"], ["त्रm", "क्र"], ["त्तm", "क्त"], ["उm", "ऊ"], ["भm", "झ"], ["पm", "फ"], ["इ{", "ई"], ["(.[ािीुूृेैोौंःँ]*?){", "{$1"], ["((.्)*){", "{$1"], ["{", "र्"], ["([ाीुूृेैोौंःँ]+?)(्(.्)*[^्])", "$2$1"], ["्([ाीुूृेैोौंःँ]+?)((.्)*[^्])", "्$2$1"], ["([ंँ])([ािीुूृेैोौः]*)", "$2$1"], ["ँँ", "ँ"], ["ंं", "ं"], ["ेे", "े"], ["ैै", "ै"], ["ुु", "ु"], ["ूू", "ू"], ["^ः", ":"], ["टृ", "ट्ट"], ["ेा", "ाे"], ["ैा", "ाै"], ["अाे", "ओ"], ["अाै", "औ"], ["अा", "आ"], ["एे", "ऐ"], ["ाे", "ो"], ["ाै", "ौ"],["・","・"]
      // ["([^उभप]+?)m", "m$1"], ["ि((.्)*[^्])", "$1ि"],
    ],
    "v": "1.0.1",
    "char-map": {
      "÷": "/", "v": "ख", "r": "च", "\"": "ू", "~": "ञ्", "z": "श", "ç": "ॐ", "f": "ा", "b": "द", "n": "ल", "j": "व", "×": "×", "V": "ख्", "R": "च्", "ß": "द्म", "^": "६", "Û": "!", "Z": "श्", "F": "ँ", "B": "द्य", "N": "ल्", "Ë": "ङ्ग", "J": "व्", "6": "ट", "2": "द्द", "¿": "रू", ">": "श्र", ":": "स्", "§": "ट्ट", "&": "७", "£": "घ्", "•": "ड्ड", ".": "।", "«": "्र", "*": "८", "„": "ध्र", "w": "ध", "s": "क", "g": "न", "æ": "“", "c": "अ", "o": "य", "k": "प", "W": "ध्", "Ö": "=", "S": "क्", "Ò": "¨", "_": "-", "[": "ृ", "Ú": "’", "G": "न्","m": "फ", "C": "ऋ", "O": "इ", "Î": "ङ्ख", "K": "प्", "7": "ठ", "¶": "ठ्ठ", "3": "घ", "9": "ढ", "?": "रु", ";": "स", "'": "ु", "#": "३", "¢": "द्घ", "/": "र", "+": "+", "ª": "ङ", "t": "त", "p": "उ", "|": "्र", "x": "ह", "å": "द्व", "d": "म", "`": "ञ", "l": "ि", "h": "ज", "T": "त्", "P": "ए", "Ý": "ट्ठ", "\\": "्", "Ù": ";", "X": "ह्", "Å": "हृ", "D": "म्", "@": "२", "Í": "ङ्क", "L": "ी", "H": "ज्", "4": "द्ध", "±": "+", "0": "ण्", "<": "?", "8": "ड", "¥": "र्‍", "$": "४", "¡": "ज्ञ्", ",": ",", "©": "र", "(": "९", "‘": "ॅ", "u": "ग", "q": "त्र", "}": "ै", "y": "थ", "e": "भ", "a": "ब", "i": "ष्", "‰": "झ्", "U": "ग्", "Q": "त्त", "]": "े", "˜": "ऽ", "Y": "थ्", "Ø": "्य", "E": "भ्", "A": "ब्", "M": "ः", "Ì": "न्न", "I": "क्ष्", "5": "छ", "´": "झ", "1": "ज्ञ", "°": "ङ्ढ", "=": "・", "Æ": "”", "‹": "ङ्घ", "%": "५", "¤": "झ्", "!": "१", "-": "-", "›": "द्र", ")": "०", "…": "‘", "Ü": "%"
    }
  },
  "pcs nepali": {
    "name": "PCS Nepali",
    "post-rules": [["्ा", ""], ["(त्र|त्त)([^उभप]+?)m", "$1m$2"], ["त्रm", "क्र"], ["त्तm", "क्त"], ["([^उभप]+?)m", "m$1"], ["उm", "ऊ"], ["भm", "झ"], ["पm", "फ"], ["इ{", "ई"], ["ि((.्)*[^्])", "$1ि"], ["(.[ािीुूृेैोौंःँ]*?){", "{$1"], ["((.्)*){", "{$1"], ["{", "र्"], ["([ाीुूृेैोौंःँ]+?)(्(.्)*[^्])", "$2$1"], ["्([ाीुूृेैोौंःँ]+?)((.्)*[^्])", "्$2$1"], ["([ंँ])([ािीुूृेैोौः]*)", "$2$1"], ["ँँ", "ँ"], ["ंं", "ं"], ["ेे", "े"], ["ैै", "ै"], ["ुु", "ु"], ["ूू", "ू"], ["^ः", ":"], ["टृ", "ट्ट"], ["ेा", "ाे"], ["ैा", "ाै"], ["अाे", "ओ"], ["अाै", "औ"], ["अा", "आ"], ["एे", "ऐ"], ["ाे", "ो"], ["ाै", "ौ"]],
    "v": "1.0.0",
    "char-map": {"t": "त", "÷": "/", "v": "ख", "ñ": "ङ", "p": "उ", "r": "च", "|": "्र", "~": "ङ", "x": "ह", "z": "श", "å": "द्व", "d": "म", "ç": "ॐ", "f": "ा", "`": "ञ्", "b": "द", "í": "ष", "l": "ि", "n": "ल", "é": "ङ्ग", "h": "ज", "j": "व", "T": "त्", "V": "ख्", "P": "ए", "R": "च्", "\\": "्", "ß": "द्म", "^": "ट", "Ù": "ह", "X": "ह्", "Z": "श्", "D": "म्", "F": "ा", "@": "द्द", "B": "द्य", "L": "ी", "N": "ल्", "H": "ज्", "J": "व्", "4": "४", "·": "ट्ठ", "6": "६", "0": "०", "2": "२", "<": "्र", "¿": "रु", ">": "श्र", "8": "८", ":": "स्", "¥": "ऋ", "$": "द्ध", "§": "ट्ट", "&": "ठ", "¡": "ज्ञ्", "£": "घ्", "\"": "ू", ",": ",", ".": "।", "©": "?", "(": "ढ", "*": "ड", "u": "ग", "w": "ध", "q": "त्र", "s": "क", "}": "ै", "y": "थ", "ø": "य्", "ú": "ू", "e": "भ", "g": "न", "æ": "“", "a": "ब", "c": "अ", "o": "य", "i": "ष्", "k": "प", "U": "ग्", "Ô": "क्ष", "W": "ध्", "Q": "त्त", "S": "क्", "Ò": "ू", "]": "े", "_": ")", "Y": "थ्", "Ø": "्य", "[": "ृ", "E": "भ्", "G": "न्", "Æ": "”", "A": "ब्", "C": "र्‍", "M": "ः", "O": "इ", "I": "क्ष्", "K": "प्", "5": "५", "´": "झ", "7": "७", "1": "१", "°": "ङ्क", "3": "३", "=": ".", "?": "रू", "9": "९", ";": "स", "%": "छ", "¤": "ँ", "'": "ु", "!": "ज्ञ", "#": "घ", "¢": "द्घ", "-": "(", "/": "र", "®": "+", ")": "ण्", "+": "ं", "ª": "ञ"}
  },
  "kantipur": {
    "name": "Kantipur",
    "post-rules": [["्ा", ""], ["(त्र|त्त)([^उभप]+?)m", "$1m$2"], ["त्रm", "क्र"], ["त्तm", "क्त"], ["([^उभप]+?)m", "m$1"], ["उm", "ऊ"], ["भm", "झ"], ["पm", "फ"], ["इ{", "ई"], ["ि((.्)*[^्])", "$1ि"], ["(.[ािीुूृेैोौंःँ]*?){", "{$1"], ["((.्)*){", "{$1"], ["{", "र्"], ["([ाीुूृेैोौंःँ]+?)(्(.्)*[^्])", "$2$1"], ["्([ाीुूृेैोौंःँ]+?)((.्)*[^्])", "्$2$1"], ["([ंँ])([ािीुूृेैोौः]*)", "$2$1"], ["ँँ", "ँ"], ["ंं", "ं"], ["ेे", "े"], ["ैै", "ै"], ["ुु", "ु"], ["ूू", "ू"], ["^ः", ":"], ["टृ", "ट्ट"], ["ेा", "ाे"], ["ैा", "ाै"], ["अाे", "ओ"], ["अाै", "औ"], ["अा", "आ"], ["एे", "ऐ"], ["ाे", "ो"], ["ाै", "ौ"]],
    "v": "1.0.1",
    "char-map": {"÷": "/", "v": "ख", "r": "च", "\"": "ू", "~": "ञ्", "z": "श", "ç": "ॐ", "f": "ा", "b": "द", "n": "ल", "j": "व", "V": "ख्", "R": "च्", "ß": "द्म", "^": "६", "Z": "श्", "F": "ा", "B": "द्य", "Ï": "फ्", "N": "ल्", "Ë": "ङ्ग", "J": "व्", "6": "ट", "2": "द्द", "¿": "रू", ">": "श्र", ":": "स्", "§": "ट्ट", "&": "७", "£": "घ्", "•": "ड्ड", "¯": "¯", ".": "।", "«": "्र", "*": "८", "„": "ध्र", "w": "ध", "s": "क", "g": "न", "æ": "“", "c": "अ", "o": "य", "k": "प", "W": "ध्", "S": "क्", "Ò": "¨", "_": ")", "[": "ृ", "Ú": "’", "G": "न्", "Æ": "”", "C": "ऋ", "Â": "र", "O": "इ", "Î": "फ्", "K": "प्", "7": "ठ", "¶": "ठ्ठ", "3": "घ", "9": "ढ", "?": "रु", ";": "स", "º": "फ्", "'": "ु", "#": "३", "¢": "द्घ", "/": "र", "®": "र", "+": "ं", "ª": "ङ", "t": "त", "p": "उ", "|": "्र", "x": "ह", "å": "द्व", "d": "म", "`": "ञ", "l": "ि", "h": "ज", "T": "त्", "P": "ए", "Œ": "त्त्", "\\": "्", "X": "हृ", "D": "म्", "@": "२", "Í": "ङ्क", "L": "ी", "H": "ज्", "µ": "र", "4": "द्ध", "±": "+", "0": "ण्", "<": "?", "8": "ड", "¥": "र्‍", "$": "४", "¡": "ज्ञ्", "†": "!", "™": "र", "­": "(", ",": ",", "©": "र", "(": "९", "“": "ँ", "‘": "ॅ", "u": "ग", "q": "त्र", "}": "ै", "y": "थ", "ø": "य्", "e": "भ", "a": "ब", "i": "ष्", "‰": "झ्", "U": "ग्", "Ô": "क्ष", "Q": "त्त", "œ": "त्र्", "]": "े", "˜": "ऽ", "Y": "थ्", "Ø": "्य", "E": "भ्", "A": "ब्", "M": "ः", "Ì": "न्न", "I": "क्ष्", "È": "ष", "5": "छ", "´": "झ", "1": "ज्ञ", "°": "ङ्ढ", "=": ".", "‹": "ङ्ग", "%": "५", "¤": "झ्", "!": "१", "-": "(", "¬": "…", "›": "ऽ", ")": "०", "¨": "ङ्ग", "…": "‘"}
  }
};

function setUnicode(e, field) {
  // get font rules - default to Preeti
  if(e.ctrlKey){
    return true;
  }
  if(e.altKey){
    return true;
  }

  var unicode=e.charCode? e.charCode : e.keyCode;
  // console.log(unicode);
  var text = String.fromCharCode(unicode);
  // var text = 'cfof]hgfsf] gfd';

  font = 'Preeti';
  font = font.toLowerCase();
  var myFont = all_rules[font];
  if (!myFont) {
    throw 'font not included in module';
  }

  var output = '';
  for (var w = 0; w < text.length; w++) {
    var letter = text[w];
    output += myFont['char-map'][letter] || letter;
  }
  for (var r = 0; r < myFont['post-rules'].length; r++) {
    output = output.replace(new RegExp(myFont['post-rules'][r][0], 'g'), myFont['post-rules'][r][1]);
  }

  // console.log(output);
  field.value = field.value + output;  
  return false;
}

if (typeof module !== 'undefined') {
  module.exports = preeti;
}


function setUnicodePreeti(text) {
  font = 'Preeti';
  font = font.toLowerCase();
  var myFont = all_rules[font];
  if (!myFont) {
    throw 'font not included in module';
  }

  var output = '';
  for (var w = 0; w < text.length; w++) {
    var letter = text[w];
    output += myFont['char-map'][letter] || letter;
  }
  for (var r = 0; r < myFont['post-rules'].length; r++) {
    output = output.replace(new RegExp(myFont['post-rules'][r][0], 'g'), myFont['post-rules'][r][1]);
  }
  return output;
}