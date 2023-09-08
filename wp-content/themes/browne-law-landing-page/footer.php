  <footer class="footer">
  
    <div class="container-max">
      <div class="column-left">
        <picture>
          <img 
            src="<?php echo get_template_directory_uri(); ?>/assets/svg/logo-light.svg" 
            alt="Browne Employment Law" 
            title="Browne Employment Law" 
          />
        </picture>
        <div class="sm-wrapper">
          <?php  
            $instagram = get_field('instagram', 'options');
            $linkedin = get_field('linkedin', 'options');
            $yelp = get_field('yelp', 'options');
            $facebook = get_field('facebook', 'options');
          ?>
          <?php if( $instagram ): ?>
            <a href="<?php echo $instagram ?>" target="_blank">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/sm-instagram.svg"/>
            </a>
          <?php endif; ?>
          <?php if( $linkedin ): ?>
            <a href="<?php echo $linkedin ?>" target="_blank">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/sm-linkedin.svg"/>
            </a>
          <?php endif; ?>
          <?php if( $yelp ): ?>
            <a href="<?php echo $yelp ?>" target="_blank">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/sm-yelp.svg"/>
            </a>
          <?php endif; ?>
          <?php if( $facebook ): ?>
            <a href="<?php echo $facebook ?>" target="_blank">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/sm-facebook.svg"/>
            </a>
          <?php endif; ?>
        </div>
      </div>
      <div class="column-right">
        <div class="office-locations">
          <?php if( have_rows('locations', 'options') ): ?>
            <?php while ( have_rows('locations', 'options') ) : the_row(); ?>
              
              <?php $location_phone = get_sub_field('phone_number', 'options'); ?>
              <?php $location_phone_stripped =  str_replace('-', '', $location_phone); ?>
              <div class="location">
                <h3 class="city"><?php the_sub_field('city'); ?></h3>
                <?php if( get_sub_field('google_maps_url') ): ?>
                  <a href="<?php the_sub_field('google_maps_url'); ?>" target="_blank">
                    <p class="address"><?php the_sub_field('address'); ?></p>
                  </a>
                <?php else: ?> 
                  <p class="address"><?php the_sub_field('address'); ?></p> 
                <?php endif; ?>
                <p class="phone">
                  <a href="tel:<?php echo $location_phone_stripped ?>">Call or text: <?php echo $location_phone ?></a>
                </p>
                <p class="email">
                  <a href="mailto:<?php the_sub_field('email_address'); ?>"><?php the_sub_field('email_address'); ?></a>
                </p>
              </div>
              
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
        <div class="legal">
          <p>
            © <?php echo date('Y'); ?> Coyle Browne Law, PLC. All Rights Reserved. 
            <?php wp_nav_menu( array( 'menu'=> 'Footer Menu', 'link_before' => '<span>','link_after'=>'</span>' ) );?>
          </p>
        </div>
      </div>
    </div>
  
  </footer>
  
  <?php wp_footer(); ?>
  </body>
</html>