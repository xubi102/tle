jQuery(document).ready(function($) {
	$(".clbthumb").colorbox({ rel: 'thumbphoto' });
	$(".leftSidebar select").on('change', function(event) {
		var link = $("select option:selected" ).val();
		if(link !=""){
			window.location.href = link;
		}
	});
	$(".navbar-toggle").click(function(){
		$(".mainNavSm").slideToggle("fast");
	});
});