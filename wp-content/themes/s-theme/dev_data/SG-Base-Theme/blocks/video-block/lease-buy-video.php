<iframe width="100%" src="https://www.youtube.com/embed/BDTYlN8hTd4?rel=0" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="video"></iframe>
<script>
	$(function(){
		function videoResizer(){
			var videoWidth = $('.video').width();
			var videoHeight = videoWidth * 9 / 16;
			$('.video').height(videoHeight+'px');			
		}
		videoResizer();
		$(window).on('resize',function(){
			videoResizer();
		});
	});
</script>