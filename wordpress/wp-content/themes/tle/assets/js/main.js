jQuery(document).ready(function($) {
	$(".clbthumb").colorbox({ rel: 'thumbphoto' });
	$(".leftSidebar select option").on('click', function(event) {
		if($(this).val() !=""){
			window.location.href = $(this).val();
		}
	});
	$(".navbar-toggle").click(function(){
		$(".mainNavSm").slideToggle("slow")
	});
});