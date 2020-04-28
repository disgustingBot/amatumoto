<?php get_header(); ?>


<section class="confirmationContent">
  <!-- <p class="confirmationTxt">Thanks for confirming your account <span class="loginConfirm" onclick="altClassFromSelector('alt','#logForm')"><i>Login</i></span> to see your auctions in the login menu, at the top left of the page.</p> -->
  <!-- <p class="confirmationTxt">Your confirmation process could not be carried out, please <span class="loginConfirm" onclick="altClassFromSelector('alt','#logForm')"><i> try again.</i></span></p> -->

  <p class="userLoggedInTxt">You are now logged in!</p>
  <br>
  <p class="youCan">You can now...</p>
  <br>
  <ul class="userLoggedOptions">
    <li class="userLoggedItem">
      <a href="https://gpmotorbikes.com/account">Go to your account</a>
    </li>
    <li class="userLoggedItem">
      <a href="https://gpmotorbikes.com/inventory/?auction=true">View our current auctions</a>
    </li>
    <li class="userLoggedItem">
      <a href="https://gpmotorbikes.com/inventory/">Explore our inventory</a>
    </li>
    <li class="userLoggedItem">
      <a href="https://gpmotorbikes.com/contact/about-us/">Read about us</a>
    </li>
  </ul>
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
