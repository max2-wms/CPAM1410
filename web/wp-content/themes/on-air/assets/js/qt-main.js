
function iOS() {
  var iDevices = [
    'iPad Simulator',
    'iPhone Simulator',
    'iPod Simulator',
    'iPad',
    'iPhone',
    'iPod'
  ];
  if (!!navigator.platform) {
    while (iDevices.length) {
      if (navigator.platform === iDevices.pop()){ return true; }
    }
  }
  return false;
}


/**
 *	EXTERNAL LIBRARY FOR POPUP PLAYER
 * http://rip747.github.io/popupwindow/
 * Popup windows
 * Used in the popup player
 * 
 */



jQuery.fn.popupwindow = function(p)
{

	var profiles = p || {};

	return this.each(function(index){
		var settings, parameters, mysettings, b, a, winObj;
		
		// for overrideing the default settings
		mysettings = (jQuery(this).attr("rel") || "").split(",");

		
		settings = {
			height:600, // sets the height in pixels of the window.
			width:600, // sets the width in pixels of the window.
			toolbar:0, // determines whether a toolbar (includes the forward and back buttons) is displayed {1 (YES) or 0 (NO)}.
			scrollbars:0, // determines whether scrollbars appear on the window {1 (YES) or 0 (NO)}.
			status:0, // whether a status line appears at the bottom of the window {1 (YES) or 0 (NO)}.
			resizable:1, // whether the window can be resized {1 (YES) or 0 (NO)}. Can also be overloaded using resizable.
			left:0, // left position when the window appears.
			top:0, // top position when the window appears.
			center:0, // should we center the window? {1 (YES) or 0 (NO)}. overrides top and left
			createnew:1, // should we create a new window for each occurance {1 (YES) or 0 (NO)}.
			location:0, // determines whether the address bar is displayed {1 (YES) or 0 (NO)}.
			menubar:0, // determines whether the menu bar is displayed {1 (YES) or 0 (NO)}.
			onUnload:null // function to call when the window is closed
		};

		// if mysettings length is 1 and not a value pair then assume it is a profile declaration
		// and see if the profile settings exists

		if(mysettings.length == 1 && mysettings[0].split(":").length == 1)
		{
			a = mysettings[0];
			// see if a profile has been defined
			if(typeof profiles[a] != "undefined")
			{
				settings = jQuery.extend(settings, profiles[a]);
			}
		}
		else
		{
			// overrides the settings with parameter passed in using the rel tag.
			for(var i=0; i < mysettings.length; i++)
			{
				b = mysettings[i].split(":");
				if(typeof settings[b[0]] != "undefined" && b.length == 2)
				{
					settings[b[0]] = b[1];
				}
			}
		}

		// center the window
		if (settings.center == 1)
		{
			settings.top = (screen.height-(settings.height + 110))/2;
			settings.left = (screen.width-settings.width)/2;
		}
		
		parameters = "location=" + settings.location + ",menubar=" + settings.menubar + ",height=" + settings.height + ",width=" + settings.width + ",toolbar=" + settings.toolbar + ",scrollbars=" + settings.scrollbars  + ",status=" + settings.status + ",resizable=" + settings.resizable + ",left=" + settings.left  + ",screenX=" + settings.left + ",top=" + settings.top  + ",screenY=" + settings.top;
		
		jQuery(this).bind("click", function(){
			var name = settings.createnew ? "PopUpWindow" + index : "PopUpWindow";
			winObj = window.open(this.href, name, parameters);
			
			if (settings.onUnload) {
				// Incremental check for window status
				// Attaching directly to window.onunlaod event causes invoke when document within window is reloaded
				// (i.e. an inner refresh)
				unloadInterval = setInterval(function() {
					if (!winObj || winObj.closed) {
						clearInterval(unloadInterval);	
						settings.onUnload.call($(this));
					}
				},500);
			}
			
			winObj.focus();
			
			return false;
		});
	});

};




/**=====================================================================================
 *
 *
 *	
 * 				MAIN ONAIR SCRIPTING
 *
 *
 *
 * 
 =====================================================================================*/




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



	
		
	//New youtube resize 25 jul 2014

	$.fn.NewYoutubeResize = function  (){
	    jQuery('#content iframe, iframe.youtube-player, iframe[src*="youtube"], iframe[src*="vimeo"]').each(function(i,c){ // .youtube-player
	        var QTthat = jQuery(this);
	            if(QTthat.attr("src")){
	                var href = QTthat.attr("src");
	                if(href.match("youtube.com") || href.match("vimeo.com") || href.match("vevo.com")){
	                    var width = QTthat.parent().width(),
	                        height = QTthat.height();
	                    QTthat.css({"width":width});
	                    QTthat.height(width/16*9);
	                }  
	            }
	    });
	}

	/* Page Initialization 
	=================================================================*/
  	$.fn.qwInitTheme = function(){

  		
	    $('.button-collapse').sideNav();

	    $('.slider').slider({full_width: true, indicators: true, interval: 4000});


	    $(".dropdown-button").dropdown();

		$('.tabs').tabs('select_tab', 'tab_id');
		        
	
	   	$.fn.transformlinks($('#qtMainContainer'));
	   	
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


		                if(false === iOS()){
		                	$("#theVolCursor").attr("data-tooltip","Volume: "+Math.round(finalVolume));
		                }


		                if(finalVolume < 33){
		                	$("#theVolCursor i").removeClass("fa-volume-down").removeClass("fa-volume-up").addClass("fa-volume-off");
		                }
		                if(finalVolume >= 33 && finalVolume < 66){
		                	$("#theVolCursor i").removeClass("fa-volume-up").removeClass("fa-volume-off").addClass("fa-volume-down");
		                }
		                if(finalVolume >=66){
		                	$("#theVolCursor i").removeClass("fa-volume-down").removeClass("fa-volume-off").addClass("fa-volume-up");
		                }
		                

		                jQuery.cookie("qt_volume",Math.floor(finalVolume));

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
			
			var mainPlayerButton = $("#qwPlayerPlay"),
				playerMp3 = mainPlayerButton.attr("data-mp3"),
				QT_player_autoplay = mainPlayerButton.attr("data-autoplay"),
				playerIcon = mainPlayerButton.find("i");

			if($.cookie('playerMp3') != '' && $.cookie('playerMp3') !== null){
				playerMp3 = $.cookie('playerMp3');
				
			}


			if($.mySound === undefined || $.mySound.url !== playerMp3){
	            $.mySound = soundManager.createSound({
	                id: 'currentSound',
	                url: playerMp3
	            });
	            $.mySound.setVolume(60);
			   
        	}





			                 
			mainPlayerButton.click(function(e){
		        e.preventDefault();
		        var that = $(this),
		        	playerMp3 = that.attr("data-mp3"),
		        	playerIcon = that.find("i");;

		        if(playerMp3 !== ""){
			        $.playerState = that.attr("data-state");
			        if($.playerState === "play"){
			            playerIcon.addClass("mdi-av-play-arrow").removeClass("mdi-av-pause");
			            that.attr("data-state", "stop"); 
			            console.log("pausing");
			            $.cookie('qtPlayerStatus', 'pause', { expires: 1, path: '/' });
			            if($.mySound !== undefined){
			                $.mySound.pause(); 
			            }
			            console.log("Status of the player cookie: "+ $.cookie('qtPlayerStatus'));
			        } else {
			            playerIcon.addClass("mdi-av-pause").removeClass("mdi-av-play-arrow");
			            that.attr("data-state", "play");
			            $.mySound.play();   
			            $.cookie('qtPlayerStatus', 'play', { expires: 7, path: '/' });
			        }
		        }
		    });



			/**
			 * 
			 *
			 *  Resume play from cookie
			 *
			 * 
			 */
			
			console.log("Status of the player cookie: "+ $.cookie('qtPlayerStatus'));
		    if($.cookie('qtPlayerStatus') === 'play'){		   

		    	console.log("Resuming play status");

		    	playerIcon.addClass("mdi-av-pause").removeClass("mdi-av-play-arrow");
	            mainPlayerButton.attr("data-state", "play");
	            $.mySound.play();  
			    if(jQuery.cookie("qt_volume") !== null && typeof($.mySound) !== undefined){


			    	
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

		            $("body").on("release",'#theVolCursor',function(e){
		            	e.preventDefault();
		            });
				}
		    }


		     /*
		    *
		    *					SE HO AUTOPLAY: AGGIUNGI CONTROLLO
		    *
		    *
		    */
		    if(QT_player_autoplay === "yes" && $.cookie('qtPlayerStatus') !== 'pause' && $.cookie('qtPlayerStatus') !== 'play'){
		    	console.log("Doing autoplay");
		    	playerIcon.addClass("mdi-av-pause").removeClass("mdi-av-play-arrow");
		    	mainPlayerButton.attr("data-state", "play");
		    	$.cookie('qtPlayerStatus', 'play');
			    $.mySound.play();   
			}

		    $("body").on("click",'#theVolCursor',function(e){
            	e.preventDefault();
            });

		    /**
		     *
		     *	Playlist controls
		     *
		     * 
		     */

		    $("body").on("click",".qwPlayerPlayList", function(e){
		    	e.preventDefault();
		    	var that = $(this),
		    		newMp3Url = that.attr("data-mp3"),
		    		currentMp3Url = mainPlayerButton.attr("data-mp3"),
		    		currentStatus = mainPlayerButton.attr("data-state"),
		    		mainIcon = mainPlayerButton.find("i");

		    	$("#radioname").html(that.find("span").html());

	    		mainIcon.addClass("mdi-av-play-arrow").removeClass("mdi-av-pause");
	    		var sound = soundManager.getSoundById('chinaCymbal');
	    		soundManager.destroySound('currentSound');
	    		$.mySound = soundManager.createSound({
	                id: 'currentSound',
	                url: newMp3Url
	            });
	            mainIcon.addClass("mdi-av-pause").removeClass("mdi-av-play-arrow");
		    	mainPlayerButton.attr("data-state", "play");
			    $.mySound.play();
			    $.cookie('playerMp3', newMp3Url, { expires: 7, path: '/' });
			    $.cookie('qtPlayerStatus','play');




			     /*
				*
				*
				*	Marquee
				*	http://aamirafridi.com/jquery/jquery-marquee-plugin
				*/
				 $('.radiomarquee').marquee({
				    duration: 6000,
				    gap: 200,
				    delayBeforeStart: 0,
				    direction: 'left',
				    duplicated: true
				 }); 

		    });

			
		    



		};

				

		/* Initialize Soundmanager
		=================================================================*/

		$.fn.initializeSoundmanager = function(){
		    //var flashPath = $(".qwPlayerPlay").attr("data-soundmanagerswf");
		    soundManager.setup({
		      url: $(".qwPlayerPlay").attr("data-soundmanagerswf"),
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
	
		

		var isOS = /iPad|iPhone|iPod/.test(navigator.platform);
		if (false === iOS() || false === $("body").hasClass("is_safari")){
		 $('.tooltipped').tooltip({delay: 10});
		}
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
				
				$.fn.NewYoutubeResize();
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

	    if(t.attr("data-triggerresize") === "1"){
	    	$.fn.NewYoutubeResize();
	    }

	    


	    return false;
	};
	$.fn.qwDataToggle = function(){
	    $("body").off("click", "[data-toggleclass]", qwDataToggleClass );
	    $("body").on("click","[data-toggleclass]",qwDataToggleClass);
	};

	$.fn.NewYoutubeResize();





		
	/* = media links transformation
	=================================================================================================*/

	$.fn.transformlinks = function (targetContainer) {
	    jQuery(targetContainer).find("a[href*='youtube.com'],a[href*='youtu.be'],a[href*='mixcloud.com'],a[href*='soundcloud.com']").not('.qw-disableembedding').each(function() {

	        var that = jQuery(this);
	        var mystring = that.attr('href');

	        var width = that.parent().width();
	        
	        if(width === 0){
	            width = that.parent().parent().parent().width();
	        }
	        if(width === 0){
	            width = that.parent().parent().parent().width();
	        }
	        if(width === 0){
	           
	            width = that.parent().parent().parent().parent().width();
	        }
	        var height = that.height();
	        var element = that;

	        //=== YOUTUBE https
	        var expression = /(http|https):\/\/(\w{0,3}\.)?youtube\.\w{2,3}\/watch\?v=[\w-]{11}/gi;
	        var videoUrl = mystring.match(expression);
	        if (videoUrl !== null) {
	            for (var count = 0; count < videoUrl.length; count++) {

	                mystring = mystring.replace(videoUrl[count], embedVideo(videoUrl[count], width, (width/16*9)));
	                replacethisHtml(mystring);
	                
	            }
	        }               
	        //=== SOUNDCLOUD
	        var expression = /(http|https)(\:\/\/soundcloud.com\/+([a-zA-Z0-9\/\-_]*))/g;
	        var videoUrl = mystring.match(expression);
	        if (videoUrl !== null) {
	            for (count = 0; count < videoUrl.length; count++) {
	                var finalurl = videoUrl[count].replace(':', '%3A');
	                finalurl = finalurl.replace("https","http");
	                jQuery.getJSON('http://soundcloud.com/oembed?maxheight=140&format=js&url=' + finalurl + '&iframe=true&callback=?', function(response) {
	                    replacethisHtml(response.html);
	                });
	            }
	        }
	        //=== MIXCLOUD
	        var expression = /http\:\/\/www\.mixcloud\.com\/[\w-]{0,150}\/[\w-]{0,150}\/[\w-]{0,1}/ig;
	        videoUrl = mystring.match(expression);
	        if (videoUrl !== null) {
	            for (count = 0; count < videoUrl.length; count++) {
	                mystring = mystring.replace(videoUrl[count], embedMixcloudPlayer(videoUrl[count]));
	                replacethisHtml(mystring);
	            }
	        }
	        //=== STRING REPLACE (FINAL FUNCTION)
	        function replacethisHtml(mystring) {
	            element.replaceWith(mystring);

	        }
	    });
	    $.fn.NewYoutubeResize();
	}


	$(".popupwindow").popupwindow();




})(jQuery); // end of jQuery name space




function embedMixcloudPlayer(content) {
    var finalurl = ((encodeURIComponent(content)));
    finalurl = finalurl.replace("https","http");
    var embedcode ='<iframe data-state="0" class="mixcloudplayer" width="100%" height="80" src="//www.mixcloud.com/widget/iframe/?feed='+finalurl+'&embed_uuid=addfd1ba-1531-4f6e-9977-6ca2bd308dcc&stylecolor=&embed_type=widget_standard" frameborder="0"></iframe><div class="canc"></div>';    
    return embedcode;
}

function embedVideo(content, width, height) {
    height = width / 16 * 9;
    var youtubeUrl = content;
    var youtubeId = youtubeUrl.match(/=[\w-]{11}/);
    var strId = youtubeId[0].replace(/=/, '');
    var result = '<iframe width="'+width+'" height="'+height+'" src="https://www.youtube.com/embed/' + strId + '?html5=1" frameborder="0" class="youtube-player" allowfullscreen></iframe>';
    return result;
}

function embedYahooVideo(content) {
    var yahooUrl = content;
    var id = yahooUrl.match(/\d{8}/);
    var vidId = yahooUrl.match(/\d{7}/);
    var result = '<div class="embedded_video">\n';
    result += '<object width="100%">\n';
    result += '<param name="movie" value="http://d.yimg.com/static.video.yahoo.com/yep/YV_YEP.swf?ver=2.2.46" />\n';
    result += '<param name="allowFullScreen" value="true" />\n';
    result += '<param name="AllowScriptAccess" VALUE="always" />\n';
    result += '<param name="bgcolor" value="#000000" />\n';
    result += '<param name="flashVars" value="id=' + id + '&vid=' + vidId + '&lang=en-us&intl=us&embed=1&ap=9460582" />\n';
    result += '<embed src="http://d.yimg.com/static.video.yahoo.com/yep/YV_YEP.swf?ver=2.2.46" type="application/x-shockwave-flash"  allowFullScreen="true" AllowScriptAccess="always" bgcolor="#000000" flashVars="id=' + id + '&vid=' + vidId + '&lang=en-us&intl=us&embed=1&ap=9460582" >\n';
    result += '</embed>\n';
    result += '</object>\n';
    result += '</div>\n';
    return result;
}

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


