<div style="border: thin solid red;" id="sidebar" class="right">
	<?php 
		if( is_page(2) ){
	?>
        <div class="uppercase widget live_streaming">
            <h4 class="heading">
            	<!--
            	<a onclick="javascript: window.open('/ecoutez-en-direct/', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550');" href="#"><?php echo $lang['live streaming']; ?></a>
            	-->
            	<a href="<?php echo get_page_link(6550); ?>"><?php echo $lang['watch live']; ?></a>
			</h4>
            
            <!--
            <p class="no_margins">
                <strong>gadé</strong><br />
                <span>céline rétory ft.<br />daan junior</span>
            </p>
            -->
        </div>
        <div class="uppercase widget live_streaming">
            <h4 class="heading">
            	<!--
            	<a onclick="javascript: window.open('/ecoutez-en-direct/', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550');" href="#"><?php echo $lang['live streaming']; ?></a>
            	-->
            	<a onclick="javascript: window.open('/ecoutez-en-direct/', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550');" href="#"><?php echo $lang['live streaming']; ?></a>
			</h4>
            
            <!--
            <p class="no_margins">
                <strong>gadé</strong><br />
                <span>céline rétory ft.<br />daan junior</span>
            </p>
            -->
        </div>
        <div class="uppercase widget live_streaming">
            <h4 class="heading">
            	<!--
            	<a onclick="javascript: window.open('/ecoutez-en-direct/', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550');" href="#"><?php echo $lang['live streaming']; ?></a>
            	-->
            	<a target="_blank" href="http://cdn.livestream.com/embed/sonomusique?layout=4&amp;height=340&amp;width=560&amp;autoplay=false"><?php echo $lang[ 'cpamtv' ]; ?></a>
			</h4>
            
            <!--
            <p class="no_margins">
                <strong>gadé</strong><br />
                <span>céline rétory ft.<br />daan junior</span>
            </p>
            -->
        </div>
    <?php 
		}
        
        if ($images = aldenta_get_images()) {
            if( count( $images ) > 1){
                $keys = array_keys( $images );
				echo "<div class='widget_divider'></div>";
                echo "<div class='widget'>";
                echo "<h4 class='carousel heading uppercase center_text'>photos reliées à l'article</h4>";
                echo "<img id='large_image' src='".wp_get_attachment_url($images[ $keys[0] ]->ID)."' /><br />";
                
                echo "<ul id='mycarousel' class='jcarousel-skin-tango'>";
            
                foreach ($images as $image) {
                    echo "<li><img class='thumb' src='".wp_get_attachment_url($image->ID)."' onMouseOver='change_larger_image(this);' /></li>"; // attachment url
                }
            
                echo "</ul>";
                echo "</div>";
            }
        }  
    ?>
    <?php 
    	if( is_page(2) || is_page(12) || is_page(217) ){
	?>
	<div class="widget top_des_tops">
		<h4>le top des tops</h4>
		<ul class='wdpv_popular_posts'>
			<li><a href="http://www.cpam1410.com/2012/11/gade-celine-retory-feat-daan-junior/">Rété soudé<br /><span>Serge Cabréra</span></a></li>
			<li><a href="http://www.cpam1410.com/2012/11/qui-sest-permis-sweet-way/">Mwen prêt<br /><span>Daan Junior</span></a></li>
			<li><a href="http://www.cpam1410.com/2012/11/mon-coeur-te-dit-oui-jocelyn-jdx-deloumeaux/">Priyorité<br /><span>Klass</span></a></li>
			<li><a href="http://www.cpam1410.com/2012/11/ti-kow-bon-black-parents/">Pou ki sa<br /><span>Disip feat.Richard Cavé</span></a></li>
			<li><a href="http://www.cpam1410.com/2012/11/copacabana-jean-marie-ragald/">Déterminé<br /><span>Watchout</span></a></li>
			<li><a href="http://www.cpam1410.com/2012/11/charmant-njie/">Dance in the dark<br /><span>Zenglen</span></a></li>
			<li><a href="http://www.cpam1410.com/2012/11/pa-fe-sa-zenglen/">My life<br /><span>James Ti-Lunet Momplésir</span></a></li>
			<li><a href="http://www.cpam1410.com/2012/11/im-in-love-with-you-jbeatz-feat-coulgi/">Lova Girl<br /><span>Medhy Custos</span></a></li>
			<li><a href="http://www.cpam1410.com/2012/11/cest-un-secret-patrick-andrey-feat-melissa/">Nou rivé<br /><span>Unik</span></a></li>
			<li><a href="http://www.cpam1410.com/2012/11/sans-parler-warren/">Milka<br /><span>Tu étais</span></a></li>
		</ul>
	</div>	
	
	<div class="widget">
		<a class="audio_now" target="_blank" href="http://icon.audionow.com/?e295baba-7d7d-11e3-85f8-000000000062&landing">
		  <img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/banner.png" alt="AudioNow" />
		</a>
	</div>
	
	<div class="widget communiquez_avec_nous">
		<h4 class="long">Communiquez avec nous</h4>
		
		<label for="form_name">Nom et prénom</label><br />
		<input name="form_name" id="form_name" type="text" >
		
		<br /><br />
		
		<label for="form_subject">Suject</label><br />
		<select id="form_subject" name="form_subject">
			<option value="rien">choisissez une émission</option>
			<option value="général">général</option>
			<?php
				for( $i = 1; $i <= 31; $i++ ){
			?>
					<option value="<?php echo $lang['show' . $i ]; ?>"><?php echo $lang['show' . $i ]; ?></option>		
			<?php
				}
			?>
		</select>
		
		<br /><br />
		
		<label for="form_email">Courriel</label><br />
		<input name="form_email" id="form_email" type="text" >
		
		<br /><br />
		
		<label for="form_msg">Message</label><br />
		<textarea name="form_msg" id="form_msg"></textarea>
		
		<br /><br />
		
		<input id="submit" class="js-send_mail" name="submit" type="submit" value="Envoyer">
		
		<div class="success">
			merci
		</div>
	</div>
	
	<?php 
    		dynamic_sidebar(); 
		}		
    ?>
</div>