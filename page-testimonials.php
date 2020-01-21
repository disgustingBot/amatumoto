<?php get_header(); ?>



<main class="">

  <?php
  $args = array(
    'post_type'=>'testimonials',
  );
  $testimonials=new WP_Query($args);
  while($testimonials->have_posts()){$testimonials->the_post();?>
    <quote class="testimonial testimonialCarusel">
      <h4 class="testimonialAuthor"><?php the_title(); ?></h4>
      <p class="testimonialQuote"><?php the_content(); ?></p>
    </quote>
  <?php } ?>

  <button class="" onclick="plusTesti(-1)">&#10094;</button>
  <button class="" onclick="plusTesti(+1)">&#10095;</button>


</main>






<?php get_footer(); ?>
