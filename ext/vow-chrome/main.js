VowPrev = function(word){
  var query = word.linkUrl;
  chrome.tabs.create({url: "https://gps.networkreverse.com/mov/info.php?url=" + query,active: false});
};

chrome.contextMenus.create({
  title: "VOW Preview",
  contexts:["link"],
  onclick: VowPrev
});
