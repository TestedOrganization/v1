$(document).ready(function() {

	

  $("div.blog-post").hover(
    function() {
        $(this).find("div.content-hide").slideToggle("fast");
    },
    function() {
        $(this).find("div.content-hide").slideToggle("fast");
    }
  );

  $('.flexslider').flexslider({
		prevText: '',
		nextText: ''
	});

  $('.testimonails-slider').flexslider({
    animation: 'slide',
    slideshowSpeed: 5000,
    prevText: '',
    nextText: '',
    controlNav: false
  });

  $(function(){

  // Instantiate MixItUp:

  $('#Container').mixItUp();

  

  $(document).ready(function() {
      $(".fancybox").fancybox();
    });

  });

  //SearchboxToggle
  var searchToggle = false;
  $("#search-button").click(function () {
      if (searchToggle) {
          searchToggle = false;
          $("#search").hide(500);
      }
      else{
          searchToggle = true;
          $("#search").show(500);
      }
  });
  
});

