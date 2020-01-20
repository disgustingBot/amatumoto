<?php get_header(); ?>



<main class="servSection">

  <?php



    $args = array(
      'post_type'=>'service',
    );
    $services=new WP_Query($args);
    while($services->have_posts()){$services->the_post();$product_id = get_the_ID(); ?>
      <figure class="serviceCard">
        <img class="serviceCardImg lazy" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" src="" alt="">
        <figcaption class="serviceCardCaption">
          <h4 class="serviceCardTitle"><?php the_title(); ?></h4>
          <button class="serviceCardButton">Learn More</button>
          <a href="" class="serviceCardContact">Contact</a>
          <p class="serviceCardContent"><?php the_content(); ?></p>
        </figcaption>
      </figure>
    <?php } ?>
  ?>










</main>






<?php get_footer(); ?>
