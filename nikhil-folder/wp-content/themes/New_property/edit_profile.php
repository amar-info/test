<?php
/*
  Template Name: editProfile
 */

get_header(); ?>
<script>
jQuery(document).ready(function(){
    

jQuery('.Profile').addClass("clicked");
jQuery('.clicked').click();
jQuery(".edit_profile").css("background","#4A86CE");
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
			<div id="sidebar_menu">
				<ul id="toggle-view">
					<li class="Dashboard">
						<a href="#"  class="selected">
							<div class="con-side-img">
                            	 <img src="<?php bloginfo('template_url') ?>/images/Dashboard.png" alt="" />
                            </div>
							<h3>Dashboard</h3>
						</a>
                        <div class="profile-pic">
                             <?php //$target_path='wp-content/uploads/imagereality_images/user_profile/' . basename( $image ); 
                              global $current_user;
      get_currentuserinfo();

     // echo 'Username: ' . $current_user->user_login . "\n";
     // $email_id=$current_user->user_email;
    //  echo 'User first name: ' . $current_user->user_firstname . "\n";
   //   echo 'User last name: ' . $current_user->user_lastname . "\n";
    //  echo 'User display name: ' . $current_user->display_name . "\n";
     $user_id=$current_user->ID;
    
                        
                        
   // print_r($_POST);
    //print_r($_FILES);
                             
      if ($_SERVER["REQUEST_METHOD"] == "POST") {   
   
    if(empty($_POST['last_name'])) {
     $last_nameErr = "Last Name is required";
   }else {
     $last_name=$_POST['last_name'];
   }
   
    if(empty($_POST['first_name'])) {
     $first_nameErr = "First Name is required";
   }else {
     $first_name=$_POST['first_name'];
   }
   
   $home_tel_num=$_POST['home_tel_num'];
   
    if(empty($_POST['office_tel_num'])) {
     $office_tel_numErr = "Office Tel. No is required";
   }else {
     $office_tel_num=$_POST['office_tel_num'];
   }
   
    if(empty($_POST['mobile_no'])) {
     $mobile_noErr = "Mobile No. is required";
   }else {
     $mobile_no=$_POST['mobile_no'];
   }
   
    if(empty($_POST['username'])) {
     $usernameErr = "Username is required";
   }else {
     $username=$_POST['username'];
   }
   
    if(empty($_POST['email'])) {
     $emailErr = "Email is required";
   }else {
     $email=$_POST['email'];
   }
    if (empty($_FILES['profile_picture']['name'])) {
  $imageErr = "Image is required";
  } else {
   $image=$_FILES['profile_picture']['name'];
   $user_image=$user_id."_".$image;
   } 
    }
      
      
   
 if(!empty($last_name) && !empty($first_name) && !empty($office_tel_num) && !empty($mobile_no) && !empty($username) && !empty($email) && !empty($user_image) )
                {
     

    update_user_meta($user_id, 'last_name', $last_name);
    update_user_meta($user_id, 'first_name', $first_name);
    update_user_meta($user_id, 'home_tel_num', $home_tel_num);
    update_user_meta($user_id, 'office_tel_num', $office_tel_num);
    update_user_meta($user_id, 'mobile_no', $mobile_no);
    update_user_meta($user_id, 'profile_pic', $user_image);
       move_uploaded_file($_FILES['profile_picture']['tmp_name'], "wp-content/themes/New_property/images/user_profile/" .$user_image);
       global $wpdb;
       $wpdb->update(
  'wp_users',
  array( 'user_login' => $email ),
  array( 'ID' => $user_id )
);
    $user_id = wp_update_user( array( 'ID' => $user_id,'user_email' => $email,'user_nicename'=>$username) );
    
    
  //$site_url=site_url();
 // echo  $target_path= $site_url.'/wp-content/themes/New_property/user_profile/'.$image;
    //move_uploaded_file($_FILES['file']['tmp_name'],$target_path);
 
   // mysql_query("UPDATE wp_users SET user_email='$email', post_login='$username'  where ID='$user_id'");
           }
           $profile_pic= get_user_meta($user_id, 'profile_pic', true);
  ?>     
                      
                             
                             
                              <img src="<?php echo site_url();?>/wp-content/themes/New_property/images/user_profile/<?php echo $profile_pic; ?>" alt=""  />
                        </div>
					</li>
					<li class="Properties">
					   <a href="#">
                           <div class="con-side-img">
                      			<img src="<?php bloginfo('template_url') ?>/images/Properties.png" alt="" />
                           </div>
						   <h3>Properties</h3>
                       </a>  
					   <p>
						 <a href="<?php echo site_url(); ?>/?page_id=273" class="my_property">My Properties</a>
						 <a href="<?php echo site_url(); ?>/?page_id=244" class="add_property">Add Properties</a>
                         <a href="<?php echo site_url(); ?>/?page_id=284" class="fav_property">Fav. Properties</a>
					   </p>
					</li>
					<li class="Messages">
					   <a href="<?php echo site_url(); ?>/?page_id=286">
                      	  <div class="con-side-img">
                          	   <img src="<?php bloginfo('template_url') ?>/images/Messages.png" />
                          </div>
						  <h3>Messages</h3>
                       </a> 
					</li>
					<li class="Alerts">
					    <a href="#">
                           <div class="con-side-img">
                           		<img src="<?php bloginfo('template_url') ?>/images/Alerts.png" />
                           </div>
                           <h3>Alerts</h3>
                        </a>
						<p>
							<a href="<?php echo site_url(); ?>/?page_id=288" class="my_alerts">My Alerts</a>
							<a href="<?php echo site_url(); ?>/?page_id=289" class="set_alerts">Set Alert</a>
						</p>
					</li>
					<li class="Profile">
					    <a href="#">
                            <div class="con-side-img">
                            	 <img src="<?php bloginfo('template_url') ?>/images/My-Profile.png" alt="" />
                            </div>
                            <h3>My Profile</h3>
                        </a>
						<p>
							<a href="<?php echo site_url(); ?>/?page_id=292" class="newsletter">Newsletter</a>
							<a href="<?php echo site_url(); ?>/?page_id=295" class="edit_profile">Edit Profile</a>
                                                        <a href="<?php echo site_url(); ?>/?page_id=297" class="change_pwd">Change Password</a>
						</p>
					</li>
				</ul>
			</div>
            <div class="sidebar-right">
                 <div class="side-head">
                      <h1>EDIT PROFILE</h1>     
                 </div>
                 <div class="sider-tebal-view">
                      <div class="Client_Plan Plan_Details border_none">
                           <form method="post" enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF']?>">
                              <div class="new_property">
                                   <ul class="add_new _property_in_div">
                     
                         
                             <li> <label>Fields with <span>* </span>are required</label></li>
                             <li> <label>Last Name<span>*</span></label>
                                   <input type="text" name="last_name"  id="last_name" size="59" style="width: 80%; float: right;" value="<?php echo get_user_meta($user_id, 'last_name', true);?>" >
                                    <p><?php echo $last_nameErr; ?></p> 
                             </li>
                             
                             <li> <label>First Name<span>*</span></label>
                                   <input type="text" name="first_name"  id="first_name" size="59" style="width: 80%; float: right;" value="<?php echo get_user_meta($user_id, 'first_name', true);?>" >
                                    <p><?php echo $first_nameErr; ?></p> 
                             </li>
                             
                             <li> <label>Home Tel. No</label>
                                   <input type="text" name="home_tel_num"  id="home_tel_num" size="59" style="width: 80%; float: right;" value="<?php echo get_user_meta($user_id, 'home_tel_num', true);?>" >
                                    <p><?php echo $home_tel_numErr; ?></p> 
                             </li>
                             
                             <li> <label>Office Tel. No<span>*</span></label>
                                   <input type="text" name="office_tel_num"  id="office_tel_num" size="59" style="width: 80%; float: right;" value="<?php echo get_user_meta($user_id, 'office_tel_num', true);?>">
                                    <p><?php echo $office_tel_numErr; ?></p> 
                             </li>
                             
                             <li> <label>Mobile No.<span>*</span></label>
                                   <input type="text" name="mobile_no"  id="mobile_no" size="59" style="width: 80%; float: right;" value="<?php echo get_user_meta($user_id, 'mobile_no', true);?>">
                                    <p><?php echo $mobile_noErr; ?></p> 
                             </li>
                             
                             <li> <label>Username<span>*</span></label>
                                   <input type="text" name="username"  id="username" size="59" style="width: 80%; float: right;" value="<?php echo $current_user->user_login;?>">
                                    <p><?php echo $usernameErr; ?></p> 
                             </li>
                             
                             <li> <label>E-mail<span>*</span></label>
                                   <input type="text" name="email"  id="email" size="59" style="width: 80%; float: right;" value="<?php echo $current_user->user_email;?>">
                                    <p><?php echo $emailErr; ?></p> 
                             </li>
                             <li> <label>Profile Picture<span>*</span></label>
                                
                                  <input type="file" name="profile_picture" style="width: 30%; float:left;">
                                  <p class="notice">Please click start upload to upload the <br> images to server before submitting.</p>
                                  <p><?php echo $imageErr; ?></p>
                             </li>
                             <li class="newsletter_btn" >
                                   <input type="submit" name="save_edit" value="Save Changes" style="width: 100%; margin-left: 570px;">
                                   
                              </li>
                                   </ul>
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

