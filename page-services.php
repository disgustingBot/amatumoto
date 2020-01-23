<?php get_header(); ?>


<div class="servSectionBanner">
  <p class="servSectionPreTitle">Our</p><br>
  <h1 class="servSectionTitle"><?php the_title(); ?></h1>
  <img class="lazy serviceTitleImg" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" src="" alt="">
</div>

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
          <h3 class="serviceCardTitle"><?php the_title(); ?></h3>
          <p class="serviceCardSubtitle"><?php the_excerpt(); ?></p>
          <hr class="serviceCardDivisor">
          <a href="" class="serviceCardContact">Contact</a>
          <button class="serviceCardButton">Expand</button>
          <div class="serviceCardContent"><?php the_content(); ?></div>
        </figcaption>
      </figure>
    <?php } ?>










</main>






<?php get_footer(); ?>
