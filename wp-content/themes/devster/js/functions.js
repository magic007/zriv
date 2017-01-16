jQuery(document).ready(function(){
						   	   
	function MainNavigation(){
		$("#nav ul ").css({display: "none"}); // Opera Fix
		$("#nav li").hover(function(){
		$(this).find('ul:first').css({visibility: "visible",display: "none"}).show(400);
		},function(){
			$(this).find('ul:first').css({visibility: "hidden"});
		});
	}
	
	 $(document).ready(function(){					
		MainNavigation();
	});


});