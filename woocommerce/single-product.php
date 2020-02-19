<?php get_header(); ?>
<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<?php while(have_posts()){the_post(); ?>
  <?php global $woocommerce, $product, $post; ?>

  <!-- <h1>single-product.php</h1> -->

  <article class="singlePage">

    <div class="singleSide singleSide1">
      <?php
      // $newness_days = 1;
      $created = strtotime( $product->get_date_created() );
      if ( ( time() - ( 60 * 60 * 24 * $newness_days ) ) < $created ) { ?>
        <span class="newArrival"><i>New arrival</i></span>
      <?php } ?>
      <?php
      // get all the categories on the product
      $categories = get_the_terms( get_the_ID(), 'product_cat' );
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
      <?php if($brand){ ?><h4 class="singleSideAnoMarca"><?php echo $brand; ?></h4><?php } ?>
      <h1 class="singleSideTitle"><?php the_title(); ?></h1>
      <?php if($yearBike){ ?><h4 class="singleSideAnoMarca"><?php echo $yearBike; ?></h4><?php } ?>
      <p class="singleSidePrice"><?php echo $product->get_price_html(); ?></p>
      <p class="singleSideStock">
        Stock # <?php echo $product->id; ?>
        <?php if (method_exists($product,'get_condition')) { ?>
          <br>Condition: <?php echo esc_html( $product->get_condition() ); ?>
        <?php } ?>
      </p>
      <p class="singleSideData"><?php echo excerpt(140); ?></p>

      <?php $video = get_post_meta( $product->id, 'video' )[0]; ?>
      <?php if($video){ ?>
          <!-- <video class="singleSideVideo" controls src="<?php echo $video; ?>"></video> -->
          <iframe class="singleSideVideo" src="https://www.youtube.com/embed/<?php echo $video; ?>"></iframe>
      <?php } ?>



      <!-- <div class="singleSideSocialCont">
        <a class="singleSocialLink" href="https://www.facebook.com/sharer/sharer.php?u=http://localhost/GPMotorbikes/producto/motomel-eameo-recatate-gp-1100cc/" target="_blank">
          <svg class="singleSocialSvg" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" class="svg-inline--fa fa-facebook-f fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg>
        </a>
        <a class="singleSocialLink" href="https://twitter.com/home?status=http://localhost/GPMotorbikes/producto/motomel-eameo-recatate-gp-1100cc/" target="_blank">
          <svg class="singleSocialSvg" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" class="svg-inline--fa fa-twitter fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg>
        </a>
        <a class="singleSocialLink" href="tel:+34-938-364-911">
          <svg class="singleSocialSvg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone" class="svg-inline--fa fa-phone fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="transform: scaleX(-1)"><path fill="currentColor" d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"></path></svg>
        </a>
      </div> -->



      <div class="singleSideSocialCont socialMedia">

        <a href="https://es-la.facebook.com/gpmotorbikes/" target="_blank" class="socialMediaLink socialMediaFace">
          <svg width="25" height="25" viewBox="0 0 313 500" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M272.598 281.25L286.484 190.762H199.658V132.041C199.658 107.285 211.787 83.1543 250.674 83.1543H290.146V6.11328C290.146 6.11328 254.326 0 220.078 0C148.574 0 101.836 43.3398 101.836 121.797V190.762H22.3535V281.25H101.836V500H199.658V281.25H272.598Z" fill="currentColor"/>
          </svg>
        </a>

        <a href="tel:+34 938 364 911" target="_blank" class="socialMediaLink socialMediaFono">
          <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
            <path d="M0 0h24v24H0z" fill="none"/>
            <path fill="currentColor" d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
          </svg>
        </a>

        <a href="https://wa.me/15551234567" target="_blank" class="socialMediaLink socialMediaWhatsapp">
          <svg viewBox="0 0 500 500" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M425.112 72.6563C378.348 25.7812 316.071 0 249.888 0C113.281 0 2.12054 111.161 2.12054 247.768C2.12054 291.406 13.5045 334.04 35.1563 371.652L0 500L131.362 465.513C167.522 485.268 208.259 495.647 249.777 495.647H249.888C386.384 495.647 500 384.487 500 247.879C500 181.696 471.875 119.531 425.112 72.6563V72.6563ZM249.888 453.906C212.835 453.906 176.562 443.973 144.978 425.223L137.5 420.759L59.5982 441.183L80.3571 365.179L75.4464 357.366C54.7991 324.554 43.9732 286.719 43.9732 247.768C43.9732 134.263 136.384 41.8527 250 41.8527C305.022 41.8527 356.696 63.2812 395.536 102.232C434.375 141.183 458.259 192.857 458.147 247.879C458.147 361.496 363.393 453.906 249.888 453.906V453.906ZM362.835 299.665C356.696 296.54 326.228 281.585 320.536 279.576C314.844 277.455 310.714 276.451 306.585 282.701C302.455 288.951 290.625 302.79 286.942 307.031C283.371 311.161 279.688 311.719 273.549 308.594C237.165 290.402 213.281 276.116 189.286 234.933C182.924 223.996 195.647 224.777 207.478 201.116C209.487 196.987 208.482 193.415 206.92 190.29C205.357 187.165 192.969 156.696 187.835 144.308C182.813 132.254 177.679 133.929 173.884 133.705C170.313 133.482 166.183 133.482 162.054 133.482C157.924 133.482 151.228 135.045 145.536 141.183C139.844 147.433 123.884 162.388 123.884 192.857C123.884 223.326 146.094 252.79 149.107 256.92C152.232 261.049 192.746 323.549 254.911 350.446C294.196 367.411 309.598 368.862 329.241 365.96C341.183 364.174 365.848 351.004 370.982 336.496C376.116 321.987 376.116 309.598 374.554 307.031C373.103 304.241 368.973 302.679 362.835 299.665Z" fill="currentColor"/>
          </svg>
        </a>



        <a class="socialMediaLink socialMediaMail" href="" target="_blank">
          <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor" d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z"></path>
          </svg>
        </a>


      </div>





      <div class="singleSideContactContainer">
        <button class="singleSideContact" onclick="altClassFromSelector('alt','#singleRequestInfo')">REQUEST MORE INFO</button>
        <button class="singleSideContact" onclick="altClassFromSelector('alt','#singleMakeOffer')">MAKE OFFER</button>
        <button class="singleSideContact" onclick="altClassFromSelector('alt','#singleTrade')">TRADE</button>
        <button class="singleSideContact" onclick="altClassFromSelector('alt','#singleFinance')">FINANCE</button>
      </div>



    </div>


    <div class="singleMain">







      <div class="gallery" id="gallery">
        <?php $attachment_ids = $product->get_gallery_attachment_ids(); ?>

        <div class="galleryMainCarousel">
          <img class="galleryMain galleryCarousel" onclick="altClassFromSelector('alt','#gallery')" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
          <?php $count=0; foreach( $attachment_ids as $attachment_id ) { ?>
            <img class="galleryMain galleryCarousel" onclick="altClassFromSelector('alt','#gallery')" src="<?php echo $image_link = wp_get_attachment_url( $attachment_id ); ?>" alt="">
          <?php $count++; } ?>
        </div>
        <button class="slideButton rowcol1 slideLeft" onclick="plusImgs(-1)">&#10094;</button>
        <button class="slideButton rowcol1 slideRight" onclick="plusImgs(+1)">&#10095;</button>


        <div class="galleryStock" id="galleryStock">
          <img class="galleryImgs" onclick="selectImgs(0)" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
          <?php $count=1; foreach( $attachment_ids as $attachment_id ) { ?>
            <img class="galleryImgs" onclick="selectImgs(<?php echo $count; ?>)" src="<?php echo $image_link = wp_get_attachment_url( $attachment_id ); ?>" alt="">
            <!-- <img class="galleryImgs" src="<?php echo $image_link = wp_get_attachment_url( $attachment_id ); ?>" alt="" onclick="gallerySingle('<?php echo $image_link = wp_get_attachment_url( $attachment_id ); ?>')"> -->
          <?php $count++; } ?>
          <div class="galleryFade"></div>
        </div>
        <button class="galleryMore" onclick="altClassFromSelector('alt', '#galleryStock')">More photos</button>
      </div>




      <?php function selection($v){return $v->slug;}$cates=array_map('selection',$categories); ?>
      <?php if (!in_array('parts-racing-products', $cates)) { ?>
      <div class="singleFeatures">


        <figure class="singleFeature">
          <svg class="singleFeatureIcon" viewBox="0 0 500 500" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M249.998 -0.53418C111.857 -0.53418 -0.549316 111.841 -0.549316 249.997C-0.549316 388.153 111.857 500.528 249.998 500.528C388.138 500.528 500.544 388.153 500.544 249.997C500.544 111.841 388.138 -0.53418 249.998 -0.53418ZM249.998 483.841C121.06 483.841 16.1694 378.935 16.1694 249.997C16.1694 121.06 121.06 16.1533 249.998 16.1533C378.935 16.1533 483.826 121.06 483.826 249.997C483.826 378.935 378.935 483.841 249.998 483.841Z" fill="black"/>
            <path d="M257.809 94.582C260.101 94.582 262.298 93.6717 263.919 92.0513C265.539 90.4308 266.45 88.233 266.45 85.9414V54.6914C266.45 52.3998 265.539 50.202 263.919 48.5816C262.298 46.9611 260.101 46.0508 257.809 46.0508C255.517 46.0508 253.32 46.9611 251.699 48.5816C250.079 50.202 249.168 52.3998 249.168 54.6914V85.9414C249.168 90.7227 253.043 94.582 257.809 94.582Z" fill="black"/>
            <path d="M85.9341 233.551H54.6841C52.3924 233.551 50.1947 234.461 48.5742 236.082C46.9538 237.702 46.0435 239.9 46.0435 242.191C46.0435 244.483 46.9538 246.681 48.5742 248.301C50.1947 249.922 52.3924 250.832 54.6841 250.832H85.9341C87.0688 250.832 88.1924 250.609 89.2407 250.174C90.289 249.74 91.2416 249.104 92.0439 248.301C92.8463 247.499 93.4828 246.546 93.917 245.498C94.3512 244.45 94.5747 243.326 94.5747 242.191C94.5747 241.057 94.3512 239.933 93.917 238.885C93.4828 237.836 92.8463 236.884 92.0439 236.082C91.2416 235.279 90.289 234.643 89.2407 234.209C88.1924 233.774 87.0688 233.551 85.9341 233.551V233.551Z" fill="black"/>
            <path d="M405.418 242.191C405.418 246.973 409.293 250.832 414.059 250.832H445.309C446.444 250.832 447.567 250.609 448.616 250.174C449.664 249.74 450.617 249.104 451.419 248.301C452.221 247.499 452.858 246.546 453.292 245.498C453.726 244.45 453.95 243.326 453.95 242.191C453.95 241.057 453.726 239.933 453.292 238.885C452.858 237.836 452.221 236.884 451.419 236.082C450.617 235.279 449.664 234.643 448.616 234.209C447.567 233.774 446.444 233.551 445.309 233.551H414.059C411.767 233.551 409.57 234.461 407.949 236.082C406.329 237.702 405.418 239.9 405.418 242.191V242.191Z" fill="black"/>
            <path d="M133.984 158.25C135.693 158.254 137.365 157.751 138.787 156.803C140.21 155.856 141.318 154.507 141.973 152.929C142.627 151.35 142.798 149.612 142.464 147.937C142.129 146.261 141.304 144.722 140.094 143.516L115.484 118.891C114.683 118.089 113.732 117.454 112.685 117.02C111.638 116.586 110.516 116.363 109.383 116.363C108.25 116.363 107.128 116.586 106.081 117.02C105.034 117.454 104.083 118.089 103.281 118.891C102.48 119.692 101.844 120.643 101.411 121.69C100.977 122.737 100.754 123.859 100.754 124.992C100.754 126.125 100.977 127.247 101.411 128.294C101.844 129.341 102.48 130.292 103.281 131.094L127.891 155.703C128.686 156.512 129.634 157.154 130.681 157.591C131.727 158.029 132.85 158.253 133.984 158.25V158.25Z" fill="black"/>
            <path d="M373.297 329.828C371.679 328.21 369.484 327.301 367.195 327.301C364.907 327.301 362.712 328.21 361.094 329.828C359.476 331.446 358.566 333.641 358.566 335.93C358.566 338.218 359.476 340.413 361.094 342.031L384.531 365.469C385.33 366.277 386.282 366.918 387.331 367.356C388.379 367.793 389.504 368.019 390.641 368.019C391.777 368.019 392.902 367.793 393.951 367.356C394.999 366.918 395.951 366.277 396.75 365.469C397.552 364.668 398.188 363.717 398.622 362.67C399.056 361.623 399.279 360.5 399.279 359.367C399.279 358.234 399.056 357.112 398.622 356.065C398.188 355.018 397.552 354.067 396.75 353.266L373.297 329.828Z" fill="black"/>
            <path d="M388.917 123.296C389.718 122.495 390.354 121.544 390.787 120.497C391.221 119.45 391.444 118.328 391.444 117.195C391.444 116.062 391.221 114.94 390.787 113.893C390.354 112.846 389.718 111.895 388.917 111.093C388.115 110.292 387.164 109.656 386.117 109.223C385.07 108.789 383.948 108.566 382.815 108.566C381.682 108.566 380.56 108.789 379.513 109.223C378.466 109.656 377.515 110.292 376.714 111.093L352.104 135.703C351.303 136.505 350.667 137.457 350.234 138.505C349.801 139.553 349.578 140.676 349.579 141.81C349.58 142.944 349.804 144.066 350.238 145.114C350.673 146.161 351.31 147.112 352.112 147.914C352.914 148.715 353.867 149.35 354.914 149.784C355.962 150.217 357.085 150.439 358.219 150.439C359.353 150.438 360.476 150.214 361.523 149.779C362.57 149.345 363.522 148.708 364.323 147.906L388.917 123.296V123.296Z" fill="black"/>
            <path d="M134.513 337.631L111.076 361.069C110.275 361.871 109.639 362.823 109.206 363.871C108.773 364.919 108.55 366.042 108.551 367.176C108.552 368.309 108.776 369.432 109.21 370.479C109.645 371.527 110.281 372.478 111.084 373.279C111.886 374.081 112.838 374.716 113.886 375.149C114.934 375.583 116.057 375.805 117.191 375.805C118.325 375.804 119.447 375.58 120.495 375.145C121.542 374.711 122.493 374.074 123.295 373.272L146.732 349.834C147.533 349.032 148.169 348.08 148.602 347.032C149.035 345.984 149.258 344.861 149.257 343.727C149.256 342.593 149.032 341.471 148.598 340.423C148.163 339.376 147.527 338.424 146.724 337.623C145.922 336.822 144.97 336.187 143.922 335.753C142.874 335.32 141.751 335.097 140.617 335.098C139.483 335.099 138.361 335.323 137.313 335.758C136.266 336.192 135.315 336.829 134.513 337.631V337.631Z" fill="black"/>
            <path d="M304.685 375.004H195.31C181.419 374.473 171.326 384.551 171.326 398.442V413.395C171.326 427.426 181.857 438.442 195.31 437.504H304.685C318.123 438.442 328.669 427.426 328.669 413.395V398.442C328.669 384.551 318.576 374.473 304.685 375.004ZM311.951 413.395C311.951 417.411 309.669 421.739 304.685 422.27H195.31C190.31 421.739 188.044 417.395 188.044 421.879V406.926C188.044 393.817 190.685 391.161 195.31 390.629H304.685C309.31 391.161 311.951 393.817 311.951 398.442V413.395V413.395Z" fill="black"/>
            <path d="M249.999 291.663C261.124 291.663 271.592 287.335 279.452 279.46C286.233 272.666 290.463 263.743 291.431 254.194C292.399 244.644 290.044 235.053 284.764 227.038L326.217 185.585C327.784 184.018 328.664 181.894 328.664 179.678C328.664 177.463 327.784 175.339 326.217 173.772C324.651 172.206 322.526 171.326 320.311 171.326C318.096 171.326 315.971 172.206 314.405 173.772L272.905 215.272C256.889 205.038 234.264 206.788 220.546 220.522C214.733 226.355 210.777 233.778 209.177 241.856C207.577 249.933 208.404 258.304 211.554 265.912C214.704 273.521 220.035 280.026 226.877 284.609C233.719 289.191 241.764 291.646 249.999 291.663V291.663ZM235.28 235.272C239.202 231.335 244.436 229.163 249.999 229.163C255.561 229.163 260.796 231.335 264.733 235.272C272.858 243.397 272.858 256.6 264.733 264.725C256.874 272.6 243.155 272.6 235.28 264.725C231.378 260.817 229.187 255.521 229.187 249.999C229.187 244.477 231.378 239.18 235.28 235.272V235.272Z" fill="black"/>
          </svg>
          <!-- <p class="singleFeatureDesc">Daytona sunrise orange</p> -->


          <?php $dashboard = get_post_meta( $product->id, 'dashboard' )[0]; ?>
          <?php if($dashboard){ ?>
              <p class="singleFeatureDesc"><?php echo $dashboard; ?></p>
          <?php } ?>
        </figure>


        <figure class="singleFeature">
          <svg class="singleFeatureIcon breaksRotation" viewBox="0 0 513 513" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0)">
              <path d="M420.191 120.429L436.184 104.441C446.211 94.4097 446.207 78.1519 436.176 68.1245C435.781 67.73 435.375 67.3472 434.953 66.98C332.004 -22.2739 179.094 -22.2739 76.1444 66.98C65.4804 76.3315 64.4179 92.5581 73.7694 103.218C74.1405 103.64 74.5194 104.046 74.914 104.441L90.914 120.441C1.84757 211.269 3.27726 357.101 94.1093 446.167C133.664 484.953 185.871 508.187 241.164 511.605C246.039 511.894 250.879 512.039 255.676 512.039C382.926 511.968 486.047 408.792 486.047 281.539C485.941 221.304 462.309 163.496 420.191 120.429V120.429ZM86.9882 92.3706C85.289 90.6831 84.3827 88.3628 84.4765 85.9761C84.539 83.6167 85.5898 81.394 87.371 79.8472C183.879 -3.82471 327.219 -3.82471 423.726 79.8472C425.508 81.394 426.559 83.6167 426.621 85.9761C426.719 88.3628 425.809 90.6831 424.113 92.3706L375.684 140.8C372.527 143.898 367.531 144.074 364.164 141.21C344.879 125.41 322.379 114.007 298.234 107.796V102.265C298.226 90.2378 293.156 78.7729 284.266 70.6792C281.523 68.2456 278.469 66.1831 275.184 64.5464C274.519 64.1792 273.801 63.9331 273.109 63.6089C271.519 62.8354 269.883 62.1597 268.211 61.5854C266.328 61.0229 264.406 60.6011 262.465 60.312C261.672 60.187 260.91 59.937 260.117 59.8511C259.98 59.8511 259.851 59.7847 259.715 59.7769C258.34 59.6479 256.984 59.7769 255.617 59.7769C254.25 59.7769 252.824 59.605 251.418 59.7769C251.273 59.7769 251.144 59.8433 251.008 59.8511C250.207 59.9448 249.437 60.1948 248.644 60.3198C246.707 60.6011 244.797 61.0229 242.922 61.5854C241.238 62.1597 239.59 62.8394 237.988 63.6245C237.312 63.9409 236.605 64.187 235.949 64.5464C232.66 66.187 229.598 68.2495 226.848 70.687C217.953 78.7769 212.879 90.2378 212.863 102.265V107.796C188.719 114.007 166.215 125.41 146.926 141.21C143.559 144.07 138.57 143.89 135.418 140.8L86.9882 92.3706ZM401.797 436.992C315.398 517.171 180.359 512.128 100.18 425.73C23.1444 342.722 24.3554 214.003 102.934 132.457L123.344 152.871C124.531 154.05 125.828 155.109 127.223 156.039C127.676 156.343 128.16 156.542 128.629 156.816C129.555 157.382 130.516 157.89 131.508 158.335C132.098 158.582 132.719 158.726 133.332 158.933C134.226 159.269 135.137 159.554 136.066 159.785C136.738 159.921 137.422 159.972 138.105 160.058C138.992 160.195 139.887 160.281 140.785 160.316C140.973 160.316 141.152 160.375 141.34 160.375C142.016 160.375 142.691 160.257 143.363 160.203C144.039 160.152 144.594 160.136 145.207 160.042C146.129 159.886 147.039 159.675 147.934 159.41C148.496 159.265 149.059 159.164 149.641 158.976C150.629 158.609 151.594 158.187 152.535 157.71C152.976 157.496 153.43 157.343 153.867 157.105C155.254 156.335 156.574 155.441 157.801 154.433C176.785 138.875 199.211 128.078 223.211 122.941C227.152 122.085 229.957 118.589 229.937 114.558V103.714C229.793 92.0542 237.125 81.6128 248.141 77.7886C248.812 77.5815 249.512 77.48 250.207 77.3354C251.09 77.105 251.988 76.9253 252.894 76.7964C253.73 76.7534 254.566 76.7534 255.402 76.7964C256.344 76.7456 257.281 76.7456 258.223 76.7964C259.082 76.9253 259.937 77.0972 260.781 77.3198C261.5 77.4722 262.226 77.5737 262.926 77.7886C273.953 81.6011 281.297 92.0464 281.16 103.714V114.558C281.16 118.585 283.976 122.066 287.914 122.906C311.914 128.042 334.336 138.839 353.316 154.398C363.473 162.847 378.387 162.187 387.754 152.871L408.164 132.46C490.535 216.679 489.035 351.73 404.812 434.097C403.816 435.074 402.812 436.035 401.797 436.992V436.992Z" fill="black"/>
              <path d="M357.648 111.261C371.792 111.261 383.261 99.7964 383.261 85.6519C383.261 71.5073 371.792 60.0386 357.648 60.0386C343.503 60.0386 332.039 71.5073 332.039 85.6519C332.039 99.7964 343.503 111.261 357.648 111.261ZM357.648 77.1128C362.363 77.1128 366.187 80.937 366.187 85.6519C366.187 90.3667 362.363 94.187 357.648 94.187C352.933 94.187 349.113 90.3667 349.113 85.6519C349.113 80.9331 352.933 77.1128 357.648 77.1128Z" fill="black"/>
              <path d="M152.648 111.261C166.792 111.261 178.257 99.7964 178.257 85.6519C178.257 71.5073 166.792 60.0386 152.648 60.0386C138.503 60.0386 127.039 71.5073 127.039 85.6519C127.039 99.7964 138.503 111.261 152.648 111.261ZM152.648 77.1128C157.363 77.1128 161.183 80.937 161.183 85.6519C161.183 90.3667 157.363 94.187 152.648 94.187C147.933 94.187 144.113 90.3667 144.113 85.6519C144.113 80.9331 147.933 77.1128 152.648 77.1128Z" fill="black"/>
              <path d="M252.988 238.933C229.457 240.347 211.527 260.57 212.941 284.101C214.293 306.64 232.968 324.226 255.55 324.226C256.402 324.226 257.308 324.226 258.195 324.148C281.726 322.718 299.644 302.484 298.218 278.953C296.789 255.421 276.554 237.503 253.023 238.929H252.988V238.933ZM281.16 279.996C282.011 294.113 271.254 306.249 257.136 307.101C243.015 307.953 230.882 297.195 230.031 283.078C229.179 268.96 239.929 256.828 254.046 255.972C254.531 255.929 255.054 255.929 255.546 255.929C269.074 255.949 280.254 266.484 281.074 279.988L281.16 279.996Z" fill="black"/>
              <path d="M255.55 179.097C198.972 179.097 153.105 224.96 153.105 281.539C153.105 338.117 198.972 383.984 255.55 383.984C312.128 383.984 357.992 338.117 357.992 281.539C357.933 224.988 312.101 179.156 255.55 179.097ZM255.55 366.91C208.402 366.91 170.179 328.687 170.179 281.539C170.179 234.39 208.402 196.171 255.55 196.171C302.695 196.171 340.917 234.39 340.917 281.539C340.867 328.667 302.675 366.859 255.55 366.91V366.91Z" fill="black"/>
            </g>
            <defs>
              <clipPath id="clip0">
                <rect x="0.0385742" y="0.0385742" width="512" height="512" fill="white"/>
              </clipPath>
            </defs>
          </svg>
          <!-- <p class="singleFeatureDesc">6.2-Liter lt4 v-8</p> -->

          <?php $brake = get_post_meta( $product->id, 'brake' )[0]; ?>
          <?php if($brake){ ?>
              <p class="singleFeatureDesc"><?php echo $brake; ?></p>
          <?php } ?>

        </figure>



        <figure class="singleFeature">
          <svg class="singleFeatureIcon" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2.83536 148.177L148.186 2.82034C149.079 1.92628 150.139 1.21699 151.306 0.733044C152.473 0.249099 153.724 0 154.987 0C156.25 0 157.501 0.249099 158.668 0.733044C159.835 1.21699 160.895 1.92628 161.788 2.82034L307.128 148.177C308.022 149.07 308.731 150.131 309.215 151.298C309.699 152.466 309.948 153.717 309.948 154.981C309.948 156.245 309.699 157.496 309.215 158.664C308.731 159.831 308.022 160.892 307.128 161.785L278.539 190.376C276.746 192.169 274.318 193.182 271.782 193.195C269.246 193.207 266.808 192.218 264.998 190.442C261.991 187.503 257.949 185.865 253.745 185.881C249.541 185.898 245.512 187.567 242.528 190.53L239.158 193.9L349.092 303.837C379.59 335.469 417.688 358.753 459.746 371.465C476.064 376.044 490.229 386.263 499.72 400.305C509.211 414.346 513.413 431.3 511.579 448.149C509.745 464.999 501.994 480.651 489.704 492.322C477.414 503.993 461.383 510.925 444.463 511.885C443.11 511.962 441.758 512 440.405 512C424.515 512.007 409.075 506.725 396.517 496.987C383.96 487.249 375 473.609 371.05 458.216C360.144 418.838 338.881 383.104 309.475 354.734L193.873 239.178L190.503 242.548C187.543 245.533 185.874 249.561 185.856 253.765C185.839 257.969 187.474 262.011 190.409 265.02C192.186 266.829 193.176 269.267 193.165 271.803C193.153 274.339 192.141 276.768 190.349 278.562L161.76 307.153C160.868 308.047 159.808 308.756 158.641 309.24C157.474 309.724 156.223 309.973 154.959 309.973C153.696 309.973 152.445 309.724 151.278 309.24C150.111 308.756 149.051 308.047 148.159 307.153L2.80786 161.796C1.91516 160.9 1.2077 159.837 0.725922 158.668C0.244148 157.498 -0.00249176 156.246 6.10352e-05 154.981C0.00261383 153.716 0.254324 152.464 0.740814 151.297C1.2273 150.129 1.93905 149.069 2.83536 148.177ZM68.7485 200.471L200.47 68.7331L191.124 59.3861L59.3747 191.124L68.7485 200.471ZM323.071 341.132C354.929 371.943 377.936 410.738 389.694 453.471C391.981 462.371 396.57 470.512 403 477.077C409.429 483.641 417.472 488.399 426.322 490.871C435.171 493.343 444.515 493.443 453.416 491.161C462.316 488.879 470.46 484.295 477.028 477.87C483.597 471.445 488.359 463.404 490.837 454.555C493.315 445.707 493.421 436.362 491.146 427.46C488.87 418.557 484.292 410.41 477.871 403.836C471.451 397.263 463.414 392.495 454.568 390.011C409.319 376.4 368.317 351.412 335.48 317.434L225.568 207.497L207.496 225.57L323.071 341.132ZM155.003 286.732L170.975 270.76C167.334 264.077 165.947 256.397 167.021 248.862C168.095 241.327 171.571 234.34 176.934 228.94L218.767 187.104L228.927 176.944C234.328 171.583 241.314 168.107 248.847 167.034C256.381 165.96 264.06 167.345 270.743 170.984L286.714 155.006L214.094 82.3412L82.35 214.095L155.003 286.732ZM45.7897 177.51L177.511 45.756L154.97 23.2133L23.2267 154.962L45.7897 177.51Z" fill="black"/>
          </svg>
          <!-- <p class="singleFeatureDesc">Black</p> -->



          <?php $engine = get_post_meta( $product->id, 'engine' )[0]; ?>
          <?php if($engine){ ?>
              <p class="singleFeatureDesc"><?php echo $engine; ?></p>
          <?php } ?>

        </figure>





        <figure class="singleFeature">
          <svg class="singleFeatureIcon" viewBox="0 0   512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M89.536 8C111.312 8 131.784 16.488 147.192 31.88L171.312 56L155.312 72L168 84.688L173.376 79.312C178.088 74.592 184.36 72 191.032 72C204.8 72 216 83.2 216 96.968C216 103.544 213.336 109.976 208.688 114.624L203.312 120L216 132.688L221.376 127.312C226.088 122.592 232.36 120 239.032 120C252.8 120 264 131.2 264 144.968C264 151.544 261.336 157.976 256.688 162.624L251.312 168L264 180.688L269.376 175.312C274.088 170.592 280.36 168 287.032 168C300.8 168 312 179.2 312 192.968C312 199.544 309.336 205.976 304.688 210.624L299.312 216L312 228.688L328 212.688L379.312 264L363.312 280L435.312 352L411.312 376L424 388.688L432 380.688L448 396.688L472 372.688L507.312 408L483.312 432L504 452.688V456C504 482.472 482.472 504 456 504H452.688L432 483.312L408 507.312L372.688 472L396.688 448L380.688 432L388.688 424L376 411.312L352 435.312L280 363.312L264 379.312L212.688 328L228.688 312L216 299.312L210.624 304.688C205.912 309.408 199.64 312 192.968 312C179.2 312 168 300.8 168 287.032C168 280.456 170.664 274.024 175.312 269.376L180.688 264L168 251.312L162.624 256.688C157.912 261.408 151.64 264 144.968 264C131.2 264 120 252.8 120 239.032C120 232.456 122.664 226.024 127.312 221.376L132.688 216L120 203.312L114.624 208.688C109.912 213.408 103.64 216 96.968 216C83.2 216 72 204.8 72 191.032C72 184.456 74.664 178.024 79.312 173.376L84.688 168L72 155.312L56 171.312L31.88 147.192C16.48 131.8 8 111.32 8 89.536C8 44.576 44.576 8 89.536 8V8ZM484.688 408L472 395.312L459.312 408L472 420.688L484.688 408ZM459.16 487.84C474.288 486.352 486.352 474.288 487.84 459.152L432 403.312L403.312 432L459.16 487.84ZM395.312 472L408 484.688L420.688 472L408 459.312L395.312 472ZM400 412.688L412.688 400L400 387.312L387.312 400L400 412.688ZM352 412.688L412.688 352L352 291.312L291.312 352L352 412.688ZM264 356.688L356.688 264L328 235.312L235.312 328L264 356.688ZM240 300.688L300.688 240L288 227.312L227.312 288L240 300.688ZM192.968 296C195.368 296 197.616 295.072 199.312 293.376L293.376 199.312C295.04 197.64 296 195.328 296 192.968C296 188.024 291.976 184 287.032 184C284.632 184 282.384 184.928 280.688 186.624L186.624 280.688C184.96 282.36 184 284.672 184 287.032C184 291.976 188.024 296 192.968 296ZM192 252.688L252.688 192L240 179.312L179.312 240L192 252.688ZM144.968 248C147.368 248 149.616 247.072 151.312 245.376L245.376 151.312C247.04 149.64 248 147.328 248 144.968C248 140.024 243.976 136 239.032 136C236.632 136 234.384 136.928 232.688 138.624L138.624 232.688C136.96 234.36 136 236.672 136 239.032C136 243.976 140.024 248 144.968 248ZM144 204.688L204.688 144L192 131.312L131.312 192L144 204.688ZM96.968 200C99.368 200 101.616 199.072 103.312 197.376L197.376 103.312C199.04 101.64 200 99.328 200 96.968C200 92.024 195.976 88 191.032 88C188.632 88 186.384 88.928 184.688 90.624L90.624 184.688C88.96 186.36 88 188.672 88 191.032C88 195.976 92.024 200 96.968 200V200ZM96 156.688L156.688 96L144 83.312L83.312 144L96 156.688ZM43.192 135.88L56 148.688L148.688 56L135.88 43.192C123.504 30.824 107.04 24 89.536 24C53.4 24 24 53.4 24 89.536C24 107.048 30.816 123.504 43.192 135.88Z" fill="black"/>
          </svg>
          <!-- <p class="singleFeatureDesc">7 Speed Manual</p> -->



          <?php $suspension = get_post_meta( $product->id, 'suspension' )[0]; ?>
          <?php if($suspension){ ?>
              <p class="singleFeatureDesc"><?php echo $suspension; ?></p>
          <?php } ?>
        </figure>




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
                		<span class="auctionDetailsValue main-auction auction-time-countdown" data-time="<?php echo esc_attr( $product->get_seconds_remaining() ); ?>" data-auctionid="<?php echo intval( $product_id ); ?>" data-format="<?php echo esc_attr( get_option( 'auctions_for_woocommerce_countdown_format' ) ); ?>"></span>
                	</p>

            			<p class="auctionDetails">
                    <span class="auctionDetailsTitle">Current bid:</span>
                    <?php // echo wp_kses_post( $product->get_price_html() ); ?>


                    <span class="auctionDetailsValue">€ <?php echo number_format($product->auction_current_bid,0,",","."); ?></span>
                    <!-- <span class="auctionDetailsValue">€ <?php echo $product->auction_current_bid; ?></span> -->
                  </p>

                  <p class="auctionDetails">
                    <span class="auctionDetailsTitle">Reserve price:</span>
                    <?php if ( ( $product->is_reserved() === true ) && ( $product->is_reserve_met() === false ) ) : ?>
                      <span class="auctionDetailsValue reserve hold"  data-auction-id="<?php echo intval( $product_id ); ?>" >has not been met</span>
                    <?php endif; ?>
                    <?php if ( ( $product->is_reserved() === true ) && ( $product->is_reserve_met() === true ) ) : ?>
                      <span class="auctionDetailsValue reserve hold"  data-auction-id="<?php echo intval( $product_id ); ?>" >has been met</span>
                    <?php endif; ?>
                  </p>




            		<?php } elseif ( 'yes' === $product->get_auction_sealed() ) { ?>
            				<p class="sealed-text"><?php echo wp_kses_post( apply_filters( 'sealed_bid_text', __( "This auction is <a href='#'>sealed</a>.", 'auctions-for-woocommerce' ) ) ); ?>
            					<span class='sealed-bid-desc' style="display:grid;"><?php esc_html_e( 'In this type of auction all bidders simultaneously submit sealed bids so that no bidder knows the bid of any other participant. The highest bidder pays the price they submitted. If two bids with same value are placed for auction the one which was placed first wins the auction.', 'auctions-for-woocommerce' ); ?></span>
            				</p>
            				<?php
            				if ( ! empty( $product->get_auction_start_price() ) ) {
            					?>
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
            							<?php
            							if ( 'yes' !== $product->get_auction_sealed() ) {
            								?>
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
                  <span class="auctionDetailsValue auction-time-countdown future" data-time="<?php echo esc_attr( $product->get_seconds_to_auction() ); ?>" data-format="<?php echo esc_attr( get_option( 'auctions_for_woocommerce_countdown_format' ) ); ?>"></span>
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
    </div>


    <div class="singleSide singleSide2">


      <div class="testimonialsContainer">
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

      <div class="superFicha">
        <div>
          <p class="singleSideStock2">STOCK #</p>
          <p class="singleStock2ID"><?php echo $product->id; ?></p>
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

            <a class="singleSideContact" href="tel:+34-938-364-911">Call: (704) 445-9105</a>

            <!-- <div class="singleSideSocialCont">
            <a class="singleSocialLink" href="https://www.facebook.com/sharer/sharer.php?u=http://localhost/GPMotorbikes/producto/motomel-eameo-recatate-gp-1100cc/" target="_blank">
            <svg class="singleSocialSvg" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" class="svg-inline--fa fa-facebook-f fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg>
          </a>
          <a class="singleSocialLink" href="https://twitter.com/home?status=http://localhost/GPMotorbikes/producto/motomel-eameo-recatate-gp-1100cc/" target="_blank">
          <svg class="singleSocialSvg" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" class="svg-inline--fa fa-twitter fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg>
        </a>
        <a class="singleSocialLink" href="mailto:Info@gpmotorbikes.com">
        <svg class="singleSocialSvg" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path fill="currentColor" d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z"></path>
      </svg>
    </a>
  </div> -->


  <div class="singleSideSocialCont socialMedia">

    <a href="https://www.instagram.com/gpmotorbikes/?hl=es" target="_blank" class="socialMediaLink socialMediaInst">
      <svg viewBox="0 0 501 500" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M250.112 121.806C179.153 121.806 121.918 179.042 121.918 250C121.918 320.958 179.153 378.194 250.112 378.194C321.07 378.194 378.305 320.958 378.305 250C378.305 179.042 321.07 121.806 250.112 121.806ZM250.112 333.343C204.256 333.343 166.769 295.967 166.769 250C166.769 204.033 204.145 166.657 250.112 166.657C296.078 166.657 333.454 204.033 333.454 250C333.454 295.967 295.967 333.343 250.112 333.343V333.343ZM413.45 116.563C413.45 133.186 400.061 146.463 383.549 146.463C366.925 146.463 353.648 133.075 353.648 116.563C353.648 100.05 367.037 86.6618 383.549 86.6618C400.061 86.6618 413.45 100.05 413.45 116.563ZM498.354 146.91C496.458 106.856 487.309 71.3768 457.966 42.1455C428.735 12.9142 393.256 3.76548 353.202 1.75722C311.921 -0.585741 188.19 -0.585741 146.91 1.75722C106.968 3.65391 71.4883 12.8026 42.1455 42.0339C12.8026 71.2652 3.76548 106.744 1.75722 146.798C-0.585741 188.079 -0.585741 311.81 1.75722 353.09C3.65391 393.144 12.8026 428.623 42.1455 457.855C71.4883 487.086 106.856 496.234 146.91 498.243C188.19 500.586 311.921 500.586 353.202 498.243C393.256 496.346 428.735 487.197 457.966 457.855C487.197 428.623 496.346 393.144 498.354 353.09C500.697 311.81 500.697 188.19 498.354 146.91V146.91ZM445.024 397.384C436.322 419.251 419.475 436.098 397.495 444.912C364.582 457.966 286.483 454.954 250.112 454.954C213.74 454.954 135.529 457.855 102.728 444.912C80.8602 436.21 64.0132 419.363 55.1992 397.384C42.1455 364.471 45.1579 286.372 45.1579 250C45.1579 213.628 42.2571 135.418 55.1992 102.616C63.9016 80.7486 80.7486 63.9016 102.728 55.0876C135.641 42.0339 213.74 45.0463 250.112 45.0463C286.483 45.0463 364.694 42.1455 397.495 55.0876C419.363 63.79 436.21 80.6371 445.024 102.616C458.078 135.529 455.065 213.628 455.065 250C455.065 286.372 458.078 364.582 445.024 397.384Z" fill="currentColor"/>
      </svg>
    </a>

    <a href="https://es-la.facebook.com/gpmotorbikes/" target="_blank" class="socialMediaLink socialMediaFace">
      <svg width="25" height="25" viewBox="0 0 313 500" fill="none" xmlns="http://www.w3.org/2000/svg">
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

    <div class="singleDescription"><?php echo the_content(); ?></div>


  </article>




  <div class="singleFormContainer" id="singleRequestInfo" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
    <form action="index.php" class="singleContact ">
      <input type="hidden" name="action" value="lt_form_handler">
      <input type="hidden" name="link" value="<?php echo home_url( $wp->request ); ?>">
      <p class="SingleContactCloseButton" onclick="altClassFromSelector('alt','#singleRequestInfo')">+</p>
      <label  class="formLabel">CONTACT DETAILS</label>
      <input type="text"   placeholder="First Name"   class="formInput100 formInput" name="a01">
      <input type="text"   placeholder="Last Name"    class="formInput100 formInput" name="a02">
      <input type="email"  placeholder="Email"        class="formInput100 formInput" name="a03">
      <input type="number" placeholder="Phone"        class="formInput100 formInput" name="a04">
      <input type="text"   placeholder="Country"      class="formInput100 formInput" name="a05">
      <select value="time-preference" class="formInput100 formInput" name="a06" id="bestTimeToCall">
        <option value="any_time" class="form">Any Time</option>
        <option value="from-9-to-13">9:00 a.m. - 1:00 p.m.</option>
        <option value="from-13-to-17">1:00 p.m. - 5:00 p.m.</option>
        <option value="from-17-to-20">5:00 p.m. - 8:00 p.m.</option></select>
      </select>
      <label  class="formLabel ">TRADE VEHICLE</label>
      <div class="tradeOrNot">
        <label for="yes" class="formRadioFor">yes</label>
        <input type="radio" name="a07" id="yes" value="yes">
        <label for="no" class="formRadioFor">no</label>
        <input type="radio" name="a07" id="no" value="no">
      </div>
      <label  class="formLabel">COMMENT</label>
      <textarea class="singleFormTxtArea" value="comments" placeholder="" name="a08"></textarea>
      <div class="formTermsAndConditions">
         <input type="checkbox">
         <a href="#" class="linkTermAndConditionsForm">I accept terms and conditions</a>
      </div>
      <button class="singleContactButton contactButton" type="submit">SEND</button>
    </form>
  </div>

  <div class="singleFormContainer" id="singleMakeOffer">
    <form class="singleContact" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
      <input type="hidden" name="action" value="lt_form_handler">
      <input type="hidden" name="link" value="<?php echo home_url( $wp->request ); ?>">
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
      <input type="text"   placeholder="Name"         name="a02" class="formInput100 formInput">
      <input type="number" placeholder="Phone"        name="a03" class="formInput100 formInput">
      <input type="email"  placeholder="Email"        name="a04" class="formInput100 formInput">
      <input type="text"   placeholder="Country"      name="a05" class="formInput100 formInput">
      <select value="time-preference" name="a06" class="formInput100 formInput" id="bestTimeToCall">
        <option value="any_time" class="form">Any Time</option>
        <option value="from-9-to-13">9:00 a.m. - 1:00 p.m.</option>
        <option value="from-13-to-17">1:00 p.m. - 5:00 p.m.</option>
        <option value="from-17-to-20">5:00 p.m. - 8:00 p.m.</option></select>
      </select>
      <label  class="formLabel ">TRADE VEHICLE</label>
      <div class="tradeOrNot">
        <label for="yes" class="formRadioFor">yes</label>
        <input type="radio" name="a07" id="yes" value="yes">
        <label for="no" class="formRadioFor">no</label>
        <input type="radio" name="a07" id="no" value="no">
      </div>
      <label  class="formLabel">COMMENT</label>
      <textarea class="singleFormTxtArea" value="comments" placeholder="" name="a08"></textarea>
      <div class="formTermsAndConditions">
         <input type="checkbox">
         <a href="#" class="linkTermAndConditionsForm">I accept terms and conditions</a>
      </div>
      <button class="singleRequestInfoButton contactButton" type="submit">SUBMIT OFFER</button>
    </form>
  </div>

  <div class="singleFormContainer" id="singleTrade">
    <form class="singleContact" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
      <input type="hidden" name="action" value="lt_form_handler">
      <input type="hidden" name="link" value="<?php echo home_url( $wp->request ); ?>">
      <p class="SingleContactCloseButton" onclick="altClassFromSelector('alt','#singleTrade')">+</p>
      <label  class="formLabelBig">Trade this <?php the_title(); ?></label>
      <p class="singleFormTxt mainTxtType1">We are always looking for new inventory. If you are interested in trading your high quality bike for one of ours, simply fill out this form.<br>A member of our sales department will be in touch within 24 hours. No one makes the trade-in process easier than amatumoto.com.</p>
      <input type="text"   placeholder="Name"       class="formInput50 formInput" name="a01">
      <input type="number" placeholder="Year"       class="formInput50 formInput" name="a02">
      <input type="text"   placeholder="Last Name"  class="formInput50 formInput" name="a03">
      <input type="text"   placeholder="Make"       class="formInput50 formInput" name="a04">
      <input type="email"  placeholder="Email"      class="formInput50 formInput" name="a05">
      <input type="text"   placeholder="Model"      class="formInput50 formInput" name="a06">
      <input type="number" placeholder="Phone"      class="formInput50 formInput" name="a07">
      <input type="text"   placeholder="VIN"        class="formInput50 formInput" name="a08">
      <label  class="formLabel">Upload photos here</label>
      <input type="file" placeholder="upload files" class="formInput50 formInput" name="a09">
      <textarea class="singleFormTxtArea formInput50" value="comments" placeholder="your comments" name="a10"></textarea>
      <div class="formTermsAndConditions">
         <input type="checkbox">
         <a href="#" class="linkTermAndConditionsForm">I accept terms and conditions</a>
      </div>
      <button class="singleRequestInfoButton contactButton" type="submit">REQUEST TRADE IN</button>
    </form>
  </div>

  <div class="singleFormContainer" id="singleFinance">
    <form class="singleContact" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
      <input type="hidden" name="action" value="lt_form_handler">
      <input type="hidden" name="link" value="<?php echo home_url( $wp->request ); ?>">
      <p class="SingleContactCloseButton" onclick="altClassFromSelector('alt','#singleFinance')">+</p>
      <label  class="formLabelBig">finance this <?php the_title(); ?></label>
      <p class="singleFormTxt mainTxtType1">Please enter the information below to begin the financing process.</p>
      <input type="number" placeholder="INTEREST RATE"  class="formInput50 formInput" name="a01">
      <input type="text" placeholder="NAME"  class="formInput50 formInput" name="a02">
      <select class="formInput50 formInput" id="rkm-vdp-loan-term" class="form-control" name="a03">
        <option value="36">3 Years (36 Months)</option>
        <option value="48">4 Years (48 Months)</option>
        <option value="60">5 Years (60 Months)</option>
        <option value="72">6 Years (72 Months)</option>
        <option value="84">7 Years (84 Months)</option>
        <option value="96">8 Years (96 Months)</option>
        <option value="108">9 Years (108 Months)</option>
        <option selected="selected" value="120">10 Years (120 Months)</option>
        <option value="132">11 Years (132 Months)</option>
        <option value="144">12 Years (144 Months)</option>
      </select>
      <input name="a04" type="text"   placeholder="LAST NAME"      class="formInput50 formInput">
      <input name="a05" type="text"   placeholder="PURCHASE PRICE" class="formInput50 formInput">
      <input name="a06" type="number" placeholder="PHONE"          class="formInput50 formInput">
      <input name="a07" type="number" placeholder="DOWN PAYMENT"   class="formInput50 formInput">
      <input name="a08" type="email"  placeholder="EMAIL"          class="formInput50 formInput">
      <button class="singleRequestInfoButton contactButton formInput50" type="">CALCULATE RATE</button>
      <input name="a09" type="text"   placeholder="COUNTRY"        class="formInput50 formInput lastCountryInput">
      <input name="a10" type="number" placeholder="0.00"           class="formInput50 formInput colorfulInput">
      <select name="a11" value="time-preference"   class="formInput50 formInput" id="bestTimeToCall">
        <option value="any_time" class="form">Any Time</option>
        <option value="from-9-to-13">9:00 a.m. - 1:00 p.m.</option>
        <option value="from-13-to-17">1:00 p.m. - 5:00 p.m.</option>
        <option value="from-17-to-20">5:00 p.m. - 8:00 p.m.</option></select>
      </select>
      <textarea class="singleFormTxtArea" value="comments" placeholder="your comments" name="a12"></textarea>
        <div class="formTermsAndConditions">
           <input type="checkbox">
           <a href="#" class="linkTermAndConditionsForm">I accept terms and conditions</a>
        </div>
        <button class="singleRequestInfoButton contactButton" type="submit">SEND</button>
      </form>
    </div>















<!-- <form class="" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
  <input type="hidden" name="action" value="lt_new_user">
  <input type="hidden" name="url" value="<?php echo home_url( $wp->request ); ?>">
  <input type="email" name="mail" value="" placeholder="user@example.com">
  <input type="text" name="pass" value="" placeholder="password">
  <button type="submit" name="button">Crear</button>
</form> -->












































<?php } wp_reset_query(); ?>
<?php get_footer(); ?>
