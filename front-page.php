<?php get_header(); ?>

<?php while(have_posts()){the_post();
  //the_content();
}
?>



<section class="carusATF">
<?php
  $args=array(
    'post_type'=>'post',
    'posts_per_page'=>5,
    'tag' => 'carousel',
  );$atf=new WP_Query($args);
  while($atf->have_posts()){$atf->the_post(); ?>
  <figure class="carus carouselItem rowcol1">
    <img class="carusImg rowcol1 lazy" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
  </figure>
  <?php } wp_reset_query(); ?>

  <button class="slideButton rowcol1 slideLeft" onclick="plusDivs(-1)"></button>
  <button class="slideButton rowcol1 slideRight" onclick="plusDivs(+1)"></button>

  <h2 class="frontCopy"><?php echo get_the_excerpt(); ?></h2>

</section>

<a href="<?php echo site_url('inventory'); ?>" class="viewInventoryBtn"><nobr>VIEW INVENTORY</nobr></a>


<?php // include 'filterBar.php'; ?>








<section class="hotAuctions">
  <?php
  $args = array(
    'post_type'=>'product',
    'posts_per_page'=>9,
    'tax_query' => array(
      array(
        'taxonomy' => 'product_type',
        'field'    => 'slug',
        'terms'    => 'auction',
      ),
    ),
  );
  $blogPosts=new WP_Query($args);
  $cardName='hotCard';

  if ( count( $blogPosts->posts ) > 0 ) { ?>
    <h3 class="hotAuctionsTitle">HOT AUCTIONS</h3>
  <?php }
  while($blogPosts->have_posts()){$blogPosts->the_post();
    global $product;
    // get all the categories on the product
    $categories = get_the_terms( get_the_ID(), 'product_cat' );
    // if it finds sometthing
    $brand=false;
    $yearBike=false;
    if ($categories) {
      // for each category
      foreach ($categories as $cat) {
        // get the slug of parent cattegory
        $parent=get_term_by('id', $cat->parent, 'product_cat', 'ARRAY_A')['slug'];
        if ($parent=="year-bikes") {$yearBike = $cat->name;}
        if ($parent=="brand") {$brand = $cat->name;}
      }
    } ?>

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
        <!-- NEW TITLE -->
        <h4 class="<?php echo $cardName; ?>Title">
          <?php if($brand){ ?><span class="singleSideAnoMarca singleSideBrand"><?php echo $brand; ?></span><?php } ?>
          <?php the_title(); ?>
          <?php if($yearBike){ ?><span class="singleSideAnoMarca singleSideYearBike"><?php echo $yearBike; ?></span><?php } ?>
        </h4>

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
              $start=new DateTime($product->get_auction_start_time(), new DateTimeZone(get_option('timezone_string')));
              $now = new DateTime();
              // $start=new DateTime($product->get_auction_start_time()); $now = new DateTime();
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

      </figcaption>
    </figure>
  <?php } ?>

</section>








<section class="hotAuctions">
  <?php
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
    ),
    'post__in'            => wc_get_featured_product_ids(),
  );
  $blogPosts=new WP_Query($args);

  if ( count( $blogPosts->posts ) > 0 ) { ?>
    <h3 class="hotAuctionsTitle">FEATURED PRODUCTS</h3>
  <?php }
  while($blogPosts->have_posts()){$blogPosts->the_post(); ?>
    <?php
    global $product;
    $brand=false;
    $yearBike=false;
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
    } ?>

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
        <!-- NEW TITLE -->
        <h4 class="<?php echo $cardName; ?>Title">
          <?php if($brand){ ?><span class="singleSideAnoMarca singleSideBrand"><?php echo $brand; ?></span><?php } ?>
          <?php the_title(); ?>
          <?php if($yearBike){ ?><span class="singleSideAnoMarca singleSideYearBike"><?php echo $yearBike; ?></span><?php } ?>
        </h4>

      </figcaption>
    </figure>
  <?php } ?>

</section>








<section class="dosMotos">
  <img class="dosMotosImg" src="<?php echo get_template_directory_uri(); ?>/img/dosMotos.png" alt="">
  <div class="dosMotosCaption">
    <h1 class="titleType1">Exceptional Quality</h1>
    <h4 class="subtitleType1">A COLLECTION OF ONLY THE EXTRAORDINARY</h4>
    <p class="mainTxtType1">Amatumoto is a prestigious company specializing in the sale motorcycle of Grand Prix and exclusive models. We have been recognized for selling very exclusive motorcycles as well as working with great collectors, museums and world championship teams. MotoGP, Moto2, Moto3, Superbike, 2 Strokes GP and Racing Parts directly from the paddocks to your hands. <br> <br>
      We offer the ultimate motorbike services experience, providing personal attention to each client that generates our existing success in sales. We are proud that we are able to share our passion for special bikes with a select group of people, our customers. Enter the world of Amatumoto!</p>
    <button class="buttonType1">VIRTUAL TOUR</button>
  </div>
</section>




<section class="consignSection">
  <h3 class="consignSectionTitle">World Class Consignment</h3>
  <h5 class="consignSectionSubTitle">LETTTING GO IS HARD, SELL YOUR RACE & ROAD BIKES WITH AMATUMOTO IS EASY</h5>
  <button class="buttonType1 consignButton"><a style="color: inherit; text-decoration: none;" href="https://gpmotorbikes.com/contact/consignment/">consign with amatumoto.com</a></button>
  <!-- <div class="consignSectionGallery">
    <img class="consignSectionImg" src="<?php echo get_template_directory_uri(); ?>/img/gallery1.png" alt="">
    <img class="consignSectionImg" src="<?php echo get_template_directory_uri(); ?>/img/gallery2.png" alt="">
    <img class="consignSectionImg" src="<?php echo get_template_directory_uri(); ?>/img/gallery3.png" alt="">
    <img class="consignSectionImg" src="<?php echo get_template_directory_uri(); ?>/img/gallery4.png" alt="">
  </div> -->
</section>












<?php get_footer(); ?>
