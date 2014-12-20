<?php
/*
  Template Name: change_password
 */

get_header(); ?>
<script>
jQuery(document).ready(function(){
    

jQuery('.Profile').addClass("clicked");
jQuery('.clicked').click();
jQuery(".change_pwd").css("background","#4A86CE");
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
                      <h1>EDIT PROFILE</h1>     
                 </div>
                 <div class="sider-tebal-view">
                      <div class="Client_Plan Plan_Details border_none">
                          
                          
                          <form method="post" enctype="multipart/form-data" action="" >
                              <div class="new_property">
                                   <ul class="add_new _property_in_div">
                             <li> <label>Fields with <span>* </span>are required</label></li>
                             <li> <label>Old Password<span>*</span></label>
                                   <input type="text" name="old_pwd"  id="old_pwd" size="59" style="width: 71%; float: right;" value="<?php //echo $last_name; ?>">
                                    <p><?php //echo $areaErr; ?></p> 
                             </li>
                             
                             <li> <label>New Password<span>*</span></label>
                                   <input type="text" name="new_pwd"  id="new_pwd" size="50" style="width: 71%; float: right;" value="<?php //echo $first_name; ?>">
                                    <p><?php //echo $areaErr; ?></p> 
                             </li>
                             
                             <li> <label>Retype New Password<span>*</span></label>
                                   <input type="text" name="retype_new_pwd"  id="retype_new_pwd" size="50" style="width: 71%; float: right;" value="<?php //echo $last_name; ?>">
                                    <p><?php //echo $areaErr; ?></p> 
                             </li>
                             
                            
                             <li>
                                   <input type="submit" name="save_edit" value="Change Password>>" style="width: 30% !important; margin-left: 496px;">
                                   
                              </li>
                               </div> 
                          </form>
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

