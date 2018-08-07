 <div class="row">
        <div class="col-md-12">
          <div class="clearfix">
       
           <?php $mt_logo_text = ot_get_option( 'mt_logo_text');
		  
		  		if(!empty($mt_logo_text)):
		   ?>
          
            <div id="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html($mt_logo_text); ?></a></div>
            
            <?php else:
			
			 $mt_logo = ot_get_option( 'mt_logo'); ?>
          
            <div id="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="img-responsive" src="<?php echo esc_url($mt_logo); ?>" alt=""/></a></div>
            
            <?php endif; ?>

            
            <?php $mt_tright_contact_phone = ot_get_option( 'mt_tright_contact_phone');
			
				$mt_tright_contact_email = ot_get_option( 'mt_tright_contact_email');	
				 ?>
            
            <div class="header-contact">
              <div class="header-phone"><span class="fa-stack"> <i class="fa fa-circle fa-stack-2x"></i> <i class="fa fa-phone fa-stack-1x"></i></span> <?php echo esc_html($mt_tright_contact_phone); ?></div>
              <div class="header-email"><span class="fa-stack"> <i class="fa fa-circle fa-stack-2x"></i> <i class="fa fa-envelope fa-stack-1x"></i></span> <?php echo esc_html($mt_tright_contact_email); ?></div>
            </div>
            <!--.header-contact-->
          </div>
          <!--.clearfix-->
          <nav class="navbar navbar-custom" role="navigation">
           
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse-navigation"> <span class="sr-only"><?php _e('Toggle navigation', 'match'); ?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            
            <div class="collapse navbar-collapse" id="collapse-navigation">
             
			<?php wp_nav_menu(array('theme_location' => 'primary-menu', 'menu_class' => 'nav menu-nav', 'container' => 'false')); ?>
            
            </div><!-- /.navbar-collapse -->
          </nav>
          
        </div><!--.col-md-12-->
      </div><!--.row-->