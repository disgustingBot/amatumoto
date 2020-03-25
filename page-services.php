<?php get_header(); ?>

<figure class="pageBanner">
  <img class="pageBannerImg rowcol1" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
  <figcaption class="pageBannerCaption rowcol1">
    <p>Our</p>
    <h2><?php the_title();?></h2>
  </figcaption>
</figure>




<div class="servSection">
  <div class="servColumn">

  <?php
    $args = array(
      'post_type'=>'service',
    );
    $services=new WP_Query($args); $i=0;
    while($services->have_posts()){$services->the_post(); $product_id = get_the_ID(); ?>
      <?php if($i>=$services->post_count/2){$i=0; ?>
        </div>
        <div class="servColumn">
      <?php } ?>
      <figure class="serviceCard" id="serviceCard<?php echo $product_id; ?>">
        <img class="serviceCardImg lazy" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" src="" alt="">
        <figcaption class="serviceCardCaption">
          <h3 class="serviceCardTitle"><?php the_title(); ?></h3>
          <p class="serviceCardSubtitle"><?php echo excerpt(90); ?></p>
          <hr class="serviceCardDivisor">
          <div class="serviceCardContent"><?php the_content(); ?></div>
          <div class="serviceCardButtons">
            <!-- <a href="<?php echo site_url('contact');  ?>" class="serviceCardCtA">Contact</a> -->
            <a class="serviceCardCtA" onclick="altClassFromSelector('alt','#serviceCard<?php echo $product_id; ?>')">Expand</a>

            <?php // $downloadPdf = get_post_meta( $product->id, 'downloadPdf' )[0]; ?>
            <?php $downloadPdf = get_post_custom($product->id)['downloadPdf'][0]; ?>

            <?php // var_dump($downloadPdf); ?>
            <?php if($downloadPdf){ ?>
              <a class="serviceCardCtA" href="<?php echo $downloadPdf; ?>" download>Download</a>
            <?php } ?>
            <!-- <svg class="serviceCardExpandArrow" onclick="altClassFromSelector('alt','#serviceCard<?php echo $product_id; ?>')" viewBox="0 0 62 38" xmlns="http://www.w3.org/2000/svg">
            <path fill="currentColor" d="M27.9897 36.5597C29.5833 38.381 32.4167 38.381 34.0103 36.5596L60.1952 6.63401C62.4583 4.04768 60.6216 -2.98023e-07 57.1849 -2.98023e-07H4.81507C1.37844 -2.98023e-07 -0.458274 4.04769 1.80477 6.63402L27.9897 36.5597Z" fill="black"/>
          </svg> -->
          </div>
        </figcaption>
      </figure>
    <?php $i++;} ?>









  </div>
</div>






<?php get_footer(); ?>
