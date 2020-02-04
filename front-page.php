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

<a href="<?php echo site_url('inventory');  ?>" class="viewInventoryBtn"><nobr>VIEW INVENTORY</nobr></a>

<form class="searchBox">
  <svg class="searchBoxSvg" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
    <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" class=""></path>
  </svg>
  <input class="searchInput" type="text" placeholder="Search Inventory">
</form>







<section class="hotAuctions">
  <h3 class="hotAuctionsTitle">HOT AUCTIONS</h3>
  <?php
  $args = array(
    'post_type'=>'product',
    'posts_per_page'=>3,
  );
  $blogPosts=new WP_Query($args);
  while($blogPosts->have_posts()){$blogPosts->the_post(); ?>
    <?php global $product; ?>

    <figure class="hotCard">
      <a class="hotCardImg rowcol1" href="<?php echo get_permalink(); ?>">
        <img class="hotCardImg lazy" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
      </a>
      <figcaption class="hotCardCaption">
        <?php
        $terms = get_the_terms( get_the_ID(), 'product_cat' );

        foreach ($terms as $term) {

            echo '<h2 itemprop="name" class="hotCardSubtitle entry-title">'.$term->name.'</h2>';
        }
        // AUCTION INFORRMATION HERE
        // var_dump(get_post_meta( $product->id));
        ?>
        <h1 class="hotCardTitle"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h1>
        <p class="hotCardBids">10 Bids <br><span class="hotCardBidPrice">$210.00</span></p>
        <p class="hotCardEnd">Auction ends in:<br><span class="hotCardTime">12 Days 09:45:08</span></p>

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
