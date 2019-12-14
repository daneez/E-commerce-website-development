
$(document).ready(function(){
	
	$('.caption>h4>a').on('click',function(event){
		event.preventDefault();
		
		$this = $(this);
		
		//getData = $this.html().replace(" ","+");
		
		$.getJSON($this.attr('href'),{product:$this.html()},function(json){
			$('#carousel').fadeOut(200, function(){
				$carouselImages = $('#carousel .slide-image');
				for(i=0;i<3;i++){
					$($carouselImages[i]).attr("src",json[i]);
				}
				$('#carousel').fadeIn(200);
			});
		});
	});
	
});