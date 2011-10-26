$('document').ready(function(){
		$('.altshow').show();

		$('.refresh').click(function(){
			id=$(this).parent().attr('id');
			$(this).parent().children('.content').load('loadwidget.php?id='+id);
		});
});
