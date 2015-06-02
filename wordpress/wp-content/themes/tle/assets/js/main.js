jQuery(document).ready(function($) {
	$(".clbthumb").colorbox({ rel: 'thumbphoto' });
	$(".leftSidebar select option").on('click', function(event) {
		console.log($(this).val())
		if($(this).val() !="" && $(this).val() !=null ){
			window.location.href = $(this).val();
		}
	});
});