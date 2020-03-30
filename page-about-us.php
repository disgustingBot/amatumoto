<?php get_header(); ?>


<figure class="pageBanner">
  <img class="pageBannerImg rowcol1" src="<?php echo get_post_thumbnail_id()?>" alt="">
  <figcaption class="pageBannerCaption rowcol1">
    <h2><?php the_title();?></h2>
  </figcaption>
</figure>

<div class="contactMenu">
  <?php wp_nav_menu( array( 'theme_location' => 'contactMenu', 'contactMenu' => 'new_menu_class' ) ); ?>
</div>


<main class="theAboutUsSection">



  <?php while(have_posts()){the_post();the_content();} ?>


  </main>

<?php get_footer(); ?>
