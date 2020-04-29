<?php get_header(); ?>

<figure class="pageBanner">
  <img class="pageBannerImg rowcol1" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
  <figcaption class="pageBannerCaption rowcol1">
    <h2><?php the_title();?></h2>
  </figcaption>
</figure>

<div class="contactMenu">
  <?php wp_nav_menu( array( 'theme_location' => 'contactMenu', 'contactMenu' => 'new_menu_class' ) ); ?>
</div>

<main class="consignmentSection">



  <?php while(have_posts()){the_post();the_content();} ?>




  <button class="singleSideContact consignmentContact" onclick="altClassFromSelector('alt','#singleConsign')">CONSIGN</button>
  <div class="singleFormContainer" id="singleConsign">
    <form class="singleContact" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
      <input type="hidden" name="action" value="lt_form_handler">
      <input type="hidden" name="link" value="<?php echo home_url( $wp->request ); ?>">
      <p class="SingleContactCloseButton" onclick="altClassFromSelector('alt','#singleConsign')">+</p>
      <label  class="formLabelBig">Consign</label>
      <label  class="formLabel">VEHICLE INFORMATION</label>
        <input type="text"   placeholder="Year*"   class="formInput100 formInput" name="Year" required>
        <input type="text"  placeholder="Brand*"        class="formInput100 formInput" name="Brand" required>
        <input type="text" placeholder="Model"        class="formInput100 formInput" name="Model">
        <input type="text"   placeholder="VIN"      class="formInput100 formInput" name="VIN">
        <input type="text"   placeholder="Mileage*"      class="formInput100 formInput" name="Mileage" required>
        <input type="text"   placeholder="Estimated Value*"      class="formInput100 formInput" name="Estimated Value" required>

        <label  class="formLabel">VEHICLE DESCRIPTION</label>
        <textarea class="singleFormTxtArea" value="" placeholder="Short description" name="Vehicle Description"></textarea>

        <label  class="formLabel">CONTACT DETAILS</label>
        <input type="text"   placeholder="Name*"   class="formInput100 formInput" name="Name" required>
        <input type="email"  placeholder="Email*"        class="formInput100 formInput" name="Email" required>
        <input type="number" placeholder="Phone"        class="formInput100 formInput" name="Phone">
        <input type="text"   placeholder="City*"   class="formInput100 formInput" name="City" required>
        <input type="text"  placeholder="State*"        class="formInput100 formInput" name="State" required>
        <input type="text" placeholder="Country*"        class="formInput100 formInput" name="Country" required>

      <div class="formTermsAndConditions">
         <input type="checkbox" required>
         <a href="<?php echo site_url('terms-conditions'); ?>" target="_blank" class="linkTermAndConditionsForm">I accept terms and conditions</a>
      </div>
      <button class="singleRequestInfoButton contactButton" type="submit">SUBMIT OFFER</button>
    </form>
  </div>
</main>

<?php get_footer(); ?>
