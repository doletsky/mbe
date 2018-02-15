function CustomMarker(latlng, map, args) {
	this.latlng = latlng;	
	this.args = args;	
	this.setMap(map);	
}

CustomMarker.prototype = new google.maps.OverlayView();

CustomMarker.prototype.draw = function() {
	
	var self = this;
	
	var div = this.div;
	
	if (!div) {
	
		div = this.div = $('<div class="map-marker" />');
		div.append('<img src="/bitrix/templates/mbe/i/map_pointer.svg" alt="thunder">');

		div.css("position", 'absolute')
		//div.style.cursor = 'pointer';
		div.css("width", self.args.size.width + "px");
		div.css("height", self.args.size.height + "px");
		
		if (typeof(self.args.marker_id) !== 'undefined') {
			//div.dataset.marker_id = self.args.marker_id;
		}
		
		google.maps.event.addDomListener(div[0], "click", function(event) {		
			google.maps.event.trigger(self, "click");
		});

		google.maps.event.addDomListener(div[0], "mouseover", function(event) {		
			google.maps.event.trigger(self, "mouseover");
		});
		
		var panes = this.getPanes();
		panes.overlayImage.appendChild(div[0]);
	}
	
	var point = this.getProjection().fromLatLngToDivPixel(this.latlng);
	
	if (point) {
		div.css("left", (point.x - 10) + 'px');
		div.css("top", (point.y - 20) + 'px');
	}
};

CustomMarker.prototype.remove = function() {
	if (this.div) {
		this.div.parentNode.removeChild(this.div);
		this.div = null;
	}	
};

CustomMarker.prototype.getPosition = function() {
	return this.latlng;	
};