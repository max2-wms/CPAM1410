


// Responsive Embeds Resize
jQuery.QTyoutubeResize = function() {
	jQuery("iframe[src*='youtube'], iframe[src*='vimeo'], iframe[src*='vevo']").not("unresponsive").each(function(){
		var QTthat = jQuery(this),
			width = QTthat.width(),
			height = QTthat.height();
		QTthat.attr("data-proportion",(width/height));
		QTthat.css({"width":QTthat.parent().width()});
		QTthat.height(QTthat.parent().width()/QTthat.attr("data-proportion"));
	});
};



(function($) { 
	"use strict";
	//debugger;
	/* Document Ready 
	=================================================================*/
	$(document).ready(function() {
		$(this).delay(500).promise().done(function(){
	   		$.fn.qwInitTheme();
	   	});
	});


	/* Page Initialization 
	=================================================================*/
  	$.fn.qwInitTheme = function(){

  	
	    $('.button-collapse').sideNav();

	    $('.slider').slider({full_width: true, indicators: true, interval: 4000});


	    $(".dropdown-button").dropdown();

		$(document).ready(function(){
			$('.tabs').tabs('select_tab', 'tab_id');
		});
		        
	
	   
	   	
	    /*
	    *
	    *	Pushpin elements
	    *
	    */
	    var barOffsetHeight = 60;
	     if($("body").hasClass("admin-bar")){
	    	barOffsetHeight = 92;
	    }



	    $('.qw-pushpin').each(function(i,c){
	    	var that = $(c);
	    	that.css({width:that.width()+"px"});
			that.pushpin({ 
				top: that.parent().offset().top - 20 , 
				bottom: $("#qwShowgridEnd").offset().top,
				offset:barOffsetHeight
			});
		});

		$.fn.fixPushpinWidth = function(){
			$('.qw-pushpin').each(function(i,c){
		    	var that = $(c);
		    	that.css({width:that.parent().width()+"px"});
				
			});
		}


		$("#nav-mobile").on("click","li.menu-item-has-children > a", function(e){
			var that = $(this).parent();
			e.preventDefault();
			if(that.hasClass("open")){
				that.removeClass("open");
			}else{
				that.addClass("open");
			}
			return true;
		});



		/*
	    *	Auto background
	    *
	    */
		$.fn.autoBgStyles = function(){
			$("[data-bgimg]").each(function(){
				var img = jQuery(this).attr("data-bgimg");
				
				if(img !== "" && typeof(img) !== "undefined"){
					$(this).css({"background": "url("+img+")","background-size":"cover","background-position":"center center"  });
				}


				
			});	
		};
		$.fn.autoBgStyles();













	/*
		*
		*	PARALLAX BACKGROUNDS V3
		*	============================================================================================================================================
		*
		*/




		    $.fn.parallax = function(options) {
		    	console.log("starting"+$(this));
		        var windowHeight = $(window).height();
		        // Establish default settings
		        var settings = $.extend({
		            speed        : 0.15
		        }, options);

		       
		        // Iterate over each object in collection
		        return this.each( function() {


		        	// Save a reference to the element
					var $this = $(this);
					var scrollTop = $(window).scrollTop();
		            var offset = $this.offset().top;
		            var height = $this.outerHeight();

				    // Check if above or below viewport
					if (offset + height <= scrollTop || offset >= scrollTop + windowHeight) {
						return;
					}


					var yBgPosition = Math.round((offset - scrollTop) * settings.speed);
				    // Apply the Y Background Position to Set the Parallax Effect
				   
				    $this.css('background-position', 'center ' + yBgPosition + 'px');


					// Set up Scroll Handler
					$(document).scroll(function(){
					    scrollTop = $(window).scrollTop();
			            offset = $this.offset().top;
			            height = $this.outerHeight();

					    // Check if above or below viewport
						if (offset + height <= scrollTop || offset >= scrollTop + windowHeight) {
							return;
						}
						yBgPosition = Math.round((offset - scrollTop) * settings.speed);
					    // Apply the Y Background Position to Set the Parallax Effect
					    $this.css('background-position', 'center ' + yBgPosition + 'px');
					});
		        });
		    }

		    $.fn.parallaxBackground = function(){
			    $('[data-type="background"]').each(function(){
			    	var bgobj = jQuery(this); // assigning the object 
			    	var qwbgimg = bgobj.attr("data-qwbgimg");
			    	if(qwbgimg !== "" && typeof(qwbgimg) !== "undefined"){
						$(this).css({"background": "url("+qwbgimg+")","background-size":"cover","background-position":"center center","background-repeat":"no-repeat"   });
						bgobj.parallax({
							speed : 0.15
						});
					}
			    	
			    });
			}
			$.fn.parallaxBackground();
			














		
	    /*
	    *	Initialize Select
	    *
	    */
		$('select').material_select();
		$.fn.qwDataToggle();


		/*
	    *	Parallax
	    *
	    */



		//$('.parallax').parallax();


		$(window).resize();



	



		/*
		*
	    *	Sticky navbar
	    *
	    */



	    var stickToBot = jQuery("#qwMainNavbar").offset().top; //65;
	 


		var qtBody = $('body');
	    $(window).scroll(function() {
	       var scrollVal = $(this).scrollTop();
	        if ( scrollVal > stickToBot ) {
	            if(!qtBody.hasClass("qw-stickynav")){
	            	qtBody.addClass("qw-stickynav");
	            }
	        } else {
	            if(qtBody.hasClass("qw-stickynav")){
	            	qtBody.removeClass("qw-stickynav");
		            
	        	}
	        }
	    });




		/*
		*
	    *	Smooth scrolling
	    *
	    */
	    $.fn.smoothLinkScroll = function(sctop){
	    	$('html,body').animate({scrollTop:sctop - 50}, 1000);
	    }

		$('a.smoothscroll').on('click', function(event){     
		    event.preventDefault();
		    var that = $(this),
		    	hashh = this.hash;
		    that.delay(500).promise().done(function(){
		    	$.fn.smoothLinkScroll($(hashh).offset().top);
		    });
		    
		});







	    /* Volume controls ======================= */

	    
	    
	    var volBarCont = $("#qtVolumeControl").width(),
	        relX = 100,
	        theVolCursor = $("#theVolCursor"),
	        qwActualVolume = 60,
	        nextV = 60;
	      


		/*
		*
		*	VOLUME
		*
		*/
		
		$('body').on('mousedown', '#theVolCursor', function(e) {
	        
		 	e.preventDefault();
		 	
		 	$(this).addClass('draggable');

		 	var larghezza = $('.draggable').outerWidth(),
		 		Qmeta = larghezza/2,
		 		volContainer = $("#qtVolumeControl"),
		 		originalPosition = volContainer.offset().left,
		 		totalWidth = volContainer.width(),
		 		finalVolume = 60,
		 		movableCursor = $('.draggable'),
		 		larghezzaReale = totalWidth - larghezza;

		 			 	
		 	$(this).parents().on('mousemove', function(p) {
		 		var limSx = $("#qtVolumeControl").offset().left,
		 			limDx = limSx + totalWidth;
			 	if(p.pageX >  (limSx + Qmeta ) && p.pageX < (limDx - Qmeta )){
		            $('.draggable').offset({
		                left: p.pageX - Qmeta
		            });
		            finalVolume = (movableCursor.offset().left - originalPosition) / larghezzaReale * 100;// / volContainer * 100;
		             $('.draggable').on('mouseup', function() {
		                $(this).removeClass('draggable');
		                $.mySound.setVolume(finalVolume);

		                if(finalVolume < 33){
		                	$("#theVolCursor i").removeClass("mdi-av-volume-down").removeClass("mdi-av-volume-up").addClass("mdi-av-volume-mute");
		                }
		                if(finalVolume >= 33 && finalVolume < 66){
		                	$("#theVolCursor i").removeClass("mdi-av-volume-up").removeClass("mdi-av-volume-mute").addClass("mdi-av-volume-down");
		                }
		                if(finalVolume >=66){
		                	$("#theVolCursor i").removeClass("mdi-av-volume-down").removeClass("mdi-av-volume-mute").addClass("mdi-av-volume-up");
		                }
		                

		                jQuery.cookie("qt_volume",Math.floor(finalVolume));
		              //  console.log(jQuery.cookie("qt_volume"));

		            });
		        }
	        });
	    }).on('mouseup', function() {
	        $('.draggable').removeClass('draggable');
	    });








	    /*
	    *
	    *
	    *	Initialize the audio player
	    *
	    *
	    *
	    */
		

		$.fn.initializeAudioStream = function(){
			var playerMp3 = $("#qwPlayerPlay").attr("data-mp3"),
				QT_player_autoplay = $("#qwPlayerPlay").attr("data-autoplay"),
				 playerIcon = $("#qwPlayerPlay").find("i");
			if($.mySound === undefined || $.mySound.url !== playerMp3){
	            $.mySound = soundManager.createSound({
	                id: 'currentSound',
	                url: playerMp3
	            });
	            $.mySound.setVolume(60);
	            
			    /*
			    /*
			    *
			    *
			    *
			    *					SE HO AUTOPLAY: AGGIUNGI CONTROLLO
			    *
			    **
			    *
			    */
			    if(QT_player_autoplay === "yes"){
			    	playerIcon.addClass("mdi-av-pause").removeClass("mdi-av-play-arrow");
			    	$("#qwPlayerPlay").attr("data-state", "play");

				    $.mySound.play();   
				}
        	}
			                 
			$("#qwPlayerPlay").click(function(e){
		        e.preventDefault();
		        var that = $(this);

		        if(playerMp3 !== ""){
			        $.playerState = that.attr("data-state");
			        if($.playerState === "play"){
			            playerIcon.addClass("mdi-av-play-arrow").removeClass("mdi-av-pause");
			            // If I click and go here, means it is playing already
			            that.attr("data-state", "stop"); 
			            if($.mySound !== undefined){
			                $.mySound.pause(); 
			                $.cookie('qtPlayerStatus', 'pause', { expires: 7, path: '/' });
			            }
			        }else{
			        	// player is in STOP
			            playerIcon.addClass("mdi-av-pause").removeClass("mdi-av-play-arrow");
			            that.attr("data-state", "play");
			            $.mySound.play();   
			            $.cookie('qtPlayerStatus', 'play', { expires: 7, path: '/' });
			        }
		        }
		    });

		    if($.cookie('qtPlayerStatus') === 'play'){		    	
		    	playerIcon.addClass("mdi-av-pause").removeClass("mdi-av-play-arrow");
	            $("#qwPlayerPlay").attr("data-state", "play");
	            $.mySound.play();  


			    if(typeof(jQuery.cookie("qt_volume")) !== '' && typeof($.mySound) !== undefined){

			    	var larghezza = $('.draggable').outerWidth(),
				 		Qmeta = larghezza/2,
				 		volContainer = $("#qtVolumeControl"),
				 		originalPosition = volContainer.offset().left,
				 		totalWidth = volContainer.width(),
				 		finalVolume = 60,
				 		movableCursor = $('.draggable'),
				 		larghezzaReale = totalWidth - larghezza;


					finalVolume = jQuery.cookie("qt_volume");
					 $.mySound.setVolume(finalVolume);
					 if(finalVolume < 33){
		            	$("#theVolCursor i").removeClass("mdi-av-volume-down").removeClass("mdi-av-volume-up").addClass("mdi-av-volume-mute");
		            }
		            if(finalVolume >= 33 && finalVolume < 66){
		            	$("#theVolCursor i").removeClass("mdi-av-volume-up").removeClass("mdi-av-volume-mute").addClass("mdi-av-volume-down");
		            }
		            if(finalVolume >=66){
		            	$("#theVolCursor i").removeClass("mdi-av-volume-down").removeClass("mdi-av-volume-mute").addClass("mdi-av-volume-up");
		            }
		     

		            $('#theVolCursor').offset({
		                left: originalPosition + parseInt(finalVolume) + 40
		            });

					//console.log(jQuery.cookie("qt_volume"));
				}
		    }



		};

				

		/* Initialize Soundmanager
		=================================================================*/

		$.fn.initializeSoundmanager = function(){
		    //var flashPath = $("#qwPlayerPlay").attr("data-soundmanagerswf");
		    soundManager.setup({
		      url: $("#qwPlayerPlay").attr("data-soundmanagerswf"),
		      flashVersion: 9,
		      onready: function() {       
		        $.fn.initializeAudioStream();
		        
		      },ontimeout: function() {
		        // Hrmm, SM2 could not start. Missing SWF? Flash blocked? Show an error, etc.?

		      }
		    });

		    soundManager.flash9Options = {
		      isMovieStar: null,      // "MovieStar" MPEG4 audio mode. Null (default) = auto detect MP4, AAC etc. based on URL. true = force on, ignore URL
		      usePeakData: true,     // enable left/right channel peak (level) data
		      useWaveformData: false, // enable sound spectrum (raw waveform data) - WARNING: May set CPUs on fire.
		      useEQData: false,       // enable sound EQ (frequency spectrum data) - WARNING: Also CPU-intensive.
		      onbufferchange: null,   // callback for "isBuffering" property change
		      ondataerror: null   // callback for waveform/eq data access error (flash playing audio in other tabs/domains)
		    };
		};

		if($("#qwMusicPlayerContainer").length > 0){
			$.fn.initializeSoundmanager();
		}



		/*
		*
		*
		*	Tooltips
		*/

		 $('.tooltipped').tooltip({delay: 10});
		 $('.prettySocial').prettySocial();


		 /*
		*
		*
		*	Marquee
		*	http://aamirafridi.com/jquery/jquery-marquee-plugin
		*/
		 $('.marquee').marquee({
		 	//speed in milliseconds of the marquee
		    duration: 12000,
		    //gap in pixels between the tickers
		    gap: 200,
		    //time in milliseconds before the marquee will start animating
		    delayBeforeStart: 0,
		    //'left' or 'right'
		    direction: 'left',
		    //true or false - should the marquee be duplicated to show an effect of continues flow
		    duplicated: true
		 }); 



		 /*
		*
		*
		*	Fix Slider Resize
		*/
		 $.fn.fixSliderHeight = function(){
		 	$(".qw-extraheader .slider, .qw-extraheader .slider ul.slides").each(function(){
				var that = $(this);
				that.height(that.width()/16*7);
			});
		 };
		  $.fn.fixSliderHeight();

		
		  var timeoutfixSliderHeight;
		jQuery(window).resize(function() {
			
			clearTimeout(timeoutfixSliderHeight);
		 	timeoutfixSliderHeight = window.setTimeout(function (){
				$.fn.fixSliderHeight();
				$.fn.fixPushpinWidth();
				jQuery.QTyoutubeResize();

		    }, 800); // using timeout because it wants to execute this too early!!
		});
		 

    }; // end of document ready

	/* Generic function to toggle classes on targeted elements
		=================================================================*/
	var qwDataToggleClass = function() {
	    var t = $(this);

	    $("#"+t.attr("data-target")).toggleClass(t.attr("data-toggleclass"));
	    if(t.attr("data-target2") !== undefined){
	        $("#"+t.attr("data-target2")).toggleClass(t.attr("data-toggleclass2"));
	    }
	    return false;
	};
	$.fn.qwDataToggle = function(){
	    $("body").off("click", "[data-toggleclass]", qwDataToggleClass );
	    $("body").on("click","[data-toggleclass]",qwDataToggleClass);
	};

	jQuery.QTyoutubeResize();

})(jQuery); // end of jQuery name space






/**
 * Parallax Scrolling Tutorial
 * For NetTuts+
 *  
 * Author: Mohiuddin Parekh
 *	http://www.mohi.me
 * 	@mohiuddinparekh   
 */


/* 
 * Create HTML5 elements for IE's sake
 */

document.createElement("article");
document.createElement("section");











/*
*
*	Blocking any console output
*
*/
/**/
var console = {};
console.log = function(){};
window.console = console;


