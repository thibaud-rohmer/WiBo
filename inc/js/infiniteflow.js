function isScrolledIntoView(elem)
{
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    return ((elemBottom >= docViewTop) && (elemTop <= docViewBottom)
      && (elemBottom <= docViewBottom) &&  (elemTop >= docViewTop) );
}

function isScrolledOutOfView(elem,direction)
{
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();
	if(direction>0){
    	return (elemBottom <= docViewTop - 10);
	}else{
	return (elemTop >= docViewBottom + 10);
	}
}


$(document).ready(function(){
	dh=$(document).height()-$('#container').offset().top+10;
	var sc=0;
	$(window).scroll(function(){
		nsc=window.pageYOffset;
    		var diffY=sc-nsc;
		sc=nsc;
		var direction=1;
		if(diffY > 0) direction=-1;
		boxlist=$('.box');
		$('.box').each(function(){
			if(isScrolledOutOfView(this,direction)){
				var ntop = (direction)*dh+parseFloat($(this).css('top'));
				if(ntop<0) ntop=parseFloat($(this).css('top'));
				$(this).css('top',ntop+'px');
			}
		});

	});
});

