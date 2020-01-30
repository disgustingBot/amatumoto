<?php get_header(); ?>



<main class="testimonialsMain">

  <?php while(have_posts()){the_post();?>
    <h1 class="testimonialsTitle"><?php the_title();?></h1>
    <div><?php the_content();?></div>

  <?php } ?>


  <div class="testimonialsContainer">
    <button class="testimonialBtn" onclick="plusTesti(-1)">&#10094;</button>
    <?php
    $args = array(
      'post_type'=>'testimonials',
    );
    $testimonials=new WP_Query($args);
    while($testimonials->have_posts()){$testimonials->the_post();?>
      <quote class="testimonial testimonialCarusel">
        <svg class="testiQuote testiQuote1" width="576" height="448" viewBox="0 0 576 448" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M504 192H448V184C448 161.9 465.9 144 488 144H496C522.5 144 544 122.5 544 96V48C544 21.5 522.5 0 496 0H488C386.5 0 304 82.5 304 184V376C304 415.7 336.3 448 376 448H504C543.7 448 576 415.7 576 376V264C576 224.3 543.7 192 504 192ZM528 376C528 389.2 517.2 400 504 400H376C362.8 400 352 389.2 352 376V184C352 109 413 48 488 48H496V96H488C439.5 96 400 135.5 400 184V240H504C517.2 240 528 250.8 528 264V376ZM200 192H144V184C144 161.9 161.9 144 184 144H192C218.5 144 240 122.5 240 96V48C240 21.5 218.5 0 192 0H184C82.5 0 0 82.5 0 184V376C0 415.7 32.3 448 72 448H200C239.7 448 272 415.7 272 376V264C272 224.3 239.7 192 200 192ZM224 376C224 389.2 213.2 400 200 400H72C58.8 400 48 389.2 48 376V184C48 109 109 48 184 48H192V96H184C135.5 96 96 135.5 96 184V240H200C213.2 240 224 250.8 224 264V376Z" fill="black"/>
        </svg>
        <div class="testimonialTxt mainTxtType1">
          <h4 class="testimonialAuthor"><?php the_title(); ?></h4>
          <div class="testimonialQuote"><?php the_content(); ?></div>
        </div>
        <svg class="testiQuote testiQuote2" width="576" height="448" viewBox="0 0 576 448" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M72 256H128V264C128 286.1 110.1 304 88 304H80C53.5 304 32 325.5 32 352V400C32 426.5 53.5 448 80 448H88C189.5 448 272 365.5 272 264V72C272 32.3 239.7 0 200 0H72C32.3 0 0 32.3 0 72V184C0 223.7 32.3 256 72 256ZM48 72C48 58.8 58.8 48 72 48H200C213.2 48 224 58.8 224 72V264C224 339 163 400 88 400H80V352H88C136.5 352 176 312.5 176 264V208H72C58.8 208 48 197.2 48 184V72ZM376 256H432V264C432 286.1 414.1 304 392 304H384C357.5 304 336 325.5 336 352V400C336 426.5 357.5 448 384 448H392C493.5 448 576 365.5 576 264V72C576 32.3 543.7 0 504 0H376C336.3 0 304 32.3 304 72V184C304 223.7 336.3 256 376 256ZM352 72C352 58.8 362.8 48 376 48H504C517.2 48 528 58.8 528 72V264C528 339 467 400 392 400H384V352H392C440.5 352 480 312.5 480 264V208H376C362.8 208 352 197.2 352 184V72Z" fill="black"/>
        </svg>
      </quote>
    <?php } ?>

    <button class="testimonialBtn" onclick="plusTesti(+1)">&#10095;</button>
  </div>


</main>






<?php get_footer(); ?>
