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
    // 'search' => $yoursearchquery,
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




  // Get the results
  $authors = $users->get_results();

  // Check for results
  if (!empty($authors)) {
      echo '<ul>';
      // loop through each author
      foreach ($authors as $author)
      {
          // get all the user's data
          $author_info = get_userdata($author->ID);


          echo '<li>' . $author_info->confirmation . ' ' . $author_info->last_name . '</li>';
          if(get_user_meta($author->ID, 'confirmation')){
            // echo 'SIII!';
            delete_user_meta( $author->ID, 'confirmation' );
          }
          echo '<li>' . $author_info->confirmation . ' ' . $author_info->last_name . '</li>';
      }
      echo '</ul>';
  } else {
      echo 'No authors found';
  }







}

var_dump(get_user_meta(get_current_user_id(), 'confirmation'));



?>
<?php get_footer(); ?>
