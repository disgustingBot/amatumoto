<?php get_header(); ?>


<figure class="inventory">
  <img class="inventoryImg rowcol1" src="<?php echo get_template_directory_uri(); ?>/img/inventoryBanner.jpg" alt="">
  <figcaption class="inventoryCaption rowcol1">
    <p>Our</p>
    <h2><?php the_title(); ?></h2>
  </figcaption>
</figure>

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
          <a href="" class="serviceCardCtA">Contact</a>
          <button class="serviceCardCtA serviceCardCtAExpand">Expand</button>
          <div class="serviceCardContent"><?php the_content(); ?></div>
        </figcaption>
      </figure>
    <?php } ?>










</main>






<?php get_footer(); ?>
