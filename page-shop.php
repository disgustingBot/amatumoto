<?php get_header(); ?>



<figure class="inventory">
  <img class="inventoryImg rowcol1" src="<?php echo get_template_directory_uri(); ?>/img/inventoryBanner.jpg" alt="">
  <figcaption class="inventoryCaption rowcol1">
    <p>CURRENT</p>
    <h2>Inventory</h2>
  </figcaption>
</figure>

<h1>Filters</h1>


  <div class="shopArchive">
      <?php
      $args = array(
        'post_type'=>'product',
        'posts_per_page'=>9,
      );
      $blogPosts=new WP_Query($args);
      while($blogPosts->have_posts()) {
        $blogPosts->the_post();$featuredID=get_the_ID(); ?>


      <figure class="productCard">
        <p>
          <?php $product_id = get_the_ID();
          $product = wc_get_product( $product_id );
          echo $product->get_price_html(); ?> /
          <span class="newArrival">NEW ARRIVAL</span>
        </p>
        <a class="productCardImg" href="<?php echo get_permalink(); ?>"><img class="productCardImg lazy" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt=""></a>
        <figcaption class="productCardCaption">
          <!-- <h5 class="productCardTitle"><a href="<?php echo get_permalink(); ?>"><?php echo get_permalink(); ?></a></h5> -->
          <h5 class="productCardTitle"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>
          <p class="productCardTxt"><a href="<?php echo get_permalink(); ?>"><?php echo excerpt(70); ?></a></p>
        </figcaption>
      </figure>
      <?php

    } ?>

  </div>

  <div class="pagination">
    <?php echo paginate_links(); ?>
    <!-- <h1>ggg</h1> -->
  </div>



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
