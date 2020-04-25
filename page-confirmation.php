<?php get_header(); ?>
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
