<?php register_nav_menus( array(
	'pluginbuddy_mobile' => 'PluginBuddy Mobile Navigation Menu',
	'footer_menu' => 'My Custom Footer Menu'
) );
?>
<?php
add_action('init', 'my_custom_init');

function login_with_email_address($username) {
	$user = get_user_by_email($username);
	if(!empty($user->user_login))
		$username = $user->user_login;
	return $username;
}
add_action('wp_authenticate','login_with_email_address');

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
       
                ?>  <li><a href="javascript: void(0)"  onclick="get_development(<?php echo $id_post ?>,this);call_content_developer(<?php echo $id_post ?>)" ><?php echo $fetch_post_title[0]; ?></a></li><?php
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

            ?>   <li><a  href="javascript: void(0)"  onclick="padding_development(<?php echo $developer_id; ?>);call_content_development(<?php echo $development_id ?>,<?php echo $developer_id; ?>,this)"   ><?php echo $value; ?></a></li><?php
          
                

      
    }
    
    
    
    
     die(0);
}
add_action("wp_ajax_nopriv_call_development_ajax", "call_development_ajax");
add_action("wp_ajax_call_development_ajax", "call_development_ajax");


function call_content_ajax(){
   
    $cat_id=$_POST['cat_id'];
    if($cat_id==16){
        ?>
            <div class="show_all_block">
                                <div class="col-md-2">
                                  
                                </div>
                                <div class="col-md-12">
                                    <?php   $ul =  array('NEW CAIRO'=>'10', 'AL AIN AL SOKHNA'=>'11','AL SHOROUK CITY'=>'12','RED SEA'=>'13','6TH OF OCTOBER'=>'14','NORTH COAST'=>'15');?>
<?php $img=array('fam_cairo.jpeg' => '10' , 'fam_sokhnaa.jpeg'=>'11','fam_shorouk.jpeg'=>'12','fam_red_sea.jpeg'=>'13','fam_6th.jpeg'=>'14','fam_north.jpeg'=>'15'); ?>
                                    <ul> <?php
                                    
 foreach ($img as $fam_cat=>$id) {
                                  
                                     
   
    ?>  <li><a  onclick="call_sub_menu(<?php echo $id;?>,this);call_content_category(<?php echo $id; ?>)" href="javascript: void(0)"  ><img src="<?php bloginfo("template_url"); ?>/images/<?php echo $fam_cat; ?>" alt="<?php echo $fam_cat; ?>" /></a>
   <?php if($id==10){
        ?><label style="margin-left:39px !important"><?php echo 'NEW  CAIRO'; ?></label><?php
    }else if($id==11){
         ?><label style="margin-left:46px !important"><?php echo 'AL AIN </br> AL SOKHNA'; ?></label><?php
    }
    else if($id==12){
         ?><label style="margin-left:46px !important"><?php echo 'AL SHOROUK </br> CITY'; ?></label><?php
    }else if($id==13){file:///opt/lampp/htdocs/imagereality/wp-content/themes/New_property/css/style.css

         ?><label style="margin-left:51px !important"><?php echo 'RED SEA'; ?></label><?php
    }else if($id==14){
         ?><label style="margin-left:56px !important"><?php echo '6TH OF </br> OCTOBER'; ?></label><?php
    }else if($id==15){
         ?><label style="margin-left:39px !important"><?php echo 'NORTH  COAST'; ?></label><?php
    }
    ?>
    </li><?php } ?>
    
       

    </ul>
                                    
                                    </div>
                                </div>
            
            <?php 
        
  die(0);  }else{
    
      
    ?>
     <label><?php echo get_cat_name($cat_id); ?></label><br><br>
                        <div class="DataSheet_head">
                           

                            <h1>  <?php
                            //echo '<pre>';
                            //  print_r($_COOKIE['name']);
                            // echo '</pre>';
                            ?><?php echo 'ABOUT' . ' ' . get_cat_name($cat_id); ?></h1><br><br>
                            <p><?php echo category_description($cat_id); ?> 
                            </p> 
                        </div>
                          <div style="height:auto !important;" class="details_in_Scrollbar Res_det_in_con content_3 content"> 
                            <ul class="Data_details">
                                <li>
                                    <div class="DataSheet_details">
 <?php /*$map=array('10'=>'<iframe width="763" height="197" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=new+cario&amp;aq=&amp;sll=23.034638,72.561007&amp;sspn=0.052921,0.090895&amp;ie=UTF8&amp;hq=&amp;hnear=New+Cairo+City,+Cairo+Governorate,+Egypt&amp;t=m&amp;z=12&amp;ll=30.007413,31.491318&amp;output=embed"></iframe><br /><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=new+cario&amp;aq=&amp;sll=23.034638,72.561007&amp;sspn=0.052921,0.090895&amp;ie=UTF8&amp;hq=&amp;hnear=New+Cairo+City,+Cairo+Governorate,+Egypt&amp;t=m&amp;z=12&amp;ll=30.007413,31.491318" style="color:#0000FF;text-align:left">View Larger Map</a></small>',
     '11'=>'<iframe width="763" height="197" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=al+ain+al+sokhna&amp;aq=&amp;sll=30.007413,31.491318&amp;sspn=0.199194,0.363579&amp;ie=UTF8&amp;hq=&amp;hnear=Ain+Sokhna,+Ataqah,+Suez,+Egypt&amp;ll=29.632562,32.330017&amp;spn=0.024993,0.045447&amp;t=m&amp;z=14&amp;output=embed"></iframe><br /><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=al+ain+al+sokhna&amp;aq=&amp;sll=30.007413,31.491318&amp;sspn=0.199194,0.363579&amp;ie=UTF8&amp;hq=&amp;hnear=Ain+Sokhna,+Ataqah,+Suez,+Egypt&amp;ll=29.632562,32.330017&amp;spn=0.024993,0.045447&amp;t=m&amp;z=14" style="color:#0000FF;text-align:left">View Larger Map</a></small>',
     '12'=>'<iframe width="763" height="197" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=El+Shorouk+City,+Cairo+Governorate,+Egypt&amp;aq=0&amp;oq=al+shoro&amp;sll=29.631928,32.329845&amp;sspn=0.024993,0.045447&amp;ie=UTF8&amp;hq=&amp;hnear=El+Shorouk+City,+Cairo+Governorate,+Egypt&amp;t=m&amp;z=13&amp;ll=30.144212,31.639718&amp;output=embed"></iframe><br /><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=El+Shorouk+City,+Cairo+Governorate,+Egypt&amp;aq=0&amp;oq=al+shoro&amp;sll=29.631928,32.329845&amp;sspn=0.024993,0.045447&amp;ie=UTF8&amp;hq=&amp;hnear=El+Shorouk+City,+Cairo+Governorate,+Egypt&amp;t=m&amp;z=13&amp;ll=30.144212,31.639718" style="color:#0000FF;text-align:left">View Larger Map</a></small>',
     '13'=>'<iframe width="763" height="197" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Red+Sea+Governorate,+Egypt&amp;aq=0&amp;oq=red+sea+&amp;sll=20.280232,38.512573&amp;sspn=27.392308,46.538086&amp;ie=UTF8&amp;hq=&amp;hnear=Red+Sea+Governorate,+Egypt&amp;t=m&amp;z=6&amp;ll=25.107684,33.796461&amp;output=embed"></iframe><br /><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Red+Sea+Governorate,+Egypt&amp;aq=0&amp;oq=red+sea+&amp;sll=20.280232,38.512573&amp;sspn=27.392308,46.538086&amp;ie=UTF8&amp;hq=&amp;hnear=Red+Sea+Governorate,+Egypt&amp;t=m&amp;z=6&amp;ll=25.107684,33.796461" style="color:#0000FF;text-align:left">View Larger Map</a></small>',
     
     '14'=>'<iframe width="763" height="197" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=6th+of+October+City,+Giza,+Egypt&amp;aq=0&amp;oq=6th+&amp;sll=25.107684,33.796461&amp;sspn=13.307449,23.269043&amp;ie=UTF8&amp;hq=&amp;hnear=6th+of+October+City,+Giza,+Egypt&amp;t=m&amp;z=11&amp;ll=29.938126,30.91398&amp;output=embed"></iframe><br /><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=6th+of+October+City,+Giza,+Egypt&amp;aq=0&amp;oq=6th+&amp;sll=25.107684,33.796461&amp;sspn=13.307449,23.269043&amp;ie=UTF8&amp;hq=&amp;hnear=6th+of+October+City,+Giza,+Egypt&amp;t=m&amp;z=11&amp;ll=29.938126,30.91398" style="color:#0000FF;text-align:left">View Larger Map</a></small>',
     '15'=>'<iframe width="763" height="197" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=North+Coast&amp;aq=&amp;sll=-31.576409,152.638352&amp;sspn=6.268922,11.634521&amp;ie=UTF8&amp;hq=&amp;hnear=North+Coast&amp;ll=-31.576409,152.638352&amp;spn=6.252553,11.634521&amp;t=m&amp;z=7&amp;output=embed"></iframe><br /><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=North+Coast&amp;aq=&amp;sll=-31.576409,152.638352&amp;sspn=6.268922,11.634521&amp;ie=UTF8&amp;hq=&amp;hnear=North+Coast&amp;ll=-31.576409,152.638352&amp;spn=6.252553,11.634521&amp;t=m&amp;z=7" style="color:#0000FF;text-align:left">View Larger Map</a></small>'); ?>
                <?php foreach($map as $map_loc=>$location){*/?>
                                            
    
                                         <!--  <img src="<?php //echo site_url(); ?>"> -->
                                           
                                              <?php 
                                              
                                             //  if($cat_id==10){
                                                    ?>
                                                         <div class="Development_Master_Image" id="Development_Master_Image123" style="float:left;">
                                                             
                                                        <?php 
                                              //print_r($location);
                                              ?> </div> 
                                                    
                                              


                                               <?php// }
                                            //}
?>                        
                                       

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
                                                ?>  <li><a href="javascript: void(0)" onclick="get_development(<?php echo $id_post ?>,this);call_content_developer(<?php echo $id_post ?>)"> <?php echo get_the_post_thumbnail( $id_post );  ?></a></li>
                                                <?php } }
                                            ?>

                                        </ul>
                                    </div>
                                </div>

                              </div> 
    <?php
     die(0);}
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
        <img src="<?php echo $corporate_image[1][1]; ?>" alt="<?php the_title(); ?>" width="887px" height="285px"/>

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

            ?>   <li><a  href="javascript: void(0)" onclick="padding_development(<?php echo $page_id; ?>);call_content_development(<?php echo $development_id ?>,<?php echo $page_id; ?>,this)"  ><?php echo get_the_post_thumbnail( $id , array(100,130));  ?></a></li><?php
          
                

      
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
                                                    <div class="img_full_width">
                                                    <?php 
//if ( has_post_thumbnail($page_id) ) { // check if the post has a Post Thumbnail assigned to it.
	echo get_the_post_thumbnail($page_id);
//} 
?></div>
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
                                              <p>
                                       <?php  $content = $postport->post_content;
                                        echo $content;
                                        ?>
                                  </p> 
                                           </div>
                                       </li>
                                       <li>
                                           <div class="DataSheet_details">
                                                <div style="margin-top:167px; text-align:center; display:none;" class="data_logo_fc_master">
                                                      <span>TOTAL AREA</span>
                                                      <strong><?php  $total_area=get_post_meta( $page_id, 'master_plan_total_area', true );
                                                      echo $total_area[1][1];
                                                      
                                                      ?></strong><br>
                                                      <p class="greenery">GREENERY </p>
                                                      <label class="development_label"><?php  $greenery=get_post_meta( $page_id, 'master_plan_greenery', true );
                                                      echo $greenery[1][1];
                                                      
                                                      ?></label>
                                                </div> 
                                               
                                                <span class="head" onclick="show_master_plan();">MASTER PLAN</span>
                                                
                                                <div class="Master_plan" style="display:none;" >
                                                   <?php  $src=get_post_meta( $page_id, 'master_plan_development_master_plan', true );   ?>
                                                           <?php if ( get_post_meta( $page_id, 'development_details_development_logo_fc', true ) ) : ?>
    <a href="<?php the_permalink() ?>" rel="bookmark">
        <img class="thumb" src="<?php echo $src[1][1]; ?>" alt="<?php the_title(); ?>" />
    </a>
<?php endif; ?>
                                                </div>
                                                </br>
                                                
                                               
                                           </div>
                                       </li>
                                       <li>
                                           <div class="DataSheet_details">
                                                <div style="margin-top:51px; text-align:center; display:none;" class="data_logo_fc_floor_plans" >
                                                      <span>UNIT AREA</span>
                                                      <strong><?php $floor_plans_unit_area=get_post_meta( $page_id, 'floor_plans_unit_area', true );
                                                      echo $floor_plans_unit_area[1][1];
                                                      ?></strong>
                                                      <p>GARDEN</p>
                                                      <label class="development_label"><?php $floor_plans_garden=get_post_meta( $page_id, 'floor_plans_gardern', true ); 
                                                      
                                                       echo $floor_plans_garden[1][1];
                                                      ?></label>
                                                      
                                                      <span class="land_area">T. LAND AREA</span>
                                                      <label class="development_label"><?php $floor_total_land_area=get_post_meta( $page_id, 'floor_plans_total_land_area', true ); 
                                                      
                                                       echo $floor_total_land_area[1][1];
                                                      ?></label>
                                                      
                                                </div> 
                                               
                                                <span class="head" onclick="show_floor_plans();">FLOOR PLANS</span>
                                                <div class="UNIT_AREA" style="display:none;">
                                                     <ul>
                                                         <?php 
                                                                           $total_floor_area=get_post_meta( $page_id, 'total_floor_area', true );
                                                                           $count=count($total_floor_area);
                                                                           for($i=0; $i<$count; $i++){?>
                                                         <li>
                                                             <div class="floor_pan">
                                                                  <div class="floor_pan_img">
                                                                       <?php $floor_plan_images=get_post_meta( $page_id, 'file', true );
                                                                              if(isset($floor_plan_images[$i])){
                                                                              
                                                                              ?>
                                                                     <img  src="<?php echo site_url(); ?>/wp-content/uploads/imagereality_images/floor_plans/<?php echo $floor_plan_images[$i]; ?>" alt="floor plan image" />
                                                                  <?php } ?>
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
                                       
                                       
                                       <li>
                                           <div class="DataSheet_details">
                                              
                                               
                                                <span class="head" onclick="show_features();">FEATURES</span>
                                                <div class="UNIT_AREA" style="display:none;">
                                         
                                                </div>
                                           </div>
                                       </li>
                                       <li>
                                           <div class="DataSheet_details">
                                               
                                               
                                                <span class="head" onclick="show_gallery();">GALLERY</span>
                                                <div class="UNIT_AREA" style="display:none;">
                                                 
                                                </div>
                                           </div>
                                       </li>
                                       <li>
                                           <div class="DataSheet_details">
                                             
                                               
                                                <span class="head" onclick="show_units();">UNITS</span>
                                              
                                           </div>
                                       </li>
                                       <li>
                                           <div class="DataSheet_details">
                                               
                                               
                                                <span class="head" onclick="show_map_location();">MAP LOCATION</span>
                                                <div class="UNIT_AREA" style="display:none;">
                                                    
                                                </div>
                                           </div>
                                       </li>
                                       <li>
                                           <div class="DataSheet_details">
                                               
                                               
                                                <span class="head" onclick="show_contact_details();">CONTACT DETAILS</span>
                                                <div class="UNIT_AREA" style="display:none;">
                                                   
                                                </div>
                                           </div>
                                       </li>
                                        <li>
                                           <div class="DataSheet_details">
                                               <ul class="development_social">
                                                   <li>
                                                      <img  src="<?php bloginfo('template_url'); ?>/images/icon-1.png" />
                                                   </li>
                                                   <li>
                                                      <img  src="<?php bloginfo('template_url'); ?>/images/icon-2.png"  />
                                                   </li>
                                                   <li>
                                                      <img  src="<?php bloginfo('template_url'); ?>/images/icon-3.png" />
                                                   </li>
                                                   <li>
                                                      <img  src="<?php bloginfo('template_url'); ?>/images/icon-4.png"  />
                                                   </li>
                                                   <li>
                                                      <img  src="<?php bloginfo('template_url'); ?>/images/icon-5.png"  />
                                                   </li>
                                                   <li>
                                                      <img  src="<?php bloginfo('template_url'); ?>/images/icon-6.png"  />
                                                   </li>
                                                  
                                                   <li style="padding-left: 26px;">
                                                      <img  src="<?php bloginfo('template_url'); ?>/images/icon-7.png"  />
                                                   </li>
                                                   <li style="padding-left: 26px;">
                                                      <img  src="<?php bloginfo('template_url'); ?>/images/icon-8.png"  />
                                                   </li>
                                                   <li style="padding-left: 21px;">
                                                      <img  src="<?php bloginfo('template_url'); ?>/images/icon-9.png"  />
                                                   </li>
                                               </ul>
                                               
                                                
                                           </div>
                                       </li>
                                       <li>
                                           <div class="DataSheet_details">
                                               
                                               
                                                <span class="head">SIMILAR PROPERTIES</span>
                                                <div class="UNIT_AREA" style="width:100% !important;" >
                                                    <ul class="similarproperties">
                                                        <li style="width: 62% !important;" >
                                                           <div class="developer_block">
                               
                                <div class="col-md-9">
                                    <ul>

                                        <?php
                                        $query_fetch_development_id="select * from wp_postmeta where meta_key='developer_name' and meta_value='$current_developer_id'";
                                        $result_fetch_development_id=mysql_query($query_fetch_development_id);
                                        while ($row_fetch_development_id = mysql_fetch_array($result_fetch_development_id)) {
                                           $id_development=$row_fetch_development_id['post_id'];
                                           if($page_id!=$id_development){
                                           ?>
                                         
                                          
                                         
                                       
                                        
                                    <li class="slider"><a><?php echo get_the_post_thumbnail( $current_developer_id );  ?></a>
                                      <?php $developer_name=mysql_query("select post_title from wp_posts where ID='$id_development'"); 
                                          while($row_fetch_development_name = mysql_fetch_array($developer_name)){
                                             echo "<span style='text-align: center;'>________________</span>"; 
                                             echo "<span style='text-align: center;'>".$row_fetch_development_name['post_title']."</span>";
                                             echo "<span style='text-align: center;'>".$floor_plans_unit_area[1][1]."</span>";
                                         }
                                          } 
                                          ?> </li>
                                  
                                        
                                       <?php } ?>
                                        </ul>
                                    </div>
                                </div> 
                                                        </li>
                                                       
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

function delete_floor_plan_data(){
    if(isset($_POST)){
    $id=$_POST['id'];
     $i=$_POST['i'];
    // print_r($i);
    
     $total_floor_a=$_POST['total_f_a'];
     //print_r($total_f_a);
     $total_l_a= $_POST['total_l_a'];
     $garden =$_POST['garden'];
     $master_bedroom =$_POST['master_bedroom'];
     $bedrooms =$_POST['bedrooms'];
     $bathrooms= $_POST['bathrooms'];
     $file= $_POST['file'];
   // print_r($file);
     $total_f_del[]=$total_floor_a[$i];
      $total_l_del[]=$total_l_a[$i];
       $total_gar_del[]=$garden[$i]; 
       $total_mas_del[]=$master_bedroom[$i];
        $total_bed_del[]=$bedrooms[$i];
         $total_bath_del[]=$bathrooms[$i];
        $total_file_del[]=$file[$i];
       
  //  $total_file_del;
    // print_r($total_del);
    $ar_f= array_diff($total_floor_a,$total_f_del);
     $ar_l= array_diff($total_l_a,$total_l_del);
      $ar_gar= array_diff($garden,$total_gar_del);
       $ar_mas= array_diff($master_bedroom,$total_mas_del);
        $ar_bed= array_diff($bedrooms,$total_bed_del);
         $ar_bath= array_diff($bathrooms,$total_bath_del);
          $ar_file= array_diff($file,$total_file_del);
          //
          //print_r($ar_file); exit;
    
   $new_array_f= array();
   $new_array_l= array();
   $new_array_gar= array();
   $new_array_mas= array();
   $new_array_bed= array();
   $new_array_bath= array();
   $new_array_file= array();
  
   
   // print_r($ar);
   $key=0;
  // echo $arrlength=count($ar);
    foreach ($ar_f as $key => $value_f) {
      
  
  $new_array_f[]=$value_f;
  
  
  $key++;   } 
// print_r($new_array_f);
  
   foreach ($ar_l as $key => $value_l) {
       
   
  $new_array_l[]=$value_l;
  
  $key++;   } 
  
   foreach ($ar_gar as $key => $value_gar) {
        
   
  $new_array_gar[]=$value_gar;
  
  $key++;   } 
  
   foreach ($ar_mas as $key => $value_mas) {
       
   
  $new_array_mas[]=$value_mas;
  
  $key++;   } 
  
   foreach ($ar_bed as $key => $value_bed) {
       
   
  $new_array_bed[]=$value_bed;
  
  $key++;   } 
  
   foreach ($ar_bath as $key => $value_bath) {
        
   
  $new_array_bath[]=$value_bath;
  
  $key++;   } 
  
   foreach ($ar_file as $key => $value_file) {
       
  //echo $value_file;
  $new_array_file[]=$value_file;
   
  
  $key++;   } 
  // print_r($new_array_f);
  
   // print_r($new_array_file);
 
update_post_meta($id, 'total_floor_area', $new_array_f);
update_post_meta($id, 'total_land_area', $new_array_l);
update_post_meta($id, 'garden', $new_array_gar);
update_post_meta($id, 'master_bedroom', $new_array_mas);
update_post_meta($id, 'bedrooms', $new_array_bed);
update_post_meta($id, 'bathrooms', $new_array_bath);
update_post_meta($id, 'file', $new_array_file); 

die(0);
    } 
}
add_action("wp_ajax_nopriv_delete_floor_plan_data", "delete_floor_plan_data");
add_action("wp_ajax_delete_floor_plan_data", "delete_floor_plan_data");

    function delete_image_only(){
      if(isset($_POST)){
    $id=$_POST['id'];
    $i=$_POST['i'];
    $file= $_POST['file'];
       $total_file_del[]=$file[$i];
          $ar_file= array_diff($file,$total_file_del);
     $new_array_file= array();
      foreach ($ar_file as $key => $value_file) {
       
  //echo $value_file;
  $new_array_file[]=$value_file;
   
  
  $key++;   } 
  update_post_meta($id, 'file', $new_array_file); 
      }
    }
    add_action("wp_ajax_nopriv_delete_image_only", "delete_image_only");
add_action("wp_ajax_delete_image_only", "delete_image_only");

function get_user_role($id=null){
global $current_user;
if(!$id) $id = $current_user->ID;
if ( is_user_logged_in() ) {
$user = new WP_User( $id );
if ( !empty( $user->roles ) && is_array( $user->roles ) ) {
foreach ( $user->roles as $role )
 return $role;
}
}
}

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------


function mime_type_tab($tabs) {
        /* name of custom tab */
        $new_tab = array('mimeframe' => __('Mime Types', 'mimetype'));
        return array_merge($tabs, $new_tab);
}
add_filter('media_upload_tabs', 'mime_type_tab');


function create_mime_type_page() {
        media_upload_header();
        wp_enqueue_style( 'media' );

        /* add custom code to display bellow this line */
        /* display mime types */
        $mimes = get_allowed_mime_types();
        $types = array();

        echo '<div class="type-outer">';
        echo '<h3 class="media-title">Supported file types</h3>';
        echo '<hr />';

        foreach ($mimes as $ext => $mime) {
                 $types[] = '<li>' . str_replace('|', ', ', $ext) . '</li>';
        }
        echo '<ul class="mime-types">' . implode('', $types) . '</ul>';
        echo '</div>';
       /* end custom code */
 
}

function insert_mime_type_iframe() {
    return wp_iframe( 'create_mime_type_page');
}
add_action('media_upload_mimeframe', 'insert_mime_type_iframe');

        add_action( 'admin_head', 'mime_frame_css' );
        function mime_frame_css() {
                echo '<style type="text/css">
                .type-outer{margin:20px;}
                .type-outer hr{
                        border:solid #ccc;
                        border-width:0px 0px 1px 0px;
                        margin:0px 0px 20px 0px;
                        }
                .mime-types li{
                        font-size:10px;
                        float:left;
                        width:24%;
                        padding:1px;
                        }
                        </style>';
        }

add_action( 'admin_head', 'style_thumbsss' );
function style_thumbsss()
{   
    echo '
    <style type="text/css">
    .inside p.hide-if-no-js a img{ width: 230px!important; height: 160px!important; }
    </style>';
}
    
?>