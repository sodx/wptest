jQuery(document).ready(function($){
	$('.carousel').carousel();
	$('.ajax a').click(function(event) {
	event.preventDefault();
	var postAuthor = $(this).data('author');
	
		$.ajax({
			cache: false,
			timeout: 8000,
			url: php_array.admin_ajax,
			type: 'POST',
			data: ({
				action: 'single', 
				author: postAuthor,
			}),
			success: function(data) {
				$(".resp p").html(data);
				var inst = $('[data-remodal-id=modal]').remodal();
				inst.open();
			}
		})
	return false;
  });
});
