<?php get_header(); ?>

<figure class="pageBanner">
  <img class="pageBannerImg rowcol1" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
  <figcaption class="pageBannerCaption rowcol1">
    <p>CURRENT</p>
    <h2><?php the_title();?></h2>
  </figcaption>
</figure>


<?php include 'filterBar.php'; ?>


<div class="shopArchive shopInventory">

  <?php
  $cardName='productCard';


    if(get_query_var('paged')){$paged=get_query_var('paged');}elseif(get_query_var('page')){$paged=get_query_var('page');}else{$paged=1;}
    $args = array(
      'post_type'      => 'product',
      'posts_per_page' => 18,
      'paged'          => $paged,
      'tax_query'            => array(
          array(
              'taxonomy' => 'product_cat',
              'field'    => 'slug', // Or 'name' or 'term_id'
              'terms'    => array('parts-racing-products'),
              'operator' => 'NOT IN', // Excluded
          ),
      ),
      // 'tax_query'      => array(array(
      //   'taxonomy' => 'product_cat',
      //   'field'    => 'slug',
      //   'terms'    => array('parts-racing-products'),
      //   'compare' => 'NOT IN',
      // ),),
    );
    if (isset($_GET['filter_year']) AND $_GET['filter_year']!=0) {
      $args['tax_query'][] = array(
        'taxonomy' => 'product_cat',
        'field'    => 'slug',
        'terms'    => $_GET['filter_year'],
      );
    }
    if (isset($_GET['type']) AND $_GET['type']=='auction') {
      $args['tax_query'][] = array(
        'taxonomy' => 'product_type',
        'field'    => 'slug',
        'terms'    => 'auction',
        'posts_per_page' => 9,
      );
      $cardName='hotCard';

    }
    if (isset($_GET['status']) AND $_GET['status']=='sold') {
      $args['tax_query'][] = array(
        'taxonomy' => 'product_visibility',
        'field'    => 'slug',
        'terms'   => array('outofstock'),
        'compare' => 'IN',
        // 'compare' => 'NOT IN',
      );
    }

    // chequea si hay una busqueda de texto solicitada por el usuario, de haberla la pasa al query
    if (isset($_GET['filter_search']) AND $_GET['filter_search']!=''){$args['s']=$_GET['filter_search'];}

  $blogPosts=new WP_Query($args);
  while($blogPosts->have_posts()){$blogPosts->the_post();$product_id = get_the_ID(); ?>

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


  <?php
  // if( $product->is_type( 'auction' ) ){
  //   $cardName='hotCard';
  // }
  // else{
  //   $cardName='productCard';
  // }
  ?>

  <figure class="<?php echo $cardName; ?>">

      <?php
      global $product;
      $created = strtotime( $product->get_date_created() );
      if ( ( time() - ( 60 * 60 * 24 * $newness_days ) ) < $created ) { ?>
        <span class="newArrival"><i>New arrival</i></span>
        <?php } ?>
    <a class="<?php echo $cardName; ?>Img rowcol1" href="<?php echo get_permalink(); ?>">
      <img class="<?php echo $cardName; ?>Img lazy" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
    </a>
    <figcaption class="<?php echo $cardName; ?>Caption">


          <!-- <p class="<?php echo $cardName; ?>AnoMarca"><a href="<?php echo get_permalink(); ?>">
            <span><?php echo $yearBike; ?></span>
            <span><?php echo $brand; ?></span>
        </a></p>
      <h4 class="<?php echo $cardName; ?>Title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4> -->


            <!-- NEW TITLE -->
            <h4 class="<?php echo $cardName; ?>Title">
              <?php if($brand){ ?><span class="singleSideAnoMarca singleSideBrand"><?php echo $brand; ?></span><?php } ?>
              <?php the_title(); ?>
              <?php if($yearBike){ ?><span class="singleSideAnoMarca singleSideYearBike"><?php echo $yearBike; ?></span><?php } ?>
            </h4>






      <?php // if(method_exists($product,'get_seconds_remaining')){ ?>
      <?php if($cardName=='hotCard'){ ?>
        <p class="auctionDetails">
          <?php if ($product->auction_current_bid){ ?>
            <span class="auctionDetailsTitle"><?php echo $product->auction_bid_count; ?> Bids</span>
            <span class="auctionDetailsValue">€ <?php echo number_format($product->auction_current_bid,0,",","."); ?></span>
          <?php } else { ?>
            <span class="auctionDetailsTitle">Starting price:</span>
            <span class="auctionDetailsValue">€ <?php echo number_format($product->auction_start_price,0,",","."); ?></span>
          <?php } ?>
        </p>

      <?php } ?>

      <?php if($cardName=='hotCard'){ ?>
      <?php // if(method_exists($product,'get_seconds_remaining')){ ?>
        <p class="auctionDetails">
          <?php
            $start=new DateTime($product->get_auction_start_time()); $now = new DateTime();
            if ( $start > $now ) { ?>
              <span class="auctionDetailsTitle">Auction starts:</span>
              <span class="auctionDetailsValue auction-time-countdown notMet" data-time="<?php echo esc_attr( $product->get_seconds_to_auction() ); ?>" data-format="<?php echo esc_attr( get_option( 'auctions_for_woocommerce_countdown_format' ) ); ?>"></span>
            <?php } else { ?>
              <span class="auctionDetailsTitle"><?php echo wp_kses_post( apply_filters( 'time_text', esc_html__( 'Time left:', 'auctions-for-woocommerce' ), $product_id ) ); ?></span>
              <span class="auctionDetailsValue main-auction auction-time-countdown notMet" data-time="<?php echo esc_attr( $product->get_seconds_remaining() ); ?>" data-auctionid="<?php echo intval( $product_id ); ?>" data-format="<?php echo esc_attr( get_option( 'auctions_for_woocommerce_countdown_format' ) ); ?>"></span>
            <?php }
          ?>
        </p>
      <?php } ?>

      <?php if(!method_exists($product,'get_seconds_remaining')){ ?>
        <!-- <p class="productCardTxt"><a href="<?php echo get_permalink(); ?>"><?php echo excerpt(70); ?></a></p> -->
      <?php } ?>


    </figcaption>
  </figure>
  <?php

} ?>
</div>



<?php echo latte_pagination($blogPosts->max_num_pages); ?>

<article class="banner0">

  <?php
  $args = array(
    'post_type'=>'banner',
    'posts_per_page'=> 1,
  );
  $banners=new WP_Query($args); $i=0;
  while($banners->have_posts()){$banners->the_post();?>
    <?php $background1 = get_post_meta( get_the_id(), 'background1' )[0]; ?>
    <?php if($background1){ ?>
      <img class="banner0Img banner0Img1" src="<?php echo $background1; ?>" alt="">
    <?php } ?>
    <?php $link1 = get_post_meta( get_the_id(), 'link1' )[0]; ?>
      <a href="<?php echo $link1; ?>" class="banner0Link1"></a>
    <div class="banner0FigCap1 banner0FigCap">
      <?php $bannerTxt1 = get_post_meta( get_the_id(), 'txt1' )[0]; ?>
      <?php if($bannerTxt1){ ?>
        <p class="banner0Txt banner0FigCap"><?php echo $bannerTxt1; ?></p>
      <?php } ?>
      <?php $bannerTxt2 = get_post_meta( get_the_id(), 'txt2' )[0]; ?>
      <?php if($bannerTxt2){ ?>
        <p class="banner0Txt banner0FigCap"><?php echo $bannerTxt2; ?></p>
      <?php } ?>
    </div>


    <?php $background2 = get_post_meta( get_the_id(), 'background2' )[0]; ?>
    <?php if($background2){ ?>
      <img class="banner0Img banner0Img2" src="<?php echo $background2; ?>" alt="">
    <?php } ?>
    <?php $link2 = get_post_meta( get_the_id(), 'link2' )[0]; ?>
    <?php if($link2){ ?>
      <a href="<?php echo $link2; ?>" class="banner0Link2"></a>
    <?php } ?>
    <?php $bannerTxt3 = get_post_meta( get_the_id(), 'txt3' )[0]; ?>
    <?php if($bannerTxt3){ ?>
      <p class="banner0FigCap2 banner0FigCap"><?php echo $bannerTxt3; ?></p>
    <?php } ?>

    <?php $floatingImg = get_post_meta( get_the_id(), 'floatingImg' )[0]; ?>
    <?php if($floatingImg){ ?>
      <img class="banner0FloatingImg" src="<?php echo $floatingImg; ?>" alt="">
    <?php } ?>
  <?php } ?>
</article>

<?php get_footer(); ?>
