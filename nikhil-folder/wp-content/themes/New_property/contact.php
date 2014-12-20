<?php
/*
Template Name: contact
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
                         <div class="new_menu" style="display:none;">
                               <ul>
                                   <li><a href="#">SHOW <br/>ALL</a></li>
                                   <li><a class="new_menu_active" href="#">NEW <br/>CAIRO</a></li>
                                   <li><a href="#">AL AIN <br/>AL SOKHNA</a></li>
                                   <li><a href="#">AL SHOROUK <br/>CITY</a></li>
                                   <li><a href="#">RED <br/>SEA</a></li>
                                   <li><a href="#">6TH OF <br/>OCTOBER</a></li>
                                   <li><a href="#">NORTH <br/>COAST</a></li>
                               </ul>
                         </div>
                           <div class="details_in">
                           <div class="details_in">
                         <?php echo do_shortcode('[contact-form-7 id="7" title="Contact form 1"]'); ?>    
                             
                         </div>
                         </div>
                         </div>
                   <?php  get_template_part('right_part');?>
                    </div>
                    
                      
               </div>
          </div> 
     </div>

<?php get_footer(); ?>