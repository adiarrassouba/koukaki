<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fleurs_d\'oranger_&_Chats_errants
 */

?>



<?php
        $args = array(
            'post_type' => 'characters',
            'posts_per_page' => -1,
            'meta_key'  => '_main_char_field',
            'orderby'   => 'meta_value_num',

        );
        $characters_query = new WP_Query($args);
        ?>
  <!-- Swiper -->
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
             
        <?php
                    while ( $characters_query->have_posts() ) {
                        ?>
                        <div class="swiper-slide"> 
                        <?php    
                        $characters_query->the_post();
                        echo get_the_post_thumbnail( get_the_ID(), 'full' );
                        ?>
                        </div>
                         <?php  
                    }
                    ?>
      
    </div>
    <div class="swiper-pagination"></div>
  </div>

