<?php
/*
  Template Name: myAlerts
 */

get_header(); ?>
<script>
jQuery(document).ready(function(){
    

jQuery('.Alerts').addClass("clicked");
jQuery('.clicked').click();
jQuery(".set_alerts").css("background","#4A86CE");
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
                      <h1>MY PROPERTIES</h1>     
                 </div>
                 <div class="sider-tebal-view">
                      <div class="Client_Plan Plan_Details border_none">
                          <form method="post" enctype="multipart/form-data" action="" >
                           <?php  if(isset($_GET['id'])){ 
                                   $user_id=$_GET['id']; 
                                   ?>
                                     <div class="new_property">
                                         <?php
                                         
                                         
                                         
                                         
                                          if ($_SERVER["REQUEST_METHOD"] == "POST") {   
   
    if (empty($_POST['title'])) {
     $titleErr = "Title is required";
   } else {
     $title=$_POST['title'];
   }
   
   $Property_Type=$_POST['Property_Type'];
   $Unit_Type=$_POST['Unit_Type'];
   $City=$_POST['City'];
   $District=$_POST['District'];
   $contract_type=$_POST['contract_type'];
    $min_price=$_POST['min_price']; 
    $max_price=$_POST['max_price'];
     $payment_type=$_POST['payment_type'];
                                          }
   //$user_id = get_current_user_id(); 
             if(!empty($title)){
                
                 update_user_meta( $user_id, 'user_alert_title', $title);
                 update_user_meta( $user_id, 'user_alert_property_type', $Property_Type);
                 update_user_meta( $user_id, 'user_alert_unit_type', $Unit_Type);
                 update_user_meta( $user_id, 'user_alert_city', $City);
                 update_user_meta( $user_id, 'user_alert_district', $District);
                 update_user_meta( $user_id, 'user_alert_contract_type', $contract_type);
                 update_user_meta( $user_id, 'user_alert_min_price', $min_price);
                 update_user_meta( $user_id, 'user_alert_max_price', $max_price);
                 update_user_meta( $user_id, 'user_alert_payment_type', $payment_type);
                      }
                       
                 $user_alert_title=get_user_meta( $user_id, 'user_alert_title', true);
                 $user_alert_property_type=get_user_meta( $user_id, 'user_alert_property_type', true);
                $user_alert_unit_type= get_user_meta( $user_id, 'user_alert_unit_type', true);
                $user_alert_city= get_user_meta( $user_id, 'user_alert_city', true);
                 $user_alert_district=get_user_meta( $user_id, 'user_alert_district', true);
                 $user_alert_contract_type=get_user_meta( $user_id, 'user_alert_contract_type', true);
                 $user_alert_min_price=get_user_meta( $user_id, 'user_alert_min_price', true);
                 $user_alert_max_price=get_user_meta( $user_id, 'user_alert_max_price', true);
                 $user_alert_payment_type=get_user_meta( $user_id, 'user_alert_payment_type', true);
                      
                      ?>
                         <ul class="add_new _property_in_div">
                             <li> <label>Fields with <span>* </span>are required</label></li>
                              <li>
                                   <label>Title<span>*</span></label>
                                   <input type="text" name="title" placeholder="Name" id="title" size="59" style="float: right; width: 85%;" value="<?php echo $user_alert_title ?>" >
                                    <p><?php echo $titleErr; ?></p>  
                                  
                              </li>
                              
                              <li>
                                  <div class="left_in_op">
                                      <label>Property Type</label>
                                         <select class="Property_Type" name="Property_Type">
                                        <option>Select one</option>
                                         <option value="bunglow"<?php if($user_alert_property_type == 'bunglow') { ?> selected="selected"<? } ?>>Bunglow</option>
                                         <option value="villa"<?php if($user_alert_property_type == 'villa') { ?> selected="selected"<? } ?>>Villa</option>
                                         <option value="tenament"<?php if($user_alert_property_type == 'tenament') { ?> selected="selected"<? } ?>>Tenament</option>
                                         <option value="flat"<?php if($user_alert_property_type == 'flat') { ?> selected="selected"<? } ?>>Flat</option>
                                         </select>
                                        <p><?php //echo $Property_TypeErr; ?></p>
                                  </div>
                                  <div class="right_in_op">
                                        <label> Unit Type</label>
                                         <select  name="Unit_Type"  style="width:251px;">
                                        <option>Select one</option>
                                        <option value="1000sqm"<?php if($user_alert_unit_type == '1000sqm') { ?> selected="selected"<? } ?>>1000sqm</option>
                                         <option value="2300sqm"<?php if($user_alert_unit_type == '2300sqm') { ?> selected="selected"<? } ?>>2300sqm</option>
                                         <option value="2200sqm"<?php if($user_alert_unit_type == '2200sqm') { ?> selected="selected"<? } ?>>2200sqm</option>
                                         <option value="1100sqm"<?php if($user_alert_unit_type == '1100sqm') { ?> selected="selected"<? } ?>>1100sqm</option>
                                         <option value="4400sqm"<?php if($user_alert_unit_type == '4400sqm') { ?> selected="selected"<? } ?>>4400sqm</option>
                                        </select>  
                                        <p><?php //echo $Unit_TypeErr; ?></p>
                                  </div>
                              </li>
                              
                              <li>
                                  <div class="left_in_op" style="width: 45%;">
                                        <label>City</label>
                                          <select name="city">
                                        <option>Select one</option>
                                          <option value="Ahmedabad"<?php if($user_alert_city == 'Ahmedabad') { ?> selected="selected"<? } ?>>Ahmedabad</option>
                                         <option value="Vadodara"<?php if($user_alert_city== 'Vadodara') { ?> selected="selected"<? } ?>>Vadodara</option>
                                         <option value="Surat"<?php if($user_alert_city == 'Surat') { ?> selected="selected"<? } ?>>Surat</option>
                                         <option value="Jamnagar"<?php if($user_alert_city == 'Jamnagar') { ?> selected="selected"<? } ?>>Jamnagar</option>
                                         <option value="Rajkot"<?php if($user_alert_city == 'Rajkot') { ?> selected="selected"<? } ?>>Rajkot</option>
                                     
                                        </select>    
                                        <p><?php //cho $floorErr; ?></p>
                                  </div>
                                  <div class="right_in_op"  style="width: 55%;">
                                        <label>District</label>
                                        <select  name="District" style="width:287px;">
                                             <option>Select one</option>
                                          <option value="Ahmedabad"<?php if($user_alert_district == 'Ahmedabad') { ?> selected="selected"<? } ?>>Ahmedabad</option>
                                         <option value="Amreli"<?php if($user_alert_district== 'Amreli') { ?> selected="selected"<? } ?>>Amreli</option>
                                         <option value="Banaskantha"<?php if($user_alert_district == 'Banaskantha') { ?> selected="selected"<? } ?>>Banaskantha</option>
                                         <option value="Bharuch"<?php if($user_alert_district == 'Bharuch') { ?> selected="selected"<? } ?>>Bharuch</option>
                                         <option value="Bhavnagar"<?php if($user_alert_district == 'Bhavnagar') { ?> selected="selected"<? } ?>>Bhavnagar</option>
                                     
                                        </select>  
                                        <p><?php //echo $finishingErr; ?></p>
                                  </div>
                              </li>
                               <li>
                                   <div class="left_in_op">
                                        <label>Contract Type</label>
                                         <select name="contract_type">
                                            
                                            <option value="Buy"<?php if($user_alert_contract_type == 'Buy') { ?> selected="selected"<? } ?>>Buy</option>
                                         <option value="Rent"<?php if($user_alert_contract_type == 'Rent') { ?> selected="selected"<? } ?>>Rent</option>
                                         <option value="Advice"<?php if($user_alert_contract_type == 'Advice') { ?> selected="selected"<? } ?>>Advice</option>
                                         <option value="Agents directory"<?php if($user_alert_contract_type == 'Agents directory') { ?> selected="selected"<? } ?>>Agents directory</option>
                                         <option value="Lease"<?php if($user_alert_contract_type == 'Lease') { ?> selected="selected"<? } ?>>Lease</option>
                                            
                                       
                                        </select>   
                                        <p><?php //echo $contract_typeErr; ?></p>
                                  </div>
                                  <div class="right_in_op">
                                
                                  </div> 
                              </li>
                              <li>
                                   <div class="left_in_op">
                                         <label>Min. Price(EGP)</label>
                                   <input type="text" name="min_price" placeholder="0" id="area" size="59" style="width: 58%; float: right;" value="<?php echo $user_alert_min_price; ?>">
                                    <p><?php //echo $areaErr; ?></p> 
                                  </div>
                                  <div class="right_in_op">
                                
                                  </div> 
                              </li>
                              <li>
                                   <div class="left_in_op">
                                        <label>Max. Price(EGP)</label>
                                   <input type="text" name="max_price" placeholder="0" id="area" size="59" style="width: 58%; float: right;  margin:-2px;" value="<?php echo $user_alert_max_price; ?>">
                                    <p><?php //echo $areaErr; ?></p>                                   </div>
                                  <div class="right_in_op">
                                
                                  </div> 
                              </li>
                              <li>
                                   <div class="left_in_op">
                                       <label>Payment Type</label>
                                        <select name="payment_type">
                                            <option>Select one</option>
                                     <option value="Cash"<?php if($user_alert_payment_type == 'Cash') { ?> selected="selected"<? } ?>>Cash</option>
                                         <option value="Debit"<?php if($user_alert_payment_type == 'Debit') { ?> selected="selected"<? } ?>>Debit</option>
                                         <option value="Credit"<?php if($user_alert_payment_type == 'Credit') { ?> selected="selected"<? } ?>>Credit</option>
                                         <option value="Online-Banking"<?php if($user_alert_payment_type == 'Online-Banking') { ?> selected="selected"<? } ?>>Online Banking</option>
                                         <option value="EMI"<?php if($user_alert_payment_type == 'EMI') { ?> selected="selected"<? } ?>>EMI</option>
                                        </select> 
                                        <p><?php //echo $contract_typeErr; ?></p> 
                                  </div>
                                  <div class="right_in_op">
                                
                                  </div> 
                              </li>
                              <li  style="text-align: center;">
                                   <input type="submit" name="submit_property" value="submit" >
                                   
                              </li>
                              
                          </ul>  
                          </div>
                             <?php }
                             else
                                 {
                                 ?><div class="new_property"><?php
                                     if ($_SERVER["REQUEST_METHOD"] == "POST") {   
   
    if (empty($_POST['title'])) {
     $titleErr = "Title is required";
   } else {
     $title=$_POST['title'];
   }
   
   $Property_Type=$_POST['Property_Type'];
   $Unit_Type=$_POST['Unit_Type'];
   $City=$_POST['City'];
   $District=$_POST['District'];
   $contract_type=$_POST['contract_type'];
    $min_price=$_POST['min_price']; 
    $max_price=$_POST['max_price'];
     $payment_type=$_POST['payment_type'];
   $user_id = get_current_user_id(); 
             if(!empty($title)){
                 add_user_meta( $user_id, 'user_alert_title', $title);
                 add_user_meta( $user_id, 'user_alert_property_type', $Property_Type);
                 add_user_meta( $user_id, 'user_alert_unit_type', $Unit_Type);
                 add_user_meta( $user_id, 'user_alert_city', $City);
                 add_user_meta( $user_id, 'user_alert_district', $District);
                 add_user_meta( $user_id, 'user_alert_contract_type', $contract_type);
                 add_user_meta( $user_id, 'user_alert_min_price', $min_price);
                 add_user_meta( $user_id, 'user_alert_max_price', $max_price);
                 add_user_meta( $user_id, 'user_alert_payment_type', $payment_type);
                      }
                                          }                  ?>
                         <ul class="add_new _property_in_div">
                             <li> <label>Fields with <span>* </span>are required</label></li>
                              <li>
                                   <label>Title<span>*</span></label>
                                   <input type="text" name="title" placeholder="Name" id="title" size="59" style="float: right; width: 85%;" >
                                    <p><?php echo $titleErr; ?></p>  
                                  
                              </li>
                              
                              <li>
                                  <div class="left_in_op">
                                      <label>Property Type</label>
                                        <select name="Property_Type">
                                            <option value="select">Select one</option>
                                            <option value="bunglow">bunglow</option>
                                            <option value="villa">villa</option>
                                            <option value="tenament">tenament</option>
                                            <option value="flat">flat</option>
                                            
                                        </select>  
                                        <p><?php //echo $Property_TypeErr; ?></p>
                                  </div>
                                  <div class="right_in_op">
                                        <label> Unit Type</label>
                                        <select  name="Unit_Type"  style="width:251px;">
                                            <option value="select">Select one</option>
                                            <option value="1000sqm">1000sqm</option>
                                            <option value="2300sqm">2300sqm</option>
                                            <option value="2200sqm">2200sqm</option>
                                            <option value="1100sqm">1100sqm</option>
                                            <option value="4400sqm">4400sqm</option>
                                        </select>  
                                        <p><?php //echo $Unit_TypeErr; ?></p>
                                  </div>
                              </li>
                              
                              <li>
                                  <div class="left_in_op" style="width: 45%;">
                                        <label>City</label>
                                        <select name="City">
                                            <option value="select">Select one</option>
                                            <option value="Ahmedabad">Ahmedabad</option>
                                            <option value="Vadodara">Vadodara</option>
                                            <option value="Surat">Surat</option>
                                            <option value="Jamnagar">Jamnagar</option>
                                            <option value="Rajkot">Rajkot</option>
                                        </select>  
                                        <p><?php //cho $floorErr; ?></p>
                                  </div>
                                  <div class="right_in_op"  style="width: 55%;">
                                        <label>District</label>
                                        <select  name="District" style="width:287px;">
                                            <option value="select">Select one</option>
                                            <option value="1">Ahmedabad</option>
                                            <option value="2">Amreli</option>
                                            <option value="3">Banaskantha</option>
                                            <option value="4">Bharuch</option>
                                             <option value="4">Bhavnagar</option>
                                            
                                           
                                        </select>  
                                        <p><?php //echo $finishingErr; ?></p>
                                  </div>
                              </li>
                               <li>
                                   <div class="left_in_op">
                                        <label>Contract Type</label>
                                        <select name="contract_type">
                                            <option>Select one</option>
                                            <option value="Buy">Buy</option>
                                         <option value="Rent">Rent</option>
                                         <option value="Advice">Advice</option>
                                         <option value="Agents directory">Agents directory</option>
                                         <option value="Lease">Lease</option>
                                            
                                       
                                        </select>  
                                        <p><?php //echo $contract_typeErr; ?></p>
                                  </div>
                                  <div class="right_in_op">
                                
                                  </div> 
                              </li>
                              <li>
                                   <div class="left_in_op">
                                         <label>Min. Price(EGP)</label>
                                   <input type="text" name="min_price" placeholder="0" id="area" size="59" style="width: 58%; float: right;" value="<?php echo $area1; ?>">
                                    <p><?php //echo $areaErr; ?></p> 
                                  </div>
                                  <div class="right_in_op">
                                
                                  </div> 
                              </li>
                              <li>
                                   <div class="left_in_op">
                                        <label>Max. Price(EGP)</label>
                                   <input type="text" name="max_price" placeholder="0" id="area" size="59" style="width: 58%; float: right;  margin:-2px;" value="<?php echo $area1; ?>">
                                    <p><?php //echo $areaErr; ?></p>                                   </div>
                                  <div class="right_in_op">
                                
                                  </div> 
                              </li>
                              <li>
                                   <div class="left_in_op">
                                       <label>Payment Type</label>
                                         <select name="payment_type">
                                            <option>Select one</option>
                                     <option value="Cash">Cash</option>
                                         <option value="Debit">Debit</option>
                                         <option value="Credit">Credit</option>
                                         <option value="Online-Banking">Online Banking</option>
                                         <option value="EMI">EMI</option>
                                        </select>
                                        <p><?php //echo $contract_typeErr; ?></p> 
                                  </div>
                                  <div class="right_in_op">
                                
                                  </div> 
                              </li>
                              <li  style="text-align: center;">
                                   <input type="submit" name="submit_property" value="submit" >
                                   
                              </li>
                              
                          </ul> 
                                    
                          </div>   
                                  
                                 
                           <?php  } ?>
                              
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

