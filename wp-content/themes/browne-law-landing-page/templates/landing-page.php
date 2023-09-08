<?php /* Template Name: Landing Page */ ?>

<?php get_header(); ?>

<main>
  <section id="proven-results">
    
    <?php if( have_rows('proven_results_group') ): ?>
      <?php while ( have_rows('proven_results_group') ) : the_row(); ?>
        
        <div class="container-max">
          
          <div class="column-left">
            <h3>Proven results</h3>
          </div>
          
          <div class="column-right offset-top-small">
            <?php the_sub_field('section_title'); ?>
            
            <?php if( have_rows('featured_results') ): ?>
              <div class="featured-results">
                <?php while ( have_rows('featured_results') ) : the_row(); ?>
                  
                  <?php $result = get_sub_field('result'); ?>
                  
                  <div class="result">
                    <div class="case-result-inner">
                      <h2 class="amount"><?php echo esc_html( $result->amount ); ?></h2>
                      <p class="case-excerpt"><?php echo esc_html( get_the_content(null, false, $result->ID) ); ?></p>
                    </div>
                  </div>
                  
                <?php endwhile; ?> 
              </div>
            <?php endif; ?>
          </div>
          
        </div>
        
      <?php endwhile; ?>
    <?php endif; ?>
    
  </section>
  <section id="cta">
    <?php if( have_rows('cta_group') ): ?>
      <?php while ( have_rows('cta_group') ) : the_row(); ?>
        <div class="container-max">
          <div class="cta-inner">
            <picture class="column">
              <img
              <?php $image = get_sub_field('image'); ?>
              src="<?php echo $image['url']; ?>" alt="<?php echo 	$image['alt']; ?>" title="<?php echo $image['title']; ?>"
              />
            </picture>
            <div class="content column">
              <div class="content-inner">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/logo-dark.svg"/>
                <div>
                  <?php the_sub_field('content'); ?>
                  <?php
                    $button = get_sub_field('cta_link');
                    if( $button ): 
                    $button_url = $button['url'];
                    $button_title = $button['title'];
                    $button_target = $button['target'] ? $button['target'] : '_self';
                  ?>
                  <a class="cta-button smooth-scroll" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>">
                    <?php echo esc_html( $button_title ); ?>
                  </a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </section>
  <section id="featured-practice-area">
    <div class="container-max">
      <?php if( have_rows('practice_area_group') ): ?>
        <?php while ( have_rows('practice_area_group') ) : the_row(); ?>
          
          <div class="column-left">
            <?php 
              $terms = get_terms(array(
                'taxonomy' => 'practice-area-type',
                'hide_empty' => true,
                'posts_per_page' => 1,
              ));
              if (!empty($terms) && !is_wp_error($terms)) {
                foreach ($terms as $term) {
                  echo '<h3>' . $term->name . '</h3>';
                }
              }
            ?>
          </div>
          <div class="column-right offset-top-small">
            
            <?php 
              $featured_practice_area = get_sub_field('practice_area'); 
              if( $featured_practice_area): ?>
                <h2><?php echo esc_html( $featured_practice_area->post_title ); ?></h2>
                
              <?php endif;
            ?>
            
            <?php $featured_practice_area = get_sub_field('practice_area'); ?>
            <?php if( $featured_practice_area ): ?>
              
              <?php 
                $post_content = get_post_field('post_content', $featured_practice_area->ID);
                echo apply_filters('the_content', $post_content); 
              ?>
              
            <?php endif; ?>
            
            
          </div>
          
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </section>
  <section id="single-testimonial">
    <div class="expanding-container"></div>
    <div class="testimonial-outer">
      <?php if( have_rows('single_testimonial_group') ): ?>
        <?php while ( have_rows('single_testimonial_group') ) : the_row(); ?>
          
          <div class="testimonial-inner">
            
            <div class="content">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/quote-icon.svg"/>
              <?php the_sub_field('testimonial'); ?>
              <div class="author">
                <?php if( get_sub_field('author_name') && get_sub_field('author_title') ): ?>
                  <p>
                    <?php the_sub_field('author_name'); ?>
                    <span></span>
                    <?php the_sub_field('author_title'); ?>
                  </p>
                <?php elseif( get_sub_field('author_name') ): ?> 
                  <p><?php the_sub_field('author_name'); ?></p>
                <?php endif; ?>
              </div>
            </div>
            
          </div>
          
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </section>
  <section id="faqs">
    <?php if( have_rows('faqs_group') ): ?>
      <?php while ( have_rows('faqs_group') ) : the_row(); ?>
        <div class="container-max">
          <div class="column-left">
            <h3>FAQs</h3>
          </div>
          
          <div class="column-right offset-top-small">
            
            <?php if( have_rows('faqs') ): ?>
              <?php while ( have_rows('faqs') ) : the_row(); ?>
                
                <div class="faq">
                  <div class="faq-question">
                    <h2><?php the_sub_field('faq_question'); ?></h2>
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                      <circle cx="16" cy="16" r="15" stroke="#29303B" stroke-width="2"/>
                      <line class="line-1" x1="16" y1="9" x2="16" y2="23" stroke="#29303B" stroke-width="2"/>
                      <line class="line-2" x1="9" y1="16" x2="23" y2="16" stroke="#29303B" stroke-width="2"/>
                    </svg>
                  </div>
                  <div class="faq-answer">
                    <?php the_sub_field('faq_answer'); ?>
                  </div>
                </div>
                
              <?php endwhile; ?>
            <?php endif; ?>
            
          </div>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </section>
  <section id="cta">
    <?php if( have_rows('cta_group_2') ): ?>
      <?php while ( have_rows('cta_group_2') ) : the_row(); ?>
        <div class="container-max">
          <div class="cta-inner">
            <picture class="column">
              <img
              <?php $image = get_sub_field('image'); ?>
              src="<?php echo $image['url']; ?>" alt="<?php echo 	$image['alt']; ?>" title="<?php echo $image['title']; ?>"
              />
            </picture>
            <div class="content column">
              <div class="content-inner">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/logo-dark.svg"/>
                <div>
                  <?php the_sub_field('content'); ?>
                  <?php
                    $button = get_sub_field('cta_link');
                    if( $button ): 
                    $button_url = $button['url'];
                    $button_title = $button['title'];
                    $button_target = $button['target'] ? $button['target'] : '_self';
                  ?>
                  <a class="cta-button smooth-scroll" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>">
                    <?php echo esc_html( $button_title ); ?>
                  </a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </section>
  <section id="contact-form">
    <?php if( have_rows('contact_form_group') ): ?>
      <?php while ( have_rows('contact_form_group') ) : the_row(); ?>
        
        <div class="container-max">
          
          <div class="column-left">
            <h3>Contact</h3>
          </div>
          
          <div class="column-right offset-top-small">
            
            <?php $gravity_form_id = get_sub_field('gravity_form'); ?>
            <h2><?php the_sub_field('form_title'); ?></h2>
            <div class="call-email">
              
              <?php 
                $contact_form_phone = get_field('toll_free_number', 'options');
                $contact_form_phone_stripped =  str_replace('-', '', $contact_form_phone); 
                $contact_form_email = get_field('primary_email_address', 'options');
              ?>
              
              <a href="tel:<?php echo $contact_form_phone_stripped ?>">Call: <?php echo $contact_form_phone ?></a>
              <span></span>
              <a href="mailto:<?php echo $contact_form_email ?>">Email: <?php echo $contact_form_email ?></a>
            </div>
            <div class="contact-form-wrapper">
              <?php gravity_form( $gravity_form_id, false, false, false, '', true ); ?>
            </div>
            
          </div>
          
        </div>
        
      <?php endwhile; ?>
    <?php endif; ?>
  </section>
</main>

<?php get_footer(); ?>