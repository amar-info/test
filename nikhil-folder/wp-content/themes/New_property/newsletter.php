<?php
/*
  Template Name: newsletter
 */

get_header(); ?>
<script>
jQuery(document).ready(function(){
    

jQuery('.Profile').addClass("clicked");
jQuery('.clicked').click();
jQuery(".newsletter").css("background","#4A86CE");
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
                      <h1>NEWSLETTER</h1>     
                 </div>
                 <div class="sider-tebal-view">
                      <div class="Client_Plan Plan_Details border_none">
                          
                          <?php 
                          
                           global $current_user;
      get_currentuserinfo();

     // echo 'Username: ' . $current_user->user_login . "\n";
      $email_id=$current_user->user_email;
    //  echo 'User first name: ' . $current_user->user_firstname . "\n";
   //   echo 'User last name: ' . $current_user->user_lastname . "\n";
    //  echo 'User display name: ' . $current_user->display_name . "\n";
     $user_id=$current_user->ID;

                          if($_POST['newsletter_checkbox']){
                              
                              
                              
                              mysql_query("INSERT INTO newsletter (user_id,email_id) VALUES ('$user_id','$email_id')  ");
                              
                              
                              
                          }
                          $query=mysql_query("select id from newsletter");
                              $id_in_db=mysql_fetch_array($query);
                          //echo($id_in_db['id']);
                          
?>
                          <form method="post" enctype="multipart/form-data" action="" >
                               <label>You are currently unsubscribed from our Newsletter</label><br><br>
                           <div class="table_content" style="background: none;">
                               <div class="Property_Features_in_select">
                                      
                                      <ul class="select_box_in_div_op">
                                          
                                          <li>
                                             
                               <strong style="padding-left: 54px;margin-right: 186px;"> 
                                        <input type="checkbox" name="newsletter_checkbox" value="1" <?php if($id_in_db['id']==$user_id){ ?> checked="checked"<?}?>>
                                        Receive our Newsletter
                                    </strong>
                                              <li class="newsletter_btn" >
                                   <input type="submit" name="submit_nesletter" value="Save" >
                                   
                              </li>
                                          
                                      </ul>
                               </div>
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

