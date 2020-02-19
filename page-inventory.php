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


    if(get_query_var('paged')){$paged=get_query_var('paged');}elseif(get_query_var('page')){$paged=get_query_var('page');}else{$paged=1;}
    $args = array(
      'post_type'      => 'product',
      'posts_per_page' => 9,
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


  <?php if (method_exists($product,'get_condition')){
    $cardName='hotCard';
  }
  else{
    $cardName='productCard';
  } ?>
  <figure class="<?php echo $cardName; ?>">

      <?php
      global $product;
      $newness_days = 1;
      $created = strtotime( $product->get_date_created() );
      if ( ( time() - ( 60 * 60 * 24 * $newness_days ) ) < $created ) { ?>
        <span class="newArrival"><i>New arrival</i></span>
        <?php } ?>
    <a class="<?php echo $cardName; ?>Img rowcol1" href="<?php echo get_permalink(); ?>">
      <img class="<?php echo $cardName; ?>Img lazy" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
    </a>
    <figcaption class="<?php echo $cardName; ?>Caption">
      <?php
        // get all the categories on the product
        $terms = get_the_terms( get_the_ID(), 'product_cat' );
        // for each category
        if($terms){ ?>
          <p class="<?php echo $cardName; ?>AnoMarca"><a href="<?php echo get_permalink(); ?>">
          <?php foreach ($terms as $term) {
            // get the parent category
            $parent=get_term_by('id', $term->parent, 'product_cat', 'ARRAY_A')['slug'];
            // check if parent is either year or brand
            if ($parent=="year-bikes" OR $parent=="brand") { ?>
              <span><?php echo $term->name; ?></span>
            <?php }
          } ?>
        </a></p>
      <?php } ?>
      <h4 class="<?php echo $cardName; ?>Title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>

      <?php if(method_exists($product,'get_seconds_remaining')){ ?>
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

      <?php if(method_exists($product,'get_seconds_remaining')){ ?>
        <p class="auctionDetails">
          <?php
            $start=new DateTime($product->get_auction_start_time()); $now = new DateTime();
            if ( $start > $now ) { ?>
              <span class="auctionDetailsTitle">Auction starts:</span>
              <span class="auctionDetailsValue auction-time-countdown" data-time="<?php echo esc_attr( $product->get_seconds_to_auction() ); ?>" data-format="<?php echo esc_attr( get_option( 'auctions_for_woocommerce_countdown_format' ) ); ?>"></span>
            <?php } else { ?>
              <span class="auctionDetailsTitle"><?php echo wp_kses_post( apply_filters( 'time_text', esc_html__( 'Time left:', 'auctions-for-woocommerce' ), $product_id ) ); ?></span>
              <span class="auctionDetailsValue main-auction auction-time-countdown" data-time="<?php echo esc_attr( $product->get_seconds_remaining() ); ?>" data-auctionid="<?php echo intval( $product_id ); ?>" data-format="<?php echo esc_attr( get_option( 'auctions_for_woocommerce_countdown_format' ) ); ?>"></span>
            <?php }
          ?>
        </p>
      <?php } ?>

      <?php if(!method_exists($product,'get_seconds_remaining')){ ?>
        <p class="productCardTxt"><a href="<?php echo get_permalink(); ?>"><?php echo excerpt(70); ?></a></p>
      <?php } ?>


    </figcaption>
  </figure>
  <?php

} ?>
</div>



<?php echo latte_pagination($blogPosts->max_num_pages); ?>



<?php get_footer(); ?>
