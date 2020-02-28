<?php get_header(); ?>

<?php while(have_posts()){the_post();?>


  <main class="auctionsInformationPage"><?php the_content();?></main>

<?php } ?>

<?php get_footer(); ?>
