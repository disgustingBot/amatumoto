<?php get_header(); ?>
<?php while(have_posts()){the_post(); ?>
  <?php global $product; ?>

  <article class="single">

    <div class="singleSide">
      <div class="newArrival">NEW ARRIVAL</div>
      <h4 class="singleSideAnoMarca"></h4>
      <h2 class="singleSideTitle"><?php the_title(); ?></h2>
      <p class="singleSidePrice"><?php echo $product->get_price_html(); ?></p>
      <p class="singleSideStock">Stock # <?php echo $product->id; ?><br>
        <span class="singleSideCond">Used Condition</span>
      </p>
      <!-- <p class="singleSideCond">Used Condition</p> -->
      <p class="singleSideData">4,417 mile Corvette Z06/Z07 LT4 Supercharged 6.2L V8 7-speed 2LZ</p>
      <video src="" class="singleSideVideo"></video>
      <div class="singleSideSocialCont"> social media 1</div>
      <button class="singleSideContact">REQUEST MORE INFO</button>
      <button class="singleSideContact">MAKE OFFER</button>
      <button class="singleSideContact">TRADE</button>
      <button class="singleSideContact">FINANCE</button>
      <p class="singleSideStock2">STOCK #</p>
      <p class="singleSideStockNumber"><?php echo $product_id; ?></p>
      <div class="singleSideFicha"></div>
      <div class="singleSideEmptySquare"></div>
    </div>

    <div class="singleMain">
      <div class="gallery">
        <img class="galleryMain" id="galleryMain" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
        <div class="galleryStock">
          <!-- <p>aca van mas imagenes <br> TODO: hacer esta galeriappp</p> -->
          <img class="galleryMain" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
          <?php $attachment_ids = $product->get_gallery_attachment_ids();
          foreach( $attachment_ids as $attachment_id ) { ?>
            <img class="galleryImgs" src="<?php echo $image_link = wp_get_attachment_url( $attachment_id ); ?>" alt="">
          <?php } ?>
        </div>
        <p>TODO: hacer que cuando click en galeria, vaya a imagen grande</p>
      </div>
      <div class="features">TODO: hacer esta seccion de features</div>
      <div class="content"><?php echo $product->description; ?></div>
    </div>

  </article>



<!-- <h1>single.php</h1> -->





<?php } wp_reset_query(); ?>
<?php get_footer(); ?>
