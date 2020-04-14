<?php get_header(); ?>
<!-- <figure class="pageBanner">
  <img class="pageBannerImg rowcol1" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
  <figcaption class="pageBannerCaption rowcol1">
    <h2><?php the_title();?></h2>
  </figcaption>
</figure> -->


<figure class="pageBanner">
  <img class="pageBannerImg rowcol1" src="<?php echo wp_get_attachment_url(get_woocommerce_term_meta(get_queried_object()->term_id, 'thumbnail_id', true )); ?>" alt="">
  <figcaption class="pageBannerCaption rowcol1">
    <!-- <h2><?php echo get_queried_object()->name; ?></h2> -->
    <h2>Inventory</h2>
  </figcaption>
</figure>

<?php include get_template_directory().'/filterBar.php'; ?>


<div class="shopArchive shopInventory" id="slider">

  <?php while (have_posts()){the_post();global $product; ?>

  <!-- <figure class="productCard">
    <?php
    // global $product;
    // $newness_days = 1;
    // $created = strtotime( $product->get_date_created() );
    // if ( ( time() - ( 60 * 60 * 24 * $newness_days ) ) < $created ) { ?>
      <span class="newArrival"><i>New arrival</i></span>
    <?php // } ?>
    <a class="productCardImg" href="<?php echo get_permalink(); ?>"><img class="productCardImg lazy" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt=""></a>
    <figcaption class="productCardCaption">
      <h5 class="productCardTitle"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>
      <p class="productCardTxt"><a href="<?php echo get_permalink(); ?>"><?php echo excerpt(70); ?></a></p>
      <p class="productCardPrice"><?php echo $product->get_price_html(); ?></p>
    </figcaption>
  </figure> -->





    <?php
    if( $product->is_type( 'auction' ) ){
      $cardName='hotCard';
    }
    else{
      $cardName='productCard';
    }
    ?>





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







        <figure class="<?php echo $cardName; ?>">
          <?php $created = strtotime( $product->get_date_created() );
          if ( ( time() - ( 60 * 60 * 24 * $newness_days ) ) < $created ) { ?>
            <span class="newArrival"><i>New arrival</i></span>
          <?php } ?>
          <a class="<?php echo $cardName; ?>Img rowcol1" href="<?php echo get_permalink(); ?>">
            <img class="<?php echo $cardName; ?>Img lazy" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
          </a>
          <figcaption class="<?php echo $cardName; ?>Caption">
            <!-- NEW TITLE -->
            <h4 class="<?php echo $cardName; ?>Title">
              <?php if($brand){ ?><span class="singleSideAnoMarca singleSideBrand"><?php echo $brand; ?></span><?php } ?>
              <?php the_title(); ?>
              <?php if($yearBike){ ?><span class="singleSideAnoMarca singleSideYearBike"><?php echo $yearBike; ?></span><?php } ?>
            </h4>

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
              <p class="auctionDetails">
                <?php
                $start=new DateTime($product->get_auction_start_time()); $now = new DateTime();
                if ( $start > $now ) { ?>
                  <span class="auctionDetailsTitle">Auction starts:</span>
                  <span class="auctionDetailsValue auction-time-countdown notMet" data-time="<?php echo esc_attr( $product->get_seconds_to_auction() ); ?>" data-format="<?php echo esc_attr( get_option( 'auctions_for_woocommerce_countdown_format' ) ); ?>"></span>
                <?php } else { ?>
                  <span class="auctionDetailsTitle"><?php echo wp_kses_post( apply_filters( 'time_text', esc_html__( 'Time left:', 'auctions-for-woocommerce' ), $product_id ) ); ?></span>
                  <span class="auctionDetailsValue main-auction auction-time-countdown notMet" data-time="<?php echo esc_attr( $product->get_seconds_remaining() ); ?>" data-auctionid="<?php echo intval( $product_id ); ?>" data-format="<?php echo esc_attr( get_option( 'auctions_for_woocommerce_countdown_format' ) ); ?>"></span>
                <?php } ?>
              </p>
            <?php } ?>
          </figcaption>
        </figure>





























  <?php } ?>

  <?php echo misha_paginator(get_pagenum_link()); ?>
</div>




























<?php get_footer(); ?>
