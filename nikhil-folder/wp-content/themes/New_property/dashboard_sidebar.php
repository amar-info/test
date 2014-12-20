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