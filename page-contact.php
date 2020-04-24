<?php get_header(); ?>
<figure class="pageBanner">
  <img class="pageBannerImg rowcol1" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
  <figcaption class="pageBannerCaption rowcol1">
    <h2><?php the_title();?></h2>
  </figcaption>
</figure>

<?php while(have_posts()){the_post();?>
  <div class="contactMenu">
    <?php wp_nav_menu( array( 'theme_location' => 'contactMenu', 'contactMenu' => 'new_menu_class' ) ); ?>
    <iframe class="contactMap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d47829.97335247507!2d2.053006775603039!3d41.474505263424575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a48e23c916f48d%3A0x7fe8e79c429372d0!2sCastellbisbal%2C+Barcelona!5e0!3m2!1ses!2ses!4v1539783607320&zoom=30000" width="1920" height="250" frameborder="0" style="border:0" allowfullscreen=""></iframe>
  </div>

<main class="contact">
  <div class="contactFormAndInformation">
    <div class="">
      <form  class="MainContactForm" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
        <input type="hidden" name="action"   value="lt_form_handler">
        <input type="hidden" name="link"     value="<?php echo home_url( $wp->request ); ?>">
        <input type="text"   name="a00"      value="" placeholder="jeje" hidden>
        <label class="formLabel">CONTACT FORM</label>
        <input type="text"   name="name"     placeholder="Name"     class="formInput33 formInput" required>
        <input type="text"   name="motoBike" placeholder="MotoBike(ref ID)" class="formInput33 formInput">
        <input type="email"  name="email"    placeholder="Email"    class="formInput33 formInput" required>
        <input type="number" name="phone"    placeholder="Phone"    class="formInput50 formInput">
        <input type="text"   name="country"  placeholder="Country"  class="formInput50 formInput" required>
        <textarea            name="comment"  placeholder="Comments" class="singleFormTxtArea" ></textarea>
        <div class="formTermsAndConditions">
          <input name="acceptance" type="checkbox" required>
          <a href="<?php echo site_url('terms-conditions'); ?>" target="_blank" class="linkTermAndConditionsForm" rel="noopener noreferrer">I accept terms and conditions</a>
        </div>
        <button class="singleContactButton contactButton" type="submit">SEND</button>
      </form>
    </div>
    <div class="contactInformation">
      <h3 class="contactTitleSection1 contactInformationText">Contact Information</h3>
      <br>
      <p class="contactInformationText"><?php echo get_post_meta($post->ID, 'address1', true); ?></p>
      <p class="contactInformationText"><?php echo get_post_meta($post->ID, 'address2', true); ?></p>
      <a class="contactPhoneClick contactInformationText" href="tel:<?php echo get_post_meta($post->ID, 'tel', true); ?>">TEL <?php echo get_post_meta($post->ID, 'tel', true); ?></a>
      <br>
      <a class="contactPhoneClick contactInformationText" href="tel:<?php echo get_post_meta($post->ID, 'mov', true); ?>">MOV <?php echo get_post_meta($post->ID, 'mov', true); ?></a>
      <br>
      <a class="contactInformationText" href="mailto:<?php echo get_post_meta($post->ID, 'mail', true); ?>">MAIL <?php echo get_post_meta($post->ID, 'mail', true); ?> </a>
      <div class="socialMediaContact">
        <a href="https://www.instagram.com/gpmotorbikes/?hl=es" target="_blank" class="socialMediaLink socialMediaInst" rel="noopener noreferrer">
          <svg viewBox="0 0 501 500" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M250.112 121.806C179.153 121.806 121.918 179.042 121.918 250C121.918 320.958 179.153 378.194 250.112 378.194C321.07 378.194 378.305 320.958 378.305 250C378.305 179.042 321.07 121.806 250.112 121.806ZM250.112 333.343C204.256 333.343 166.769 295.967 166.769 250C166.769 204.033 204.145 166.657 250.112 166.657C296.078 166.657 333.454 204.033 333.454 250C333.454 295.967 295.967 333.343 250.112 333.343V333.343ZM413.45 116.563C413.45 133.186 400.061 146.463 383.549 146.463C366.925 146.463 353.648 133.075 353.648 116.563C353.648 100.05 367.037 86.6618 383.549 86.6618C400.061 86.6618 413.45 100.05 413.45 116.563ZM498.354 146.91C496.458 106.856 487.309 71.3768 457.966 42.1455C428.735 12.9142 393.256 3.76548 353.202 1.75722C311.921 -0.585741 188.19 -0.585741 146.91 1.75722C106.968 3.65391 71.4883 12.8026 42.1455 42.0339C12.8026 71.2652 3.76548 106.744 1.75722 146.798C-0.585741 188.079 -0.585741 311.81 1.75722 353.09C3.65391 393.144 12.8026 428.623 42.1455 457.855C71.4883 487.086 106.856 496.234 146.91 498.243C188.19 500.586 311.921 500.586 353.202 498.243C393.256 496.346 428.735 487.197 457.966 457.855C487.197 428.623 496.346 393.144 498.354 353.09C500.697 311.81 500.697 188.19 498.354 146.91V146.91ZM445.024 397.384C436.322 419.251 419.475 436.098 397.495 444.912C364.582 457.966 286.483 454.954 250.112 454.954C213.74 454.954 135.529 457.855 102.728 444.912C80.8602 436.21 64.0132 419.363 55.1992 397.384C42.1455 364.471 45.1579 286.372 45.1579 250C45.1579 213.628 42.2571 135.418 55.1992 102.616C63.9016 80.7486 80.7486 63.9016 102.728 55.0876C135.641 42.0339 213.74 45.0463 250.112 45.0463C286.483 45.0463 364.694 42.1455 397.495 55.0876C419.363 63.79 436.21 80.6371 445.024 102.616C458.078 135.529 455.065 213.628 455.065 250C455.065 286.372 458.078 364.582 445.024 397.384Z" fill="currentColor"></path>
          </svg>
        </a>

        <a href="https://es-la.facebook.com/gpmotorbikes/" target="_blank" class="socialMediaLink socialMediaFace" rel="noopener noreferrer">
          <svg width="25" height="25" viewBox="0 0 313 500" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M272.598 281.25L286.484 190.762H199.658V132.041C199.658 107.285 211.787 83.1543 250.674 83.1543H290.146V6.11328C290.146 6.11328 254.326 0 220.078 0C148.574 0 101.836 43.3398 101.836 121.797V190.762H22.3535V281.25H101.836V500H199.658V281.25H272.598Z" fill="currentColor"></path>
          </svg>
        </a>

        <a href="https://www.youtube.com/" target="_blank" class="socialMediaLink socialMediaYouT" rel="noopener noreferrer">
          <svg viewBox="0 0 547 384" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M534.722 60.083C528.441 36.433 509.935 17.807 486.438 11.486C443.848 0 273.067 0 273.067 0C273.067 0 102.287 0 59.696 11.486C36.199 17.808 17.693 36.433 11.412 60.083C0 102.95 0 192.388 0 192.388C0 192.388 0 281.826 11.412 324.693C17.693 348.343 36.199 366.193 59.696 372.514C102.287 384 273.067 384 273.067 384C273.067 384 443.847 384 486.438 372.514C509.935 366.193 528.441 348.343 534.722 324.693C546.134 281.826 546.134 192.388 546.134 192.388C546.134 192.388 546.134 102.95 534.722 60.083ZM217.212 273.591V111.185L359.951 192.39L217.212 273.591Z" fill="currentColor"></path>
          </svg>
        </a>

        <a href="https://wa.me/15551234567" target="_blank" class="socialMediaLink socialMediaWhatsapp" rel="noopener noreferrer">
          <svg viewBox="0 0 500 500" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M425.112 72.6563C378.348 25.7812 316.071 0 249.888 0C113.281 0 2.12054 111.161 2.12054 247.768C2.12054 291.406 13.5045 334.04 35.1563 371.652L0 500L131.362 465.513C167.522 485.268 208.259 495.647 249.777 495.647H249.888C386.384 495.647 500 384.487 500 247.879C500 181.696 471.875 119.531 425.112 72.6563V72.6563ZM249.888 453.906C212.835 453.906 176.562 443.973 144.978 425.223L137.5 420.759L59.5982 441.183L80.3571 365.179L75.4464 357.366C54.7991 324.554 43.9732 286.719 43.9732 247.768C43.9732 134.263 136.384 41.8527 250 41.8527C305.022 41.8527 356.696 63.2812 395.536 102.232C434.375 141.183 458.259 192.857 458.147 247.879C458.147 361.496 363.393 453.906 249.888 453.906V453.906ZM362.835 299.665C356.696 296.54 326.228 281.585 320.536 279.576C314.844 277.455 310.714 276.451 306.585 282.701C302.455 288.951 290.625 302.79 286.942 307.031C283.371 311.161 279.688 311.719 273.549 308.594C237.165 290.402 213.281 276.116 189.286 234.933C182.924 223.996 195.647 224.777 207.478 201.116C209.487 196.987 208.482 193.415 206.92 190.29C205.357 187.165 192.969 156.696 187.835 144.308C182.813 132.254 177.679 133.929 173.884 133.705C170.313 133.482 166.183 133.482 162.054 133.482C157.924 133.482 151.228 135.045 145.536 141.183C139.844 147.433 123.884 162.388 123.884 192.857C123.884 223.326 146.094 252.79 149.107 256.92C152.232 261.049 192.746 323.549 254.911 350.446C294.196 367.411 309.598 368.862 329.241 365.96C341.183 364.174 365.848 351.004 370.982 336.496C376.116 321.987 376.116 309.598 374.554 307.031C373.103 304.241 368.973 302.679 362.835 299.665Z" fill="currentColor"></path>
          </svg>
        </a>
      </div>
      <img class="contactLogo" src="https://gpmotorbikes.com/wp-content/uploads/2020/03/AMATUMOTO-GRAND-PRIX-MOTORBIKES-usa.png" alt="">
    </div>
  </div>
  </main>
    <?php } ?>





<?php get_footer(); ?>
