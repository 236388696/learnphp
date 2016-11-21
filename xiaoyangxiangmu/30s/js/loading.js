function loading(imgsObj, handleObj) {
	var count = 0;
	var currentIndex = 0;
	for(prop in imgsObj) {
		count++;
	}
	for(prop in imgsObj) {
		var img = new Image();
		img.src = imgsObj[prop];
		var imgObj = {};
		img.onload = (function(prop) {
			return function() {
				currentIndex++;
				imgObj[prop] = this;
				if(handleObj.progress) {
					var scale = currentIndex / count * 100;
					handleObj.progress(scale);
				}
				if(handleObj.complete) {
					if(currentIndex == count) {
						handleObj.complete(imgObj);
					}
				}
			}
		})(prop);
	}
}