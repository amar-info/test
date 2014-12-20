<?php
/*
Template Name: Login
*/

?>

<?php get_header(); ?>
<div class="section">
     <div class="wp-wrapper-on-div">
          <div style="margin-right:0px;" class="row">
               <div style="padding-right:0px;" class="col-md-12">
                    <div class="arrow">
                         <ul>
                             <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/arrow_1.jpg" alt="" /></a></li>
                             <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/arrow_2.jpg" alt="" /></a></li>
                         </ul>
                    </div>
                    <div class="property-details">
                        
                           <div class="details_in">
                           <div class="details_in">
                     <?php echo do_shortcode('[ajax_register]'); ?>   
                             
                         </div>
                         </div>
                         </div>
                    <?php  get_template_part('right_part');?>
                    </div>
                    
                     
               </div>
          </div> 
     </div>

<?php get_footer(); ?>