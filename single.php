<?php get_header(); ?>
<?php while(have_posts()){the_post(); ?>
  <?php global $product; ?>

  <article class="singlePage">

    <div class="singleSide">
      <?php

      $newness_days = 1;
      $created = strtotime( $product->get_date_created() );
      if ( ( time() - ( 60 * 60 * 24 * $newness_days ) ) < $created ) { ?>
        <span class="newArrival"><i>New arrival</i></span>
      <?php } ?>
      <!-- <div class="newArrival">NEW ARRIVAL</div> -->
      <h4 class="singleSideAnoMarca"></h4>
      <h2 class="singleSideTitle"><?php the_title(); ?></h2>
      <p class="singleSidePrice"><?php echo $product->get_price_html(); ?></p>
      <p class="singleSideStock">Stock # <?php echo $product->id; ?><br>
        <span class="singleSideCond">Used Condition</span>
      </p>
      <!-- <p class="singleSideCond">Used Condition</p> -->
      <p class="singleSideData">4,417 mile Corvette Z06/Z07 LT4 Supercharged 6.2L V8 7-speed 2LZ</p>
      <!-- <video src="" class="singleSideVideo"></video> -->
      <!-- TODO: aca va un video, pero puse una imagen como placeholder -->
      <img style="width:100%;" class="singleSideVideo" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
      <div class="singleSideSocialCont"> social media 1</div>
      <button class="singleSideContact">REQUEST MORE INFO</button>
      <button class="singleSideContact">MAKE OFFER</button>
      <button class="singleSideContact">TRADE</button>
      <button class="singleSideContact">FINANCE</button>
      <p class="singleSideStock2">STOCK # <?php echo $product->id; ?></p>
      <p class="singleSideStockNumber"><?php echo $product_id; ?></p>
      <div class="singleSideFicha"></div>
      <div class="singleSideEmptySquare"></div>
    </div>

    <div class="singleMain">
      <div class="gallery">
        <img class="galleryMain" id="galleryMain" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
        <div class="galleryStock" id="galleryStock">
          <img class="galleryImgs" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="" onclick="gallerySingle('<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>')">
          <?php $attachment_ids = $product->get_gallery_attachment_ids();
          foreach( $attachment_ids as $attachment_id ) { ?>
            <img class="galleryImgs" src="<?php echo $image_link = wp_get_attachment_url( $attachment_id ); ?>" alt="" onclick="gallerySingle('<?php echo $image_link = wp_get_attachment_url( $attachment_id ); ?>')">
          <?php } ?>
          <div class="galleryFade"></div>
        </div>
        <button class="galleryMore" onclick="altClassFromSelector('alt', '#galleryStock')">More photos</button>
      </div>
      <div class="features">TODO: hacer esta seccion de features</div>
      <div class="content"><?php echo $product->description; ?></div>
    </div>

  </article>



  <!-- <form action="" class="singleContact" id="singleContact">
    <div class="singleContactMessage"></div>
    <input type="text" class="singleContactInput">
    <input type="text" class="singleContactInput">
    <textarea name="name" rows="8" cols="80"></textarea>
    <button class="singleContactButton">Send</button>
  </form> -->


<!-- <h1>single.php</h1> -->





<?php } wp_reset_query(); ?>
<?php get_footer(); ?>
