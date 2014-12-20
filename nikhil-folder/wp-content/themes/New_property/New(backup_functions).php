<?php register_nav_menus( array(
	'pluginbuddy_mobile' => 'PluginBuddy Mobile Navigation Menu',
	'footer_menu' => 'My Custom Footer Menu'
) );
?>
<?php
add_action('init', 'my_custom_init');

function my_custom_init() {
	add_post_type_support( 'page', 'excerpt' );
}

add_theme_support( 'post-thumbnails' );
?>
<?php
if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name'=> 'Top Tabs',
		'id' => 'top_tabs',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="offscreen">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name'=> 'Top Sidebar',
		'id' => 'top_sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name'=> 'Left Sidebar',
		'id' => 'left_sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name'=> 'Right Sidebar1',
		'id' => 'right_sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
        register_sidebar(array(
		'name'=> 'Right Sidebar2',
		'id' => 'right_sidebar2',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
        register_sidebar(array(
		'name'=> 'Right Sidebar3',
		'id' => 'right_sidebar3',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}

function my_filter( $status ){
    $status['success_registration']['description'] = 'my custom description';
    return $status;
}
add_filter('ajax_login_register_status_codes', 'my_filter');
get_template_part('propertyFunctions');

function call_sub_menu_ajax(){
   $id=$_POST['id'];
    $query_fetch_post_id = "select * from wp_postmeta where meta_value='$id'"; 
    $result=mysql_query($query_fetch_post_id);
   while( $row=mysql_fetch_array($result)){
       $post_id=array();
       $post_id[]= $row['post_id'];
     // print_r($post_id[0]);
     $id_post=$post_id[0];
     
         $x = "select post_title from wp_posts where ID='$id_post'"; 
         $result1=mysql_query($x);
            while($fetch_post_title = mysql_fetch_array($result1)){
  
     //  print_r($fetch_post_title[0]);
       
                ?>  <li><a href="#"  onclick="get_development(<?php echo $id_post ?>,this),call_content_developer(<?php echo $id_post ?>)" ><?php echo $fetch_post_title[0]; ?></a><ul id='Development_menu' class='Development_menu' ></ul></li><?php
         //include('category.php');
                }   
       
    }
    die(0);
}
add_action("wp_ajax_nopriv_call_sub_menu_ajax", "call_sub_menu_ajax");
add_action("wp_ajax_call_sub_menu_ajax", "call_sub_menu_ajax");

function call_development_ajax(){
   $developer_id=$_POST['developer_id'];
    $query_developer="select * from wp_postmeta where meta_value='$developer_id'";
    $result_developer=mysql_query($query_developer);
    while( $row_developer=mysql_fetch_array($result_developer)){
        $development_id=$row_developer['post_id'];
          $query_development = "select post_title from wp_posts where ID='$development_id'"; 
          $result_development=mysql_query($query_development);
            while($fetch_development_title = mysql_fetch_array($result_development)){ 
                 $value= $fetch_development_title['post_title'];
               //  print_r($fetch_development_title);
                              //    $value= $fetch_development_title['ID'];

                
            }

            ?>   <li><a  href="#"  onclick="padding_development(<?php echo $developer_id; ?>),call_content_development(<?php echo $development_id ?>,<?php echo $developer_id; ?>,this)"   ><?php echo $value; ?></a></li><?php
          
                

      
    }
    
    
    
    
     die(0);
}
add_action("wp_ajax_nopriv_call_development_ajax", "call_development_ajax");
add_action("wp_ajax_call_development_ajax", "call_development_ajax");


function call_content_ajax(){
   
    $cat_id=$_POST['cat_id'];
    ?>
     <label><?php echo get_cat_name($cat_id_url); ?></label>
                        <div class="DataSheet_head">
                           

                            <h1>  <?php
                            //echo '<pre>';
                            //  print_r($_COOKIE['name']);
                            // echo '</pre>';
                            ?><?php echo 'ABOUT' . ' ' . get_cat_name($cat_id); ?></h1>
                            <p><?php echo category_description($cat_id); ?> 
                            </p> 
                        </div>
                          <div style="height:auto !important;" class="details_in_Scrollbar Res_det_in_con content_3 content"> 
                            <ul class="Data_details">
                                <li>
                                    <div class="DataSheet_details">

                                        <div class="Development_Master_Image">
                                           <img src="<?php echo site_url(); ?>">
                                        </div>

                                    </div>
                                </li>

                            </ul>

                            <div class="developer_block">
                                <div class="col-md-3">
                                    <h2>DEVELOPERS:</h2>
                                </div>
                                <div class="col-md-9">
                                    <ul>

                                        <?php
                                        
                                        $query_fetch_post_id = "select * from wp_postmeta where meta_value='$cat_id'";
                                        $result = mysql_query($query_fetch_post_id);
                                        while ($row = mysql_fetch_array($result)) {
                                            $post_id = array();
                                            $post_id[] = $row['post_id'];
                                            //print_r($post_id[0]);
                                            $id_post = $post_id[0];

                                            $x = "select post_title from wp_posts where ID='$id_post'";
                                            $result1 = mysql_query($x);
                                            while ($fetch_post_title = mysql_fetch_array($result1)) {

                                                //  print_r($fetch_post_title[0]);
                                                ?>  <li><a href="#" onclick="get_development(<?php echo $id_post ?>,this),call_content_developer(<?php echo $id_post ?>)"> <?php echo get_the_post_thumbnail( $id_post , array(100,130));  ?></a></li>
                                                <?php } }
                                            ?>

                                        </ul>
                                    </div>
                                </div>

                              </div> 
    <?php
    die(0);
}
add_action("wp_ajax_nopriv_call_content_ajax", "call_content_ajax");
add_action("wp_ajax_call_content_ajax", "call_content_ajax");

function call_content_developer_ajax(){
    $page_id=$_POST['developer_id'];
    ?> <h1><?php
                            
                            $postport = get_post($page_id);
                            //print_r($postport); height:208px;
                            echo $postport->post_title;
                            ?>
                        </h1>
                   <div style="height:auto !important;" class="details_in_Scrollbar Res_det_in_con content_3 content"> 
                            <ul class="Data_details">
                                <li>
                                    <div class="DataSheet_details">

                                        <div class="Development_Master_Image">
<?php
$corporate_image=get_post_meta( $page_id, 'developerlogo_developer_corporate_image', true ); ?>
        <img src="<?php echo $corporate_image[1][1]; ?>" alt="<?php the_title(); ?>" width="750px" height="200px"/>

                                        </div>

                                    </div>
                                </li>

                            </ul>
                            <div class="developer_logo_content">
                                
                                    <div class="col-md-3"> 
                                        <div class="developer_logo">
                                            <p><?php 
echo get_the_post_thumbnail($page_id);
?></p>
                                        </div>
                                    </div>
                                <div class="col-md-9">
                                    <div class="developer_content">
                                          <p> <?php  $content = $postport->post_content;
                                        echo $content;
                                        ?></p>
                                        </div>
                                </div>
                                
                                


                            </div>

                            <div class="development_block">
                                <div class="col-md-3">
                                    <h2>DEVELOPMENTS:</h2>
                                </div>
                                <div class="col-md-9">
                                    <ul>

                                        <?php
                                        
                                         $query_developer="select * from wp_postmeta where meta_value='$page_id'";
    $result_developer=mysql_query($query_developer);
    while( $row_developer=mysql_fetch_array($result_developer)){
        $development_id=$row_developer['post_id'];
          $query_development = "select post_title,ID from wp_posts where ID='$development_id'"; 
          $result_development=mysql_query($query_development);
            while($fetch_development_title = mysql_fetch_array($result_development)){ 
                //print_r($fetch_development_title);
                 $value= $fetch_development_title['post_title'];
               $id=$fetch_development_title['ID'];
                
            }

            ?>   <li><a  href="#" onclick="padding_development(<?php echo $page_id; ?>),call_content_development(<?php echo $development_id ?>,<?php echo $page_id; ?>,this)"  ><?php echo get_the_post_thumbnail( $id , array(100,130));  ?></a></li><?php
          
                

      
    }
    
                                        
                                        ?>

                                    </ul>
                                </div>
                            </div>

                      </div>
 <?php 
 die(0);   
}
add_action("wp_ajax_nopriv_call_content_developer_ajax", "call_content_developer_ajax");
add_action("wp_ajax_call_content_developer_ajax", "call_content_developer_ajax");

function call_content_development_ajax(){
    $page_id=$_POST['development_id'];
    $current_developer_id=$_POST['developer_id'];
    ?>
       <div class="DataSheet_head">
                                  <?php   ?>
                                   <h1><?php $postport = get_post($page_id);
                            //print_r($postport);
                            echo $postport->post_title; ?></h1>
                                   
                              </div>
                         <div style="height:auto !important;" class="details_in_Scrollbar Res_det_in_con content_3 content"> 
                                   <ul class="Data_details">
                                       <li>
                                           <div class="DataSheet_details">
                                                
                                                <div class="Development_Master_Image">
                                                    <?php 
//if ( has_post_thumbnail($page_id) ) { // check if the post has a Post Thumbnail assigned to it.
	echo get_the_post_thumbnail($page_id,'full');
//} 
?>
                                                     <div class="develop_logo_fc">
                                                         <?php
                                                         $src= get_post_meta( $page_id, 'development_details_development_logo_fc', true );   ?>
                                                           <?php if ( get_post_meta( $page_id, 'development_details_development_logo_fc', true ) ) : ?>
    <a href="<?php the_permalink() ?>" rel="bookmark">
        <img class="thumb" src="<?php echo $src[1][1]; ?>" alt="<?php the_title(); ?>" />
    </a>
<?php endif; ?>
                                                      </div> 
                                                    
                                                </div>
                                               <div class="data_logo_fc">
                                                    <?php 
                                                   if ( get_the_post_thumbnail( $current_developer_id, 'thumbnail', array( 'class' => 'alignleft' ) ) ) {
	
       echo get_the_post_thumbnail( $current_developer_id, 'thumbnail', array( 'class' => 'alignleft' ) ); 
}
else {?>
	 <img src="<?php bloginfo('template_url'); ?>/images/logo_fc.png" class="img-responsive" alt="" /> 
<?php }
                                                   
                                                   ?> 
                                                    
                                                </div> 
                                           </div>
                                       </li>
                                       <li>
                                           <div class="DataSheet_details">
                                                <div style="margin-top:146px; text-align:center;" class="data_logo_fc">
                                                      <span>TOTAL AREA</span>
                                                      <strong><?php  $total_area=get_post_meta( $page_id, 'master_plan_total_area', true );
                                                      echo $total_area[1][1];
                                                      
                                                      ?></strong><br>
                                                      <p class="greenery">GREENERY </p>
                                                      <label><?php  $greenery=get_post_meta( $page_id, 'master_plan_greenery', true );
                                                      echo $greenery[1][1];
                                                      
                                                      ?></label>
                                                </div> 
                                                <p>
                                       <?php  $content = $postport->post_content;
                                        echo $content;
                                        ?>
                                  </p> 
                                                <span class="head">MASTER PLAN</span>
                                                
                                                <div class="Master_plan">
                                                   <?php  $src=get_post_meta( $page_id, 'master_plan_development_master_plan', true );   ?>
                                                           <?php if ( get_post_meta( $page_id, 'development_details_development_logo_fc', true ) ) : ?>
    <a href="<?php the_permalink() ?>" rel="bookmark">
        <img class="thumb" src="<?php echo $src[1][1]; ?>" alt="<?php the_title(); ?>" />
    </a>
<?php endif; ?>
                                                </div>
                                                </br>
                                                
                                               <p>
                                       <?php  $content = $postport->post_content;
                                        echo $content;
                                        ?>
                                  </p> 
                                           </div>
                                       </li>
                                       <li>
                                           <div class="DataSheet_details">
                                                <div style="margin-top:33px; text-align:center;" class="data_logo_fc">
                                                      <span>UNIT AREA</span>
                                                      <strong><?php $floor_plans_unit_area=get_post_meta( $page_id, 'floor_plans_unit_area', true );
                                                      echo $floor_plans_unit_area[1][1];
                                                      ?></strong>
                                                      <p>GARDEN</p>
                                                      <label><?php $floor_plans_garden=get_post_meta( $page_id, 'floor_plans_gardern', true ); 
                                                      
                                                       echo $floor_plans_garden[1][1];
                                                      ?></label>
                                                      
                                                      <span class="land_area">T. LAND AREA</span>
                                                      <label><?php $floor_total_land_area=get_post_meta( $page_id, 'floor_plans_total_land_area', true ); 
                                                      
                                                       echo $floor_total_land_area[1][1];
                                                      ?></label>
                                                      
                                                </div> 
                                               
                                                <span class="head">FLOOR PLANS</span>
                                                <div class="UNIT_AREA">
                                                     <ul>
                                                         <?php 
                                                                           $total_floor_area=get_post_meta( $page_id, 'total_floor_area', true );
                                                                           $count=count($total_floor_area);
                                                                           for($i=0; $i<$count; $i++){?>
                                                         <li>
                                                             <div class="floor_pan">
                                                                  <div class="floor_pan_img">
                                                                       <?php $floor_plan_images=get_post_meta( $page_id, 'file', true );
                                                                              
                                                                              
                                                                              ?>
                                                                     <img  src="<?php echo site_url(); ?>/wp-content/uploads/2014/11/<?php echo $floor_plan_images[$i]; ?>" alt="floor plan image" />
                                                                  </div> 
                                                                  <div class="floor_pan_detail">
                                                                       <ul>
                                                                           
                                                                          <li>
                                                                              <p>TOTAL FLOOR AREA:</p>
                                                                              <span><?php  
                                                                             echo $total_floor_area[$i];
                                                                              
                                                                              ?></span>
                                                                          </li>
                                                                          <li>
                                                                              <p>TOTAL LAND AREA:</p>
                                                                              <span> <?php $total_land_area=get_post_meta( $page_id, 'total_land_area', true );
                                                                              echo $total_land_area[$i];
                                                                              
                                                                              ?>
                                                                              </span>
                                                                          </li>
                                                                          <li>
                                                                              <p>MASTER BEDROOM:</p>
                                                                             <span> <?php $master_bedroom=get_post_meta( $page_id, 'master_bedroom', true );
                                                                              echo $master_bedroom[$i];
                                                                              
                                                                              ?>
                                                                              </span>
                                                                          </li>
                                                                          <li>
                                                                              <p>BEDROOMS:</p>
                                                                             <span> <?php $bedrooms=get_post_meta( $page_id, 'bedrooms', true );
                                                                              echo $bedrooms[$i];
                                                                              
                                                                              ?>
                                                                              </span>
                                                                          </li>
                                                                          <li>
                                                                              <p>BATHROOMS:</p>
                                                                             <span> <?php $bathrooms=get_post_meta( $page_id, 'bathrooms', true );
                                                                              echo $bathrooms[$i];
                                                                              
                                                                              ?>
                                                                              </span>
                                                                          </li>
                                                                        
                                                                       </ul>
                                                                  </div>
                                                             </div>
                                                         </li>
                                                           <?php } ?>
                                                        
                                                         
                                                       
                                                     </ul>
                                                </div>
                                           </div>
                                       </li>
                                   </ul>
                              </div> 
     <?php die(0);
}

add_action("wp_ajax_nopriv_call_content_development_ajax", "call_content_development_ajax");
add_action("wp_ajax_call_content_development_ajax", "call_content_development_ajax");

?>