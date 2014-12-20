<?php
/*
  Template Name: myAlerts
 */

get_header(); ?>
<script>
jQuery(document).ready(function(){
    

jQuery('.Alerts').addClass("clicked");
jQuery('.clicked').click();
jQuery(".my_alerts").css("background","#4A86CE");
jQuery('.table_content').css('background','');


});
</script>

  <script>
  $(function(){
    $("#example").dataTable();
  })
  </script>




    <div class="section">
    <div class="wp-wrapper-on-div">
        <div style="margin-right:0px;" class="row">
            <div style="padding-right:0px;" class="col-md-12">
                <div class="arrow">
                    <ul>
                        <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/<?php bloginfo('template_url') ?>/images/arrow_1.jpg" alt="" /></a></li>
                        <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/<?php bloginfo('template_url') ?>/images/arrow_2.jpg" alt="" /></a></li>
                    </ul>
                </div>
	<div id="sidebar-wrapper">
		<div id="sidebar-in-bg">
			<?php get_template_part('dashboard_sidebar'); ?>
            <div class="sidebar-right">
                 <div class="side-head">
                      <h1>MY PROPERTIES</h1>     
                 </div>
                 <div class="sider-tebal-view">
                      <div class="Client_Plan Plan_Details border_none">
                         
                          <div class="table_content" style="background: none;">
                             <img src="<?php bloginfo('template_url');?>/images/search-on.png" alt="" /> 
                          <table id="example" class="display"  cellpadding="0" cellspacing="0">
                                <colgroup>
                                   <col width="14.28%" />
                                   <col width="14.28%" />
                                   <col width="14.28%" />
                                   <col width="14.28%" />
                                   <col width="14.28%" />
                                    <col width="14.28%" />
                                     <col width="14.28%" />
                                     
                                   <?php 
                                   
                                     $user_id = get_current_user_id(); 
                 
                 get_user_meta( $user_id, 'user_alert_payment_type', true);
                                 
       ?>
                                </colgroup>
                                <thead>
                                <tr class="alerts">
                                    <th>Name<a href="#"><img src="<?php bloginfo('template_url');?>/images/do-up.png" alt="" /></a></th>
                                    <th>Type<a href="#"><img src="<?php bloginfo('template_url');?>/images/do-up.png" alt="" /></a></th>
                                    <th>Contract<a href="#"><img src="<?php bloginfo('template_url');?>/images/do-up.png" alt="" /></a></th>
                                    <th>Property<br>Type<a href="#"><img src="<?php bloginfo('template_url');?>/images/do-up.png" alt="" /></a></th>
                                    <th>Min Price<br>(EGP) <a href="#"><img src="<?php bloginfo('template_url');?>/images/do-up.png" alt="" /></a></th>
                                    <th>Max Price<br>(EGP)<a href="#"><img src="<?php bloginfo('template_url');?>/images/do-up.png" alt="" /></a></th>
                                    <th> Edit <a href="#"><img src="<?php bloginfo('template_url');?>/images/do-up.png" alt="" /></a></th>
                                    
                                    
                                </tr>
                                </thead>
                                <tbody>
                                
       
                                    <tr>
                                <td style="text-align:center !important; color:#b1d0e7 !important;"><span><a href="<?php echo get_permalink( 289 );?>&id=<?php echo $user_id; ?>" style="color:#06428A !important;"><?php echo get_user_meta( $user_id, 'user_alert_title', true); ?></a></span></td>
                                <td style="text-align:center !important; color:#b1d0e7 !important;"><span><?php echo  get_user_meta( $user_id, 'user_alert_unit_type', true);  ?></span></td>
                                <td style="text-align:center !important; color:#b1d0e7 !important;"><span><?php echo get_user_meta( $user_id, 'user_alert_contract_type', true);  ?></span></td>
                                <td style="text-align:center !important; color:#b1d0e7 !important;"><span><?php  echo  get_user_meta( $user_id, 'user_alert_property_type', true); ?></span></td>
                                <td style="text-align:center !important; color:#b1d0e7 !important;"> <span><?php echo  get_user_meta( $user_id, 'user_alert_min_price', true); ?></span></td>
                                <td style="text-align:center !important; color:#b1d0e7 !important;"><span><?php  echo get_user_meta( $user_id, 'user_alert_max_price', true); ?></span></td>
                                <td style="text-align:center !important; color:#b1d0e7 !important;"> <span><?php   ?></span></td>


                     </tr>       

                     
   
                         </tbody> </table>
                        </div>
                          
                      </div>
                 </div>
            </div>
		</div>
	</div>
 <?php get_template_part('right_part');  ?>
            </div>
        </div> 
    </div>
</div>
<?php get_footer(); ?>

