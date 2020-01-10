<?php get_header(); ?>
<?php while(have_posts()){the_post(); ?>




  <h1 class="singleTitle"><?php the_title(); ?></h1>

  <figure class="singleATF grid">
    <img class="singleATFImg rowcol1 lazy" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
    <figcaption class="imgAuthor rowcol1">
      <p>
        <span><em><?php the_author(); ?></em></span>
        <span>&nbsp/&nbsp</span>
        <span><?php echo excerpt(60); ?></span>
      </p>
    </figcaption>
  </figure>


<!-- <h1>single.php</h1> -->





<?php } wp_reset_query(); ?>
<?php get_footer(); ?>
