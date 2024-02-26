// JavaScript Document

$(document).ready(function(){
	$('.live-radio').click(function(){
		openLiveRadioWindow();
		return false;	
	});
	
	$('#slider').nivoSlider({
		effect: 'fade',
		directionNav: false,	
		controlNav: false,
		pauseOnHover: false, 
		animSpeed: 1000,
		pauseTime: 6000,
	});
	
	$('#mycarousel').jcarousel();	
	
	$(".wdpv_popular_posts").after("<div class='vote-link'>cliquez <a href='/concours-top-des-tops/'>ici</a> pour participer<br /> au concours Top des Tops</div>");
	
	$(".wdpv_popular_posts li a, .track a").click(function(){
		return false;	
	});			

	$(".js-send_mail").click(function() {        
		var name = $("#form_name").val(),        	
		subject = $("#form_subject").val(),        	
		email = $("#form_email").val(),        	
		text = $("#form_msg").val(),        	
		dataString = 'name='+ name + '&subject='+ subject + '&email=' + email + '&text=' + text;        

		$.ajax({            
			type: "POST",            
			url: "/scripts/email.php",            
			data: dataString,            
			success: function(){            	
				$('.success').fadeIn(1000);            
			}        
		});        

		return false;    
	});
});