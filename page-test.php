<?php get_header(); ?>

<figure class="inventory">
  <img class="inventoryImg rowcol1" src="<?php echo get_template_directory_uri(); ?>/img/inventoryBanner.jpg" alt="">
  <figcaption class="inventoryCaption rowcol1">
    <p>CURRENT</p>
    <h2>Inventory</h2>
  </figcaption>
</figure>




<!-- <form action="<?php // echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="get" class="filterBar" id="filterBar"> -->
<form method="get" class="filterBar" id="filterBar">
  <?php // $filter_nonce = wp_create_nonce( 'filer' ); ?>
  <!-- <input type="hidden" name="action" value="nds_form_response"> -->
  <!-- <input type="hidden" name="filter_nonce" value="<?php echo $filter_nonce ?>" /> -->


  <div class="filterBarTop">
    <div class="filterButton" onclick="altClassFromSelector('alt', '#filterBar')">
      <svg width="50" height="50" viewBox="0 0 100 85" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle class="filterButtonCircle" cx="13.6347" cy="13.6349" r="13.6349" transform="rotate(90 13.6347 13.6349)" fill="black"/>
        <circle class="filterButtonCircle" cx="17.0024" cy="46.0049" r="12.3623" transform="rotate(-90 17.0024 46.0049)" fill="black"/>
        <circle class="filterButtonCircle" cx="23.5057" cy="74.318" r="9.81672" transform="rotate(-90 23.5057 74.318)" fill="black"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M95.8338 18.1798L95.8181 18.1798L4.34355 18.1798L4.34355 18.1762C4.28835 18.1786 4.23288 18.1798 4.17715 18.1798C1.87621 18.1798 0.0109322 16.1449 0.0109323 13.6348C0.0109324 11.1247 1.87621 9.08985 4.17715 9.08985C4.23288 9.08985 4.28835 9.09104 4.34355 9.09341L4.34355 9.08984L96.0002 9.08985L96.0002 9.09344C98.224 9.18876 100 11.1855 100 13.6348C100 16.0841 98.224 18.0809 96.0002 18.1762L96.0002 18.1798L95.8495 18.1798L95.8338 18.1798Z" fill="black"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.52478 41.751L8.55117 41.7511L91.6978 41.7511L91.6978 41.7543C91.748 41.7522 91.7985 41.7511 91.8493 41.7511C93.941 41.7511 95.6368 43.6009 95.6368 45.8829C95.6368 48.1648 93.941 50.0146 91.8493 50.0146C91.7985 50.0146 91.748 50.0136 91.6978 50.0114L91.6978 50.0146L8.37335 50.0146L8.37335 50.0113C6.35178 49.9246 4.73731 48.1094 4.73731 45.8828C4.73731 43.6562 6.35179 41.8409 8.37335 41.7542L8.37335 41.7511L8.49838 41.7511L8.52478 41.751Z" fill="black"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M86.5474 74.2297C86.5474 76.0111 85.2557 77.4633 83.6383 77.5326L83.6383 77.5351L83.5318 77.5351L83.5174 77.5352L83.503 77.5351L16.9788 77.5351L16.9788 77.5325C16.9386 77.5342 16.8982 77.5351 16.8577 77.5351C15.1842 77.5351 13.8277 76.0552 13.8277 74.2297C13.8277 72.4041 15.1842 70.9243 16.8577 70.9243C16.8982 70.9243 16.9386 70.9251 16.9788 70.9268L16.9788 70.9243L83.6383 70.9243L83.6383 70.9269C85.2557 70.9961 86.5474 72.4484 86.5474 74.2297Z" fill="black"/>
      </svg>
      <!-- <svg width="50" height="50" viewBox="0 0 489 363" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle class="filterButtonCircle" cx="58.7665" cy="58.7662" r="58.7662" transform="rotate(90 58.7665 58.7662)" fill="black"/>
        <circle class="filterButtonCircle" cx="78.2814" cy="198.282" r="53.2814" transform="rotate(-90 78.2814 198.282)" fill="black"/>
        <circle class="filterButtonCircle" cx="118.31" cy="320.31" r="42.31" transform="rotate(-90 118.31 320.31)" fill="black"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M471.043 78.3551C471.008 78.3551 470.973 78.355 470.938 78.3548L76.7216 78.3547L76.7216 78.3394C76.4835 78.3496 76.2443 78.3548 76.0039 78.3548C66.0869 78.3548 58.0476 69.5846 58.0476 58.766C58.0476 47.9474 66.0869 39.1773 76.0039 39.1773C76.2443 39.1773 76.4835 39.1824 76.7216 39.1926L76.7216 39.1772L471.761 39.1773L471.761 39.193C481.345 39.6042 489 48.2102 489 58.7663C489 69.3225 481.345 77.9285 471.761 78.3397L471.761 78.3548L471.149 78.3548C471.114 78.355 471.078 78.3551 471.043 78.3551Z" fill="black"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M94.7434 179.948C94.7845 179.948 94.8255 179.948 94.8665 179.948L453.218 179.948L453.218 179.962C453.435 179.953 453.652 179.948 453.871 179.948C462.886 179.948 470.195 187.921 470.195 197.756C470.195 207.592 462.886 215.564 453.871 215.564C453.652 215.564 453.435 215.56 453.218 215.55L453.218 215.564L94.0903 215.564L94.0903 215.55C85.3776 215.176 78.4194 207.352 78.4194 197.756C78.4194 188.159 85.3776 180.336 94.0903 179.962L94.0903 179.948L94.6203 179.948C94.6613 179.948 94.7023 179.948 94.7434 179.948Z" fill="black"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M417.958 305.683L417.894 305.683L131.179 305.683L131.179 305.695C131.005 305.687 130.831 305.683 130.656 305.683C123.444 305.683 117.597 312.062 117.597 319.93C117.597 327.798 123.444 334.176 130.656 334.176C130.831 334.176 131.005 334.173 131.179 334.165L131.179 334.176L418.481 334.176L418.481 334.165C425.451 333.866 431.018 327.607 431.018 319.93C431.018 312.252 425.451 305.994 418.481 305.694L418.481 305.683L418.023 305.683L417.958 305.683Z" fill="black"/>
      </svg> -->
      <!-- <svg width="50" height="50" viewBox="0 0 275 231" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9167 50L263.542 50L264 50L264 49.9902C270.116 49.7277 275 44.2361 275 37.5C275 30.7639 270.116 25.2723 264 25.0098L264 25L263.542 25L11.9167 25L11.9167 25.0098C11.7647 25.0033 11.612 25 11.4586 25C5.1304 25 0.000335449 30.5964 0.000335147 37.5C0.000334845 44.4035 5.1304 50 11.4586 50C11.612 50 11.7647 49.9967 11.9167 49.9902L11.9167 50Z" fill="black"/>
        <circle class="filterButtonCircle1" cx="202.5" cy="37.5" r="37.5" transform="rotate(90 202.5 37.5)" fill="black"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M23.4167 114.828C23.4449 114.828 23.4731 114.829 23.5012 114.829L252.167 114.829L252.167 114.838C252.305 114.832 252.444 114.829 252.584 114.829C258.336 114.829 263 119.917 263 126.192C263 132.468 258.336 137.556 252.584 137.556C252.444 137.556 252.305 137.553 252.167 137.547L252.167 137.556L22.9999 137.556L22.9999 137.547C17.4402 137.308 13 132.316 13 126.192C13 120.068 17.4402 115.076 22.9999 114.837L22.9999 114.829L23.3322 114.829C23.3603 114.829 23.3885 114.828 23.4167 114.828Z" fill="black"/>
        <circle class="filterButtonCircle2" cx="79" cy="126" r="34" transform="rotate(-90 79 126)" fill="black"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M238 204.154C238 209.053 234.448 213.047 230.001 213.238L230.001 213.245L229.684 213.245L229.667 213.245L229.651 213.245L46.6668 213.245L46.6668 213.238C46.5563 213.243 46.4452 213.245 46.3336 213.245C41.7312 213.245 38.0002 209.175 38.0002 204.154C38.0002 199.133 41.7312 195.063 46.3336 195.063C46.4452 195.063 46.5563 195.066 46.6668 195.07L46.6668 195.063L230.001 195.063L230.001 195.07C234.448 195.261 238 199.255 238 204.154Z" fill="black"/>
        <ellipse class="filterButtonCircle3" rx="27" ry="27" transform="matrix(-4.37114e-08 -1 -1 4.37114e-08 185 204)" fill="black"/>
      </svg> -->
    </div>
    <div class="filterSeparator"></div>
    <input class="filterBarSearch" placeholder="Search" type="text" name="filter_search" value="">
    <button class="searchBtn">
      <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" class=""></path>
      </svg>
    </button>
    <a href="" class="filterBarLink buttonType1">inventory</a>
    <a href="" class="filterBarLink buttonType1">auctions</a>
    <a href="" class="filterBarLink buttonType1">sold</a>
  </div>
  <div class="filterBarBotttom">



    <?php function woocommerce_subcats_from_parentcat_by_ID($id){
      $term = get_term( $id, 'product_cat' );
      $args = array(
       'hierarchical' => 1,
       'show_option_none' => '',
       'hide_empty' => 0,
       'parent' => $id,
       'taxonomy' => 'product_cat'
      );
      $subcats = get_categories($args); ?>

      <div class="selectBox" tabindex="1" id="selectBox<?php echo $id; ?>">
        <div class="selectBoxButton">
          <span class="selectBoxPlaceholder"><?php echo $term->name; ?></span>
          <p class="selectBoxCurrent" id="selectBoxCurrent<?php echo $id; ?>"></p>
        </div>
        <div class="selectBoxList">
          <label for="nul<?php echo $id; ?>" class="selectBoxOption">
            <input type="radio" name="filter_<?php echo $term->slug; ?>" id="nul<?php echo $id; ?>" class="selectBoxInput" onclick="selectBoxControler('','#selectBox<?php echo $id; ?>','#selectBoxCurrent<?php echo $id; ?>')" value="0">
            <span class="checkmark"></span>
            <p class="colrOptP"></p>
          </label>
          <?php foreach ($subcats as $sc) { ?>
            <label for="<?php echo $sc->slug; ?>" class="selectBoxOption">
              <input type="radio" name="filter_<?php echo $term->slug; ?>" id="<?php echo $sc->slug; ?>" class="selectBoxInput" onclick="selectBoxControler('<?php echo $sc->name ?>', '#selectBox<?php echo $id; ?>', '#selectBoxCurrent<?php echo $id; ?>')" value="<?php echo $sc->slug; ?>">
              <span class="checkmark"></span>
              <p class="colrOptP"><?php echo $sc->name ?></p>
            </label>
          <?php } ?>
        </div>
      </div>
    <?php } ?>





<!-- Voy a tener un porro pronto -->


    <?php woocommerce_subcats_from_parentcat_by_ID(24); ?>
    <?php woocommerce_subcats_from_parentcat_by_ID(23); ?>
    <?php woocommerce_subcats_from_parentcat_by_ID(22); ?>
    <?php woocommerce_subcats_from_parentcat_by_ID(19); ?>

    <button class="filterSearch buttonType1" type="submit">Search</button>




  </div>
</form>




<div class="shopArchive">



  <?php

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
      'post_type'=>'product',
      'posts_per_page'=>9,
      'paged' => $paged,
    );
    if (isset($_GET['filter_year']) AND $_GET['filter_year']!=0) {
      $args['tax_query'] = array(
          array(
              'taxonomy' => 'product_cat',
              'field'    => 'slug',
              'terms'    => $_GET['filter_year'],
          ),
      );
    }
    if (isset($_GET['filter_search']) AND $_GET['filter_search']!='') {
      $args['s'] = $_GET['filter_search'];
    }

  // echo json_encode($args['tax_query']);
  // echo json_encode($args['s']);
  // var_dump($args);
  $blogPosts=new WP_Query($args);
  while($blogPosts->have_posts()){$blogPosts->the_post();$product_id = get_the_ID(); ?>



  <figure class="productCard">
    <?php
    global $product;
    $newness_days = 1;
    $created = strtotime( $product->get_date_created() );
    if ( ( time() - ( 60 * 60 * 24 * $newness_days ) ) < $created ) { ?>
      <span class="newArrival"><i>New arrival</i></span>
    <?php } ?>
    <!-- <span class="newArrival"><i>New arrival</i></span> -->
    <a class="productCardImg" href="<?php echo get_permalink(); ?>"><img class="productCardImg lazy" data-url="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt=""></a>
    <figcaption class="productCardCaption">
      <h5 class="productCardTitle"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>
      <p class="productCardTxt"><a href="<?php echo get_permalink(); ?>"><?php echo excerpt(70); ?></a></p>
      <p class="productCardPrice">
        <?php
        // $key_1_value = get_post_meta( get_the_ID(), '_auction_start_price', true );
        // Check if the custom field has a value.
        // if(!empty($key_1_value)){echo $key_1_value;}


        $product = wc_get_product( $product_id );
        echo $product->get_price_html(); ?>
      </p>
    </figcaption>
  </figure>
  <?php

} ?>
</div>
      <?php if (function_exists("pagination")) {
          pagination($custom_query->max_num_pages);
      } ?>


<?php get_footer(); ?>
