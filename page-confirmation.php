<?php get_header(); ?>


<section class="confirmationContent">
  <p class="confirmationTxt">Thanks for using our auction system! you can now <span class="loginConfirm" onclick="altClassFromSelector('alt','#logForm')"><i>Login</i></span> to see your auctions in the login menu, at the top left of the page.</p>
    <!-- <p class="confirmationTxt">Your confirmation process could not be carried out, please <span class="loginConfirm" onclick="altClassFromSelector('alt','#logForm')"><i> try again.</i></span></p> -->
</section>













<?php
// foreach ($_GET as $key => $value) {
//   // code...
//   // echo $key . ' => ' . $value . '<br>';
// }


if (isset($_GET['confirmation'])) {
  // code...
  $yoursearchquery = $_GET['confirmation'];
  $users = new WP_User_Query(array(
    'search' => $yoursearchquery,
    'meta_query' => array(
      'relation' => 'OR',
      array(
        'key'     => 'confirmation',
        'value'   => $yoursearchquery,
        'compare' => '='
        // 'compare' => 'LIKE'
      ),
      // array(
      //   'key' => 'shoe_color',
      //   'value' => $search_operation,
      //   'compare' => 'LIKE'
      // ),
      // array(
      //   'key' => 'shoe_maker',
      //   'value' => $yoursearchquery,
      //   'compare' => '='
      // )
    )
  ));

  foreach ($users as $key => $value) {
    var_dump($key);
    echo '<br>';
    echo '<br>';
    echo '<br>';
    var_dump($value);
    // code...
    echo '<br>';
  }
}


?>
<?php get_footer(); ?>
