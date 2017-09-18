<?php
 

wp_enqueue_script('slick', get_template_directory_uri() . '/js/vendor/slick.min.js',array( 'jquery' ),'2.2.2',true );
// http://kenwheeler.github.io/slick/





/*                          ------SET THIS----
* ***************************************************************************** 
*/
$images = get_field('gallery_field_name');  // custom field name type = gallery
/*
* ***************************************************************************** 
*/






if( $images ): ?>
    <div id="slider" class="boxes-container">
            <?php foreach( $images as $image ): ?>
                <div>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    <p><?php echo $image['caption']; ?></p>
                </div>
            <?php endforeach; ?>
    </div>

<script>
    jQuery(document).ready(function($){
        $('.boxes-container').slick({
          dots: true,
          infinite: true,
          speed: 300,
          arrows: true,
          slidesToShow: 3,
          slidesToScroll: 3, 
          responsive: [
            
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
          ]
        });
    });
</script>

<?php endif; ?>

		
      
        