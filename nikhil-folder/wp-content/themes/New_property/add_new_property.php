<?php
/*
  Template Name: add_new_property
 */

get_header(); ?>
<script>
jQuery(document).ready(function(){
    

jQuery('.Properties').addClass("selected");
jQuery('.selected').click();
jQuery(".add_property").css("background","#4A86CE");
jQuery('.table_content').css('background','');


});
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
                
                <!-------------->
                
               <div id="sidebar-wrapper">
		<div id="sidebar-in-bg">
			<?php get_template_part('dashboard_sidebar'); ?>
            <div class="sidebar-right">
                 <div class="side-head">
                      <h1>Add New Property</h1>     
                 </div>
                 <div class="sider-tebal-view">
                      <div class="Client_Plan Plan_Details border_none">
                          <form method="post" enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF']?>" >
                              <?php if(isset($_GET['id'])){ 
                                   $post_id=$_GET['id'];
                                  
                                  ?>
                                     <div class="new_property">
                              
                              <?php 
   // print_r($_POST);
    //print_r($_FILES);
                             


      if ($_SERVER["REQUEST_METHOD"] == "POST") {   
   
    if (empty($_POST['title'])) {
     $titleErr = "Title is required";
   } else {
     $title=$_POST['title'];
   }
   if ($_POST['Property_Type']=='select') {
  $Property_TypeErr = "Property Type is required";
   } else {
     $Property_Type=$_POST['Property_Type'];         
   }
    
  if ($_POST['Unit_Type']=='select') {
     $Unit_TypeErr = "Unit Type is required"; 
   } else {
     $Unit_Type=$_POST['Unit_Type'];
   }  
    
   if ($_POST['floor']=='select') {
     $floorErr = "Floor is required";
   } else {
      $floor=$_POST['floor'];
   }   
    
    if ($_POST['finishing']=='select') {
     $finishingErr = "finishing is required";
   } else {
     $finishing=$_POST['finishing'];
   } 
   
     if ($_POST['city']=='select') {
     $cityErr = "city is required";
   } else {
     $city=$_POST['city'];
   } 
   
   if ($_POST['other']=='Other') {
     
     $other_city_name=$_POST['other'];
   } else {
    $cityErr = "Please write other city ";
   } 
   
   
    if ($_POST['location']=='select') {
     $locationErr = "location is required";
   } else {
     $location=$_POST['location'];
   } 
    
    if ($_POST['contract_type']=='select') {
     $contract_typeErr = "contract_type is required";
   } else {
     $contract_type=$_POST['contract_type'];
   } 
   
    if (empty($_POST['area'])) {
     $areaErr = "area is required";       
   } else {
     $area=$_POST['area'];
   } 
   
    if (empty($_POST['no_of_bedrooms'])) {
     $no_of_bedroomsErr = "no_of_bedrooms is required";
   } else {
     $no_of_bedrooms=$_POST['no_of_bedrooms'];
   } 
   
  if (empty($_POST['no_of_bathrooms'])) {
     $no_of_bathroomsErr = "no_of_bathrooms is required";
   } else {
     $no_of_bathrooms=$_POST['no_of_bathrooms'];
   }     
     
    if ($_POST['payment_type']=='select') {
     $payment_typeErr = "payment_type is required";
   } else {
     $payment_type=$_POST['payment_type'];
   } 
   
     if (empty($_POST['property_features'])) {
     $property_featuresErr = "property features is required";
   } else {
     $property_features=$_POST['property_features'];
   } 
     
       if (empty($_FILES['fileToUpload']['name'])) {
  $imageErr = "Image is required";
  } else {
   $image=$_FILES['fileToUpload']['name'];
   $path= site_url().'/wp-content/uploads/imagereality_images/property/'.$image;
      $target_path='wp-content/uploads/imagereality_images/property/'.$image;
    
 if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_path)){
      $query_for_image1=mysql_query("select guid from wp_posts where post_parent='$post_id'");
    $image_name1=mysql_fetch_array($query_for_image1);
 @unlink('../wp-content/uploads/imagereality_images/property/'.$image_name1['guid']);}
 
$attachment_id=$post_id + 1;
    $post_thumbnail_id=  update_attached_file( $attachment_id, $path );
 //----------------------------------------------------------------------------------------------------------------------------------------------------------------    
 // add_filter( 'post_thumbnail_html', 'my_post_image_html', 100, 100 );
    
   // function my_post_image_html( $post_id, $attachment_id ) {
        
	 
//}
    
         
         add_filter('post_thumbnail_html', 'set_featured_image_from_attachment',100,100);
function set_featured_image_from_attachment() {

	
				set_post_thumbnail( $post_id, $attachment_id);
                                set_post_thumbnail_size(130, 100, true);
				
			
   
	
	
}
   
 //----------------------------------------------------------------------------------------------------------------------------------------------------------------- 
    mysql_query("UPDATE wp_posts SET guid='$path'WHERE ID='$attachment_id'"); 
   } 
   
    
}
  
   
    // exit; 
        @$property_features_string= implode(',',$property_features);
          $Description=$_POST['postContent'];
             
          
          
        if(!empty($title) && !empty($Property_Type)  && !empty($Unit_Type) && !empty($floor) && !empty($finishing) && 
                !empty($city) && !empty($location) && !empty($contract_type) && !empty($area) && !empty($no_of_bedrooms) && 
                !empty($no_of_bathrooms) && !empty($payment_type) && !empty($property_features)){
            
            /* -------------------------------------------------------for update image--------------------------------------------------------------------------------- */
 
    //print_r($image);
    
   // print_r($image);
    
            
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/

 
            
    update_post_meta($post_id, 'post_type_property_Property_Type', $Property_Type);
    update_post_meta($post_id, 'post_type_property_unit_type', $Unit_Type);
    update_post_meta($post_id, 'post_type_property_floor', $floor);
    update_post_meta($post_id, 'post_type_property_finishing', $finishing);
    update_post_meta($post_id, 'post_type_property_city', $city);
    update_post_meta($post_id, 'post_type_other_city', $other_city_name);
    update_post_meta($post_id, 'post_type_property_location', $location);
    update_post_meta($post_id, 'post_type_property_contract_type', $contract_type);
    update_post_meta($post_id, 'post_type_property_area', $area);   
    update_post_meta($post_id, 'post_type_property_no_of_bedrooms', $no_of_bedrooms);
    update_post_meta($post_id, 'post_type_property_no_of_bathrooms', $no_of_bathrooms);
    update_post_meta($post_id, 'post_type_property_payment_type', $payment_type);
    update_post_meta($post_id, 'post_type_property_property_features', $property_features_string);
      
    
    $query=mysql_query("UPDATE wp_posts SET post_title='$title', post_content='$Description'  where ID='$post_id'");

   

 
    
    
    
    }
            
      
  
    
             
             
             
         $Property_Type1=get_post_meta($post_id, 'post_type_property_Property_Type', true);
  $Unit_Type1=get_post_meta($post_id, 'post_type_property_unit_type', true);
   $floor1=get_post_meta($post_id, 'post_type_property_floor', true);
   $finishing1 =get_post_meta($post_id, 'post_type_property_finishing', true);
 $city1  = get_post_meta($post_id, 'post_type_property_city', true);
 $other_city=get_post_meta($post_id, 'post_type_other_city', true);
   $location1  = get_post_meta($post_id, 'post_type_property_location', true);
  $contract_type1 = get_post_meta($post_id, 'post_type_property_contract_type', true);
 $area1  = get_post_meta($post_id, 'post_type_property_area', true);   
 $no_of_bedrooms1  =  get_post_meta($post_id, 'post_type_property_no_of_bedrooms', true);
 $no_of_bathrooms1 =  get_post_meta($post_id, 'post_type_property_no_of_bathrooms', true);
  $payment_type1 =get_post_meta($post_id, 'post_type_property_payment_type', true);
  
 $property_features_string1 =  get_post_meta($post_id, 'post_type_property_property_features', true);
 
 $property_features1=explode(",",$property_features_string1);
 /* -------------------------------------------------------for display image--------------------------------------------------------------------------------- */
 $query=mysql_query("select post_title,post_content from wp_posts where ID='$post_id'");
 $row = mysql_fetch_array($query);
 
                     $Current_user_id = get_current_user_id(); 
   
      $get_user_role = get_user_role();
        if ($get_user_role == 'administrator') {
            $sug_status = 'Publish';
            
        } else {
            $sug_status = 'Pending';
          
        } 
    $query_for_image=mysql_query("select guid from wp_posts where post_parent='$post_id'");
    $image_name=mysql_fetch_array($query_for_image);
   // print_r($image_name);
                             
                                      ?>
                          
                          <ul class="add_new _property_in_div">
                             <li> <label>Fields with <span>* </span>are required</label></li>
                              <li>
                                   <label>Title<span>*</span></label>
                                   <input type="text" name="title" placeholder="Name" id="title" value="<?php echo $row['post_title']; ?>" size="59" style="float: right; width: 85%;" >
                                    <p><?php echo $titleErr; ?></p>  
                                  
                              </li>
                              
                              <li>
                                  <div class="left_in_op">
                                        <label>Property Type<span>*</span></label>
                                        <select class="Property_Type" name="Property_Type">
                                        <option>Select one</option>
                                         <option value="Residential"<?php if($Property_Type1 == 'Residential') { ?> selected="selected"<? } ?>>Residential</option>
                                         <option value="Commercial"<?php if($Property_Type1 == 'Commercial') { ?> selected="selected"<? } ?>>Commercial</option>
                                         <option value="Land"<?php if($Property_Type1 == 'Land') { ?> selected="selected"<? } ?>>Land</option>
                                       
                                         </select>
                                        <p><?php echo $Property_TypeErr; ?></p>
                                  </div>
                                  <div class="right_in_op">
                                        <label> Unit Type<span>*</span></label>
                                        <select  name="Unit_Type"  style="width:251px;">
                                           <option>Select one</option>
                                        <option value="Apartment"<?php if($Unit_Type1 == 'Apartment') { ?> selected="selected"<? } ?>>Apartment</option>
                                         <option value="Chalet"<?php if($Unit_Type1 == 'Chalet') { ?> selected="selected"<? } ?>>Chalet</option>
                                         <option value="Villa"<?php if($Unit_Type1 == 'Villa') { ?> selected="selected"<? } ?>>Villa</option>
                                         <option value="Twin-house"<?php if($Unit_Type1 == 'Twin-house') { ?> selected="selected"<? } ?>>Twin-house</option>
                                         <option value="Townhouse"<?php if($Unit_Type1 == 'Townhouse') { ?> selected="selected"<? } ?>>Townhouse</option>
                                         <option value="Penthouse"<?php if($Unit_Type1 == 'Penthouse') { ?> selected="selected"<? } ?>>Penthouse</option>
                                         <option value="Duplex Roof"<?php if($Unit_Type1 == 'Duplex Roof') { ?> selected="selected"<? } ?>>Duplex Roof</option>   
                                         <option value="Duplex Garden"<?php if($Unit_Type1 == 'Duplex Garden') { ?> selected="selected"<? } ?>>Duplex Garden</option>
                                         <option value="Chalet Roof"<?php if($Unit_Type1 == 'Chalet Roof') { ?> selected="selected"<? } ?>>Chalet Roof</option> 
                                         <option value="Chalet Garden"<?php if($Unit_Type1 == 'Chalet Garden') { ?> selected="selected"<? } ?>>Chalet Garden</option>
                                         <option value="Studio"<?php if($Unit_Type1 == 'Studio') { ?> selected="selected"<? } ?>>Studio</option>

                                        </select>  
                                        <p><?php echo $Unit_TypeErr; ?></p>
                                  </div>
                              </li>
                              
                              <li>
                                  <div class="left_in_op" style="width: 45%;">
                                        <label>Floor<span>* </span></label>
                                        <select name="floor">
                                         <option>Select one</option>   
                                        <option value="Ground Floor"<?php if($floor1 == 'Ground Floor') { ?> selected="selected"<? } ?>>Ground Floor</option>
                                        <option value="1"<?php  if($floor1 == '1')  { ?> selected="selected"<? } ?>>1</option>
                                        <option value="2"<?php  if($floor1 == '2')  { ?> selected="selected"<? } ?>>2</option>
                                         <option value="3"<?php if($floor1 == '3') { ?> selected="selected"<? } ?>>3</option>
                                         <option value="4"<?php if($floor1 == '4') { ?> selected="selected"<? } ?>>4</option>
                                         <option value="5"<?php if($floor1 == '5') { ?> selected="selected"<? } ?>>5</option>
                                         <option value="6"<?php if($floor1 == '6') { ?> selected="selected"<? } ?>>6</option>
                                         <option value="7"<?php if($floor1 == '7') { ?> selected="selected"<? } ?>>7</option>
                                         <option value="8"<?php if($floor1 == '8') { ?> selected="selected"<? } ?>>8</option>
                                         <option value="9"<?php if($floor1 == '9') { ?> selected="selected"<? } ?>>9</option>
                                         <option value="10+"<?php if($floor1 == '10+') { ?> selected="selected"<? } ?>>10+</option>
                                         

                                         
                                        </select>  
                                        <p><?php echo $floorErr; ?></p>
                                  </div>
                                  <div class="right_in_op"  style="width: 55%;">
                                        <label>Finishing<span>*</span></label>
                                        <select  name="finishing" style="width:287px;">
                                           <option>Select one</option>
                                         <option value="Unfinished"<?php if($finishing1 == 'Unfinished') { ?> selected="selected"<? } ?>>Unfinished</option>
                                         <option value="SemiFinished"<?php if($finishing1 == 'Semi-Finished') { ?> selected="selected"<? } ?>>Semi-Finished</option>
                                         <option value="Super Lux"<?php if($finishing1 == 'Super Lux') { ?> selected="selected"<? } ?>>Super Lux</option>
                                         <option value="Extra Super Lux"<?php if($finishing1 == 'Extra Super Lux') { ?> selected="selected"<? } ?>>Extra Super Lux</option>

                                        </select>  
                                        <p><?php echo $finishingErr; ?></p>
                                  </div>
                              </li>
                              
                              <li>
                                    <div class="left_in_op" style="width: 45%;">
                                        <label>City<span>* </span></label>
                                        <select name="city">
                                           <option>Select one</option>
                                          <option value="New_Cairo"<?php if($city1 == 'New_Cairo') { ?> selected="selected"<? } ?>>New Cairo</option>
                                         <option value="Al_Ain_Al_Sokhn"<?php if($city1== 'Al_Ain_Al_Sokhn') { ?> selected="selected"<? } ?>>Al Ain Al Sokhn</option>
                                         <option value="Al_Shorouk_City"<?php if($city1 == 'Al_Shorouk_City') { ?> selected="selected"<? } ?>>Al Shorouk City</option>
                                         <option value="6th_Of_October"<?php if($city1 == '6th_Of_October') { ?> selected="selected"<? } ?>>6th Of October</option>
                                         <option value="North_Coast"<?php if($city1 == 'North_Coast') { ?> selected="selected"<? } ?>>North Coast</option>
                                        
                                          <option value="Other"<?php if($city1 == 'Other') { ?> selected="selected"<? } ?>>Other</option>
                                          <?php  if($city1=='Other'){?> <input type="text" name="other" placeholder="other city" id="area" size="59" style="width: 80%; float: right;" value="<?php echo $other_city; ?>">    <?php } ?>
                                    
                                        </select>  
                                        <p><?php echo $cityErr; ?></p>
                                  </div>
                                  <div class="right_in_op" style="width: 55%;">
                                        <label>Location<span>*</span></label>
                                        <select  name="location"  style="width:287px;">
                                            <option>Select one</option>
                                         <option value="Inside_Compound"<?php if($location1 == 'Inside_Compound') { ?> selected="selected"<? } ?>>Inside Compound</option>
                                         <option value="Stand_Alone"<?php if($location1 == 'Stand_Alone') { ?> selected="selected"<? } ?>>Stand Alone</option>
                                       
                                            
                                        </select>  
                                        <p><?php echo $locationErr; ?></p>
                                  </div> 
                              </li>
                              
                              <li>
                                   <div class="left_in_op">
                                        <label>Contract Type<span>* </span></label>
                                        <select name="contract_type">
                                            
                                            <option value="Renting"<?php if($contract_type1 == 'Renting') { ?> selected="selected"<? } ?>>Renting</option>
                                         <option value="Selling"<?php if($contract_type1 == 'Selling') { ?> selected="selected"<? } ?>>Selling</option>
                                           
                                       
                                        </select>  
                                        <p><?php echo $contract_typeErr; ?></p>
                                  </div>
                                  <div class="right_in_op">
                                <label>Area<span>*</span></label>
                                   <input type="text" name="area" placeholder="Area" id="area" size="59" style="width: 80%; float: right;" value="<?php echo $area1; ?>">
                                    <p><?php echo $areaErr; ?></p> 
                                  </div> 
                              </li>
                              
                              <li>
                                   <label>No. of Bedrooms<span>*</span></label>
                                   <input type="text" name="no_of_bedrooms" placeholder="Master Bedroom/ Bedrooms" id="bed"  size="59" value="<?php echo $no_of_bedrooms1; ?>" style="width: 75%; float: right;" >
                                    <p><?php echo $no_of_bedroomsErr; ?></p> 
                              </li>
                              
                              <li>
                                  <label>No. of Bathrooms<span>*</span></label>
                                   <input type="text" name="no_of_bathrooms" placeholder="Guest Bathroom/ Bathrooms" id="bath"  size="59" value="<?php echo $no_of_bathrooms1; ?>" style="width: 75%; float: right;" >
                                    <p><?php echo $no_of_bathroomsErr; ?></p> 
                              </li>
                              
                              <li>
                                  <label>Payment Type<span>* </span></label>
                                        <select name="payment_type">
                                            <option>Select one</option>
                                     <option value="Cash"<?php if($payment_type1 == 'Cash') { ?> selected="selected"<? } ?>>Cash</option>
                                         <option value="Instalments"<?php if($payment_type1 == 'Instalments') { ?> selected="selected"<? } ?>>Instalments</option>
                                         <option value="Credit"<?php if($payment_type1 == 'Credit') { ?> selected="selected"<? } ?>>Credit</option>
                                        
                                        </select>  
                                        <p><?php echo $payment_typeErr; ?></p>
                              </li>
                              
                              <li>
                                  <label>Property Features<span>* </span></label>
                                  <div class="demo_in_check_op">
                                   
                                  </div>
                                  <div class="Property_Features_in_select">
                                      
                                      <ul class="select_box_in_div_op">
                                          <li>
                                              
                                              <strong>
                                        <input type="checkbox" value="property_is_first_use" name="property_features[]" <?php if(in_array('property_is_first_use', $property_features1)){ ?> checked="checked"<?}?>>
                                        Property is first use
                                    </strong>
                                          </li>
                                          <li>
                                              <strong>
                                              <input type="checkbox" value="Jacuzzi" name="property_features[]" <?php if(in_array('Jacuzzi', $property_features1)){ ?> checked="checked"<?}?>>
                                              Jacuzzi
                                              </strong>
                                          </li>
                                          <li>
                                              <strong>
                                                  <input type="checkbox" value="Views" name="property_features[]" <?php if(in_array('Views', $property_features1)){ ?> checked="checked"<?}?>>
                                                  Views
                                              </strong>
                                          </li>
                                          <li>
                                              <strong>
                                                  <input type="checkbox" value="Terrace" name="property_features[]" <?php if(in_array('Terrace', $property_features1)){ ?> checked="checked"<?}?>>
                                                  Terrace
                                              </strong>
                                          </li>
                                          <li>
                                              <strong>
                                                  <input type="checkbox" value="Parking" name="property_features[]" <?php if(in_array('Parking', $property_features1)){ ?> checked="checked"<?}?>>
                                                  Parking
                                              </strong>
                                          </li>
                                          <li>
                                              <strong>
                                                  <input type="checkbox" value="Elevator" name="property_features[]" <?php if(in_array('Elevator', $property_features1)){ ?> checked="checked"<?}?>>
                                                  Elevator
                                              </strong>
                                          </li>
                                          <li>
                                              <strong>
                                                  <input type="checkbox" value="pvt_garden" name="property_features[]" <?php if(in_array('pvt_garden', $property_features1)){ ?> checked="checked"<?}?>>
                                                  Pvt. Garden
                                              </strong>
                                          </li>
                                          <li>
                                              <strong>
                                                  <input type="checkbox" value="Internet" name="property_features[]" <?php if(in_array('Internet', $property_features1)){ ?> checked="checked"<?}?>>
                                                  Internet
                                              </strong>
                                          </li>
                                          <li>
                                              <strong>
                                                  <input type="checkbox" value="Furnished" name="property_features[]" <?php if(in_array('Furnished', $property_features1)){ ?> checked="checked"<?}?>>
                                                  Furnished
                                              </strong>
                                          </li>
                                          <li>
                                              <strong>
                                                  <input type="checkbox" value="Pvt_Pool" name="property_features[]" <?php if(in_array('Pvt_Pool', $property_features1)){ ?> checked="checked"<?}?>>
                                                  Pvt. Pool
                                              </strong>
                                          </li>
                                          <li>
                                              <strong>
                                                  <input type="checkbox" value="Roof" name="property_features[]" <?php if(in_array('Roof', $property_features1)){ ?> checked="checked"<?}?>>
                                                  Roof
                                              </strong>
                                          </li>
                                      </ul>
                                      <p><?php echo $property_featuresErr; ?></p>
                                  </div>
                              </li>
                              
                              <li>
                                  <label>Description</label>
                                  <textarea name="postContent" style="width:585px;height: 55px;border: 1px solid #0D3CAA;" > <?php echo $row['post_content']; ?></textarea>
                              </li>
                              
                              <li>
                                  <label>Property Picture<span>*</span></label>
                                  <input type="file" name="fileToUpload" id="fileToUpload">
                                 
                                  <img src="<?php echo $image_name['guid']; ?>" class="image_property" >
                                  <p class="notice">Please click start upload to upload <br> the images to server before submitting.</p>
                                  <p><?php echo $imageErr; ?></p>
                              </li>
                              
                              <li  style="text-align: center;">
                                   <input type="submit" name="submit_property" value="submit" >
                                   
                              </li>
                              
                          </ul>  
                         </div>
                                  
                              
                           <?php   }
                           else
                               { 
//-------------------------------------------------------------------------------ADD MODE-------------------------------------------------------------------------------------
                               
?>
                          <div class="new_property">
                              
                              <?php 
   // print_r($_POST);
    //print_r($_FILES);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
   
    if (empty($_POST['title'])) {
     $titleErr = "Title is required";
   } else {
     $title=$_POST['title'];
   }
   if ($_POST['Property_Type']=='select') {
  $Property_TypeErr = "Property Type is required";
   } else {
     $Property_Type=$_POST['Property_Type'];         
   }
    
  if ($_POST['Unit_Type']=='select') {
     $Unit_TypeErr = "Unit Type is required"; 
   } else {
     $Unit_Type=$_POST['Unit_Type'];
   }  
    
   if ($_POST['floor']=='select') {
     $floorErr = "Floor is required";
   } else {
      $floor=$_POST['floor'];
   }   
    
    if ($_POST['finishing']=='select') {
     $finishingErr = "finishing is required";
   } else {
     $finishing=$_POST['finishing'];
   } 
   
     if ($_POST['city']=='select') {
     $cityErr = "city is required";
   } else {
     $city=$_POST['city'];
   } 
    if ($_POST['other']=='Other') {
     
     $other_city_name=$_POST['other'];
   } else {
    $cityErr = "Please write other city ";
   } 
   
    if ($_POST['location']=='select') {
     $locationErr = "location is required";
   } else {
     $location=$_POST['location'];
   } 
    
    if ($_POST['contract_type']=='select') {
     $contract_typeErr = "contract_type is required";
   } else {
     $contract_type=$_POST['contract_type'];
   } 
   
    if (empty($_POST['area'])) {
     $areaErr = "area is required";       
   } else {
     $area=$_POST['area'];
   } 
   
    if (empty($_POST['no_of_bedrooms'])) {
     $no_of_bedroomsErr = "no_of_bedrooms is required";
   } else {
     $no_of_bedrooms=$_POST['no_of_bedrooms'];
   } 
   
  if (empty($_POST['no_of_bathrooms'])) {
     $no_of_bathroomsErr = "no_of_bathrooms is required";
   } else {
     $no_of_bathrooms=$_POST['no_of_bathrooms'];
   }     
   
    if ($_POST['payment_type']=='select') {
     $payment_typeErr = "payment_type is required";
   } else {
     $payment_type=$_POST['payment_type'];
   } 
   
     if (empty($_POST['property_features'])) {
     $property_featuresErr = "property features is required";
   } else {
     $property_features=$_POST['property_features'];
   } 
       
         
         
          @$property_features_string= implode(',',$property_features);
      $Description=$_POST['Description'];
             
   
       if (empty($_FILES['file']['name'])) {
     $imageErr = "Image is required";
   } else {
     $image=$_FILES['file']['name'];
   } 
     
   
          
          
        if(!empty($title) && !empty($Property_Type) && !empty($image) && !empty($Unit_Type) && !empty($floor) && !empty($finishing) && !empty($city) && !empty($location) && !empty($contract_type) && !empty($area) && !empty($no_of_bedrooms) && !empty($no_of_bathrooms) && !empty($payment_type) && !empty($property_features)){
             $my_post = array(
        'post_title' => $title,
        'post_content' => $Description,
        'post_status' => 'Publish',
        'post_author' => $Current_user_id,
        'post_type' => 'property'
        
    );
    
    // Insert the post into the database
   $property_id = wp_insert_post($my_post);
   
    $filetype = wp_check_filetype( basename( $image ), null );
 // $site_url= bloginfo('template_url');
    $path= site_url().'/wp-content/uploads/imagereality_images/property/' . basename( $image );
    $target_path='wp-content/uploads/imagereality_images/property/' . basename( $image );
    move_uploaded_file($_FILES['file']['tmp_name'],$target_path);
  
   $attachment = array(
	'guid'=> $path, 
	 'post_status' => 'Publish',
       'post_mime_type' => $filetype['type'],
      
       
);

   $post_thumbnail_id= wp_insert_attachment( $attachment,$path,$property_id );
    
  

 set_post_thumbnail( $property_id, $post_thumbnail_id);

    
   
    
  //  update_post_meta($post_id, 'post_type_property_title', $title);
    update_post_meta($property_id, 'post_type_property_Property_Type', $Property_Type);
    update_post_meta($property_id, 'post_type_property_unit_type', $Unit_Type);
    update_post_meta($property_id, 'post_type_property_floor', $floor);
    update_post_meta($property_id, 'post_type_property_finishing', $finishing);
    update_post_meta($property_id, 'post_type_property_city', $city);
     update_post_meta($post_id, 'post_type_other_city', $other_city_name);
    update_post_meta($property_id, 'post_type_property_location', $location);
    update_post_meta($property_id, 'post_type_property_contract_type', $contract_type);
    update_post_meta($property_id, 'post_type_property_area', $area);   
    update_post_meta($property_id, 'post_type_property_no_of_bedrooms', $no_of_bedrooms);
    update_post_meta($property_id, 'post_type_property_no_of_bathrooms', $no_of_bathrooms);
    update_post_meta($property_id, 'post_type_property_payment_type', $payment_type);
    update_post_meta($property_id, 'post_type_property_property_features', $property_features_string);
    
  //  update_post_meta($post_id, 'post_type_property_Description', $Description);
  //  update_post_meta($post_id, 'post_type_property_file', $image);*/
    
                               $Current_user_id = get_current_user_id(); 
   
      $get_user_role = get_user_role();
        if ($get_user_role == 'administrator') {
            $sug_status = 'Publish';
            
        } else {
            $sug_status = 'Pending';
          
        } 
        
          
   
  
} 
    }
                             
                                      ?>
                          
                          <ul class="add_new _property_in_div">
                             <li> <label>Fields with <span>* </span>are required</label></li>
                              <li>
                                   <label>Title<span>*</span></label>
                                   <input type="text" name="title" placeholder="Name" id="title" size="59" style="float: right; width: 85%;" >
                                  
                                    <p><?php echo $titleErr; ?></p>  
                                  
                              </li>
                              
                              <li>
                                  <div class="left_in_op">
                                        <label>Property Type<span>* </span></label>
                                        <select name="Property_Type">
                                            <option value="select">Select one</option>
                                            <option value="Commercial">Commercial</option>
                                            <option value="Land">Land</option>
                                            
                                            
                                        </select>  
                                        <p><?php echo $Property_TypeErr; ?></p>
                                  </div>
                                  <div class="right_in_op">
                                        <label> Unit Type<span>*</span></label>
                                        <select  name="Unit_Type"  style="width:251px;">
                                            <option value="select">Select one</option>
                                            <option value="Apartment">Apartment</option>
                                            <option value="Chalet">Chalet</option>
                                            <option value="Villa">Villa</option>
                                            <option value="Twin-house">Twin-house</option>
                                            <option value="Townhouse">Townhouse</option>
                                             <option value="Penthouse">Penthouse</option>
                                            <option value="Duplex_Roof">Duplex Roof</option>
                                             <option value="Duplex_Garden">Duplex Garden</option>
                                            <option value="Chalet_Roof">Chalet Roof</option>
                                             <option value="Chalet_Roof">Chalet Garden</option> 
                                             <option value="Chalet_Roof">Studio</option>
                                             
                                            
                                        </select>  
                                        <p><?php echo $Unit_TypeErr; ?></p>
                                  </div>
                              </li>
                              
                              <li>
                                  <div class="left_in_op" style="width: 45%;">
                                        <label>Floor<span>* </span></label>
                                        <select name="floor">
                                            <option value="select">Select one</option>
                                            <option value="Ground">Ground</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10+">10+</option>
                                        </select>  
                                        <p><?php echo $floorErr; ?></p>
                                  </div>
                                  <div class="right_in_op"  style="width: 55%;">
                                        <label>Finishing<span>*</span></label>
                                        <select  name="finishing" style="width:287px;">
                                            <option value="select">Select one</option>
                                            Unfinished - Semi-Finished - Super Lux - Extra Super Lux
                                            <option value="Unfinished">Unfinished</option>
                                            <option value="Semi_Finished">Semi Finished</option>
                                            <option value="Super_Lux">Super Lux</option>
                                            <option value="Extra_Super_Lux">Extra Super Lux</option>
                                           
                                        </select>  
                                        <p><?php echo $finishingErr; ?></p>
                                  </div>
                              </li>
                              
                              <li>
                                    <div class="left_in_op" style="width: 45%;">
                                        <label>City<span>* </span></label>
                                        <select name="city">
                                             <option>Select one</option>
                                          <option value="New_Cairo">New Cairo</option>
                                         <option value="Al_Ain_Al_Sokhn">Al Ain Al Sokhn</option>
                                         <option value="Al_Shorouk_City">Al Shorouk City</option>
                                         <option value="6th_Of_October">6th Of October</option>
                                         <option value="North_Coast">North Coast</option>
                                        
                                          <option value="Other">Other</option>
                                          <input type="text" name="other" placeholder="other city" id="area" size="59" style="width: 80%; float: right;" value="<?php echo $other_city; ?>">    
                                    
                                        </select>  
                                        <p><?php echo $cityErr; ?></p>
                                  </div>
                                  <div class="right_in_op" style="width: 55%;">
                                        <label>Location<span>*</span></label>
                                        <select  name="location"  style="width:287px;">
                                            
                                            <option value="select">Select one</option>
                                            <option value="Inside_Compound">Inside Compound</option>
                                            <option value="Stand_Alone">Stand Alone</option>
                                            
                                            
                                        </select>  
                                        <p><?php echo $locationErr; ?></p>
                                  </div> 
                              </li>
                              
                              <li>
                                   <div class="left_in_op">
                                        <label>Contract Type<span>* </span></label>
                                        <select name="contract_type">
                                            
                                            <option value="select">Select one</option>
                                            <option value="Renting">Renting</option>
                                            <option value="Selling">Selling</option>
                                                                                      
   
                                       
                                        </select>  
                                        <p><?php echo $contract_typeErr; ?></p>
                                  </div>
                                  <div class="right_in_op">
                                <label>Area<span>*</span></label>
                                   <input type="text" name="area" placeholder="Area" id="area" size="59" style="width: 80%; float: right;" >
                                    <p><?php echo $areaErr; ?></p> 
                                  </div> 
                              </li>
                              
                              <li>
                                   <label>No. of Bedrooms<span>*</span></label>
                                   <input type="text" name="no_of_bedrooms" placeholder="Master Bedroom/ Bedrooms" id="bed"  size="59" style="width: 75%; float: right;" >
                                    <p><?php echo $no_of_bedroomsErr; ?></p> 
                              </li>
                              
                              <li>
                                  <label>No. of Bathrooms<span>*</span></label>
                                   <input type="text" name="no_of_bathrooms" placeholder="Guest Bathroom/ Bathrooms" id="bath"  size="59" style="width: 75%; float: right;" >
                                    <p><?php echo $no_of_bathroomsErr; ?></p> 
                              </li>
                              
                              <li>
                                  <label>Payment Type<span>* </span></label>
                                        <select name="payment_type">
                                            <option value="select">Select one</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Instalments">Instalments</option>
                                           
                                            
                                        </select>  
                                        <p><?php echo $payment_typeErr; ?></p>
                              </li>
                              
                              <li>
                                  <label>Property Features<span>* </span></label>
                                  <div class="demo_in_check_op">
                                   
                                  </div>
                                  <div class="Property_Features_in_select">
                                      
                                      <ul class="select_box_in_div_op">
                                          <li>
                                              <strong>
                                        <input type="checkbox" value="property_is_first_use" name="property_features[]">
                                        Property is first use
                                    </strong>
                                          </li>
                                          <li>
                                              <strong>
                                              <input type="checkbox" value="Jacuzzi" name="property_features[]">
                                              Jacuzzi
                                              </strong>
                                          </li>
                                          <li>
                                              <strong>
                                                  <input type="checkbox" value="Views" name="property_features[]">
                                                  Views
                                              </strong>
                                          </li>
                                          <li>
                                              <strong>
                                                  <input type="checkbox" value="Terrace" name="property_features[]">
                                                  Terrace
                                              </strong>
                                          </li>
                                          <li>
                                              <strong>
                                                  <input type="checkbox" value="Parking" name="property_features[]" >
                                                  Parking
                                              </strong>
                                          </li>
                                          <li>
                                              <strong>
                                                  <input type="checkbox" value="Elevator" name="property_features[]" >
                                                  Elevator
                                              </strong>
                                          </li>
                                          <li>
                                              <strong>
                                                  <input type="checkbox" value="pvt_garden" name="property_features[]">
                                                  Pvt. Garden
                                              </strong>
                                          </li>
                                          <li>
                                              <strong>
                                                  <input type="checkbox" value="Internet" name="property_features[]" >
                                                  Internet
                                              </strong>
                                          </li>
                                          <li>
                                              <strong>
                                                  <input type="checkbox" value="Furnished" name="property_features[]" >
                                                  Furnished
                                              </strong>
                                          </li>
                                          <li>
                                              <strong>
                                                  <input type="checkbox" value="Pvt_Pool" name="property_features[]">
                                                  Pvt. Pool
                                              </strong>
                                          </li>
                                          <li>
                                              <strong>
                                                  <input type="checkbox" value="Roof" name="property_features[]" >
                                                  Roof
                                              </strong>
                                          </li>
                                      </ul>
                                      <p><?php echo $property_featuresErr; ?></p>
                                  </div>
                              </li>
                              
                              <li>
                                  <label>Description<span>*</span></label>
                                  <textarea style="width:585px;height: 55px;border: 1px solid #0D3CAA;" name="Description"> </textarea>
                              </li>
                              
                              <li>
                                  <label>Property Picture<span>*</span></label>
                                  <input type="file" name="file" style="width: 30%; float:left;">
                                  <p class="notice">Please click start upload to upload <br> the images to server before submitting.</p>
                                  <p><?php echo $imageErr; ?></p>
                              </li>
                              
                              <li  style="text-align: center;">
                                   <input type="submit" name="submit_property" value="submit" >
                                   
                              </li>
                              
                          </ul>  
                         </div>
                              <?php } ?>
                         </form>
                      </div>
                 </div>      
            </div>
		</div>
	</div>
                
                <!--------->
                
                
                <?php get_template_part('right_part');  ?>
            </div>
        </div> 
    </div>
</div>
<?php get_footer(); ?>

