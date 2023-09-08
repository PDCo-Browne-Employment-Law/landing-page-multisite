<?php get_header(); ?>

<main>
  <section id="default-page">
    <div class="container-max">
      <div class="column-left">
        
        <h3><?php the_title(); ?></h3>
        
      </div>
      <div class="column-right offset-top-small">
        
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>		
          
          <?php the_content();?>
          
        <?php endwhile; else : ?>
          <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
        
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
