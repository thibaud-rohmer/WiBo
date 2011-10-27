$('document').ready(function(){
	
	$('.WIBOJS a').unbind();

	$('.WIBOJS a').click(function(){
		id=$(this).parents('.box').first().attr('id');
		opt=$(this).attr('href');
		cont=$(this).parents('.content');
		$(cont).fadeOut("fast",function(){
			$(cont).load('loadwidget.php'+opt,function(){
				$(cont).fadeIn("fast");
			});
		});
		return false;
	});




});
