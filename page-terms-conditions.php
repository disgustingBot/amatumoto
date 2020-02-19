<?php get_header(); ?>

<main class="termsAndConditions">



  <?php while(have_posts()){the_post();the_content();} ?>


  </main>


<?php get_footer(); ?>
