$(function(){
	
	var slideAuto = setInterval(slideGo, 3000);
	
	$('.slide_nav_item.g').click(function(){
		slideGo();
		clearInterval(slideAuto);
	});
	
	$('.slide_nav_item.b').click(function(){
		slideBack();
		clearInterval(slideAuto)
	});
	
	$('.slide_item.g').dbclick(function(){
		slideAuto = setInterval(slideGo, 3000);
	});

	function slideGo(){
		if ($('.slide_item.first').next().size()){
			$('.slide_item.first').fadeOut(400, function(){
				$(this).removeClass('first').next().fadeIn().addClass('first');
			});
		}else{
		$('.slide_item.first').fadeOut(400, function(){
				$('.slide_item').removeClass('first');
				$('.slide_item:eq(0)').fadeIn().addClass('first');
			});
		
		}
	}
	
	function slideBack(){
		if ($('.slide_item.first').index() > 1){
			$('.slide_item.first').fadeOut(400, function(){
				$(this).removeClass('first').prev().fadeIn().addClass('first');
			});
		}else{
		$('.slide_item.first').fadeOut(400, function(){
				$('.slide_item').removeClass('first');
				$('.slide_item:last-of-type').fadeIn().addClass('first');
			});
		
		}
	}
	
});