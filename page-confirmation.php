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
      ),
    )
  ));
  // Get the results
  $authors = $users->get_results();
  // Check for results
  if (!empty($authors)) {
      // echo '<ul>';
      // loop through each author
      foreach ($authors as $author)
      {
          // get all the user's data
          $author_info = get_userdata($author->ID);


          // echo '<li>' . $author_info->confirmation . ' ' . $author_info->last_name . '</li>';
          if(get_user_meta($author->ID, 'confirmation')){
            delete_user_meta( $author->ID, 'confirmation' ); ?>


            <section class="confirmationContent">
              <!-- <p class="confirmationTxt">Thanks for confirming your account <span class="loginConfirm" onclick="altClassFromSelector('alt','#logForm')"><i>Login</i></span> to see your auctions in the login menu, at the top left of the page.</p> -->
              <!-- <p class="confirmationTxt">Your confirmation process could not be carried out, please <span class="loginConfirm" onclick="altClassFromSelector('alt','#logForm')"><i> try again.</i></span></p> -->

              <p class="userLoggedInTxt">Congratulations. Now you can login!</p>
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

          <?php }
          // echo '<li>' . $author_info->confirmation . ' ' . $author_info->last_name . '</li>';
      }
      // echo '</ul>';
  } else { ?>
  <section class="confirmationContent">
    <p class="userLoggedInTxt">Ha habido un error, intenta denuevo o ponte en contacto con nosotros</p>
  </section>
  <?php }
}

































if (isset($_GET['newPass'])) {
  // code...
  $yoursearchquery = $_GET['newPass'];
  $users = new WP_User_Query(array(
    // 'search' => $yoursearchquery,
    'meta_query' => array(
      'relation' => 'OR',
      array(
        'key'     => 'newPass',
        'value'   => $yoursearchquery,
        'compare' => '='
      ),
    )
  ));
  // Get the results
  $authors = $users->get_results();
  // Check for results
  if (!empty($authors)) {
      // echo '<ul>';
      // loop through each author
      foreach ($authors as $author) {
          // get all the user's data
          $author_info = get_userdata($author->ID);


          // echo '<li>' . $author_info->confirmation . ' ' . $author_info->last_name . '</li>';
          if(get_user_meta($author->ID, 'newPass')){
            // delete_user_meta( $author->ID, 'newPass' );
            ?>


            <section class="confirmationContent">


              <form class="newPassForm alt" id="newPassForm" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
                <input type="hidden" name="action" value="lt_new_pass">
                <input type="hidden" name="link" value="<?php echo home_url( $wp->request ); ?>">
                <input type="hidden" name="code" value="<?php echo $yoursearchquery; ?>">

                <h4 class="newPassFormTitle">Change Password:</h4>
                  <!-- <button class="logFormTitleRegister" onclick="altClassFromSelector('alt','#logFormFields')" type="button" name="button">you don't have an account?</button> -->


                <!-- <div class="filterBarBotttom"> -->

                  <div class="mateput logFormPass" style="width: 250px; margin-bottom: 16px;">
                    <input class="mateputInput" type="password" name="newp" autocomplete="off" value="" required minlength="6">
                    <label for="newp" class="mateputLabel">
                      <span class="mateputName">New password</span>
                    </label>
                  </div>

                  <div class="mateput logFormPass" style="width: 250px; margin-bottom: 16px;">
                    <input class="mateputInput" type="password" name="cnfp" autocomplete="off" value="" required minlength="6">
                    <label for="cnfp" class="mateputLabel">
                      <span class="mateputName">Repeat password</span>
                    </label>
                  </div>

                  <button class="filterSearch" type="submit" name="button"  style="width: 250px;">Confirm</button>
                <!-- </div> -->

                <?php if (isset($_GET['pass'])) { ?>
                  <p class="newPassFormError">Password is incorrect</p>
                <?php } ?>
                <?php if (isset($_GET['match'])) { ?>
                <p class="newPassFormError">Password does not match</p>
                <?php } ?>
                <!-- <p class="newPassFormSuccess">Password successfully changed!</p> -->
              </form>
            </section>

          <?php }
          // echo '<li>' . $author_info->confirmation . ' ' . $author_info->last_name . '</li>';
      }
      // echo '</ul>';
  } else { ?>
  <section class="confirmationContent">
    <p class="userLoggedInTxt">Ha habido un error, intenta denuevo o ponte en contacto con nosotros</p>
  </section>
  <?php }
}

// var_dump(get_user_meta(get_current_user_id(), 'confirmation'));



?>
<?php get_footer(); ?>
