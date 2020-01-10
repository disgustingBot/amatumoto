<?php get_header(); ?>

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




<div class="searchSeparator">
  <div class="lines"></div>
  <div class="searchBox">
    <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
      <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" class=""></path>
    </svg>
    <p>Search Inventory</p>
  </div>
  <div class="lines"></div>
</div>





<section class="hotAuctions">
  <?php
  $args = array(
    'post_type'=>'product',
    'posts_per_page'=>3,
  );
  $blogPosts=new WP_Query($args);
  while($blogPosts->have_posts()){$blogPosts->the_post(); ?>
    <figure class="productCard">
      <a class="productCardImg rowcol1" href="<?php echo get_permalink(); ?>"><img class="productCardImg lazy" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt=""></a>
      <figcaption class="productCardCaption">
        <h5 class="productCardTitle"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>
      </figcaption>
    </figure>
  <?php } ?>

</section>


<section class="dosMotos">
  <img class="dosMotosImg" src="<?php echo get_template_directory_uri(); ?>/img/dosMotos.png" alt="">
  <div class="dosMotosCaption">
    <h4 class="dosMotosTitle">Unparalleled Quality</h4>
    <h5 class="dosMotosSubTitle">A COLLECTION OF ONLY THE EXTRAORDINARY</h5>
    <p class="dosMotosTxt">Amatumoto is a prestigious company specializing in the sale motorcycle of Grand Prix and exclusive models. We have been recognized for selling very exclusive motorcycles as well as working with great collectors, museums and world championship teams. <br> <br>
      We offer the ultimate motorbike services experience, providing personal attention to each client that generates our existing success in sales. We are proud that we are able to share our passion for special bikes with a select group of people, our customers. Enter the world of Amatumoto!</p>
    <button class="dosMotosButton">VIRTUAL TOUR</button>
  </div>
</section>




<section class="consign">
  <h3 class="consignTitle">World Class Consignment</h3>
  <h5 class="consignSubTitle">LETTTING GO IS HARD, SELLING WITH ___________ IS EASY</h5>
  <button class="consignButton">CONSIGN WITH ___________</button>
  <div class="consignGallery">
    <img src="<?php echo get_template_directory_uri(); ?>/img/gallery1.png" alt="" class="consignImg">
    <img src="<?php echo get_template_directory_uri(); ?>/img/gallery2.png" alt="" class="consignImg">
    <img src="<?php echo get_template_directory_uri(); ?>/img/gallery3.png" alt="" class="consignImg">
    <img src="<?php echo get_template_directory_uri(); ?>/img/gallery4.png" alt="" class="consignImg">
  </div>
</section>












<?php get_footer(); ?>
