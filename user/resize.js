
$(document).ready(function(){
				var wh=$(window).height();
				var ww=$(window).width();
				
				$(".login").css("max-width",ww+"px").css("min-height",wh+"px");
				
				$(window).resize(
				function(event){
				var wh=$(window).height();
				var ww=$(window).width();
				$(".login").css("max-width",ww+"px").css("min-height",wh+"px")
					
				}
				
				
				)
			});