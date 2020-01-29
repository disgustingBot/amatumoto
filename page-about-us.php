<?php get_header(); ?>


<figure class="inventory">
  <img class="inventoryImg rowcol1" src="<?php echo get_template_directory_uri(); ?>/img/inventoryBanner.jpg" alt="">
  <figcaption class="inventoryCaption rowcol1">
    <h2><?php the_title(); ?></h2>
  </figcaption>
</figure>



<main class="theAboutUsSection">



  <?php while(have_posts()){the_post();the_content();} ?>


  </main>

<?php get_footer(); ?>
