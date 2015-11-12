<?php include('header.php'); ?>

<div id="content2" class="inner_container">
	<div id="main_content" class="left">		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        	<div id="subtitle"><strong>Pour toutes questions ou commentaires, <br />n’hésitez pas à nous contacter. </strong></div>
            
            <div class="page_title small_banner">&raquo;&nbsp;<?php the_title(); ?></div>
            
            <div class="left">
				<p>
                	<h4 class="no_margins">&raquo;Téléphone</h4>
                    <?php echo $lang['label3'] . ": " . phone3 . "<br />"; ?>
                    <?php echo $lang['label2'] . ": " . phone2 . "<br />"; ?>
                    <?php echo $lang['label1'] . ": " . phone1 . "<br />"; ?>
                </p>
                
                <p>
                	<h4 class="no_margins">&raquo;Fax</h4>
                    <?php echo fax; ?>
                </p>
                
                <p>
                	<h4 class="no_margins">&raquo;Courriel</h4>
                    <?php echo "<a id='email' href='mailto:" . email . "'>" . email . "</a>"; ?>
                </p>
                
                <p>
                	<h4 class="no_margins">&raquo;CPAM 1410</h4>
                    <?php echo address; ?>
                </p>
            </div>
            
            <div id="map" class="right">
            	<iframe width="400" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.ca/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=3390+blvd+Cr%C3%A9mazie+est+Montr%C3%A9al+(Qu%C3%A9bec&amp;aq=&amp;sll=49.891235,-97.15369&amp;sspn=27.99559,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=3390+Boulevard+Cr%C3%A9mazie+Est,+Montr%C3%A9al,+Communaut%C3%A9-Urbaine-de-Montr%C3%A9al,+Qu%C3%A9bec&amp;t=m&amp;ll=45.564364,-73.604622&amp;spn=0.015023,0.034332&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
            </div>
            
            <div class="clear"></div>
            <?php the_content(); ?>
        <?php endwhile; else: endif; ?>
	</div>
	
	<?php include('sidebar.php'); ?>
	
	<div class="clear"></div>
</div>

<?php include('footer.php'); ?>