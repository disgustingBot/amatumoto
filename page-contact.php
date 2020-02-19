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
    <iframe class="contactMap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d95652.41680368959!2d1.8935342063268201!3d41.479607268578874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a48e23c916f48d%3A0x7fe8e79c429372d0!2sMunicipality%20of%20Castellbisbal%2C%20Barcelona!5e0!3m2!1sen!2ses!4v1579828250015!5m2!1sen!2ses" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
  </div>

  <main class="contact"><?php the_content();?></main>

<?php } ?>

<?php get_footer(); ?>
