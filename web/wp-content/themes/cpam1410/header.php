<?php include('config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo site_name; ?></title>
        
        <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('stylesheet_directory'); ?>/Styles/tags.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('stylesheet_directory'); ?>/Styles/classes.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('stylesheet_directory'); ?>/style.css" />
        
        <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('stylesheet_directory'); ?>/Styles/nivo-slider.css" />
        
        <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Mrs+Saint+Delafield' >
        <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:400,800' >
        
        <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('stylesheet_directory'); ?>/Styles/jcarousel_style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('stylesheet_directory'); ?>/Styles/skin.css" />

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo bloginfo('stylesheet_directory'); ?>/scripts/jquery.nivo.slider.pack.js" type="text/javascript"></script>
        
		<script src="<?php echo bloginfo('stylesheet_directory'); ?>/scripts/jquery.jcarousel.min.js" type="text/javascript"></script>
        
        <script src="<?php echo bloginfo('stylesheet_directory'); ?>/scripts/javascript.js" type="text/javascript"></script>
        <script src="<?php echo bloginfo('stylesheet_directory'); ?>/scripts/effects.js" type="text/javascript"></script>
        
        <?php wp_head(); ?>
        
        <?php if( is_page(10) ){ ?>
        	<style>
				<?php if( isset($_REQUEST['schedule']) && $_REQUEST['schedule'] == 1 ){ ?>
				#one {
					display: block;	
				}
				
				#two, #three, #four {
					display: none;	
				}
				<?php } elseif( isset($_REQUEST['schedule']) && $_REQUEST['schedule'] == 2 ){ ?>
				#two {
					display: block;	
				}
				
				#one, #three, #four {
					display: none;	
				}
				<?php } elseif( isset($_REQUEST['schedule']) && $_REQUEST['schedule'] == 3 ){ ?>
				#three {
					display: block;	
				}
				
				#two, #one, #four {
					display: none;	
				}
				<?php } elseif( isset($_REQUEST['schedule']) && $_REQUEST['schedule'] == 4 ){ ?>
				#four {
					display: block;	
				}
				
				#two, #three, #one {
					display: none;	
				}
				<?php } ?>
			</style>
        <?php } ?>
        
        <script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-36669046-1']);
		  _gaq.push(['_setDomainName', 'cpam1410.com']);
		  _gaq.push(['_setAllowLinker', true]);
		  _gaq.push(['_trackPageview']);
		
		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		
		</script>
    </head>
    
    <body class="testing2">
    	<?php if ( $lang[ 'disclaimer' ] ) { ?>
    	<div class="disclaimer outer_container">
    		<div class="inner_container">
    			<?php echo $lang[ 'disclaimer' ]; ?>
    		</div>
    	</div>
    	<?php } ?>
    	<div class="outer_container blue_bg">
        	<div class="inner_container">
            	<a id="logo" class="left" href="<?php echo get_page_link(2); ?>"><span class="hide"><?php echo site_name; ?></span></a>
                
                <div id="navigation">
                	<?php include('navigation.php'); ?>
                </div>
            </div>
        </div>
        
        <div id="header" class="outer_container">
        	<div class="inner_container">
        		<h1 id="tagline" class="delafield no_padding"><?php echo $lang['tagline']; ?></h1>
            </div>
        </div>