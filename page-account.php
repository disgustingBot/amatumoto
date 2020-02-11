<?php get_header(); ?>
<?php global $current_user; $current_user = wp_get_current_user(); ?>


<figure class="pageBanner">
  <img class="pageBannerImg rowcol1" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
  <figcaption class="pageBannerCaption rowcol1">
    <h2><?php the_title();?> - <?php echo $current_user->display_name; ?></h2>
  </figcaption>
</figure>


<main class="accountSection">

<?php if ( is_user_logged_in() ) { ?>

    <!-- <h3 class="hotAuctionsTitle">Your auctions:</h3> -->
    <?php echo do_shortcode('[auctions_for_woocommerce_my_auctions]'); ?>

    <!-- <h3 class="hotAuctionsTitle">Your Watchlist:</h3> -->
    <?php // echo do_shortcode('[auctions_watchlist]'); ?>


    <!-- <h3 class="hotAuctionsTitle">Your Activity:</h3> -->
    <?php // echo do_shortcode('[my_auctions_activity]'); ?>


 <?php
   /**
    * @example Safe usage:
    * $current_user = wp_get_current_user();
    * if ( ! $current_user->exists() ) {
    *     return;
    * }
    */
   // echo 'Username: ' . $current_user->user_login . '<br />';
   // echo 'User email: ' . $current_user->user_email . '<br />';
   // echo 'User first name: ' . $current_user->user_firstname . '<br />';
   // echo 'User last name: ' . $current_user->user_lastname . '<br />';
   // echo 'User display name: ' . $current_user->display_name . '<br />';
   // echo 'User ID: ' . $current_user->ID . '<br />';


   // var_dump($current_user);
 ?>



       <h3 class="newPassFormTitle">User Data!</h3>

       <h4 class="newPassFormTitle">Username: <?php echo $current_user->display_name; ?></h4>
       <h4 class="newPassFormTitle">User mail: <?php echo $current_user->user_email; ?></h4>

       <form class="newPassForm" id="newPassForm" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
         <input type="hidden" name="action" value="lt_new_pass">
         <input type="hidden" name="link" value="<?php echo home_url( $wp->request ); ?>">

         <h4 class="newPassFormTitle" onclick="altClassFromSelector('alt','#newPassForm')">Change Password:</h4>
           <!-- <button class="logFormTitleRegister" onclick="altClassFromSelector('alt','#logFormFields')" type="button" name="button">you don't have an account?</button> -->


         <div class="filterBarBotttom">

           <div class="mateput logFormName">
             <input class="mateputInput" type="password" name="oldp" autocomplete="off" value="" required>
             <label for="oldp" class="mateputLabel">
               <span class="mateputName">Old pass</span>
             </label>
           </div>

           <div class="mateput logFormPhono">
             <input class="mateputInput" type="password" name="newp" autocomplete="off" value="" required minlength="6">
             <label for="newp" class="mateputLabel">
               <span class="mateputName">New Pass</span>
             </label>
           </div>

           <div class="mateput logFormMail">
             <input class="mateputInput" type="password" name="cnfp" autocomplete="off" value="" required minlength="6">
             <label for="cnfp" class="mateputLabel">
               <span class="mateputName">Repeat</span>
             </label>
           </div>

           <button class="filterSearch" type="submit" name="button">Confirm</button>
         </div>

        <?php if (isset($_GET['pass'])) { ?>
          <p class="newPassFormError">Password is incorrect</p>
        <?php } ?>
        <?php if (isset($_GET['match'])) { ?>
         <p class="newPassFormError">Password does not match</p>
        <?php } ?>
         <!-- <p class="newPassFormSuccess">Password successfully changed!</p> -->
       </form>






<?php } else { ?>


        <form class="" id="logForm" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
          <input type="hidden" name="action" value="lt_login">
          <input type="hidden" name="link" value="<?php echo home_url( $wp->request ); ?>">

          <div class="logFormTitle">
            <h3>Enter</h3>
            <button class="logFormTitleRegister" onclick="altClassFromSelector('alt','#logFormFields')" type="button" name="button">you don't have an account?</button>
          </div>


          <div class="logFormFields" id="logFormFields">

            <div class="mateput logFormName">
              <input class="mateputInput" type="text" name="name" autocomplete="off" value="">
              <label for="name" class="mateputLabel">
                <span class="mateputName">Name</span>
              </label>
            </div>

            <div class="mateput logFormPhono">
              <input class="mateputInput" type="number" name="fono" autocomplete="off" value="">
              <label for="fono" class="mateputLabel">
                <span class="mateputName">Phone</span>
              </label>
            </div>

            <div class="mateput logFormMail">
              <input class="mateputInput" type="email" name="mail" autocomplete="off" value="" required>
              <label for="mail" class="mateputLabel">
                <span class="mateputName">E-Mail</span>
              </label>
            </div>

            <div class="mateput logFormPass">
              <input class="mateputInput" type="password" name="pass" autocomplete="off" value="" required>
              <label for="pass" class="mateputLabel">
                <span class="mateputName">Password</span>
              </label>
            </div>

            <button class="filterSearch" type="submit" name="button">Confirm</button>
          </div>

        </form>
<?php // wp_loginout(); ?>
<?php } ?>









  <?php while(have_posts()){the_post();the_content();} ?>
</main>

<?php get_footer(); ?>
