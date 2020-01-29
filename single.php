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
      <iframe class="singleSideVideo" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
      <!-- <img style="width:100%;" class="singleSideVideo" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt=""> -->
      <div class="singleSideSocialCont"> social media 1</div>
      <button class="singleSideContact" onclick="altClassFromSelector('alt','#singleContact')">REQUEST MORE INFO</button>
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



  <div class="singleFormContainer">
    <form action="index.php" class="singleContact SingleContactMoreInfo" id="singleRequestInfo">
      <label  class="formLabel">CONTACT DETAILS</label>
      <input type="text" placeholder="First Name"  class="formInput100 formInput">
      <input type="text" placeholder="Last Name"  class="formInput100 formInput">
      <input type="email" placeholder="Email" class="formInput100 formInput">
      <input type="number" placeholder="Number" class="formInput100 formInput">
      <input type="text" placeholder="Country"  class="formInput100 formInput">
      <select name="bestTime" value="time-preference" id="bestTimeToCall" class="formInput100 formInput">
        <option value="any_time" class="form">Any Time</option>
        <option value="from-9-to-13">9:00 a.m. - 1:00 p.m.</option>
        <option value="from-13-to-17">1:00 p.m. - 5:00 p.m.</option>
        <option value="from-17-to-20">5:00 p.m. - 8:00 p.m.</option></select>
      </select>
      <label  class="formLabel ">TRADE VEHICLE</label>
      <div class="tradeOrNot">
        <label for="yes" class="formRadioFor">yes</label>
        <input type="radio" name="trade" id="yes" value="yes">
        <label for="no" class="formRadioFor">no</label>
        <input type="radio" name="trade" id="no" value="no">
      </div>
      <label  class="formLabel">COMMENT</label>
      <textarea value="comments" placeholder="comments..." name="name"></textarea>
      <button class="singleContactButton contactButton" type="submit">Send</button>
    </form>
  </div>

  <form action="index.php" class="" id="">
    <input type="text" class="">
    <input type="" class="">
    <input type="" class="">
    <input type="" class="">
    <textarea name="name"></textarea>
    <button class="singleContactButton" type="submit">Send</button>
  </form>

  <form action="index.php" class="" id="">
    <input type="text" class="">
    <input type="" class="">
    <input type="" class="">
    <input type="" class="">
    <textarea name="name"></textarea>
    <button class="singleContactButton" type="submit">Send</button>
  </form>

  <form action="index.php" class="" id="">
    <input type="text" class="">
    <input type="" class="">
    <input type="" class="">
    <input type="" class="">
    <textarea name="name"></textarea>
    <button class="singleContactButton" type="submit">Send</button>
  </form>


<!-- <h1>single.php</h1> -->





<?php } wp_reset_query(); ?>
<?php get_footer(); ?>
