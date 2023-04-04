VowPrev = function(word){
	if(word.selectionText!==undefined){
		chrome.tabs.create({url: "https://gps.networkreverse.com/mov/mov2.php?u="+encodeURIComponent(word.selectionText),active:false});
	}else{	
	  var query=(word.linkUrl!==undefined)?word.linkUrl:word.srcUrl;
	  chrome.tabs.create({url: "https://gps.networkreverse.com/mov/info.php?url=" + encodeURIComponent(query),active: false});
	}
};

chrome.contextMenus.create({
  title: "VOW Preview",
  contexts:["link","video","selection"],
  onclick: VowPrev
});
