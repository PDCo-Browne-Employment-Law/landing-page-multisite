<!DOCTYPE html>

<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo get_bloginfo( 'name' ); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
  </head>


  <body <?php body_class(); ?>>
    
    <nav>
      <div class="nav-inner container-max">
        <a class="logo-link" href="<?php echo site_url(); ?>">
          <div class="firm-logo">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path class="outer" d="M24.0151 43.2029C32.7941 43.2029 39.911 34.5991 39.911 23.9858C39.911 13.3726 32.7941 4.7688 24.0151 4.7688C15.236 4.7688 8.11914 13.3726 8.11914 23.9858C8.11914 34.5991 15.236 43.2029 24.0151 43.2029Z" fill="white"/>
            <path class="inner" d="M28.6971 31.9054H24.7799V25.916H26.852C29.3216 25.916 30.6841 24.4684 30.6841 22.7085C30.6841 21.1756 29.4067 20.2957 28.47 20.1254C29.3499 19.8983 30.315 19.0751 30.315 17.7694C30.315 15.6972 28.6119 14.7605 26.7952 14.7605H22.1116V14.9592L23.3038 15.8959V19.5293H17.3145V19.728L18.5066 20.6647V29.521L17.3145 30.4577V30.6564H23.3038V32.0473L22.1116 32.984V33.1827H30.0596V30.1739H29.8609L28.6971 31.9054ZM24.7799 16.0946H26.6817C28.1294 16.0946 28.7538 16.861 28.7538 17.8261C28.7538 18.7912 27.9874 19.5577 26.5114 19.5577H24.7515V16.0946H24.7799ZM26.5398 20.835C27.9874 20.835 29.1796 21.4311 29.1796 22.6517C29.1796 23.8155 28.1577 24.5819 26.9939 24.5819H24.8082V23.2194V23.191V20.835H26.5398ZM19.9827 20.8634H23.3038V24.6103H19.9827V20.8634ZM19.9827 29.3791V25.916H23.3322V29.3791H19.9827Z" fill="#28303B"/>
            </svg>
            <h2><?php bloginfo('name'); ?></h2>
          </div>
        </a>
      
        <?php $header_phone = get_field('toll_free_number', 'options'); ?>
        <?php $phone_stripped =  str_replace('-', '', $header_phone); ?>
        <a class="btn btn-white" href="tel:<?php echo $phone_stripped; ?>">Call <?php echo $header_phone; ?></a>
      </div>
    </nav>
      
    <?php if( have_rows('header_group') ): ?>
      <?php while ( have_rows('header_group') ) : the_row(); ?>
      <header>
        <div class="container-max">
          <div class="hero-content">
            <div class="container-lrg">
              <?php the_sub_field('hero_content') ?>
              <?php
                $button = get_sub_field('hero_link');
                if( $button ): 
                $button_url = $button['url'];
                $button_title = $button['title'];
                $button_target = $button['target'] ? $button['target'] : '_self';
              ?>
              <a class="btn btn-white smooth-scroll" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><?php echo esc_html( $button_title ); ?></a>
              <?php endif; ?>
            </div>
          </div>
        </div>
        
        <picture>
          <?php
            if (has_post_thumbnail()) {
              the_post_thumbnail();
            } else {
              $front_page_id = get_option('page_on_front');
              $front_page_thumbnail_id = get_post_thumbnail_id($front_page_id);
              if ($front_page_thumbnail_id) {
                echo wp_get_attachment_image($front_page_thumbnail_id, 'full');
              }
            }
          ?>
        </picture>
      </header>
      <?php endwhile; ?>
    <?php endif; ?>