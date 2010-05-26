(function($) {
	$.vimeo = function(selector, videoUrl) {
		var url =  'http://www.vimeo.com/api/oembed.json?width=550&height=412&url=';
			url += encodeURIComponent(videoUrl) + '&callback=?';
		$.getJSON(url, function(videoData) {
			$(selector)
			.html(videoData.html)
			.css({width: '552px', height: '412px', margin: '0 auto'})
		});
	};
})(jQuery);

