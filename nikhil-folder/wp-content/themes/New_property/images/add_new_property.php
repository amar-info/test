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
                          <form method="post" enctype="multipart/form-data" action="" >
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
   } 
      }
  
   
    // exit; 
        @$property_features_string= implode(',',$property_features);
          $Description=$_POST['Description'];
             
          
          
        if(!empty($title) && !empty($Property_Type)  && !empty($Unit_Type) && !empty($floor) && !empty($finishing) && 
                !empty($city) && !empty($location) && !empty($contract_type) && !empty($area) && !empty($no_of_bedrooms) && 
                !empty($no_of_bathrooms) && !empty($payment_type) && !empty($property_features)){
            
            
            
        
           /*  $my_post = array(
        'post_title' => $title,
        'post_content' => $Description,
        'post_status' => 'Publish',
        'post_author' => $Current_user_id,
        'post_type' => 'property'
        */
             update_post_meta($post_id, 'post_type_property_Property_Type', $Property_Type);
    update_post_meta($post_id, 'post_type_property_unit_type', $Unit_Type);
     update_post_meta($post_id, 'post_type_property_floor', $floor);
    update_post_meta($post_id, 'post_type_property_finishing', $finishing);
    update_post_meta($post_id, 'post_type_property_city', $city);
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
 
$query_for_image=mysql_query("select guid from wp_posts where post_parent='$post_id'");
$image_name=mysql_fetch_array($query_for_image);

 /* -------------------------------------------------------for update image--------------------------------------------------------------------------------- */
 
    //print_r($image);
    
   // print_r($image);
     $path= site_url().'/wp-content/uploads/imagereality_images/property/'.$image;
      $target_path='wp-content/uploads/imagereality_images/property/'.$image;
    
 if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_path)){
 @unlink('/wp-content/uploads/imagereality_images/property/'.$image_name['guid']);}
 
$attachment_id=$post_id + 1;
    $post_thumbnail_id=  update_attached_file( $attachment_id, $path );
   
    set_post_thumbnail( $post_id, $attachment_id );
    mysql_query("UPDATE wp_posts SET guid='$path'WHERE ID='$attachment_id'");
            
/*------------------------------------------------------------------------------------------------------------------------------------------------------------*/
                     $Current_user_id = get_current_user_id(); 
   
      $get_user_role = get_user_role();
        if ($get_user_role == 'administrator') {
            $sug_status = 'Publish';
            
        } else {
            $sug_status = 'Pending';
          
        } 
    
                             
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
                                        <label>Property Type<span>* </span></label>
                                        <select class="Property_Type" name="Property_Type">
                                        <option>Select one</option>
                                         <option value="bunglow"<?php if($Property_Type1 == 'bunglow') { ?> selected="selected"<? } ?>>Bunglow</option>
                                         <option value="villa"<?php if($Property_Type1 == 'villa') { ?> selected="selected"<? } ?>>Villa</option>
                                         <option value="tenament"<?php if($Property_Type1 == 'tenament') { ?> selected="selected"<? } ?>>Tenament</option>
                                         <option value="flat"<?php if($Property_Type1 == 'flat') { ?> selected="selected"<? } ?>>Flat</option>
                                         </select>
                                        <p><?php echo $Property_TypeErr; ?></p>
                                  </div>
                                  <div class="right_in_op">
                                        <label> Unit Type<span>*</span></label>
                                        <select  name="Unit_Type"  style="width:251px;">
                                           <option>Select one</option>
                                        <option value="1000sqm"<?php if($Unit_Type1 == '1000sqm') { ?> selected="selected"<? } ?>>1000sqm</option>
                                         <option value="2300sqm"<?php if($Unit_Type1 == '2300sqm') { ?> selected="selected"<? } ?>>2300sqm</option>
                                         <option value="2200sqm"<?php if($Unit_Type1 == '2200sqm') { ?> selected="selected"<? } ?>>2200sqm</option>
                                         <option value="1100sqm"<?php if($Unit_Type1 == '1100sqm') { ?> selected="selected"<? } ?>>1100sqm</option>
                                         <option value="4400sqm"<?php if($Unit_Type1 == '4400sqm') { ?> selected="selected"<? } ?>>4400sqm</option>
                                        </select>  
                                        <p><?php echo $Unit_TypeErr; ?></p>
                                  </div>
                              </li>
                              
                              <li>
                                  <div class="left_in_op" style="width: 45%;">
                                        <label>Floor<span>* </span></label>
                                        <select name="floor">
                                           <option value="1"<?php if($floor1 == '1') { ?> selected="selected"<? } ?>>1</option>
                                         <option value="2"<?php if($floor1 == '2') { ?> selected="selected"<? } ?>>2</option>
                                         <option value="3"<?php if($floor1 == '3') { ?> selected="selected"<? } ?>>3</option>
                                         <option value="4"<?php if($floor1 == '4') { ?> selected="selected"<? } ?>>4</option>
                                         <option value="5"<?php if($floor1 == '5') { ?> selected="selected"<? } ?>>5</option>
                                        </select>  
                                        <p><?php echo $floorErr; ?></p>
                                  </div>
                                  <div class="right_in_op"  style="width: 55%;">
                                        <label>Finishing<span>*</span></label>
                                        <select  name="finishing" style="width:287px;">
                                           <option>Select one</option>
                                         <option value="Fully-Furnished"<?php if($finishing1 == 'Fully-Furnished') { ?> selected="selected"<? } ?>>Fully Furnished</option>
                                         <option value="Semi-Furnished"<?php if($finishing1 == 'Semi-Furnished') { ?> selected="selected"<? } ?>>Semi Furnished</option>
                                         <option value="Non-Furnished"<?php if($finishing1 == 'Non-Furnished') { ?> selected="selected"<? } ?>>Non Furnished</option>
                                        
                                        </select>  
                                        <p><?php echo $finishingErr; ?></p>
                                  </div>
                              </li>
                              
                              <li>
                                    <div class="left_in_op" style="width: 45%;">
                                        <label>City<span>* </span></label>
                                        <select name="city">
                                            <option>Select one</option>
                                          <option value="Ahmedabad"<?php if($city1 == 'Ahmedabad') { ?> selected="selected"<? } ?>>Ahmedabad</option>
                                         <option value="Vadodara"<?php if($city1== 'Vadodara') { ?> selected="selected"<? } ?>>Vadodara</option>
                                         <option value="Surat"<?php if($city1 == 'Surat') { ?> selected="selected"<? } ?>>Surat</option>
                                         <option value="Jamnagar"<?php if($city1 == 'Jamnagar') { ?> selected="selected"<? } ?>>Jamnagar</option>
                                         <option value="Rajkot"<?php if($city1 == 'Rajkot') { ?> selected="selected"<? } ?>>Rajkot</option>
                                     
                                        </select>  
                                        <p><?php echo $cityErr; ?></p>
                                  </div>
                                  <div class="right_in_op" style="width: 55%;">
                                        <label>Location<span>*</span></label>
                                        <select  name="location"  style="width:287px;">
                                            <option>Select one</option>
                                         <option value="Chandkheda"<?php if($location1 == 'Chandkheda') { ?> selected="selected"<? } ?>>Chandkheda</option>
                                         <option value="Alkapuri"<?php if($location1 == 'Alkapuri') { ?> selected="selected"<? } ?>>Alkapuri</option>
                                         <option value="Naranpura"<?php if($location1 == 'Naranpura') { ?> selected="selected"<? } ?>>Naranpura</option>
                                         <option value="Thaltej"<?php if($location1 == 'Thaltej') { ?> selected="selected"<? } ?>>Thaltej</option>
                                       
                                            
                                        </select>  
                                        <p><?php echo $locationErr; ?></p>
                                  </div> 
                              </li>
                              
                              <li>
                                   <div class="left_in_op">
                                        <label>Contract Type<span>* </span></label>
                                        <select name="contract_type">
                                            
                                            <option value="Buy"<?php if($contract_type1 == 'Buy') { ?> selected="selected"<? } ?>>Buy</option>
                                         <option value="Rent"<?php if($contract_type1 == 'Rent') { ?> selected="selected"<? } ?>>Rent</option>
                                         <option value="Advice"<?php if($contract_type1 == 'Advice') { ?> selected="selected"<? } ?>>Advice</option>
                                         <option value="Agents directory"<?php if($contract_type1 == 'Agents directory') { ?> selected="selected"<? } ?>>Agents directory</option>
                                         <option value="Lease"<?php if($contract_type1 == 'Lease') { ?> selected="selected"<? } ?>>Lease</option>
                                            
                                       
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
                                         <option value="Debit"<?php if($payment_type1 == 'Debit') { ?> selected="selected"<? } ?>>Debit</option>
                                         <option value="Credit"<?php if($payment_type1 == 'Credit') { ?> selected="selected"<? } ?>>Credit</option>
                                         <option value="Online-Banking"<?php if($payment_type1 == 'Online-Banking') { ?> selected="selected"<? } ?>>Online Banking</option>
                                         <option value="EMI"<?php if($payment_type1 == 'EMI') { ?> selected="selected"<? } ?>>EMI</option>
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
                                  <label>Description<span>*</span></label>
                                  <textarea style="width:585px;height: 55px;border: 1px solid #0D3CAA;" > <?php echo $row['post_content']; ?></textarea>
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
                                  
                              
                           <?php   }else{
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
    
   
  

    set_post_thumbnail( $property_id, $post_thumbnail_id );
    
   
    
  //  update_post_meta($post_id, 'post_type_property_title', $title);
    update_post_meta($property_id, 'post_type_property_Property_Type', $Property_Type);
    update_post_meta($property_id, 'post_type_property_unit_type', $Unit_Type);
     update_post_meta($property_id, 'post_type_property_floor', $floor);
    update_post_meta($property_id, 'post_type_property_finishing', $finishing);
    update_post_meta($property_id, 'post_type_property_city', $city);
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
                                            <option value="bunglow">bunglow</option>
                                            <option value="villa">villa</option>
                                            <option value="tenament">tenament</option>
                                            <option value="flat">flat</option>
                                            
                                        </select>  
                                        <p><?php echo $Property_TypeErr; ?></p>
                                  </div>
                                  <div class="right_in_op">
                                        <label> Unit Type<span>*</span></label>
                                        <select  name="Unit_Type"  style="width:251px;">
                                            <option value="select">Select one</option>
                                            <option value="1000sqm">1000sqm</option>
                                            <option value="2300sqm">2300sqm</option>
                                            <option value="2200sqm">2200sqm</option>
                                            <option value="1100sqm">1100sqm</option>
                                            <option value="4400sqm">4400sqm</option>
                                        </select>  
                                        <p><?php echo $Unit_TypeErr; ?></p>
                                  </div>
                              </li>
                              
                              <li>
                                  <div class="left_in_op" style="width: 45%;">
                                        <label>Floor<span>* </span></label>
                                        <select name="floor">
                                            <option value="select">Select one</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>  
                                        <p><?php echo $floorErr; ?></p>
                                  </div>
                                  <div class="right_in_op"  style="width: 55%;">
                                        <label>Finishing<span>*</span></label>
                                        <select  name="finishing" style="width:287px;">
                                            <option value="select">Select one</option>
                                            <option value="Fully-Furnished">Fully Furnished</option>
                                            <option value="Semi-Furnished">Semi Furnished</option>
                                            <option value="Non Furnished">Non Furnished</option>
                                           
                                        </select>  
                                        <p><?php echo $finishingErr; ?></p>
                                  </div>
                              </li>
                              
                              <li>
                                    <div class="left_in_op" style="width: 45%;">
                                        <label>City<span>* </span></label>
                                        <select name="city">
                                            <option value="select">Select one</option>
                                            <option value="Ahmedabad">Ahmedabad</option>
                                            <option value="Vadodara">Vadodara</option>
                                            <option value="Surat">Surat</option>
                                            <option value="Jamnagar">Jamnagar</option>
                                            <option value="Rajkot">Rajkot</option>
                                        </select>  
                                        <p><?php echo $cityErr; ?></p>
                                  </div>
                                  <div class="right_in_op" style="width: 55%;">
                                        <label>Location<span>*</span></label>
                                        <select  name="location"  style="width:287px;">
                                            <option value="select">Select one</option>
                                            <option value="1">Chandkheda</option>
                                            <option value="2">Alkapuri</option>
                                            <option value="3">Naranpura</option>
                                            <option value="4">Thaltej</option>
                                            
                                        </select>  
                                        <p><?php echo $locationErr; ?></p>
                                  </div> 
                              </li>
                              
                              <li>
                                   <div class="left_in_op">
                                        <label>Contract Type<span>* </span></label>
                                        <select name="contract_type">
                                            
                                            <option value="select">Select one</option>
                                            <option value="Buy">Buy</option>
                                            <option value="Rent">Rent</option>
                                            <option value="Advice">Advice</option>
                                            <option value="Agents directory">Agents directory</option>
                                            <option value="Lease">Lease</option>
                                            
                                       
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
                                            <option value="Debit">Debit</option>
                                            <option value="Credit">Credit</option>
                                            <option value="Online-Banking">Online Banking</option>
                                            <option value="EMI">EMI</option>
                                            
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
                                  <textarea style="width:585px;height: 55px;border: 1px solid #0D3CAA;"> </textarea>
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

