<?php get_header(); ?>

<?php while(have_posts()){the_post();
  //the_content();
} ?>


<section class="carusATF">
<?php
  $args=array(
    'post_type'=>'post',
    'posts_per_page'=>3,
    'tag' => 'carousel',
  );$atf=new WP_Query($args);
  while($atf->have_posts()){$atf->the_post(); ?>
  <figure class="carus carouselItem rowcol1">
    <img class="carusImg rowcol1 lazy" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
  </figure>
  <?php } wp_reset_query(); ?>



  <button class="slideButton rowcol1 slideLeft" onclick="plusDivs(-1)">&#10094;</button>
  <button class="slideButton rowcol1 slideRight" onclick="plusDivs(+1)">&#10095;</button>


</section>

<a href="<?php echo site_url('inventory'); ?>" class="viewInventoryBtn"><nobr>VIEW INVENTORY</nobr></a>


<?php include 'filterBar.php'; ?>




<!-- <form class="searchBox" action="/grandPrix/inventory" method="get">
  <svg class="searchBoxSvg" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
    <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" class=""></path>
  </svg>
  <input class="searchInput" type="text" placeholder="Search Inventory">
</form> -->



<section class="hotAuctions">
  <?php
  $args = array(
    'post_type'=>'product',
    'posts_per_page'=>3,
    'tax_query' => array(
        array(
            'taxonomy' => 'product_type',
            'field'    => 'slug',
            'terms'    => 'auction',
        ),
    ),
  );
  $blogPosts=new WP_Query($args);
  if ( count( $blogPosts->posts ) >= 1 ) {
    ?><h3 class="hotAuctionsTitle">HOT AUCTIONS</h3><?php
    $cardName='hotCard';
  } else {
    ?><h3 class="hotAuctionsTitle">FEATURED PRODUCTS</h3><?php
    $cardName='productCard';
    $args = array(
      'post_type'=>'product',
      'posts_per_page'=>3,
      'tax_query' => array(
          array(
              'taxonomy' => 'product_type',
              'field'    => 'slug',
              'terms'    => 'simple',
          ),
          array(
            'taxonomy' => 'product_visibility',
            'field'    => 'term_id',
            'terms'    => 'featured',
            'operator' => 'IN',
        ),
      ),
    );
    $blogPosts=new WP_Query($args);
  }

  while($blogPosts->have_posts()){$blogPosts->the_post(); ?>
    <?php global $product; ?>

    <figure class="<?php echo $cardName; ?>">

        <?php
        global $product;
        // $newness_days = 1;
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
                <span class="auctionDetailsValue auction-time-countdown notMet" data-time="<?php echo esc_attr( $product->get_seconds_to_auction() ); ?>" data-format="<?php echo esc_attr( get_option( 'auctions_for_woocommerce_countdown_format' ) ); ?>"></span>
              <?php } else { ?>
                <span class="auctionDetailsTitle"><?php echo wp_kses_post( apply_filters( 'time_text', esc_html__( 'Time left:', 'auctions-for-woocommerce' ), $product_id ) ); ?></span>
                <span class="auctionDetailsValue main-auction auction-time-countdown notMet" data-time="<?php echo esc_attr( $product->get_seconds_remaining() ); ?>" data-auctionid="<?php echo intval( $product_id ); ?>" data-format="<?php echo esc_attr( get_option( 'auctions_for_woocommerce_countdown_format' ) ); ?>"></span>
              <?php }
            ?>
          </p>
        <?php } ?>

        <?php if(!method_exists($product,'get_seconds_remaining')){ ?>
          <p class="productCardTxt"><a href="<?php echo get_permalink(); ?>"><?php echo excerpt(70); ?></a></p>
        <?php } ?>


      </figcaption>
    </figure>
  <?php } ?>

</section>


<section class="dosMotos">
  <img class="dosMotosImg" src="<?php echo get_template_directory_uri(); ?>/img/dosMotos.png" alt="">
  <div class="dosMotosCaption">
    <h1 class="titleType1">Unparalleled Quality</h1>
    <h4 class="subtitleType1">A COLLECTION OF ONLY THE EXTRAORDINARY</h4>
    <p class="mainTxtType1">Amatumoto is a prestigious company specializing in the sale motorcycle of Grand Prix and exclusive models. We have been recognized for selling very exclusive motorcycles as well as working with great collectors, museums and world championship teams. <br> <br>
      We offer the ultimate motorbike services experience, providing personal attention to each client that generates our existing success in sales. We are proud that we are able to share our passion for special bikes with a select group of people, our customers. Enter the world of Amatumoto!</p>
    <button class="buttonType1">VIRTUAL TOUR</button>
  </div>
</section>




<section class="consignSection">
  <h3 class="consignSectionTitle">World Class consignment</h3>
  <h5 class="consignSectionSubTitle">LETTTING GO IS HARD, SELLING WITH amatumoto.com IS EASY</h5>
  <button class="buttonType1 consignButton">consign with amatumoto.com</button>
  <div class="consignSectionGallery">
    <img class="consignSectionImg" src="<?php echo get_template_directory_uri(); ?>/img/gallery1.png" alt="">
    <img class="consignSectionImg" src="<?php echo get_template_directory_uri(); ?>/img/gallery2.png" alt="">
    <img class="consignSectionImg" src="<?php echo get_template_directory_uri(); ?>/img/gallery3.png" alt="">
    <img class="consignSectionImg" src="<?php echo get_template_directory_uri(); ?>/img/gallery4.png" alt="">
  </div>
</section>












<?php get_footer(); ?>
