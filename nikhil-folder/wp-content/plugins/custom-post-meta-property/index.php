<?php //
/* Plugin Name: custom post meta property
 
 * 
 */
 

add_action( "admin_menu", "register_my_custom_post_meta_property" );


function register_my_custom_post_meta_property(){
    
    //add_menu_page("$page_title","$menu_title","$capability","menu_slug","$function");
    
     
     add_meta_box(
			"myplugin_secid",
			__( "Edit Property", "myplugin_textdomain" ),
			"custom_post_meta_property",
			"Property"
		);
}
function custom_post_meta_property(){
   $post_id =$_GET['post'];

 
  $Property_Type=get_post_meta($post_id, 'post_type_property_Property_Type', true);
  $Unit_Type=get_post_meta($post_id, 'post_type_property_unit_type', true);
   $floor=get_post_meta($post_id, 'post_type_property_floor', true);
   $finishing =get_post_meta($post_id, 'post_type_property_finishing', true);
 $city  = get_post_meta($post_id, 'post_type_property_city', true);
   $location  = get_post_meta($post_id, 'post_type_property_location', true);
  $contract_type = get_post_meta($post_id, 'post_type_property_contract_type', true);
 $area  = get_post_meta($post_id, 'post_type_property_area', true);   
 $no_of_bedrooms  =  get_post_meta($post_id, 'post_type_property_no_of_bedrooms', true);
 $no_of_bathrooms =  get_post_meta($post_id, 'post_type_property_no_of_bathrooms', true);
  $payment_type =get_post_meta($post_id, 'post_type_property_payment_type', true);
 $property_features_string =  get_post_meta($post_id, 'post_type_property_property_features', true);
 $property_features=explode(",",$property_features_string);
// print_r($property_features);
 

    ?>
 
<table>
    
    <tr><td><label style="font-weight: bold;">Property Type<span></span></label></td><td>  <select class="Property_Type" name="Property_Type">
                                         <option>Select one</option>
                                         <option value="bunglow"<?php if($Property_Type == 'bunglow') { ?> selected="selected"<? } ?>>Bunglow</option>
                                         <option value="villa"<?php if($Property_Type == 'villa') { ?> selected="selected"<? } ?>>Villa</option>
                                         <option value="tenament"<?php if($Property_Type == 'tenament') { ?> selected="selected"<? } ?>>Tenament</option>
                                         <option value="flat"<?php if($Property_Type == 'flat') { ?> selected="selected"<? } ?>>Flat</option>
                                        
                                     </select></td></tr>
                                     <tr><td><label style="font-weight: bold;"> Unit Type<span></span></label></td><td><select class="Unit_Type" name="Unit_Type">
                                          <option>Select one</option>
                                        <option value="1000sqm"<?php if($Unit_Type == '1000sqm') { ?> selected="selected"<? } ?>>1000sqm</option>
                                         <option value="2300sqm"<?php if($Unit_Type == '2300sqm') { ?> selected="selected"<? } ?>>2300sqm</option>
                                         <option value="2200sqm"<?php if($Unit_Type == '2200sqm') { ?> selected="selected"<? } ?>>2200sqm</option>
                                         <option value="1100sqm"<?php if($Unit_Type == '1100sqm') { ?> selected="selected"<? } ?>>1100sqm</option>
                                         <option value="4400sqm"<?php if($Unit_Type == '4400sqm') { ?> selected="selected"<? } ?>>4400sqm</option>
                                     </select>
                         <tr><td><label style="font-weight: bold;">  Floor<span></span></label> </td><td><select class="floor" name="floor">
                                          <option>Select one</option>
                                        <option value="1"<?php if($floor == '1') { ?> selected="selected"<? } ?>>1</option>
                                         <option value="2"<?php if($floor == '2') { ?> selected="selected"<? } ?>>2</option>
                                         <option value="3"<?php if($floor == '3') { ?> selected="selected"<? } ?>>3</option>
                                         <option value="4"<?php if($floor == '4') { ?> selected="selected"<? } ?>>4</option>
                                         <option value="5"<?php if($floor == '5') { ?> selected="selected"<? } ?>>5</option>
                                     </select></td></tr>
                      <tr><td>  <label style="font-weight: bold;">  Finishing<span></span></label></td><td><select class="finishing" name="finishing">
                                          <option>Select one</option>
                                         <option value="Fully-Furnished"<?php if($finishing == 'Fully-Furnished') { ?> selected="selected"<? } ?>>Fully Furnished</option>
                                         <option value="Semi-Furnished"<?php if($finishing == 'Semi-Furnished') { ?> selected="selected"<? } ?>>Semi Furnished</option>
                                         <option value="Non-Furnished"<?php if($finishing == 'Non-Furnished') { ?> selected="selected"<? } ?>>Non Furnished</option>
                                        
                                     </select></td></tr>
                          <tr><td> <label style="font-weight: bold;"> City<span></span> </label></td><td><select class="city" name="city">
                                          <option>Select one</option>
                                          <option value="Ahmedabad"<?php if($city == 'Ahmedabad') { ?> selected="selected"<? } ?>>Ahmedabad</option>
                                         <option value="Vadodara"<?php if($city == 'Vadodara') { ?> selected="selected"<? } ?>>Vadodara</option>
                                         <option value="Surat"<?php if($city == 'Surat') { ?> selected="selected"<? } ?>>Surat</option>
                                         <option value="Jamnagar"<?php if($city == 'Jamnagar') { ?> selected="selected"<? } ?>>Jamnagar</option>
                                         <option value="Rajkot"<?php if($city == 'Rajkot') { ?> selected="selected"<? } ?>>Rajkot</option>
                                     </select></td></tr>
                         <tr><td><label style="font-weight: bold;"> Location<span></span></label></td><td><select class="location" name="location">
                                          <option>Select one</option>
                                         <option value="Chandkheda"<?php if($location == 'Chandkheda') { ?> selected="selected"<? } ?>>Chandkheda</option>
                                         <option value="Alkapuri"<?php if($location == 'Alkapuri') { ?> selected="selected"<? } ?>>Alkapuri</option>
                                         <option value="Naranpura"<?php if($location == 'Naranpura') { ?> selected="selected"<? } ?>>Naranpura</option>
                                         <option value="Thaltej"<?php if($location == 'Thaltej') { ?> selected="selected"<? } ?>>Thaltej</option>
                                       
                                     </select></td></tr>
                          <tr><td><label style="font-weight: bold;">Contract Type<span></span> </label></td><td> <select class="contract_type" name="contract_type">
                                          <option>Select one</option>
                                         <option value="Buy"<?php if($contract_type == 'Buy') { ?> selected="selected"<? } ?>>Buy</option>
                                         <option value="Rent"<?php if($contract_type == 'Rent') { ?> selected="selected"<? } ?>>Rent</option>
                                         <option value="Advice"<?php if($contract_type == 'Advice') { ?> selected="selected"<? } ?>>Advice</option>
                                         <option value="Agents directory"<?php if($contract_type == 'Agents directory') { ?> selected="selected"<? } ?>>Agents directory</option>
                                         <option value="Lease"<?php if($contract_type == 'Lease') { ?> selected="selected"<? } ?>>Lease</option>
                                     </select></td></tr>
                         <tr><td> <label style="font-weight: bold;">Area<span></span></label></td><td><input type="text" name="area" placeholder="in square meters" id="area" class="area" value="<?php echo $area; ?>"></td></tr>
<br>
                        <tr><td>  <label style="font-weight: bold;"> No. of Bedrooms<span></span></label></td><td><input type="text" name="no_of_bedrooms" placeholder="Master Bedroom/ Bedrooms" id="bed" class="bed" value="<?php echo $no_of_bedrooms; ?>"></td></tr>
                         <tr><td>  <label style="font-weight: bold;">No. of Bathrooms<span></span></label></td><td><input type="text" name="no_of_bathrooms" placeholder="Guest Bathroom/ Bathrooms" id="bath" class="bath" value="<?php echo $no_of_bathrooms; ?>"></td></tr>
                         <tr><td>   <label style="font-weight: bold;"> Payment Type<span></span></label></td><td><select class="Payment_type" name="payment_type">
                                          <option>Select one</option>
                                     <option value="Cash"<?php if($payment_type == 'Cash') { ?> selected="selected"<? } ?>>Cash</option>
                                         <option value="Debit"<?php if($payment_type == 'Debit') { ?> selected="selected"<? } ?>>Debit</option>
                                         <option value="Credit"<?php if($payment_type == 'Credit') { ?> selected="selected"<? } ?>>Credit</option>
                                         <option value="Online-Banking"<?php if($payment_type == 'Online-Banking') { ?> selected="selected"<? } ?>>Online Banking</option>
                                         <option value="EMI"<?php if($payment_type == 'EMI') { ?> selected="selected"<? } ?>>EMI</option>
                                     </select></td></tr>
                          <tr><td>  <label style="font-weight: bold;">Property Features<span></span> </label></td><td>
                                  <label><input type="checkbox" value="property_is_first_use" name="property_features[]"<?php if(in_array('property_is_first_use', $property_features)){ ?> checked="checked"<?}?>>Property is first use</label><br>
                            <label ><input type="checkbox" value="Jacuzzi" name="property_features[]"<?php if(in_array('Jacuzzi', $property_features)){ ?> checked="checked"<?}?>>Jacuzzi</label>
                                 <label><input type="checkbox" value="Views" name="property_features[]"<?php if(in_array('Views', $property_features)){ ?> checked="checked"<?}?>>Views</label>
                                 <label><input type="checkbox" value="Terrace" name="property_features[]"<?php if(in_array('Terrace', $property_features)){ ?> checked="checked"<?}?>>Terrace</label>
                                <label> <input type="checkbox" value="Parking" name="property_features[]"<?php if(in_array('Parking', $property_features)){ ?> checked="checked"<?}?> >Parking</label>
                                <label> <input type="checkbox" value="Elevator" name="property_features[]"<?php if(in_array('Elevator', $property_features)){ ?> checked="checked"<?}?> >Elevator</label>
                                <label> <input type="checkbox" value="pvt_garden" name="property_features[]"<?php if(in_array('pvt_garden', $property_features)){ ?> checked="checked"<?}?>>Pvt. Garden</label>
                            
                          <label>  <input type="checkbox" value="Internet" name="property_features[]"<?php if(in_array('Internet', $property_features)){ ?> checked="checked"<?}?> >Internet</label>
                              <label>   <input type="checkbox" value="Furnished" name="property_features[]" <?php if(in_array('Furnished', $property_features)){ ?> checked="checked"<?}?>>Furnished</label>
                                <label> <input type="checkbox" value="Pvt_Pool" name="property_features[]"<?php if(in_array('Pvt_Pool', $property_features)){ ?> checked="checked"<?}?>>Pvt. Pool</label>
                               <label>  <input type="checkbox" value="Roof" name="property_features[]" <?php if(in_array('Roof', $property_features)){ ?> checked="checked"<?}?>>Roof</label></td></tr>
                               </table>



<? }
 