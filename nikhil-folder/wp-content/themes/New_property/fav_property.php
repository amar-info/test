<?php
/*
  Template Name: fav_property
 */

get_header(); ?>
<script>
jQuery(document).ready(function(){
    

jQuery('.Properties').addClass("selected");
jQuery('.selected').click();
jQuery(".fav_property").css("background","#4A86CE");
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
                      <h1>MY FAVORITE PROPERTIES</h1>     
                 </div>
                 <div class="sider-tebal-view">
                      <div class="Client_Plan Plan_Details border_none">
                         
                          <div class="table_content" style="background: none;">
                             <img src="<?php bloginfo('template_url');?>/images/search-on.png" alt="" /> 
                          <table id="example" class="display"  cellpadding="0" cellspacing="0">
                                <colgroup>
                                   <col width="20%" />
                                   <col width="20%" />
                                   <col width="20%" />
                                   <col width="20%" />
                                   <col width="20%" />
                                   
                                </colgroup>
                                <thead>
                                <tr class="alerts">
                                    <th>Developer<a href="#"><img src="<?php bloginfo('template_url');?>/images/do-up.png" alt="" /></a></th>
                                    <th>Development<a href="#"><img src="<?php bloginfo('template_url');?>/images/do-up.png" alt="" /></a></th>
                                    <th>Unit<a href="#"><img src="<?php bloginfo('template_url');?>/images/do-up.png" alt="" /></a></th>
                                    <th>Contact<a href="#"><img src="<?php bloginfo('template_url');?>/images/do-up.png" alt="" /></a></th>
                                    <th>Details<a href="#"><img src="<?php bloginfo('template_url');?>/images/do-up.png" alt="" /></a></th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                
       <?php $query = mysql_query("SELECT * FROM `wp_posts`WHERE `post_type` = 'property'");
       
       while($row=mysql_fetch_array($query)){
     $id= $row['ID'];
    //   print_r($row['ID']);
      $contract_type= get_post_meta($id,'post_type_property_contract_type',true);
      
     $property_type= get_post_meta($id,'post_type_property_Property_Type',true);
       ?>
              <tr>         <td style="text-align:center !important; color:#b1d0e7 !important;"><span><?php echo $row['post_title']; ?></span></td>
                                <td style="text-align:center !important; color:#b1d0e7 !important;"><span><?php echo $property_type; ?></span></td>
                                <td style="text-align:center !important; color:#b1d0e7 !important;"><span><?php  echo $contract_type; ?></span></td>
                                <td style="text-align:center !important; color:#b1d0e7 !important;"><span><?php echo '9874562135'; ?></span></td>
                                <td style="text-align:center !important; color:#b1d0e7 !important;"> <span><?php echo 'Ronny Real estate' ?></span></td>


                     </tr>       

                        <?php } ?>
   
                         </tbody></table>
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

