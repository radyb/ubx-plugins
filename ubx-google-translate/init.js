function _GoogleTranslateInit() { 
  function _h(c, t) {
    var v = c.split(' ');
    for (var i = 0; i < v.length; i++)
      if (v[i].toLowerCase() == t.toLowerCase()) 
        return true;
    return false; 
  }
  function _s(t) { 
    var c = document.getElementsByTagName(t); 
    for (var i = 0; i < c.length; i++) 
      if (!_h(c[i].className, "skiptranslate")) 
        c[i].className = c[i].className + " skiptranslate";
  }
  _s("pre");
  new google.translate.TranslateElement({pageLanguage: 'en',
    includedLanguages: 'de,en,zh-CN,zh-TW,es,fr,it,ja,ko,ru,pt,hi', 
    layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 
    '_GoogleTranslateElem'); 
}
