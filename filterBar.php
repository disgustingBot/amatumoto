
<form class="filterBar alt" id="filterBar" method="get" action="<?php echo site_url('inventory'); ?>">
  <div class="filterBarTop">
    <div class="filterButton" onclick="altClassFromSelector('alt', '#filterBar')">
      <!-- TODO: CUANDO CAMBIES EL SVG ELIMINA LA FUNCION JS QUE MUEVE EL SVG  -->
      <svg width="50" height="50" viewBox="0 0 100 85" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle class="filterButtonCircle" cx="13.6347" cy="13.6349" r="13.6349" transform="rotate(90 13.6347 13.6349)" fill="black"/>
        <circle class="filterButtonCircle" cx="17.0024" cy="46.0049" r="12.3623" transform="rotate(-90 17.0024 46.0049)" fill="black"/>
        <circle class="filterButtonCircle" cx="23.5057" cy="74.318" r="9.81672" transform="rotate(-90 23.5057 74.318)" fill="black"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M95.8338 18.1798L95.8181 18.1798L4.34355 18.1798L4.34355 18.1762C4.28835 18.1786 4.23288 18.1798 4.17715 18.1798C1.87621 18.1798 0.0109322 16.1449 0.0109323 13.6348C0.0109324 11.1247 1.87621 9.08985 4.17715 9.08985C4.23288 9.08985 4.28835 9.09104 4.34355 9.09341L4.34355 9.08984L96.0002 9.08985L96.0002 9.09344C98.224 9.18876 100 11.1855 100 13.6348C100 16.0841 98.224 18.0809 96.0002 18.1762L96.0002 18.1798L95.8495 18.1798L95.8338 18.1798Z" fill="black"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.52478 41.751L8.55117 41.7511L91.6978 41.7511L91.6978 41.7543C91.748 41.7522 91.7985 41.7511 91.8493 41.7511C93.941 41.7511 95.6368 43.6009 95.6368 45.8829C95.6368 48.1648 93.941 50.0146 91.8493 50.0146C91.7985 50.0146 91.748 50.0136 91.6978 50.0114L91.6978 50.0146L8.37335 50.0146L8.37335 50.0113C6.35178 49.9246 4.73731 48.1094 4.73731 45.8828C4.73731 43.6562 6.35179 41.8409 8.37335 41.7542L8.37335 41.7511L8.49838 41.7511L8.52478 41.751Z" fill="black"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M86.5474 74.2297C86.5474 76.0111 85.2557 77.4633 83.6383 77.5326L83.6383 77.5351L83.5318 77.5351L83.5174 77.5352L83.503 77.5351L16.9788 77.5351L16.9788 77.5325C16.9386 77.5342 16.8982 77.5351 16.8577 77.5351C15.1842 77.5351 13.8277 76.0552 13.8277 74.2297C13.8277 72.4041 15.1842 70.9243 16.8577 70.9243C16.8982 70.9243 16.9386 70.9251 16.9788 70.9268L16.9788 70.9243L83.6383 70.9243L83.6383 70.9269C85.2557 70.9961 86.5474 72.4484 86.5474 74.2297Z" fill="black"/>
      </svg>
    </div>

    <div class="mateput">
      <input id="mateputInput" type="text" name="filter_search" autocomplete="off">
      <label for="name" class="mateputLabel">
        <span class="mateputName">Search</span>
      </label>
    </div>
    <!-- <input class="filterBarSearch" placeholder="Search" type="text" name="filter_search" value=""> -->
    <button class="searchBtn">
      <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" class=""></path>
      </svg>
    </button>
    <a href="" class="filterBarLink">inventory</a>
    <a href="" class="filterBarLink">auctions</a>
    <a href="" class="filterBarLink">sold</a>
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
            <input class="selectBoxInput" type="radio" name="filter_<?php echo $term->slug; ?>" id="nul<?php echo $id; ?>" onclick="selectBoxControler('','#selectBox<?php echo $id; ?>','#selectBoxCurrent<?php echo $id; ?>')" value="0">
            <!-- <span class="checkmark"></span> -->
            <p class="colrOptP"></p>
          </label>
          <?php foreach ($subcats as $sc) { ?>
            <label for="<?php echo $sc->slug; ?>" class="selectBoxOption">
              <input type="radio" name="filter_<?php echo $term->slug; ?>" id="<?php echo $sc->slug; ?>" class="selectBoxInput" onclick="selectBoxControler('<?php echo $sc->name ?>', '#selectBox<?php echo $id; ?>', '#selectBoxCurrent<?php echo $id; ?>')" value="<?php echo $sc->slug; ?>">
              <!-- <span class="checkmark"></span> -->
              <p class="colrOptP"><?php echo $sc->name ?></p>
            </label>
          <?php } ?>
        </div>
      </div>
    <?php } ?>

    <?php woocommerce_subcats_from_parentcat_by_ID(27); ?>
    <?php //woocommerce_subcats_from_parentcat_by_ID(30); ?>
    <?php woocommerce_subcats_from_parentcat_by_ID(32); ?>
    <?php woocommerce_subcats_from_parentcat_by_ID(29); ?>
    <?php woocommerce_subcats_from_parentcat_by_ID(31); ?>

    <button class="filterSearch" type="submit">
      <span>Search</span>
      <svg aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" class=""></path>
      </svg>
    </button>

  </div>
</form>
