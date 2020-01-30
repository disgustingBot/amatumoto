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
      <div class="newArrival">NEW ARRIVAL</div>
      <?php
      $terms = get_the_terms( get_the_ID(), 'product_cat' );

      foreach ($terms as $term) {

          echo '<h2 itemprop="name" class="productCategoryTitle entry-title">'.$term->name.'</h2>';
      }
      // AUCTION INFORRMATION HERE
      // var_dump(get_post_meta( $product->id));
      ?>
      <h4 class="singleSideAnoMarca"></h4>
      <h1 class="singleSideTitle"><?php the_title(); ?></h1>
      <p class="singleSidePrice"><?php echo $product->get_price_html(); ?></p>
      <p class="singleSideStock">Stock # <?php echo $product->id; ?><br>Used condition</p>
      <p class="singleSideData"><?php echo excerpt(140); ?></p>
      <!-- TODO: aca va un video, pero puse una imagen como placeholder -->
      <iframe class="singleSideVideo" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
      <!-- <img style="width:100%;" class="singleSideVideo" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt=""> -->
      <div class="singleSideSocialCont"> social media 1</div>
      <button class="singleSideContact" onclick="altClassFromSelector('alt','#singleRequestInfo')">REQUEST MORE INFO</button>
      <button class="singleSideContact" onclick="altClassFromSelector('alt','#singleMakeOffer')">MAKE OFFER</button>
      <button class="singleSideContact" onclick="altClassFromSelector('alt','#singleTrade')">TRADE</button>
      <button class="singleSideContact" onclick="altClassFromSelector('alt','#singleFinance')">FINANCE</button>
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



  <div class="singleFormContainer" id="singleRequestInfo">
    <form action="index.php" class="singleContact ">
      <p class="SingleContactCloseButton" onclick="altClassFromSelector('alt','#singleRequestInfo')">+</p>
      <label  class="formLabel">CONTACT DETAILS</label>
      <input type="text" placeholder="First Name"  class="formInput100 formInput">
      <input type="text" placeholder="Last Name"  class="formInput100 formInput">
      <input type="email" placeholder="Email" class="formInput100 formInput">
      <input type="number" placeholder="Phone" class="formInput100 formInput">
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
      <textarea class="singleFormTxtArea" value="comments" placeholder="" name="name"></textarea>
      <button class="singleContactButton contactButton" type="submit">SEND</button>
    </form>
  </div>

  <div class="singleFormContainer" id="singleMakeOffer">
    <form action="index.php" class="singleContact ">
      <p class="SingleContactCloseButton" onclick="altClassFromSelector('alt','#singleMakeOffer')">+</p>
      <label  class="formLabelBig">Make An Offer</label>
      <label  class="formLabel">product title HERE</label>
      <label  class="formLabel">OFFER AMOUNT</label>
      <div class="offerAmmountIcon">
        <p>$</p>
      </div>
      <input type="number" placeholder="Offer" class="formInput100 formInput offerAmmount">
      <input type="text" placeholder="Name"  class="formInput100 formInput">
      <input type="number" placeholder="Phone" class="formInput100 formInput">
      <input type="email" placeholder="Email" class="formInput100 formInput">
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
      <textarea class="singleFormTxtArea" value="comments" placeholder="" name="name"></textarea>
      <button class="singleRequestInfoButton contactButton" type="submit">SUBMIT OFFER</button>
    </form>
  </div>

  <div class="singleFormContainer" id="singleTrade">
    <form action="index.php" class="singleContact ">
      <p class="SingleContactCloseButton" onclick="altClassFromSelector('alt','#singleTrade')">+</p>
      <label  class="formLabelBig">Trade this ENTER PRODUCT TITLE HERE</label>
      <p class="singleFormTxt mainTxtType1">We are always looking for new inventory. If you are interested in trading your high quality bike for one of ours, simply fill out this form.<br>A member of our sales department will be in touch within 24 hours. No one makes the trade-in process easier than amatumoto.com.</p>
      <input type="text" placeholder="Name"  class="formInput50 formInput">
      <input type="number" placeholder="Year"  class="formInput50 formInput">
      <input type="text" placeholder="Last Name"  class="formInput50 formInput">
      <input type="text" placeholder="Make"  class="formInput50 formInput">
      <input type="email" placeholder="Email" class="formInput50 formInput">
      <input type="text" placeholder="Model" class="formInput50 formInput">
      <input type="number" placeholder="Phone" class="formInput50 formInput">
      <input type="text" placeholder="VIN" class="formInput50 formInput">
      <label  class="formLabel">Upload photos here</label>
      <input type="file" placeholder="upload files" class="formInput50 formInput">
      <textarea class="singleFormTxtArea formInput50" value="comments" placeholder="your comments" name="name"></textarea>
      <button class="singleRequestInfoButton contactButton" type="submit">REQUEST TRADE IN</button>
    </form>
  </div>

  <div class="singleFormContainer" id="singleFinance">
    <form action="index.php" class="singleContact ">
      <p class="SingleContactCloseButton" onclick="altClassFromSelector('alt','#singleFinance')">+</p>
      <label  class="formLabelBig">finance this ENTER PRODUCT TITLE HERE</label>
      <p class="singleFormTxt mainTxtType1">Please enter the information below to begin the financing process.</p>
      <input type="number" placeholder="INTEREST RATE"  class="formInput50 formInput">
      <input type="text" placeholder="NAME"  class="formInput50 formInput">
      <select class="formInput50 formInput" id="rkm-vdp-loan-term" class="form-control" name="contact_rkm_financing[loan_term]">
        <option value="36">3 Years (36 Months)</option>
        <option value="48">4 Years (48 Months)</option>
        <option value="60">5 Years (60 Months)</option>
        <option value="72">6 Years (72 Months)</option>
        <option value="84">7 Years (84 Months)</option>
        <option value="96">8 Years (96 Months)</option>
        <option value="108">9 Years (108 Months)</option>
        <option selected="selected" value="120">10 Years (120 Months)</option>
        <option value="132">11 Years (132 Months)</option>
        <option value="144">12 Years (144 Months)</option></select>
        <input type="text" placeholder="LAST NAME"  class="formInput50 formInput">
        <input type="text" placeholder="PURCHASE PRICE" class="formInput50 formInput">
        <input type="number" placeholder="PHONE" class="formInput50 formInput">
        <input type="number" placeholder="DOWN PAYMENT" class="formInput50 formInput">
        <input type="email" placeholder="EMAIL" class="formInput50 formInput">
        <button class="singleRequestInfoButton contactButton formInput50" type="">CALCULATE RATE</button>
        <input type="text" placeholder="COUNTRY" class="formInput50 formInput lastCountryInput">
        <input type="number" placeholder="0.00" class="formInput50 formInput colorfulInput">
        <select name="bestTime" value="time-preference" id="bestTimeToCall" class="formInput50 formInput">
          <option value="any_time" class="form">Any Time</option>
          <option value="from-9-to-13">9:00 a.m. - 1:00 p.m.</option>
          <option value="from-13-to-17">1:00 p.m. - 5:00 p.m.</option>
          <option value="from-17-to-20">5:00 p.m. - 8:00 p.m.</option></select>
        </select>
        <textarea class="singleFormTxtArea" value="comments" placeholder="your comments" name="name"></textarea>
        <button class="singleRequestInfoButton contactButton" type="submit">SEND</button>
      </form>
    </div>




<!-- <h1>single.php</h1> -->





<?php } wp_reset_query(); ?>
<?php get_footer(); ?>
