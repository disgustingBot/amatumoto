<?php get_header(); ?>

<h1>archive.php</h1>


<?php

 if (is_shop())
 {
    echo "LOLOLOLOLOL";
 }
?>


<section class="cincoPost">
  <?php $i=0;
  while(have_posts()){the_post();
    if ($i>0 && $i%5==0) { ?>
      </section>
      <?php echo do_shortcode('[the_ad id="1132"]') ?>
      <!-- banner 1 -->
      <section class="cincoPost">
    <?php } ?>

    <figure class="standarCard">
      <a class="standarCardImg" href="<?php the_permalink(); ?>"><img class="standarCardImg lazy" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt=""></a>
      <figcaption class="standarCardCaption">
        <h4 class="standarCardTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <p class="standarCardTxt">
          <a href="<?php the_permalink(); ?>"><?php echo excerpt(80); ?></a>
        </p>
      </figcaption>
    </figure>

  <?php $i++; } wp_reset_query(); ?>
</section>

<div class="pagination">
  <?php echo paginate_links(); ?>
</div>





<?php get_footer(); ?>
