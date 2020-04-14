<?php get_header(); ?>
<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<?php while(have_posts()){the_post(); ?>
  <?php global $woocommerce, $product, $post; ?>
  <?php $categories = get_the_terms( get_the_ID(), 'product_cat' ); ?>
  <?php function selection($v){return $v->slug;}if($categories){$cates=array_map('selection',$categories);} ?>

  <!-- <h1>single-product.php</h1> -->

  <article class="singlePage">

    <div class="singleSide singleSide1">
      <?php
      // $newness_days = 1;
      // $created = strtotime( $product->get_date_created() );
      $created = strtotime( get_the_date() );
      if ( ( time() - ( 60 * 60 * 24 * $newness_days ) ) < $created ) { ?>
        <span class="newArrival"><i>New arrival</i></span>
      <?php } ?>
      <?php
      // get all the categories on the product
      // $categories = get_the_terms( get_the_ID(), 'product_cat' );
      // if it finds sometthing
      if ($categories) {
        // for each category
        foreach ($categories as $cat) {
          // get the slug of parent cattegory
          $parent=get_term_by('id', $cat->parent, 'product_cat', 'ARRAY_A')['slug'];
          if ($parent=="year-bikes") {$yearBike = $cat->name;}
          if ($parent=="brand") {$brand = $cat->name;}
        }
      }
      ?>


      <!-- OLD TITLE -->
      <?php if($brand){ ?><span class="singleSideAnoMarca onlyDesktopF"><?php echo $brand; ?></span><?php } ?>
      <h1 class="singleSideTitle onlyDesktopF"><?php the_title(); ?></h1>
      <?php if($yearBike){ ?><span class="singleSideAnoMarca onlyDesktopF"><?php echo $yearBike; ?></span><?php } ?>


      <!-- NEW TITLE -->
      <h1 class="singleSideTitle onlyMobileG">

        <?php if($brand){ ?><span class="singleSideAnoMarca"> <?php echo $brand; ?></span><?php } ?>
        <?php the_title(); ?>
        <?php if($yearBike){ ?><span class="singleSideAnoMarca"> <?php echo $yearBike; ?></span><?php } ?>
      </h1>




      <p class="singleSidePrice"><?php echo $product->get_price_html(); ?></p>
      <?php $stockNumber = get_post_meta( $product->id, 'stockNumber' )[0]; ?>
      <?php if($stockNumber){ ?>
        <p class="singleSideStock">
          Stock # <?php echo $stockNumber; ?>
          <?php if (method_exists($product,'get_condition')) { ?>
            <br>Condition: <?php echo esc_html( $product->get_condition() ); ?>
          <?php } ?>
        </p>
      <?php } ?>


      <!-- <p class="singleSideData onlyDesktopG"><?php echo excerpt(140); ?></p> -->
      <div class="singleSideData onlyDesktopG"><?php the_excerpt(); ?></div>

      <?php $video = get_post_meta( $product->id, 'video' )[0]; ?>
      <?php if($video){ ?>
          <!-- <iframe class="singleSideVideo onlyDesktopG" src="https://www.youtube.com/embed/<?php echo $video; ?>"></iframe> -->
          <div class="singleSideVideo onlyDesktopG"  onclick="altClassFromSelector('video','#gallery')">
            <img class="singleSideVideoImg rowcol1" src="https://img.youtube.com/vi/<?php echo $video; ?>/mqdefault.jpg" alt="">
            <svg class="rowcol1" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 100 100" viewBox="0 0 100 100">
              <g fill="#fff">
                <path d="m88.9 30.9c-.4-3.5-3.7-6.9-7.2-7.3-21.1-2.6-42.4-2.6-63.4 0-3.5.4-6.8 3.8-7.2 7.3-1.5 12.8-1.5 25.3 0 38.1.4 3.5 3.7 6.9 7.2 7.3 21.1 2.6 42.4 2.6 63.4 0 3.5-.4 6.8-3.8 7.2-7.3 1.5-12.8 1.5-25.2 0-38.1zm-6.6 37.4c-.1.5-.9 1.4-1.4 1.5-10.2 1.2-20.6 1.9-30.9 1.9s-20.7-.7-30.9-1.9c-.4-.1-1.3-1-1.4-1.5-1.4-12.3-1.4-24.2 0-36.6.1-.5.9-1.4 1.4-1.5 10.2-1.2 20.6-1.9 30.9-1.9s20.7.6 30.9 1.9c.4.1 1.3 1 1.4 1.5 1.4 12.3 1.4 24.3 0 36.6z"/>
                <path d="m43.3 36.7v26.7l20-13.3z"/>
              </g>
            </svg>
          </div>
      <?php } ?>





      <div class="singleSideSocialCont socialMedia onlyDesktopF">

        <a href="https://es-la.facebook.com/gpmotorbikes/" target="_blank" class="socialMediaLink socialMediaFace">
          <svg viewBox="0 0 313 500" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M272.598 281.25L286.484 190.762H199.658V132.041C199.658 107.285 211.787 83.1543 250.674 83.1543H290.146V6.11328C290.146 6.11328 254.326 0 220.078 0C148.574 0 101.836 43.3398 101.836 121.797V190.762H22.3535V281.25H101.836V500H199.658V281.25H272.598Z" fill="currentColor"/>
          </svg>
        </a>

        <a href="tel:+34 938 364 911" target="_blank" class="socialMediaLink socialMediaFono">
          <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8.04444 17.3111C11.2444 23.6 16.4 28.7333 22.6889 31.9556L27.5778 27.0667C28.1778 26.4667 29.0667 26.2667 29.8444 26.5333C32.3333 27.3556 35.0222 27.8 37.7778 27.8C39 27.8 40 28.8 40 30.0222V37.7778C40 39 39 40 37.7778 40C16.9111 40 0 23.0889 0 2.22222C0 1 1 0 2.22222 0H10C11.2222 0 12.2222 1 12.2222 2.22222C12.2222 5 12.6667 7.66667 13.4889 10.1556C13.7333 10.9333 13.5556 11.8 12.9333 12.4222L8.04444 17.3111Z" fill="currentColor"/>
          </svg>
        </a>

        <a href="https://wa.me/15551234567" target="_blank" class="socialMediaLink socialMediaWhatsapp">
          <svg viewBox="0 0 500 500" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M425.112 72.6563C378.348 25.7812 316.071 0 249.888 0C113.281 0 2.12054 111.161 2.12054 247.768C2.12054 291.406 13.5045 334.04 35.1563 371.652L0 500L131.362 465.513C167.522 485.268 208.259 495.647 249.777 495.647H249.888C386.384 495.647 500 384.487 500 247.879C500 181.696 471.875 119.531 425.112 72.6563V72.6563ZM249.888 453.906C212.835 453.906 176.562 443.973 144.978 425.223L137.5 420.759L59.5982 441.183L80.3571 365.179L75.4464 357.366C54.7991 324.554 43.9732 286.719 43.9732 247.768C43.9732 134.263 136.384 41.8527 250 41.8527C305.022 41.8527 356.696 63.2812 395.536 102.232C434.375 141.183 458.259 192.857 458.147 247.879C458.147 361.496 363.393 453.906 249.888 453.906V453.906ZM362.835 299.665C356.696 296.54 326.228 281.585 320.536 279.576C314.844 277.455 310.714 276.451 306.585 282.701C302.455 288.951 290.625 302.79 286.942 307.031C283.371 311.161 279.688 311.719 273.549 308.594C237.165 290.402 213.281 276.116 189.286 234.933C182.924 223.996 195.647 224.777 207.478 201.116C209.487 196.987 208.482 193.415 206.92 190.29C205.357 187.165 192.969 156.696 187.835 144.308C182.813 132.254 177.679 133.929 173.884 133.705C170.313 133.482 166.183 133.482 162.054 133.482C157.924 133.482 151.228 135.045 145.536 141.183C139.844 147.433 123.884 162.388 123.884 192.857C123.884 223.326 146.094 252.79 149.107 256.92C152.232 261.049 192.746 323.549 254.911 350.446C294.196 367.411 309.598 368.862 329.241 365.96C341.183 364.174 365.848 351.004 370.982 336.496C376.116 321.987 376.116 309.598 374.554 307.031C373.103 304.241 368.973 302.679 362.835 299.665Z" fill="currentColor"/>
          </svg>
        </a>



        <a class="socialMediaLink socialMediaMail" href="" target="_blank">
          <svg viewBox="0 0 55 40" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path d="M49.6053 0H5.13158C2.29745 0 0 2.23854 0 5V35C0 37.7615 2.29745 40 5.13158 40H49.6053C52.4394 40 54.7368 37.7615 54.7368 35V5C54.7368 2.23854 52.4394 0 49.6053 0ZM49.6053 5V9.25052C47.2082 11.1525 43.3866 14.11 35.2169 20.3432C33.4164 21.7231 29.85 25.0382 27.3684 24.9996C24.8873 25.0386 21.3197 21.7226 19.52 20.3432C11.3515 14.1109 7.52899 11.1528 5.13158 9.25052V5H49.6053ZM5.13158 35V15.6665C7.58127 17.5676 11.0552 20.2354 16.3503 24.2754C18.687 26.0676 22.7791 30.024 27.3684 29.9999C31.9352 30.024 35.9755 26.125 38.3856 24.2762C43.6805 20.2364 47.1555 17.5678 49.6053 15.6666V35H5.13158Z" fill="currentColor"/>
          </svg>
        </a>
      </div>

      <div class="singleSideContactContainer onlyDesktopG">
        <button class="singleSideContact" onclick="altClassFromSelector('alt','#singleRequestInfo')">REQUEST MORE INFO</button>
        <button class="singleSideContact" onclick="altClassFromSelector('alt','#singleMakeOffer')">MAKE OFFER</button>
        <?php if($product->is_type( 'auction' )){ ?>
          <a class="singleSideContact" href="<?php echo site_url('auctions-information');  ?>">AUCTION INFO</a>
        <?php } else if($cates) { ?>
          <?php if(!in_array('parts-racing-products', $cates)) { ?>
            <button class="singleSideContact" onclick="altClassFromSelector('alt','#singleTrade')">TRADE</button>
          <?php } ?>
        <?php } ?>
      </div>


      <?php function testimonial( $clase ){ ?>

            <div class="testimonialsContainer <?php echo $clase; ?>">
              <?php
              $args = array(
                'post_type'=>'testimonials',
                'orderby'=>'rand',
                'posts_per_page'=>'1'
              );
              $testimonials=new WP_Query($args);
              while($testimonials->have_posts()){$testimonials->the_post();?>
                <quote class="testimonial">
                  <svg class="testiQuote testiQuote1" width="576" height="448" viewBox="0 0 576 448" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M504 192H448V184C448 161.9 465.9 144 488 144H496C522.5 144 544 122.5 544 96V48C544 21.5 522.5 0 496 0H488C386.5 0 304 82.5 304 184V376C304 415.7 336.3 448 376 448H504C543.7 448 576 415.7 576 376V264C576 224.3 543.7 192 504 192ZM528 376C528 389.2 517.2 400 504 400H376C362.8 400 352 389.2 352 376V184C352 109 413 48 488 48H496V96H488C439.5 96 400 135.5 400 184V240H504C517.2 240 528 250.8 528 264V376ZM200 192H144V184C144 161.9 161.9 144 184 144H192C218.5 144 240 122.5 240 96V48C240 21.5 218.5 0 192 0H184C82.5 0 0 82.5 0 184V376C0 415.7 32.3 448 72 448H200C239.7 448 272 415.7 272 376V264C272 224.3 239.7 192 200 192ZM224 376C224 389.2 213.2 400 200 400H72C58.8 400 48 389.2 48 376V184C48 109 109 48 184 48H192V96H184C135.5 96 96 135.5 96 184V240H200C213.2 240 224 250.8 224 264V376Z" fill="black"/>
                  </svg>
                  <div class="testimonialTxt mainTxtType1">
                    <h4 class="testimonialAuthor"><?php the_title(); ?></h4>
                    <div class="testimonialQuote"><?php the_content(); ?></div>
                  </div>
                  <svg class="testiQuote testiQuote2" width="576" height="448" viewBox="0 0 576 448" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M72 256H128V264C128 286.1 110.1 304 88 304H80C53.5 304 32 325.5 32 352V400C32 426.5 53.5 448 80 448H88C189.5 448 272 365.5 272 264V72C272 32.3 239.7 0 200 0H72C32.3 0 0 32.3 0 72V184C0 223.7 32.3 256 72 256ZM48 72C48 58.8 58.8 48 72 48H200C213.2 48 224 58.8 224 72V264C224 339 163 400 88 400H80V352H88C136.5 352 176 312.5 176 264V208H72C58.8 208 48 197.2 48 184V72ZM376 256H432V264C432 286.1 414.1 304 392 304H384C357.5 304 336 325.5 336 352V400C336 426.5 357.5 448 384 448H392C493.5 448 576 365.5 576 264V72C576 32.3 543.7 0 504 0H376C336.3 0 304 32.3 304 72V184C304 223.7 336.3 256 376 256ZM352 72C352 58.8 362.8 48 376 48H504C517.2 48 528 58.8 528 72V264C528 339 467 400 392 400H384V352H392C440.5 352 480 312.5 480 264V208H376C362.8 208 352 197.2 352 184V72Z" fill="black"/>
                  </svg>
                </quote>
              <?php } wp_reset_postdata(); ?>
            </div>


      <?php } ?>

      <?php if( $product->is_type( 'auction' ) ){ ?>
      <?php } ?>
      <?php testimonial( 'onlyDesktopG' ); ?>

    </div>


    <div class="singleMain">

      <div class="gallery" id="gallery">
        <?php $attachment_ids = $product->get_gallery_attachment_ids(); ?>

        <div class="galleryMainCarousel">
          <iframe class="galleryMainVideo" src="https://www.youtube.com/embed/<?php echo $video; ?>"></iframe>

          <img class="galleryMain galleryCarousel" onclick="altClassFromSelector('alt','#gallery')" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
          <?php $count=0; foreach( $attachment_ids as $attachment_id ) { ?>
            <img class="galleryMain galleryCarousel" onclick="altClassFromSelector('alt','#gallery')" src="<?php echo $image_link = wp_get_attachment_url( $attachment_id ); ?>" alt="">
          <?php $count++; } ?>
        </div>
        <button class="slideButton rowcol1 slideLeft" onclick="plusImgs(-1)"></button>
        <button class="slideButton rowcol1 slideRight" onclick="plusImgs(+1)"></button>

        <button class="fullscreenButton rowcol1" onclick="altClassFromSelector('alt','#gallery')">
          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="expand" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-expand fa-w-14 fa-3x"><path fill="currentColor" d="M0 180V56c0-13.3 10.7-24 24-24h124c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H64v84c0 6.6-5.4 12-12 12H12c-6.6 0-12-5.4-12-12zM288 44v40c0 6.6 5.4 12 12 12h84v84c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12V56c0-13.3-10.7-24-24-24H300c-6.6 0-12 5.4-12 12zm148 276h-40c-6.6 0-12 5.4-12 12v84h-84c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h124c13.3 0 24-10.7 24-24V332c0-6.6-5.4-12-12-12zM160 468v-40c0-6.6-5.4-12-12-12H64v-84c0-6.6-5.4-12-12-12H12c-6.6 0-12 5.4-12 12v124c0 13.3 10.7 24 24 24h124c6.6 0 12-5.4 12-12z" class=""></path></svg>
        </button>

        <button class="fullscreenButton close rowcol1" onclick="altClassFromSelector('alt','#gallery')">
      			<svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512">
      				<path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path>
      			</svg>
        </button>



        <div class="galleryStock" id="galleryStock">
          <img class="galleryImgs" onclick="selectImgs(0)" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
          <?php $count=1; foreach( $attachment_ids as $attachment_id ) { ?>
            <img class="galleryImgs" onclick="selectImgs(<?php echo $count; ?>)" src="<?php echo $image_link = wp_get_attachment_url( $attachment_id ); ?>" alt="">
          <?php $count++; } ?>
          <div class="galleryFade"></div>
        </div>
        <button class="galleryMore" onclick="altClassFromSelector('alt', '#galleryStock')">More photos</button>
      </div>

      <div class="singleSideMobileSchema onlyMobileG">

        <!-- <p class="singleSideData onlyMobileG"><?php echo excerpt(140); ?></p> -->
        <div class="singleSideData onlyMobileG"><?php the_excerpt(); ?></div>


        <div class="singleSideSocialCont socialMedia onlyMobileF">

          <a href="https://es-la.facebook.com/gpmotorbikes/" target="_blank" class="socialMediaLink socialMediaFace">
            <svg viewBox="0 0 313 500" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M272.598 281.25L286.484 190.762H199.658V132.041C199.658 107.285 211.787 83.1543 250.674 83.1543H290.146V6.11328C290.146 6.11328 254.326 0 220.078 0C148.574 0 101.836 43.3398 101.836 121.797V190.762H22.3535V281.25H101.836V500H199.658V281.25H272.598Z" fill="currentColor"/>
            </svg>
          </a>

          <a href="tel:+34 938 364 911" target="_blank" class="socialMediaLink socialMediaFono">
            <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M8.04444 17.3111C11.2444 23.6 16.4 28.7333 22.6889 31.9556L27.5778 27.0667C28.1778 26.4667 29.0667 26.2667 29.8444 26.5333C32.3333 27.3556 35.0222 27.8 37.7778 27.8C39 27.8 40 28.8 40 30.0222V37.7778C40 39 39 40 37.7778 40C16.9111 40 0 23.0889 0 2.22222C0 1 1 0 2.22222 0H10C11.2222 0 12.2222 1 12.2222 2.22222C12.2222 5 12.6667 7.66667 13.4889 10.1556C13.7333 10.9333 13.5556 11.8 12.9333 12.4222L8.04444 17.3111Z" fill="currentColor"/>
            </svg>
          </a>

          <a href="https://wa.me/15551234567" target="_blank" class="socialMediaLink socialMediaWhatsapp">
            <svg viewBox="0 0 500 500" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M425.112 72.6563C378.348 25.7812 316.071 0 249.888 0C113.281 0 2.12054 111.161 2.12054 247.768C2.12054 291.406 13.5045 334.04 35.1563 371.652L0 500L131.362 465.513C167.522 485.268 208.259 495.647 249.777 495.647H249.888C386.384 495.647 500 384.487 500 247.879C500 181.696 471.875 119.531 425.112 72.6563V72.6563ZM249.888 453.906C212.835 453.906 176.562 443.973 144.978 425.223L137.5 420.759L59.5982 441.183L80.3571 365.179L75.4464 357.366C54.7991 324.554 43.9732 286.719 43.9732 247.768C43.9732 134.263 136.384 41.8527 250 41.8527C305.022 41.8527 356.696 63.2812 395.536 102.232C434.375 141.183 458.259 192.857 458.147 247.879C458.147 361.496 363.393 453.906 249.888 453.906V453.906ZM362.835 299.665C356.696 296.54 326.228 281.585 320.536 279.576C314.844 277.455 310.714 276.451 306.585 282.701C302.455 288.951 290.625 302.79 286.942 307.031C283.371 311.161 279.688 311.719 273.549 308.594C237.165 290.402 213.281 276.116 189.286 234.933C182.924 223.996 195.647 224.777 207.478 201.116C209.487 196.987 208.482 193.415 206.92 190.29C205.357 187.165 192.969 156.696 187.835 144.308C182.813 132.254 177.679 133.929 173.884 133.705C170.313 133.482 166.183 133.482 162.054 133.482C157.924 133.482 151.228 135.045 145.536 141.183C139.844 147.433 123.884 162.388 123.884 192.857C123.884 223.326 146.094 252.79 149.107 256.92C152.232 261.049 192.746 323.549 254.911 350.446C294.196 367.411 309.598 368.862 329.241 365.96C341.183 364.174 365.848 351.004 370.982 336.496C376.116 321.987 376.116 309.598 374.554 307.031C373.103 304.241 368.973 302.679 362.835 299.665Z" fill="currentColor"/>
            </svg>
          </a>



          <a class="socialMediaLink socialMediaMail" href="" target="_blank">
            <svg viewBox="0 0 55 40" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M49.6053 0H5.13158C2.29745 0 0 2.23854 0 5V35C0 37.7615 2.29745 40 5.13158 40H49.6053C52.4394 40 54.7368 37.7615 54.7368 35V5C54.7368 2.23854 52.4394 0 49.6053 0ZM49.6053 5V9.25052C47.2082 11.1525 43.3866 14.11 35.2169 20.3432C33.4164 21.7231 29.85 25.0382 27.3684 24.9996C24.8873 25.0386 21.3197 21.7226 19.52 20.3432C11.3515 14.1109 7.52899 11.1528 5.13158 9.25052V5H49.6053ZM5.13158 35V15.6665C7.58127 17.5676 11.0552 20.2354 16.3503 24.2754C18.687 26.0676 22.7791 30.024 27.3684 29.9999C31.9352 30.024 35.9755 26.125 38.3856 24.2762C43.6805 20.2364 47.1555 17.5678 49.6053 15.6666V35H5.13158Z" fill="currentColor"/>
            </svg>
          </a>


        </div>

        <div class="singleSideContactContainer onlyMobileG">
          <button class="singleSideContact" onclick="altClassFromSelector('alt','#singleRequestInfo')">REQUEST MORE INFO</button>
          <button class="singleSideContact" onclick="altClassFromSelector('alt','#singleMakeOffer')">MAKE OFFER</button>
          <?php if($product->is_type( 'auction' )){ ?>
            <a class="singleSideContact" href="<?php echo site_url('auctions-information');  ?>">AUCTION INFO</a>
          <?php } else if(!in_array('parts-racing-products', $cates)) { ?>
            <button class="singleSideContact" onclick="altClassFromSelector('alt','#singleTrade')">TRADE</button>
          <?php } ?>
          <!-- <button class="singleSideContact" onclick="altClassFromSelector('alt','#singleFinance')">FINANCE</button> -->
        </div>



      </div>



      <?php $video = get_post_meta( $product->id, 'video' )[0]; ?>
      <?php if($video){ ?>
          <div class="singleSideVideo onlyMobileG"  onclick="altClassFromSelector('video','#gallery')">
            <iframe class="singleSideVideoImg onlyMobileG" src="https://www.youtube.com/embed/<?php echo $video; ?>"></iframe>
            <!-- <img class="singleSideVideoImg rowcol1" src="https://img.youtube.com/vi/<?php echo $video; ?>/mqdefault.jpg" alt="">
            <svg class="rowcol1" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 100 100" viewBox="0 0 100 100">
              <g fill="#fff">
                <path d="m88.9 30.9c-.4-3.5-3.7-6.9-7.2-7.3-21.1-2.6-42.4-2.6-63.4 0-3.5.4-6.8 3.8-7.2 7.3-1.5 12.8-1.5 25.3 0 38.1.4 3.5 3.7 6.9 7.2 7.3 21.1 2.6 42.4 2.6 63.4 0 3.5-.4 6.8-3.8 7.2-7.3 1.5-12.8 1.5-25.2 0-38.1zm-6.6 37.4c-.1.5-.9 1.4-1.4 1.5-10.2 1.2-20.6 1.9-30.9 1.9s-20.7-.7-30.9-1.9c-.4-.1-1.3-1-1.4-1.5-1.4-12.3-1.4-24.2 0-36.6.1-.5.9-1.4 1.4-1.5 10.2-1.2 20.6-1.9 30.9-1.9s20.7.6 30.9 1.9c.4.1 1.3 1 1.4 1.5 1.4 12.3 1.4 24.3 0 36.6z"/>
                <path d="m43.3 36.7v26.7l20-13.3z"/>
              </g>
            </svg> -->
          </div>
      <?php } ?>


      <?php
        // AUCTION INFORRMATION HERE
        // var_dump(get_post_meta( $product->id));
        // var_dump($product->auction_bid_count);
        // echo $product->auction_bid_count;
        /**
         * Auction bid
         *
         */

        if ( ( $product && $product->is_type( 'auction' ) ) ) {
        	// return;
          $product_id       = $product->get_id();
          $user_max_bid     = $product->get_user_max_bid( $product_id, get_current_user_id() );
          $max_min_bid_text = $product->get_auction_type() === 'reverse' ? esc_html__( 'Your min bid is', 'auctions-for-woocommerce' ) : esc_html__( 'Your max bid is', 'auctions-for-woocommerce' );
          $gmt_offset       = get_option( 'gmt_offset' ) > 0 ? '+' . get_option( 'gmt_offset' ) : get_option( 'gmt_offset' );
      ?>


          <!-- <div class="singleSideContactContainer onlyMobileG">
            <button class="singleSideContact" onclick="altClassFromSelector('alt','#singleRequestInfo')">REQUEST MORE INFO</button>
            <button class="singleSideContact" onclick="altClassFromSelector('alt','#singleMakeOffer')">MAKE OFFER</button>
            <?php if($product->is_type( 'auction' )){ ?>
              <a class="singleSideContact" href="<?php echo site_url('auctions-information');  ?>">AUCTION INFO</a>
            <?php } else if(!in_array('parts-racing-products', $cates)) { ?>
              <button class="singleSideContact" onclick="altClassFromSelector('alt','#singleTrade')">TRADE</button>
            <?php } ?>
          </div> -->

          <!-- <p class="auction-condition"><?php echo wp_kses_post( apply_filters( 'conditiond_text', esc_html__( 'Item condition:', 'auctions-for-woocommerce' ), $product ) ); ?><span class="curent-bid"> <?php echo esc_html( $product->get_condition() ); ?></span></p> -->

          <?php if ( ( false === $product->is_closed ) && ( true === $product->is_started ) ) : ?>


          	<div class='auction-ajax-change auctionData' >

          		<?php if ( 'yes' !== $product->get_auction_sealed() ) { ?>
              <div class="auctionTitle">
                <h2>Auction info:</h2>
                <?php do_action( 'woocommerce_after_bid_form' ); ?>
              </div>

              <p class="auctionDetails">
                <span class="auctionDetailsTitle">
                  <?php echo wp_kses_post( apply_filters( 'time_left_text', esc_html__( 'Auction ends:', 'auctions-for-woocommerce' ), $product ) ); ?>
                </span>
                <span class="auctionDetailsValue">
                  <?php echo esc_html( date_i18n( get_option( 'date_format' ), strtotime( $product->get_auction_end_time() ) ) ); ?>
                </span>
              </p>

            	<p class="auctionDetails" id="countdown">
                <span class="auctionDetailsTitle">
                  <?php echo wp_kses_post( apply_filters( 'time_text', esc_html__( 'Time left:', 'auctions-for-woocommerce' ), $product_id ) ); ?>
                </span>
            		<span class="auctionDetailsValue main-auction auction-time-countdown notMet" data-time="<?php echo esc_attr( $product->get_seconds_remaining() ); ?>" data-auctionid="<?php echo intval( $product_id ); ?>" data-format="<?php echo esc_attr( get_option( 'auctions_for_woocommerce_countdown_format' ) ); ?>"></span>
            	</p>

        			<p class="auctionDetails">
                <?php if ($product->auction_current_bid){ ?>
                  <span class="auctionDetailsTitle">Current bid:</span>
                  <?php // echo wp_kses_post( $product->get_price_html() ); ?>
                  <span class="auctionDetailsValue bluTxt">€ <?php echo number_format($product->auction_current_bid,0,",","."); ?></span>
                  <!-- <span class="auctionDetailsValue">€ <?php echo $product->auction_current_bid; ?></span> -->
                <?php } else { ?>
                  <span class="auctionDetailsTitle">Starting bid:</span>
                  <span class="auctionDetailsValue bluTxt">€ <?php echo number_format($product->auction_start_price,0,",","."); ?></span>
                <?php } ?>



              </p>

              <p class="auctionDetails">
                <span class="auctionDetailsTitle">Reserve price:</span>
                <?php if ( ( $product->is_reserved() === true ) && ( $product->is_reserve_met() === false ) ) : ?>
                  <span class="auctionDetailsValue reserve notMet"  data-auction-id="<?php echo intval( $product_id ); ?>" >has not been met</span>
                <?php endif; ?>
                <?php if ( ( $product->is_reserved() === true ) && ( $product->is_reserve_met() === true ) ) : ?>
                  <span class="auctionDetailsValue reserve yesMet"  data-auction-id="<?php echo intval( $product_id ); ?>" >has been met</span>
                <?php endif; ?>
              </p>




          		<?php } elseif ( 'yes' === $product->get_auction_sealed() ) { ?>
        				<p class="sealed-text"><?php echo wp_kses_post( apply_filters( 'sealed_bid_text', __( "This auction is <a href='#'>sealed</a>.", 'auctions-for-woocommerce' ) ) ); ?>
        					<span class='sealed-bid-desc' style="display:grid;"><?php esc_html_e( 'In this type of auction all bidders simultaneously submit sealed bids so that no bidder knows the bid of any other participant. The highest bidder pays the price they submitted. If two bids with same value are placed for auction the one which was placed first wins the auction.', 'auctions-for-woocommerce' ); ?></span>
        				</p>
        				<?php if ( ! empty( $product->get_auction_start_price() ) ) { ?>
        					<?php if ( 'reverse' === $product->get_auction_type() ) : ?>
      							<p class="sealed-min-text">
      								<?php
      									echo wp_kses_post(
      										apply_filters(
      											'sealed_min_text',
      											sprintf(
      												// translators: 1) bid value
      												esc_html__( 'Maximum bid for this auction is %s.', 'auctions-for-woocommerce' ),
      												wc_price( $product->get_auction_start_price() )
      											)
      										)
      									);
      								?>
    								</p>
        					<?php else : ?>
      							<p class="sealed-min-text">
      								<?php
        								echo wp_kses_post(
        									apply_filters(
        										'sealed_min_text',
        										sprintf(
        											// translators: 1) bid value
        											esc_html__( 'Minimum bid for this auction is %s.', 'auctions-for-woocommerce' ),
        											wc_price( $product->get_auction_start_price() )
        										)
        									)
        								);
      								?>
    								</p>
        					<?php endif; ?>
        				<?php } ?>
          		<?php } ?>

          		<?php if ( 'reverse' === $product->get_auction_type() ) : ?>
          			<p class="reverse"><?php echo wp_kses_post( apply_filters( 'reverse_auction_text', esc_html__( 'This is reverse auction.', 'auctions-for-woocommerce' ) ) ); ?></p>
          		<?php endif; ?>
          		<?php if ( 'yes' !== $product->get_auction_sealed() ) { ?>
          			<?php if ( $product->get_auction_proxy() && $product->get_auction_max_current_bider() && get_current_user_id() === $product->get_auction_max_current_bider() ) { ?>
          				<p class="max-bid"><?php echo esc_html( $max_min_bid_text ); ?> <?php echo wp_kses_post( wc_price( $product->get_auction_max_bid() ) ); ?>
          			<?php } ?>
          		<?php } elseif ( $user_max_bid > 0 ) { ?>
          			<p class="max-bid"><?php echo esc_html( $max_min_bid_text ); ?> <?php echo wp_kses_post( wc_price( $user_max_bid ) ); ?>
          		<?php } ?>

          		<?php do_action( 'woocommerce_before_bid_form' ); ?>


              <?php if (is_user_logged_in()) { ?>

            		<form class="auction_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php echo intval( $product_id ); ?>">

            			<?php do_action( 'woocommerce_before_bid_button' ); ?>

            			<input type="hidden" name="bid" value="<?php echo esc_attr( $product_id ); ?>" />
            				<div class="quantity buttons_added">
            					<input type="button" value="-" class="minus" />
            					<input type="text" name="bid_value" data-auction-id="<?php echo intval( $product_id ); ?>"
          							<?php if ( 'yes' !== $product->get_auction_sealed() ) { ?>
          								value="<?php echo esc_attr( $product->bid_value() ); ?>"
          								<?php if ( 'reverse' === $product->get_auction_type() ) : ?>
          									max="<?php echo esc_attr( $product->bid_value() ); ?>"
          								<?php else : ?>
          									min="<?php echo esc_attr( $product->bid_value() ); ?>"
          								<?php endif; ?>
          							<?php } ?>
          							step="100" size="<?php echo intval( strlen( $product->get_curent_bid() ) ) + 6; ?>" title="bid"  class="input-text qty  bid text left">
                      <input type="button" value="+" class="plus" />
            				</div>
            			<button type="submit" class="bid_button button alt"><?php echo wp_kses_post( apply_filters( 'bid_text', esc_html__( 'Bid', 'auctions-for-woocommerce' ), $product ) ); ?></button>
            			<input type="hidden" name="place-bid" value="<?php echo intval( $product_id ); ?>" />
            			<input type="hidden" name="product_id" value="<?php echo intval( $product_id ); ?>" />
            			<?php if ( is_user_logged_in() ) { ?>
            				<input type="hidden" name="user_id" value="<?php echo intval( get_current_user_id() ); ?>" />
            			<?php } ?>

            			<?php // do_action( 'woocommerce_after_bid_button' ); ?>
            		</form>

              <?php } else { ?>
                <p class="mustLogin">you must <span class="mustLoginButton" onclick="altClassFromSelector('alt','#logForm')">login</span> to place a bid</p>
              <?php } ?>



          	</div>

          <?php elseif ( ( false === $product->is_closed ) && ( false === $product->is_started ) ) : ?>
            <div class='auctionData' >

              <div class="auctionTitle">
                <h2>Auction info:</h2>
                <?php do_action( 'woocommerce_after_bid_form' ); ?>
              </div>

        			<p class="auctionDetails">
                <span class="auctionDetailsTitle"><?php echo wp_kses_post( apply_filters( 'auction_starts_text', esc_html__( 'Auction starts in:', 'auctions-for-woocommerce' ), $product ) ); ?></span>
                <span class="auctionDetailsValue auction-time-countdown future notMet" data-time="<?php echo esc_attr( $product->get_seconds_to_auction() ); ?>" data-format="<?php echo esc_attr( get_option( 'auctions_for_woocommerce_countdown_format' ) ); ?>"></span>
              </p>
              <p class="auctionDetails">
                <span class="auctionDetailsTitle"><?php echo wp_kses_post( apply_filters( 'time_text', esc_html__( 'Auction starts:', 'auctions-for-woocommerce' ), $product_id ) ); ?></span>
                <span class="auctionDetailsValue"><?php echo esc_html( date_i18n( get_option( 'date_format' ), strtotime( $product->get_auction_start_time() ) ) ); ?></span>
                <?php // echo esc_html( date_i18n( get_option( 'time_format' ), strtotime( $product->get_auction_start_time() ) ) ); ?>
              </p>
            	<p class="auctionDetails">
                <span class="auctionDetailsTitle"><?php echo wp_kses_post( apply_filters( 'time_text', esc_html__( 'Auction ends:', 'auctions-for-woocommerce' ), $product_id ) ); ?></span>
                <span class="auctionDetailsValue"><?php echo esc_html( date_i18n( get_option( 'date_format' ), strtotime( $product->get_auction_end_time() ) ) ); ?></span>
                <?php // echo esc_html( date_i18n( get_option( 'time_format' ), strtotime( $product->get_auction_end_time() ) ) ); ?>
              </p>
              <p class="auctionDetails">
                <span class="auctionDetailsTitle">Starting bid:</span>
                <span class="auctionDetailsValue">€ <?php echo number_format($product->auction_start_price,0,",","."); ?></span>
              </p>


            </div>

        <?php endif; } ?>






        <?php if (!in_array('parts-racing-products', $cates)) { ?>
          <div class="singleFeatures">


            <figure class="singleFeature">

              <svg class="singleFeatureIcon" width="136" height="75" viewBox="0 0 136 75" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M131.733 21.9984C122.975 15.9739 114.232 9.13225 105.445 3.15198C102.791 1.34578 99.799 0.266651 96.5724 0.187768C90.8486 0.0475806 85.1217 -0.0227386 79.3961 0.00656101C69.6885 0.0556942 59.9808 0.181457 50.2741 0.322996C46.0888 0.383849 41.8805 0.514569 38.2324 2.9834C38.2324 2.9834 11.335 19.2537 4.46984 33.8205C0.724447 41.767 -0.959603 52.067 0.552707 64.934C0.170911 66.655 1.2293 71.9528 1.2293 71.9528C1.33072 73.7527 2.3526 74.5907 4.16467 74.8012C5.27129 74.9297 6.39054 75.0013 7.50392 75C35.3728 74.968 63.2412 74.9283 91.1105 74.8778C103.782 74.8548 116.455 74.8296 129.126 74.7588C132.651 74.7394 133.607 73.7306 133.731 70.2309C134.218 56.5539 134.652 42.875 135.219 29.2011C135.348 26.0607 134.258 23.7352 131.733 21.9984ZM94.5859 6.99339C95.6245 6.99339 96.4665 7.83496 96.4665 8.87307C96.4665 9.91162 95.6245 10.7532 94.5859 10.7532C93.5478 10.7532 92.7062 9.91162 92.7062 8.87307C92.7062 7.83541 93.5478 6.99339 94.5859 6.99339ZM87.7379 6.99339C88.776 6.99339 89.6176 7.83496 89.6176 8.87307C89.6176 9.91162 88.776 10.7532 87.7379 10.7532C86.6998 10.7532 85.8582 9.91162 85.8582 8.87307C85.8582 7.83541 86.6998 6.99339 87.7379 6.99339ZM80.5978 6.99339C81.6364 6.99339 82.478 7.83496 82.478 8.87307C82.478 9.91162 81.6364 10.7532 80.5978 10.7532C79.5597 10.7532 78.7182 9.91162 78.7182 8.87307C78.7182 7.83541 79.5597 6.99339 80.5978 6.99339ZM73.7494 6.99339C74.7875 6.99339 75.6291 7.83496 75.6291 8.87307C75.6291 9.91162 74.7875 10.7532 73.7494 10.7532C72.7108 10.7532 71.8693 9.91162 71.8693 8.87307C71.8693 7.83541 72.7113 6.99339 73.7494 6.99339ZM66.8644 6.99339C67.903 6.99339 68.7446 7.83496 68.7446 8.87307C68.7446 9.91162 67.903 10.7532 66.8644 10.7532C65.8263 10.7532 64.9848 9.91162 64.9848 8.87307C64.9848 7.83541 65.8263 6.99339 66.8644 6.99339ZM60.0164 6.99339C61.0546 6.99339 61.8961 7.83496 61.8961 8.87307C61.8961 9.91162 61.0546 10.7532 60.0164 10.7532C58.9779 10.7532 58.1363 9.91162 58.1363 8.87307C58.1363 7.83541 58.9779 6.99339 60.0164 6.99339ZM53.058 6.99339C54.0966 6.99339 54.9382 7.83496 54.9382 8.87307C54.9382 9.91162 54.0966 10.7532 53.058 10.7532C52.0199 10.7532 51.1783 9.91162 51.1783 8.87307C51.1783 7.83541 52.0199 6.99339 53.058 6.99339ZM46.21 6.99339C47.2481 6.99339 48.0897 7.83496 48.0897 8.87307C48.0897 9.91162 47.2481 10.7532 46.21 10.7532C45.1715 10.7532 44.3299 9.91162 44.3299 8.87307C44.3299 7.83541 45.1715 6.99339 46.21 6.99339ZM118.796 58.997C118.796 62.0523 116.317 64.5301 113.26 64.5301H14.3528C11.2948 64.5301 8.81744 62.0523 8.81744 58.997C8.81744 22.5654 47.7665 18.9287 50.8231 18.9287H109.108C115.738 18.9287 118.796 24.0246 118.796 28.2505V58.997H118.796ZM130.454 59.9495C130.454 60.4588 130.041 60.8722 129.531 60.8722H125.658C125.148 60.8722 124.735 60.4588 124.735 59.9495V56.0756C124.735 55.5658 125.148 55.1529 125.658 55.1529H129.531C130.041 55.1529 130.454 55.5658 130.454 56.0756V59.9495ZM130.454 53.5743C130.454 54.0841 130.041 54.497 129.531 54.497H125.658C125.148 54.497 124.735 54.0841 124.735 53.5743V49.7005C124.735 49.1906 125.148 48.7778 125.658 48.7778H129.531C130.041 48.7778 130.454 49.1906 130.454 49.7005V53.5743ZM130.454 47.1996C130.454 47.709 130.041 48.1223 129.531 48.1223H125.658C125.148 48.1223 124.735 47.709 124.735 47.1996V43.3258C124.735 42.8164 125.148 42.4031 125.658 42.4031H129.531C130.041 42.4031 130.454 42.8164 130.454 43.3258V47.1996ZM130.454 40.8065C130.454 41.3158 130.041 41.7292 129.531 41.7292H125.658C125.148 41.7292 124.735 41.3158 124.735 40.8065V36.9331C124.735 36.4232 125.148 36.0103 125.658 36.0103H129.531C130.041 36.0103 130.454 36.4232 130.454 36.9331V40.8065ZM130.454 34.4313C130.454 34.9411 130.041 35.354 129.531 35.354H125.658C125.148 35.354 124.735 34.9407 124.735 34.4313V30.5579C124.735 30.0481 125.148 29.6348 125.658 29.6348H129.531C130.041 29.6348 130.454 30.0481 130.454 30.5579V34.4313Z" fill="#2E353A"/>
              </svg>

              <?php $dashboard = get_post_meta( $product->id, 'dashboard' )[0]; ?>
              <?php if($dashboard){ ?>
                <p class="singleFeatureDesc"><?php echo $dashboard; ?></p>
              <?php } ?>
            </figure>

              <figure class="singleFeature">
                <svg class="singleFeatureIcon" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                width="300px" height="300px" viewBox="0 0 300 300" enable-background="new 0 0 300 300" xml:space="preserve">
                <g>
                  <path fill="#2E353A" d="M98.516,203.783c4.092,4.102,7.219,8.83,9.42,13.87L150,173.951l42.068,43.702c2.197-5.04,5.324-9.769,9.416-13.87c4.102-4.102,8.826-7.224,13.881-9.425l-44.523-42.073l40.045-41.602c-2.553-2.957-5.451-6.093-8.848-9.485c-3.387-3.392-6.523-6.29-9.477-8.853L150,132.578l-42.563-40.232c-2.961,2.563-6.088,5.461-9.484,8.853c-3.389,3.392-6.285,6.528-8.85,9.485l40.055,41.602l-44.521,42.073C89.689,196.56,94.414,199.682,98.516,203.783z"/>
                  <path fill="#2E353A" d="M121.047,235.557l-3.059,3.054l-6.445-6.445c0.711,9.311-1.441,18.851-6.646,27.205c1.24,4.023,0.221,8.491-2.889,11.59c-3.094,3.095-7.557,4.134-11.59,2.889c-8.35,5.205-17.889,7.361-27.209,6.643l6.449,6.449l-3.053,3.059l7.822,7.823l3.053-3.054l2.143,2.133l48.332-48.33l-2.135-2.129l3.055-3.053L121.047,235.557z"/>
                  <path fill="#2E353A" d="M28.445,211.881c-1.24-4.032-0.215-8.496,2.879-11.6c3.109-3.099,7.572-4.129,11.596-2.879c8.369-5.21,17.898-7.361,27.205-6.646l-6.445-6.445l3.059-3.059l-7.828-7.827l-3.059,3.049l-2.129-2.124l-48.33,48.321l2.139,2.129l-3.063,3.063l7.832,7.827l3.053-3.058l6.449,6.454C21.098,229.771,23.24,220.235,28.445,211.881z"/>
                  <path fill="#2E353A" d="M89.992,268.946c2.814,1.726,6.527,1.396,8.959-1.039c2.443-2.436,2.773-6.157,1.043-8.963c11.143-15.885,9.654-37.922-4.537-52.104c-14.189-14.19-36.23-15.678-52.102-4.541c-2.816-1.726-6.533-1.396-8.963,1.044c-2.445,2.431-2.775,6.152-1.031,8.954c-11.141,15.889-9.654,37.921,4.523,52.107C52.076,278.591,74.107,280.079,89.992,268.946zM46.816,255.479c-10.965-10.968-10.965-28.747,0-39.716c10.963-10.958,28.746-10.958,39.719,0c10.955,10.969,10.955,28.748,0,39.716C75.563,266.442,57.779,266.442,46.816,255.479z"/>
                  <polygon fill="#2E353A" points="300,74.694 227.568,2.262 221.727,8.105 294.164,80.54 	"/>
                  <path fill="#2E353A" d="M205.906,96.351c18.088,18.095,23.406,30.656,23.26,42.178l3.502,3.507l48.916-48.917l-72.441-72.43l-48.912,48.91l3.498,3.5C175.246,72.955,187.82,78.265,205.906,96.351z M210.811,74.973c4.555-4.552,11.938-4.552,16.488,0c4.549,4.543,4.549,11.93,0,16.475c-4.551,4.56-11.934,4.56-16.488,0C206.264,86.903,206.264,79.517,210.811,74.973z"/>
                  <polygon fill="#2E353A" points="289.824,84.87 217.387,12.436 213.482,16.359 285.906,88.789 	"/>
                  <path fill="#2E353A" d="M209.582,273.849c-4.031,1.245-8.496,0.206-11.6-2.889c-3.107-3.099-4.119-7.566-2.879-11.59c-5.213-8.354-7.355-17.895-6.656-27.205l-6.445,6.445l-3.053-3.054l-7.822,7.833l3.053,3.053l-2.133,2.129l48.33,48.33l2.133-2.133l3.053,3.054l7.834-7.823l-3.063-3.059l6.449-6.449C227.473,281.21,217.932,279.054,209.582,273.849z"/>
                  <path fill="#2E353A" d="M294.607,222.671l-48.34-48.321l-2.129,2.124l-3.049-3.049l-7.836,7.827l3.059,3.059l-6.445,6.445c9.305-0.715,18.85,1.437,27.199,6.646c4.029-1.25,8.5-0.22,11.6,2.879c3.096,3.104,4.129,7.567,2.879,11.6c5.215,8.354,7.357,17.89,6.648,27.205l6.453-6.454l3.053,3.058l7.834-7.827l-3.072-3.063L294.607,222.671z"/>
                  <path fill="#2E353A" d="M265.617,203.344c-2.439-2.439-6.156-2.77-8.973-1.044c-15.879-11.137-37.91-9.649-52.102,4.541c-14.182,14.182-15.674,36.219-4.537,52.104c-1.73,2.806-1.4,6.527,1.035,8.963s6.152,2.765,8.967,1.039c15.875,11.133,37.908,9.645,52.1-4.541c14.189-14.187,15.674-36.219,4.531-52.107C268.373,209.496,268.043,205.774,265.617,203.344z M253.176,255.479c-10.963,10.964-28.748,10.964-39.701,0c-10.973-10.968-10.973-28.747,0-39.716c10.953-10.958,28.738-10.958,39.701,0C264.148,226.731,264.148,244.511,253.176,255.479z"
                  />
                  <polygon fill="#2E353A" points="78.264,8.105 72.432,2.262 0,74.694 5.836,80.54 	"/>
                  <path fill="#2E353A" d="M67.332,142.036l3.502-3.507c-0.146-11.522,5.16-24.083,23.25-42.178c18.096-18.086,30.67-23.396,42.18-23.252l3.496-3.5l-48.902-48.91l-72.432,72.43L67.332,142.036z M72.703,74.973c4.559-4.552,11.934-4.552,16.479,0c4.545,4.543,4.545,11.93,0,16.475c-4.545,4.56-11.92,4.56-16.479,0C68.152,86.903,68.152,79.517,72.703,74.973z"/>
                  <polygon fill="#2E353A" points="14.086,88.789 86.527,16.359 82.613,12.436 10.176,84.87 	"/>
                </g>
              </svg>

              <?php $engine = get_post_meta( $product->id, 'engine' )[0]; ?>
              <?php if($engine){ ?>
                <p class="singleFeatureDesc"><?php echo $engine; ?></p>
              <?php } ?>
            </figure>


            <figure class="singleFeature">
              <svg class="singleFeatureIcon" width="82" height="75" viewBox="0 0 82 75" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.0617 27.2245C16.5052 26.7984 16.5184 26.0923 16.0915 25.6481C15.6651 25.2044 14.9599 25.1914 14.517 25.6172C14.0731 26.0441 14.0603 26.7475 14.4867 27.1909C14.9136 27.6351 15.6181 27.6511 16.0617 27.2245Z" fill="#2E353A"/>
                <path d="M45.3958 12.6644C44.9703 12.2218 44.2618 12.2088 43.8178 12.6352C43.3766 13.0596 43.3622 13.7676 43.7878 14.2102C44.2144 14.6544 44.9213 14.6663 45.3631 14.2421C45.8062 13.8158 45.8227 13.1083 45.3958 12.6644Z" fill="#2E353A"/>
                <path d="M54.0946 54.5136C53.6512 54.94 53.6377 55.6469 54.0638 56.0897C54.4891 56.5331 55.1965 56.5467 55.6396 56.1203C56.082 55.6956 56.096 54.9878 55.6702 54.5458C55.2441 54.1024 54.5372 54.0881 54.0946 54.5136Z" fill="#2E353A"/>
                <path d="M23.7568 58.2844C24.2013 57.8575 24.2157 57.1514 23.7904 56.7088C23.3629 56.2643 22.656 56.2502 22.2121 56.6771C21.7695 57.1024 21.7557 57.8101 22.1826 58.2538C22.6084 58.6972 23.3151 58.7096 23.7568 58.2844Z" fill="#2E353A"/>
                <path d="M28.3572 15.4668C28.7998 15.0415 28.8136 14.3378 28.3872 13.8942C27.9598 13.4497 27.2559 13.4359 26.8141 13.8612C26.3699 14.2881 26.3561 14.992 26.7832 15.4362C27.2096 15.8799 27.9138 15.8934 28.3572 15.4668Z" fill="#2E353A"/>
                <path d="M57.4808 22.709C57.0371 23.1353 57.0241 23.8398 57.4505 24.2829C57.8771 24.7269 58.5818 24.7415 59.0247 24.3154C59.4689 23.8887 59.4816 23.1837 59.0555 22.7403C58.6295 22.2967 57.9244 22.2821 57.4808 22.709Z" fill="#2E353A"/>
                <path d="M14.2639 44.2025C14.7065 43.7778 14.7217 43.0706 14.2961 42.628C13.8695 42.184 13.1626 42.1719 12.7203 42.5969C12.2766 43.0232 12.2612 43.7301 12.6878 44.1741C13.1136 44.6169 13.8205 44.6291 14.2639 44.2025Z" fill="#2E353A"/>
                <path d="M38.5195 61.4364C38.0774 61.8617 38.0633 62.5672 38.4897 63.0103C38.9158 63.4543 39.6219 63.4678 40.0637 63.0431C40.5095 62.614 40.5217 61.9101 40.095 61.467C39.6689 61.023 38.9653 61.0079 38.5195 61.4364Z" fill="#2E353A"/>
                <path d="M67.2177 56.0591H62.6419V50.297C62.3511 50.8751 62.05 51.4478 61.7286 52.0068C60.7698 53.6749 59.3606 54.0436 57.5627 53.3784C57.3127 53.2858 56.961 53.038 56.961 53.038C57.9871 51.3434 58.7528 50.0573 59.645 48.2355C60.521 46.4476 61.1232 44.783 61.7751 43.0827C61.6396 42.7207 61.5052 42.3087 61.3818 41.8266C61.1997 41.7319 61.0271 41.6072 60.8716 41.4525C60.0884 40.6679 60.1187 39.3953 60.9362 38.5946C60.947 38.584 60.9584 38.5756 60.9692 38.5656C61.0377 37.1442 61.4738 35.8216 62.1869 34.6881C62.0135 33.6587 61.8179 32.6596 61.5352 31.4841C61.0639 29.5214 60.4555 27.8387 59.8655 26.0884C59.8655 26.0884 60.4338 25.9531 60.7842 25.9063C60.8651 25.8955 60.9446 25.889 61.0241 25.883C61.0179 25.7559 61.0079 25.6298 61.0079 25.501C61.0079 25.3401 61.0139 25.1799 61.0233 25.0211H61.0223C61.0233 25.0106 61.0247 25.0011 61.0258 24.9905C61.0509 24.5883 61.105 24.1941 61.1875 23.8099C61.8403 19.9816 63.282 19.6113 62.6977 17.6634V9.69625C48.5034 -3.20166 25.9347 -3.57933 11.3035 10.6561C-3.55363 25.1128 -3.80117 48.8375 10.7762 63.8374C24.9849 78.4594 48.8637 78.7562 63.5485 64.4921C65.5905 62.5313 67.353 60.3797 68.852 58.1013C68.364 57.0963 67.9344 56.404 67.2177 56.0591ZM59.7829 43.9002C59.0888 46.381 57.9752 48.6733 56.4632 50.7539C55.5586 51.9973 54.5517 52.0252 53.5012 50.9441C53.2615 50.6985 53.0258 50.4496 52.7872 50.2018C52.5259 49.9296 52.2608 49.6639 52.0089 49.3885C51.3407 48.6578 51.2704 47.8462 51.7078 46.9849C52.425 45.5756 53.1268 44.1591 53.7947 42.7272C54.243 41.7649 54.8522 41.3234 55.9184 41.391C56.7267 41.4414 57.5386 41.5185 58.3399 41.6499C59.5316 41.8396 60.1125 42.7283 59.7829 43.9002ZM45.5013 46.601C40.1639 51.061 32.5668 50.3335 28.2919 45.1874C23.6376 39.5801 24.9941 32.1878 29.6326 28.1926C34.971 23.5943 42.6387 24.5712 46.7692 29.4224C51.3951 34.6524 50.3919 42.5121 45.5013 46.601ZM48.4425 48.6083C48.064 49.0552 47.2627 49.065 46.8577 48.6665C46.3699 48.1281 46.3131 47.5511 46.7882 46.9957C47.1818 46.5328 48.0789 46.5344 48.4636 46.9984C48.8959 47.5186 48.8789 48.094 48.4425 48.6083ZM34.3634 52.1225C33.9725 52.5099 33.0735 52.5178 32.7129 52.0592C32.3022 51.5355 32.3098 50.9528 32.7424 50.4498C33.1476 49.9797 33.9985 50.0064 34.4045 50.4899C34.8412 51.0082 34.8247 51.5598 34.3634 52.1225ZM24.1078 26.8613C23.3725 27.5809 22.5609 27.7289 21.6413 27.2787C20.9721 26.9519 20.2976 26.6302 19.6332 26.2918C18.5873 25.7597 18.238 24.6632 18.9276 23.7258C19.7384 22.6209 20.5592 21.5107 21.522 20.5852C22.4854 19.6619 23.5567 18.9425 24.6129 18.2356C25.6433 17.5463 26.7263 17.9037 27.2425 18.9982C27.5603 19.6719 27.8587 20.3574 28.1436 21.0456C28.5386 22.0028 28.3541 22.7787 27.6025 23.4972C26.4346 24.6132 25.2632 25.7302 24.1078 26.8613ZM24.3464 41.6683C23.8776 42.1323 23.2443 42.1001 22.7243 41.6689C22.272 41.2947 22.2963 40.3573 22.7668 39.9881C23.3021 39.5674 23.8557 39.5512 24.437 40.1672C24.872 40.6133 24.8039 41.216 24.3464 41.6683ZM15.2097 31.4246C15.3198 30.982 15.2622 30.32 15.8392 29.9283C16.324 29.5974 17.0783 29.7506 17.6442 29.9099C18.4396 30.1336 19.1882 30.56 19.9262 30.9617C20.8755 31.482 21.1414 32.2262 20.9934 33.3349C20.793 34.8477 20.6369 36.371 20.5092 37.8917C20.4202 38.9235 19.9611 39.5793 18.9582 39.8642C18.2391 40.0687 17.5114 40.2621 16.7799 40.4158C15.4451 40.6985 14.5834 40.03 14.4874 38.6727C14.3159 36.2149 14.6194 33.8021 15.2097 31.4246ZM13.8419 27.8403C13.0189 27.0047 13.0081 25.7957 13.8111 24.9962C14.6473 24.1622 15.9483 24.1703 16.7436 25.0141C17.4649 25.7791 17.4384 27.0488 16.6895 27.8263C15.9071 28.6357 14.6286 28.6411 13.8419 27.8403ZM28.406 26.1733C28.8226 26.6611 28.8405 27.1913 28.4085 27.6832C27.9569 28.1974 27.223 28.2126 26.7555 27.7281C26.2572 27.2097 26.3408 26.6719 26.6508 26.2418C27.2173 25.6715 27.9729 25.6704 28.406 26.1733ZM32.0179 14.9238C34.6726 14.2169 37.382 14.0589 40.1085 14.3827C40.4547 14.4233 40.8549 14.5556 41.1246 14.828C41.3938 15.1015 41.5804 15.5287 41.5166 15.7868C41.1987 17.0734 40.8887 18.3839 40.3452 19.581C40.1645 19.9819 39.322 20.2156 38.7525 20.2846C37.24 20.4694 35.705 20.4943 34.1841 20.6396C33.1555 20.7356 32.3929 20.4356 31.9213 19.519C31.5385 18.7715 31.2012 17.9957 30.8998 17.2114C30.5078 16.1836 30.9593 15.2086 32.0179 14.9238ZM48.6205 24.4027C47.7437 23.6252 46.7214 23.0032 45.7372 22.3545C44.8314 21.7598 44.4759 21.0208 44.74 19.9741C44.9229 19.2496 45.1363 18.5318 45.3657 17.8195C45.785 16.5185 46.8044 16.0132 47.9864 16.7193L53.7498 20.81C55.1787 22.295 55.0876 23.1699 53.3875 24.3053C53.2845 24.3737 53.1974 24.4681 53.0897 24.5333C51.4167 25.5911 50.897 26.4276 48.6205 24.4027ZM50.7991 33.1008C51.1611 32.6493 52.1293 32.6464 52.4894 33.1014C52.9079 33.6338 52.9203 34.2482 52.4361 34.72C51.9513 35.1942 51.3683 35.1704 50.8437 34.697C50.3424 34.18 50.3749 33.6251 50.7991 33.1008ZM60.6835 35.6934C60.7698 36.8044 59.9637 37.6288 58.848 37.5787C57.9752 37.54 57.0998 37.4635 56.2384 37.3171C55.3137 37.1607 54.7924 36.5377 54.5763 35.6311C54.2175 34.1164 53.8626 32.5993 53.4641 31.094C53.2252 30.1961 53.3145 29.4278 54.0398 28.7753C54.813 28.2551 55.5616 27.6853 56.3694 27.2216C57.2743 26.7038 58.338 27.0972 58.7841 28.0957C59.8725 30.5116 60.4755 33.0581 60.6835 35.6934ZM59.6742 24.9483C58.8804 25.738 57.6171 25.7259 56.812 24.9191C56.0155 24.1202 56.0206 22.8647 56.8228 22.0539C57.6081 21.2642 58.8721 21.2783 59.6782 22.0872C60.4742 22.8861 60.4736 24.1535 59.6742 24.9483ZM61.1873 14.733C61.6126 15.1754 61.5988 15.8823 61.1543 16.3092C60.712 16.7342 60.0059 16.7198 59.5806 16.2772C59.1545 15.8341 59.1675 15.1275 59.6098 14.7022C60.0537 14.2756 60.7612 14.2896 61.1873 14.733ZM57.6089 8.20859C58.0526 7.78223 58.759 7.79576 59.1843 8.23835C59.6114 8.68257 59.5957 9.38811 59.1526 9.8142C58.7103 10.2395 58.005 10.227 57.5776 9.78282C57.1526 9.34023 57.1669 8.6336 57.6089 8.20859ZM56.8501 20.4001C56.7146 20.6317 56.4083 20.9328 56.4083 20.9328C54.9209 19.6251 53.789 18.6476 52.1504 17.4486C50.524 16.2534 48.9741 15.3609 47.3923 14.4078C47.3923 14.4078 47.7372 13.9355 47.9737 13.678C49.0801 12.4589 50.5989 12.1116 52.0105 13.0043C53.4798 13.9282 54.9047 14.9427 56.2309 16.0597C57.7023 17.2955 57.8186 18.7477 56.8501 20.4001ZM50.6468 8.16044C51.091 7.73327 51.7947 7.74896 52.2205 8.19209C52.6479 8.6363 52.6347 9.33942 52.1904 9.76632C51.747 10.1924 51.0428 10.1797 50.6154 9.73521C50.1899 9.29208 50.2034 8.58653 50.6468 8.16044ZM46.565 2.73842C47.0087 2.3126 47.712 2.3264 48.1381 2.7698C48.5648 3.21321 48.552 3.91876 48.1089 4.34457C47.6647 4.77147 46.9597 4.75578 46.5333 4.31238C46.1072 3.86952 46.1208 3.16586 46.565 2.73842ZM43.1078 12.0009C43.9116 11.2377 45.2102 11.2583 45.9641 12.0445C46.7151 12.829 46.7021 14.1416 45.936 14.9208C45.1555 15.7159 43.8935 15.7056 43.1081 14.8999C42.2559 14.0269 42.2554 12.8128 43.1078 12.0009ZM42.3923 24.338C41.8707 24.7135 41.3099 24.7711 40.9103 24.361C40.3341 23.7515 40.3325 23.0157 40.8448 22.6072C41.3764 22.1857 41.9538 22.2352 42.451 22.6594C42.8828 23.0276 42.8487 24.0091 42.3923 24.338ZM40.1571 5.2073C40.6014 4.7804 41.3064 4.79366 41.7322 5.23706C42.1588 5.68101 42.1453 6.38655 41.7016 6.81373C41.2571 7.24063 40.5524 7.22548 40.1255 6.7818C39.6991 6.33813 39.7132 5.63393 40.1571 5.2073ZM34.3328 1.54321C34.7757 1.11658 35.4813 1.132 35.9076 1.57567C36.3332 2.01853 36.3207 2.72381 35.8776 3.1499C35.4336 3.57653 34.7286 3.56138 34.3025 3.11852C33.8765 2.67512 33.8889 1.96957 34.3328 1.54321ZM33.0102 9.49633C34.7265 9.2496 36.4695 9.09946 38.2017 9.08836C40.1255 9.07538 41.1549 10.1056 41.4909 11.9928C41.5369 12.2541 41.4985 12.6848 41.4985 12.6848C39.5168 12.6537 38.0226 12.6426 35.9982 12.7914C33.9833 12.9378 32.2238 13.2657 30.4044 13.5622C30.4044 13.5622 30.3614 12.9794 30.3714 12.6275C30.4245 10.9853 31.3554 9.73656 33.0102 9.49633ZM29.1935 5.92016C29.6375 5.49326 30.3406 5.50814 30.7661 5.95073C31.1939 6.39575 31.1809 7.09887 30.7367 7.52577C30.2927 7.9524 29.5891 7.9386 29.1611 7.4933C28.7361 7.05071 28.7499 6.34679 29.1935 5.92016ZM26.1395 13.152C26.9589 12.3789 28.257 12.4024 28.9871 13.2013C29.7654 14.0524 29.7251 15.3994 28.9006 16.1485C28.1268 16.8524 26.7374 16.7812 26.0153 16.0007C25.2586 15.1835 25.3144 13.9328 26.1395 13.152ZM22.4878 4.48065C22.9318 4.05375 23.6382 4.0689 24.0648 4.51257C24.4909 4.95544 24.4768 5.66153 24.0334 6.08816C23.5905 6.51343 22.8847 6.49937 22.4589 6.0565C22.0323 5.61256 22.0453 4.9062 22.4878 4.48065ZM19.0992 10.3344C19.5447 9.90591 20.2508 9.91998 20.6758 10.3626C21.1027 10.8065 21.0886 11.5118 20.6431 11.9403C20.2013 12.3648 19.4963 12.351 19.0694 11.907C18.6438 11.4647 18.6576 10.7589 19.0992 10.3344ZM16.2004 18.8933C17.3575 17.6042 18.6276 16.4001 19.9527 15.2776C21.2274 14.1982 22.7797 14.3302 24.0426 15.3818C24.315 15.6063 24.7238 16.0248 24.7238 16.0248C23.29 17.1916 21.8794 18.2886 20.4329 19.6981C18.9817 21.1154 17.9959 22.2403 16.7063 23.7437C16.7063 23.7437 16.3595 23.488 16.1934 23.2792C15.003 21.7758 14.9164 20.3212 16.2004 18.8933ZM12.3531 11.1347C12.7976 10.7078 13.5018 10.7224 13.9282 11.1658C14.3554 11.61 14.3402 12.3131 13.8965 12.7395C13.4529 13.1656 12.75 13.1528 12.3234 12.7089C11.897 12.2655 11.91 11.561 12.3531 11.1347ZM11.0749 18.0489C11.5183 17.6229 12.2246 17.6361 12.6499 18.0787C13.0766 18.5226 13.0617 19.2285 12.6188 19.6546C12.1749 20.0815 11.4696 20.0679 11.0427 19.6237C10.6171 19.1811 10.6312 18.4756 11.0749 18.0489ZM5.14372 21.1544C5.58821 20.7272 6.29511 20.7416 6.72147 21.1852C7.14783 21.6284 7.13295 22.335 6.68928 22.7619C6.24723 23.1861 5.54087 23.1731 5.11505 22.73C4.68869 22.2863 4.70221 21.5789 5.14372 21.1544ZM1.69173 32.9223C2.13351 32.497 2.84149 32.51 3.26785 32.9534C3.6934 33.3965 3.67879 34.1043 3.2362 34.5293C2.79279 34.9553 2.08616 34.9418 1.66062 34.4992C1.23426 34.0553 1.24778 33.3487 1.69173 32.9223ZM4.03724 46.7124C3.59438 47.1382 2.88883 47.1236 2.46274 46.6797C2.03666 46.2368 2.05072 45.5332 2.49359 45.1068C2.93699 44.6805 3.642 44.6932 4.06809 45.1363C4.49472 45.5794 4.48092 46.2866 4.03724 46.7124ZM6.58864 40.3676C6.14524 40.7934 5.4405 40.7791 5.01414 40.3354C4.58805 39.8926 4.60104 39.1873 5.04417 38.7615C5.48784 38.3346 6.19339 38.35 6.61921 38.7926C7.0453 39.2357 7.03177 39.9405 6.58864 40.3676ZM6.26968 29.5001C5.8444 29.0577 5.8582 28.3535 6.30214 27.9266C6.74528 27.5005 7.4492 27.5146 7.87475 27.9572C8.30246 28.4022 8.28867 29.1062 7.8458 29.532C7.40105 29.9589 6.69766 29.9451 6.26968 29.5001ZM9.25366 51.1021C8.81242 51.5268 8.10606 51.5147 7.67862 51.071C7.2528 50.6276 7.26849 49.9212 7.71027 49.4965C8.15421 49.0696 8.86084 49.0818 9.28693 49.5246C9.7141 49.9688 9.69814 50.6757 9.25366 51.1021ZM9.2239 36.9462C9.30343 35.2156 9.52446 33.4774 9.83828 31.7723C10.1402 30.1318 11.4266 29.2493 13.069 29.2609C13.4228 29.2633 14.0037 29.3293 14.0037 29.3293C13.6322 31.1387 13.237 32.8823 13.0095 34.8915C12.7828 36.907 12.7349 38.4006 12.6897 40.3801C12.6897 40.3801 12.2585 40.4006 11.9982 40.3452C10.1234 39.9375 9.13625 38.8675 9.2239 36.9462ZM12.042 41.8723C12.875 41.0856 14.0789 41.1211 14.8843 41.9605C15.6555 42.7643 15.6334 44.0699 14.8345 44.8255C14.0564 45.5583 12.6954 45.5167 11.9422 44.7351C11.1831 43.9484 11.2302 42.6396 12.042 41.8723ZM13.7891 60.298C13.3633 59.8552 13.376 59.1488 13.8192 58.7225C14.2626 58.2966 14.9695 58.311 15.3956 58.7536C15.8211 59.1964 15.807 59.9028 15.3636 60.3292C14.9205 60.7552 14.2144 60.7409 13.7891 60.298ZM17.5201 66.7935C17.0769 67.2193 16.3716 67.2061 15.9464 66.7635C15.5189 66.3185 15.533 65.6132 15.9761 65.1874C16.4195 64.761 17.1245 64.7754 17.552 65.2196C17.9775 65.6624 17.9632 66.3672 17.5201 66.7935ZM19.9676 55.8724C18.2892 56.8033 16.8407 56.6507 15.6382 55.1522C14.5575 53.7985 13.576 52.3482 12.687 50.8602C11.8308 49.4256 12.2133 47.9144 13.4561 46.8393C13.7226 46.6083 14.2028 46.2728 14.2028 46.2728C15.1172 47.8765 15.9723 49.4494 17.1275 51.1059C18.2876 52.7702 19.2382 53.9259 20.5092 55.4439C20.5089 55.4439 20.1975 55.7444 19.9676 55.8724ZM24.371 66.8273C23.929 67.2515 23.2213 67.2386 22.7957 66.7957C22.3699 66.3523 22.385 65.6459 22.8268 65.2212C23.2708 64.7943 23.9782 64.8065 24.404 65.2496C24.8296 65.6925 24.815 66.4004 24.371 66.8273ZM24.3196 58.9254C23.4861 59.7115 22.2592 59.6831 21.4698 58.8599C20.6731 58.0312 20.6893 56.7938 21.508 56.0066C22.3331 55.2134 23.5518 55.2448 24.3561 56.0831C25.1629 56.9223 25.1458 58.1465 24.3196 58.9254ZM23.4555 53.2691C22.7765 54.098 21.6684 54.1123 20.909 53.3721C20.7067 53.176 20.4989 52.9847 20.3239 52.7645C19.2401 51.3964 16.5272 46.9115 16.5272 46.9115C15.899 45.758 16.4387 44.7373 17.6913 44.3815C18.4399 44.1664 19.1993 43.9825 19.9613 43.8321C21.0329 43.617 21.7052 44.0133 22.2836 44.9437C23.0846 46.2366 23.9349 47.5032 24.8282 48.7338C25.3842 49.5043 25.5278 50.2683 25.0265 51.0677C24.5469 51.8282 24.0253 52.5732 23.4555 53.2691ZM28.4723 72.1958C28.0284 72.6227 27.3231 72.6089 26.8973 72.1663C26.4714 71.7224 26.4855 71.0171 26.9289 70.5907C27.3718 70.1654 28.0776 70.1782 28.5037 70.6213C28.9303 71.0644 28.9149 71.7705 28.4723 72.1958ZM34.8617 69.8132C34.4178 70.2401 33.7125 70.2258 33.2856 69.7821C32.8598 69.3387 32.8736 68.6329 33.3175 68.2065C33.7609 67.7802 34.467 67.7934 34.8931 68.2365C35.3203 68.681 35.3057 69.3869 34.8617 69.8132ZM35.9582 62.9733C35.2518 64.7561 34.0355 65.5583 32.1545 65.1598C30.4594 64.8005 28.7802 64.3038 27.1497 63.7173C25.5781 63.1519 24.9156 61.7405 25.194 60.1206C25.2551 59.7719 25.4112 59.2102 25.4112 59.2102C27.1372 59.8687 28.795 60.5429 30.7386 61.0896C32.6937 61.6423 34.1589 61.9318 36.104 62.2992C36.1043 62.2992 36.0561 62.7261 35.9582 62.9733ZM34.9878 60.3638C32.3607 60.0773 29.842 59.3763 27.4792 58.1762C26.4016 57.629 26.1676 56.4705 26.8737 55.4882C27.2906 54.905 27.7145 54.3263 28.1425 53.7514C28.2047 53.6673 28.29 53.5997 28.2605 53.6329C29.1024 52.7437 29.8772 52.715 30.7932 53.0253C32.1775 53.4914 33.5892 53.8886 35.0062 54.246C36.0348 54.4981 36.6781 55.0638 36.7985 56.1153C36.8948 56.9207 36.9546 57.7323 36.9619 58.5447C36.9754 59.738 36.1771 60.492 34.9878 60.3638ZM40.6468 73.4311C40.2029 73.858 39.4979 73.8441 39.0712 73.401C38.6446 72.9571 38.6587 72.2518 39.1026 71.8254C39.5452 71.4002 40.2505 71.4134 40.6774 71.8571C41.1037 72.301 41.0894 73.0058 40.6468 73.4311ZM40.6192 63.6678C39.7581 64.4621 38.5678 64.4191 37.7848 63.5669C36.9973 62.7115 37.0498 61.5373 37.912 60.7241C38.7074 59.9753 39.958 59.9858 40.7104 60.7431C41.5328 61.5717 41.4914 62.8646 40.6192 63.6678ZM40.9972 57.7983C40.8108 54.6545 40.5118 54.283 43.8088 53.2499C44.5988 53.002 45.3346 52.5678 46.0696 52.1645C47.6147 51.3196 48.2236 51.3935 49.4302 52.6495C49.5817 52.8064 49.7327 52.9639 49.8847 53.1213C52.2408 55.2118 51.2227 56.3883 49.2627 57.3436C47.4537 58.2249 45.5846 59.0062 43.6846 59.6731C42.0244 60.2558 41.0997 59.5384 40.9972 57.7983ZM45.9076 69.0774C45.4631 69.5043 44.7567 69.4921 44.3301 69.0484C43.904 68.6056 43.9186 67.8976 44.3629 67.4707C44.8044 67.0459 45.5126 67.0592 45.9384 67.5023C46.3653 67.946 46.3488 68.6524 45.9076 69.0774ZM52.5516 70.5472C52.109 70.9724 51.4018 70.9603 50.9752 70.5161C50.548 70.0716 50.5635 69.3647 51.0055 68.9394C51.4508 68.5114 52.1566 68.5257 52.5835 68.97C53.0102 69.4139 52.9964 70.1192 52.5516 70.5472ZM51.2728 62.1888C49.7383 62.9915 48.1273 63.6805 46.496 64.27C44.9261 64.8376 43.5161 64.1729 42.6964 62.7477C42.5213 62.4407 42.2852 61.9066 42.2852 61.9066C44.0331 61.3128 45.7393 60.7769 47.5871 59.9585C49.4426 59.1375 50.7561 58.4251 52.4899 57.4661C52.4899 57.4661 52.7261 57.8275 52.8078 58.0802C53.4019 59.9036 52.975 61.299 51.2728 62.1888ZM56.0144 64.6431C55.5697 65.0705 54.8652 65.0589 54.438 64.6149C54.0117 64.171 54.0265 63.4652 54.4716 63.0377C54.915 62.6114 55.6192 62.6262 56.0455 63.0694C56.4722 63.5139 56.4578 64.2167 56.0144 64.6431ZM56.183 56.796C55.3403 57.567 54.0774 57.511 53.3332 56.6697C52.5543 55.7953 52.6252 54.6363 53.5052 53.8396C54.3666 53.0597 55.5913 53.1051 56.3488 53.9459C57.102 54.7819 57.0287 56.0242 56.183 56.796ZM62.785 63.7993C62.3414 64.2256 61.635 64.2135 61.2076 63.7687C60.7815 63.3258 60.7977 62.6195 61.2411 62.1937C61.684 61.7684 62.3901 61.7795 62.8156 62.2226C63.2433 62.6674 63.2274 63.374 62.785 63.7993Z" fill="#2E353A"/>
                <path d="M81.1551 19.0334C81.2054 17.8677 80.8212 16.9727 80.301 15.4583C80.2163 15.2132 79.1729 12.6634 79.0563 12.4313C77.7204 9.75791 76.3001 7.4922 74.7291 5.05199C74.1853 4.20631 73.3984 3.8189 72.4226 3.8676C71.6215 3.90602 70.9003 4.15382 70.4974 4.95866C69.3531 7.22789 68.9486 8.7123 67.7791 9.27501H63.5304V17.6634C64.1145 19.6113 62.6728 19.9816 62.02 23.8099C61.9378 24.1941 61.8834 24.5882 61.8583 24.9905C61.8572 25.0011 61.8561 25.0105 61.8547 25.0211H61.8561C61.8466 25.1802 61.8407 25.3401 61.8407 25.501C61.8407 27.3425 62.4621 29.0366 63.5025 30.3928L63.4934 30.3868C63.4934 30.3868 63.5096 30.4047 63.5353 30.4355C63.574 30.4853 63.6102 30.5362 63.6503 30.5849C63.8626 30.8806 64.2178 31.4822 64.2178 32.2102C64.2178 33.1295 63.4934 33.9993 63.4934 33.9993L63.5023 33.9936C62.4283 35.3611 61.7847 37.0825 61.7847 38.9562C61.7847 39.1175 61.7906 39.2771 61.8004 39.4359H61.799C61.8001 39.4464 61.8017 39.4559 61.8025 39.4665C61.828 39.869 61.8823 40.2632 61.9643 40.6473C62.6171 44.4754 64.059 44.846 63.4747 46.7936V55.1822H67.7231C68.8935 55.7449 69.2971 57.2291 70.4417 59.498C70.8445 60.3034 71.5658 60.5507 72.3668 60.5891C73.3424 60.6378 74.1302 60.2504 74.6737 59.405C76.2444 56.9648 77.6647 54.6991 79.0011 52.0257C79.1172 51.7933 80.1609 49.2443 80.245 48.9987C80.7652 47.4842 81.1497 46.5899 81.0996 45.4236C81.104 44.4762 77.8497 43.7428 77.8497 39.9537L77.8227 39.9531C77.8632 39.6261 77.8865 39.2936 77.8865 38.956C77.8865 37.925 77.6912 36.9402 77.3379 36.0345C77.3379 36.0334 77.3384 36.0318 77.3379 36.0307C77.0928 35.3119 77.3644 34.6899 77.6246 34.3063L78.1189 34.9607L78.519 34.6588L77.9549 33.9119C77.9625 33.9054 77.9693 33.8994 77.972 33.8975C78.6299 33.6194 79.0912 32.9683 79.0912 32.2097C79.0912 31.4511 78.6302 30.8002 77.9725 30.5221C77.9552 30.5148 77.9371 30.5097 77.92 30.5029C77.9184 30.5018 77.9171 30.5005 77.9152 30.4994C77.8916 30.4845 77.8697 30.4691 77.8478 30.4542L78.519 29.5647L78.1189 29.2628L77.4783 30.1112C76.9296 29.4056 77.3379 28.5643 77.3379 28.5643L77.3341 28.5686C77.7245 27.6231 77.942 26.5877 77.942 25.5007C77.942 25.1629 77.9187 24.8304 77.8784 24.5033L77.9052 24.5025C77.9054 20.7142 81.1597 19.9803 81.1551 19.0334ZM73.374 6.00535C74.1943 6.00535 74.8595 6.67032 74.8595 7.49111C74.8595 8.31191 74.1943 8.97688 73.374 8.97688C72.5532 8.97688 71.8883 8.31191 71.8883 7.49111C71.8883 6.67032 72.5532 6.00535 73.374 6.00535ZM70.9408 11.1495C72.4591 11.1495 72.2188 14.0183 72.2188 14.8631C72.2188 15.7083 71.5336 16.3935 70.6884 16.3935C69.8433 16.3935 69.158 15.7083 69.158 14.8631C69.1578 14.018 69.5338 11.1495 70.9408 11.1495ZM70.8851 53.3077C69.4783 53.3077 69.102 50.4395 69.102 49.5941C69.102 48.7487 69.787 48.0634 70.6327 48.0634C71.4776 48.0634 72.1626 48.7487 72.1626 49.5941C72.1626 50.4395 72.4031 53.3077 70.8851 53.3077ZM73.374 58.4151C72.5532 58.4151 71.8883 57.7504 71.8883 56.9299C71.8883 56.1088 72.5532 55.4441 73.374 55.4441C74.1943 55.4441 74.8595 56.1088 74.8595 56.9299C74.8595 57.7504 74.1943 58.4151 73.374 58.4151ZM77.831 32.2311C77.831 33.0516 77.1655 33.7168 76.3455 33.7168C75.5245 33.7168 74.8595 33.0516 74.8595 32.2311C74.8595 31.4105 75.5245 30.7453 76.3455 30.7453C77.1655 30.7453 77.831 31.4105 77.831 32.2311Z" fill="#2E353A"/>
              </svg>

              <?php $brake = get_post_meta( $product->id, 'brake' )[0]; ?>
              <?php if($brake){ ?>
                <p class="singleFeatureDesc"><?php echo $brake; ?></p>
              <?php } ?>
            </figure>

            <figure class="singleFeature">
              <svg class="singleFeatureIcon" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="300px" height="300px" viewBox="0 0 300 300" enable-background="new 0 0 300 300" xml:space="preserve">
                <path fill="#2E353A" d="M262.026,2.175c-20.434,0.266-37.379,17.215-37.451,37.458c-0.021,5.982,1.541,11.773,4.254,16.964l-7.171,7.038l-15.922-15.92l-18.009,19.354l-24.909-25.626l-18.101,18.816l34.677,34.677l-5.466,4.569l-9.05-10.394l-7.168,7.348l-34.647-15.293l-18.638,18.638l34.288,34.288l-5.375,5.376l-9.559-9.318l-6.452,6.451l-34.287-15.89l-18.638,18.638l33.93,33.931l-5.138,5.136l-9.678-9.198l-6.332,6.33l-34.417-14.325l-18.15,18.15l24.373,23.894L33.46,218.08c0,0,6.882,6.811,15.302,15.184l-7.733,7.588c-3.587-1.542-7.517-2.378-11.616-2.324c-16.048,0.208-29.356,13.52-29.412,29.418c-0.056,15.675,13.637,29.73,29.103,29.881c15.452,0.15,29.942-13.808,30.129-29.02c0.052-4.199-0.789-8.225-2.333-11.894l7.846-7.698c7.925,7.947,14.264,14.388,14.353,14.743c0.239,0.955,8.602-8.603,8.602-8.603l-14.576-14.576l6.93-5.733c0,0,38.23,38.947,38.23,39.664c0,0.718,18.398-18.398,18.398-18.398L112.072,231.7l5.019-5.019l-17.205-7.406l6.452-6.452l52.686,22.58l17.683-17.681l-25.089-25.09l6.094-6.093l-16.249-7.646l4.063-5.019l53.284,22.222l18.397-18.399l-24.73-24.729l5.137-5.139l-16.964-7.885l6.212-6.212l52.21,22.819l18.04-18.042l-24.373-24.85l19.475-19.473l-14.587-14.588l6.845-6.715c5.205,2.981,11.076,4.736,17.163,4.795c19.674,0.191,38.127-17.582,38.365-36.95C300.257,19.597,282.831,1.905,262.026,2.175zM29.517,273.988c-3.031-0.029-5.714-2.785-5.705-5.857c0.012-3.117,2.62-5.726,5.766-5.767c3.201-0.042,5.885,2.682,5.844,5.937C35.386,271.282,32.545,274.018,29.517,273.988z M262.074,52.232c-6.418-0.063-12.1-5.896-12.077-12.4c0.022-6.599,5.546-12.123,12.205-12.209c6.782-0.088,12.46,5.678,12.377,12.566C274.501,46.501,268.487,52.293,262.074,52.232z"/>
              </svg>

              <?php $suspension = get_post_meta( $product->id, 'suspension' )[0]; ?>
              <?php if($suspension){ ?>
                <p class="singleFeatureDesc"><?php echo $suspension; ?></p>
              <?php } ?>
            </figure>




          </div>
        <?php } ?>

      </div>









      <div class="singleSide singleSide2">


        <?php if(!$product->is_type( 'auction' )){ ?>
          <?php // testimonial( 'none' ); ?>
        <?php } ?>

        <div class="superFicha">
          <div>
            <p class="singleSideStock2">STOCK #</p>


            <?php if($stockNumber){ ?>
              <p class="singleStock2ID"><?php echo $stockNumber; ?></p>
            <?php } ?>
          </div>
          <figure class="singleSideSintBox">
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
            <figcaption class="singleSideSintBoxCaption">
              <h4 class="singleSideAnoMarca">
                <?php
                // get all the categories on the product
                // $categories = get_the_terms( get_the_ID(), 'product_cat' );
                // for each category
                if($categories){ ?>
                  <h4 class="singleSideAnoMarca">
                    <?php foreach ($categories as $cat) {
                      // get the parent category
                      $parent=get_term_by('id', $cat->parent, 'product_cat', 'ARRAY_A')['slug'];
                      // check if parent is either year or brand
                      if ($parent=="year-bikes" OR $parent=="brand") { ?>
                        <span><?php echo $cat->name; ?></span>
                      <?php }
                    } ?>
                  </h4>
                <?php }
                ?>
              </h4>
              <h4 class="singleSideTitle"><?php the_title(); ?></h4>
              <p class="singleSidePrice"><?php echo $product->get_price_html(); ?></p>
              <!-- <p class="singleSideData"><?php echo excerpt(140); ?></p> -->

              <a class="singleSideContact" href="tel:+34-938-364-911">Contact Us:<br> +34 938 36 49 11</a>


              <div class="singleSideSocialCont socialMedia">

                <a href="https://www.instagram.com/gpmotorbikes/?hl=es" target="_blank" class="socialMediaLink socialMediaInst">
                  <svg viewBox="0 0 501 500" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M250.112 121.806C179.153 121.806 121.918 179.042 121.918 250C121.918 320.958 179.153 378.194 250.112 378.194C321.07 378.194 378.305 320.958 378.305 250C378.305 179.042 321.07 121.806 250.112 121.806ZM250.112 333.343C204.256 333.343 166.769 295.967 166.769 250C166.769 204.033 204.145 166.657 250.112 166.657C296.078 166.657 333.454 204.033 333.454 250C333.454 295.967 295.967 333.343 250.112 333.343V333.343ZM413.45 116.563C413.45 133.186 400.061 146.463 383.549 146.463C366.925 146.463 353.648 133.075 353.648 116.563C353.648 100.05 367.037 86.6618 383.549 86.6618C400.061 86.6618 413.45 100.05 413.45 116.563ZM498.354 146.91C496.458 106.856 487.309 71.3768 457.966 42.1455C428.735 12.9142 393.256 3.76548 353.202 1.75722C311.921 -0.585741 188.19 -0.585741 146.91 1.75722C106.968 3.65391 71.4883 12.8026 42.1455 42.0339C12.8026 71.2652 3.76548 106.744 1.75722 146.798C-0.585741 188.079 -0.585741 311.81 1.75722 353.09C3.65391 393.144 12.8026 428.623 42.1455 457.855C71.4883 487.086 106.856 496.234 146.91 498.243C188.19 500.586 311.921 500.586 353.202 498.243C393.256 496.346 428.735 487.197 457.966 457.855C487.197 428.623 496.346 393.144 498.354 353.09C500.697 311.81 500.697 188.19 498.354 146.91V146.91ZM445.024 397.384C436.322 419.251 419.475 436.098 397.495 444.912C364.582 457.966 286.483 454.954 250.112 454.954C213.74 454.954 135.529 457.855 102.728 444.912C80.8602 436.21 64.0132 419.363 55.1992 397.384C42.1455 364.471 45.1579 286.372 45.1579 250C45.1579 213.628 42.2571 135.418 55.1992 102.616C63.9016 80.7486 80.7486 63.9016 102.728 55.0876C135.641 42.0339 213.74 45.0463 250.112 45.0463C286.483 45.0463 364.694 42.1455 397.495 55.0876C419.363 63.79 436.21 80.6371 445.024 102.616C458.078 135.529 455.065 213.628 455.065 250C455.065 286.372 458.078 364.582 445.024 397.384Z" fill="currentColor"/>
                  </svg>
                </a>

                <a href="https://es-la.facebook.com/gpmotorbikes/" target="_blank" class="socialMediaLink socialMediaFace">
                  <svg viewBox="0 0 313 500" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M272.598 281.25L286.484 190.762H199.658V132.041C199.658 107.285 211.787 83.1543 250.674 83.1543H290.146V6.11328C290.146 6.11328 254.326 0 220.078 0C148.574 0 101.836 43.3398 101.836 121.797V190.762H22.3535V281.25H101.836V500H199.658V281.25H272.598Z" fill="currentColor"/>
                  </svg>
                </a>

                <a href="https://www.youtube.com/" target="_blank" class="socialMediaLink socialMediaYouT">
                  <svg viewBox="0 0 547 384" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M534.722 60.083C528.441 36.433 509.935 17.807 486.438 11.486C443.848 0 273.067 0 273.067 0C273.067 0 102.287 0 59.696 11.486C36.199 17.808 17.693 36.433 11.412 60.083C0 102.95 0 192.388 0 192.388C0 192.388 0 281.826 11.412 324.693C17.693 348.343 36.199 366.193 59.696 372.514C102.287 384 273.067 384 273.067 384C273.067 384 443.847 384 486.438 372.514C509.935 366.193 528.441 348.343 534.722 324.693C546.134 281.826 546.134 192.388 546.134 192.388C546.134 192.388 546.134 102.95 534.722 60.083ZM217.212 273.591V111.185L359.951 192.39L217.212 273.591Z" fill="currentColor"/>
                  </svg>
                </a>

                <a href="https://wa.me/15551234567" target="_blank" class="socialMediaLink socialMediaWhatsapp">
                  <svg viewBox="0 0 500 500" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M425.112 72.6563C378.348 25.7812 316.071 0 249.888 0C113.281 0 2.12054 111.161 2.12054 247.768C2.12054 291.406 13.5045 334.04 35.1563 371.652L0 500L131.362 465.513C167.522 485.268 208.259 495.647 249.777 495.647H249.888C386.384 495.647 500 384.487 500 247.879C500 181.696 471.875 119.531 425.112 72.6563V72.6563ZM249.888 453.906C212.835 453.906 176.562 443.973 144.978 425.223L137.5 420.759L59.5982 441.183L80.3571 365.179L75.4464 357.366C54.7991 324.554 43.9732 286.719 43.9732 247.768C43.9732 134.263 136.384 41.8527 250 41.8527C305.022 41.8527 356.696 63.2812 395.536 102.232C434.375 141.183 458.259 192.857 458.147 247.879C458.147 361.496 363.393 453.906 249.888 453.906V453.906ZM362.835 299.665C356.696 296.54 326.228 281.585 320.536 279.576C314.844 277.455 310.714 276.451 306.585 282.701C302.455 288.951 290.625 302.79 286.942 307.031C283.371 311.161 279.688 311.719 273.549 308.594C237.165 290.402 213.281 276.116 189.286 234.933C182.924 223.996 195.647 224.777 207.478 201.116C209.487 196.987 208.482 193.415 206.92 190.29C205.357 187.165 192.969 156.696 187.835 144.308C182.813 132.254 177.679 133.929 173.884 133.705C170.313 133.482 166.183 133.482 162.054 133.482C157.924 133.482 151.228 135.045 145.536 141.183C139.844 147.433 123.884 162.388 123.884 192.857C123.884 223.326 146.094 252.79 149.107 256.92C152.232 261.049 192.746 323.549 254.911 350.446C294.196 367.411 309.598 368.862 329.241 365.96C341.183 364.174 365.848 351.004 370.982 336.496C376.116 321.987 376.116 309.598 374.554 307.031C373.103 304.241 368.973 302.679 362.835 299.665Z" fill="currentColor"/>
                  </svg>
                </a>
              </div>
            </figcaption>
          </figure>
        </div>
      </div>

      <main class="singleDescription"><?php echo the_content(); ?></main>

      <?php if($product->is_type( 'auction' )){ ?>
        <?php testimonial('onlyMobileG'); ?>
      <?php } ?>
    </article>




    <div class="singleFormContainer" id="singleRequestInfo">
      <form action="index.php" class="singleContact " action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
        <label  class="formLabelBig">More Info</label>
        <input type="hidden" name="action" value="lt_form_handler">
        <input type="hidden" name="link" value="<?php echo home_url( $wp->request ); ?>">
        <input type="text" name="a00" value="" placeholder="jeje" hidden>
        <p class="SingleContactCloseButton" onclick="altClassFromSelector('alt','#singleRequestInfo')">+</p>
        <label  class="formLabel">CONTACT DETAILS</label>
        <input type="text"   placeholder="Name*"   class="formInput100 formInput" name="a01" required>
        <input type="email"  placeholder="Email*"        class="formInput100 formInput" name="a03" required>
        <input type="number" placeholder="Phone"        class="formInput100 formInput" name="a04">
        <input type="text"   placeholder="Country*"      class="formInput100 formInput" name="a05" required>

        <label  class="formLabel">SUBJECT</label>
        <textarea class="singleFormTxtArea" value="SUBJECT" placeholder="" name="a08"></textarea>
        <div class="formTermsAndConditions">
           <input type="checkbox" name="a11" required>
           <a href="<?php echo site_url('privacy-policy'); ?>" target="_blank" class="linkTermAndConditionsForm">I accept terms and conditions</a>
        </div>
        <button class="singleContactButton contactButton" type="submit">SEND</button>
      </form>
    </div>



    <div class="singleFormContainer" id="singleMakeOffer">
      <form class="singleContact" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
        <input type="hidden" name="action" value="lt_form_handler">
        <input type="hidden" name="link" value="<?php echo home_url( $wp->request ); ?>">
        <input type="text" name="a00" value="" placeholder="jeje" hidden>
        <p class="SingleContactCloseButton" onclick="altClassFromSelector('alt','#singleMakeOffer')">+</p>
        <label  class="formLabelBig">Make An Offer</label>
        <label  class="formLabel"><?php the_title(); ?></label>
        <label  class="formLabel">OFFER AMOUNT</label>
        <div class="offerAmmountIcon">
          <input class="offerAmmountIconInput euro" type="radio" id="euro" name="a10" value="euro">
          <label class="offerAmmountIconLabel" for="euro">€</label>
          <input class="offerAmmountIconInput dollar" type="radio" id="dollar" name="a10" value="dollar">
          <div class="offerAmmountIconSignal"></div>
          <label class="offerAmmountIconLabel" for="dollar">$</label><br>
        </div>
        <input type="number" placeholder="Offer"        name="a01" class="formInput100 formInput offerAmmount">
        <input type="text"   placeholder="Name"         name="a02" class="formInput100 formInput" required>
        <input type="email"  placeholder="Email"        name="a04" class="formInput100 formInput" required>
        <input type="number" placeholder="Phone"        name="a03" class="formInput100 formInput">
        <input type="text"   placeholder="Country"      name="a05" class="formInput100 formInput" required>

        <label  class="formLabel">SUBJECT</label>
        <textarea class="singleFormTxtArea" value="" placeholder="SUBJECT" name="a08"></textarea>
        <div class="formTermsAndConditions">
           <input type="checkbox" name="a11">
           <a href="<?php echo site_url('privacy-policy'); ?>" target="_blank" class="linkTermAndConditionsForm">I accept terms and conditions</a>
        </div>
        <button class="singleRequestInfoButton contactButton" type="submit">SUBMIT OFFER</button>
      </form>
    </div>

    <div class="singleFormContainer" id="singleTrade">
      <form class="singleContact" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
        <input type="hidden" name="action" value="lt_form_handler">
        <input type="hidden" name="link" value="<?php echo home_url( $wp->request ); ?>">
        <input type="text" name="a00" value="" placeholder="jeje" hidden>
        <p class="SingleContactCloseButton" onclick="altClassFromSelector('alt','#singleTrade')">+</p>
        <label  class="formLabelBig">Trade this <?php the_title(); ?></label>
        <p class="singleFormTxt mainTxtType1">We are always looking for new inventory. If you are interested in trading your high quality bike for one of ours, simply fill out this form. A member of our sales department will be in touch within 24 hours. No one makes the trade-in process easier than <a href="amatumoto.com" target="_blank">Amatumoto Grand Prix Motorbikes</a>.</p>
        <input type="text"   placeholder="Name"       class="formInput50 formInput" name="a01" required>
        <input type="email"  placeholder="Email"      class="formInput50 formInput" name="a05" required>
        <input type="number" placeholder="Phone"      class="formInput50 formInput" name="a07">
        <input type="number" placeholder="Year"       class="formInput50 formInput" name="a02" required>
        <input type="text"   placeholder="Make"       class="formInput50 formInput" name="a04">
        <input type="text"   placeholder="Model"      class="formInput50 formInput" name="a06" required>
        <input type="text"   placeholder="vin"        class="formInput50 formInput" name="a08">
        <label  class="formLabel">Upload photos here</label>
        <input type="file" placeholder="upload files" class="formInput50 formInput" name="a09">
        <textarea class="singleFormTxtArea formInput50" value="comments" placeholder="your comments" name="a10"></textarea>
        <div class="formTermsAndConditions">
           <input type="checkbox" name="a11">
           <a href="<?php echo site_url('privacy-policy'); ?>" class="linkTermAndConditionsForm">I accept terms and conditions</a>
        </div>
        <button class="singleRequestInfoButton contactButton" type="submit">REQUEST TRADE IN</button>
      </form>
    </div>


<?php } wp_reset_query(); ?>
<?php get_footer(); ?>
