<div class="login_right">
    
                         <div class="login_live">
                              <ul>
                                  <?php
                                  if(is_user_logged_in()){
                                      $current_user = wp_get_current_user();
                                       global $current_user;
      get_currentuserinfo();

     $user_id=$current_user->ID;
                                      $firstname=get_user_meta($user_id, 'first_name', true);?>
                                     
                                  
                                      <li>
                                          <a href="<?php echo site_url();?>?page_id=13" style="color:#B1D0E7 !important; padding: 10px 44px !important;" ><img class="user_name" alt="" src="<?php bloginfo('template_url'); ?>/images/top_user.jpg"><p class="display_name"><?php echo "<span style='text-transform: capitalize !important;'>Hello! </span>"."<span>".$firstname."</span>"; ?></p></a>
                                      </li>
                                  
                                      <?php
                                  }
                                  else{
                                      ?>
                                      <li>
                                            <a class="login" href="#"><img src="<?php bloginfo('template_url'); ?>/images/top_1.png" alt="" /></a>
                                      </li>
                                  
                                      <?php
                                  }
?>
                                  
                                  <li>
                                      <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/bottom_12.png" alt="" /></a>
                                  </li>
                              </ul>
                         </div>
                    </div>
<div class="add_right_ser_search">
                         <div class="search_tog">
                              <ul>
                                  <li>
                                      <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/search.png" alt="" /></a>
                                  </li>
                                  <li>
                                      <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/search_1.png" alt="" /></a>
                                  </li>
                                  <li>
                                      <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/find.png" alt="" /></a>
                                  </li>
                                  <li>
                                      <a style="margin-left:-19px;" href="#"><img src="<?php bloginfo('template_url'); ?>/images/tog.png" alt="" /></a>
                                  </li>
                                  <li>
                                      <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/google.png" alt="" /></a>
                                  </li>
                              </ul>
                         </div>
                         <div class="add_right_ser">
                              <div class="add_ri_1">
                                   <?php dynamic_sidebar( 'right-sidebar1' ); ?>
                              </div>
                              <div class="add_ri_2">
                                   <?php dynamic_sidebar( 'right-sidebar2' ); ?>
                              </div>
                              <div class="add_ri_3">
                                   <?php dynamic_sidebar( 'right-sidebar3' ); ?>
                              </div>
                         </div>
                    </div> 