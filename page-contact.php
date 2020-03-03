<?php get_header(); ?>
<figure class="pageBanner">
  <img class="pageBannerImg rowcol1" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
  <figcaption class="pageBannerCaption rowcol1">
    <h2><?php the_title();?></h2>
  </figcaption>
</figure>

<?php while(have_posts()){the_post();?>
  <div class="contactMenu">
    <?php wp_nav_menu( array( 'theme_location' => 'contactMenu', 'contactMenu' => 'new_menu_class' ) ); ?>
    <iframe class="contactMap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d47829.97335247507!2d2.053006775603039!3d41.474505263424575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a48e23c916f48d%3A0x7fe8e79c429372d0!2sCastellbisbal%2C+Barcelona!5e0!3m2!1ses!2ses!4v1539783607320&zoom=30000" width="1920" height="250" frameborder="0" style="border:0" allowfullscreen=""></iframe>
  </div>

  <main class="contact"><?php the_content();?></main>

<?php } ?>

<?php get_footer(); ?>
