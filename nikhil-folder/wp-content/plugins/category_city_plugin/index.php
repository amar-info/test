<?php
/* Plugin Name: category_city
 
 * 
 */
add_action('admin_menu', 'my_menu_page_city');

function my_menu_page_city() {
add_menu_page('custom menu title', 'City Details', 'manage_options', 'city_listings', 'city_listings');

}


function city_listings(){
    
    ?>

<style>
    label {
    font-size: 21px;
    font-weight: bold;
}
.wp-admin input[type="file"] {
    padding: 84px 24px;
}
tr{
    line-height: 2.4em;
}
h2 {
    font-size: 2em;
    margin: 0.67em 0;
    font-family: "Open Sans",sans-serif;
}
</style>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js?ver=3.9.2" type="text/javascript"></script>
    
<script>
         
function validation(){
    //jQuery(".Latitude").numeric();
    // jQuery(".Longitude").numeric();
  // var data;
  
     for ( var i = 0; i <= 5; i++ ) {
// Logs "try 0", "try 1", ..., "try 4".

//alert(i);
 var regexPattern = /^\d{0,8}(\.\d{1,2})?$/; 
var  Latitude=[];
     Latitude = jQuery('#Latitude'+i).val();
var Longit=[];   
    Longit = jQuery('#Longi'+i).val();
var desc=[];    
    desc=jQuery('#desc'+i).val(); 
 var city_image=[]; 
    city_image= jQuery('#city_image'+i).val();
    //alert(Latitude);
     //alert(Longitude);
  //alert(desc);
     //alert(city_image);
       if(Latitude == '')
          { 
              jQuery('#lati'+i).text(" Please insert this field");
             
          }else if(regexPattern.test(Latitude)){
              jQuery('#lati'+i).text("");
          }
          else{
                jQuery('#lati'+i).text("Please enter valid value");
          }
          
       
           
       if(Longit == '')
            { 
                jQuery('#longi'+i).text(" Please insert this field");
              
            }else if(regexPattern.test(Longit)){
                 jQuery('#longi'+i).text("");
            }
            else{
                jQuery('#longi'+i).text("Please enter valid value");
          }
            
           if(desc == '')
          { 
              jQuery('#dsc'+i).text(" Please insert this field");
             
          }
          
          if(city_image == '')
            { 
                jQuery('#establish'+i).text(" Please insert this field");
              
            }
             
           if(!Latitude == '' && !Longit=='' && !desc=='' && !city_image==''){
               jQuery('#myform').submit();
           } 
     }
    
  
          
         
}


</script>

        <?php
    $query=mysql_query("select * from tbl_category_details");
    if(mysql_num_rows($query)){
        //----------------------------------------------------edit code-----------------------------------------------------------------------
       ?> 
<h2>CITY DETAILS</h2>
<form method="post" action="" id="myform" enctype="multipart/form-data">
        <table class="table">
            
        <?php
       
       $cat_id=array('10','11','12','13','14','15');
     $cat_name=array('NEW_CARIO','AL_AIN_AL_SOKHNA','AL_SHOROUK_CITY','RED_SEA','6TH_OF_OCTOBER','NORTH_COAST'); 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {   
     
      //$image_db= array();
     $Latitude=$_POST['Latitude'];
     $Longitude=$_POST['Longitude'];
     $desc=$_POST['Description'];
     $image=$_FILES['city_img']['name'];
    
      for ($i = 0;$i < count($image);$i++) {
           if($image[$i]==''){
        // echo 'empty';
          mysql_query("UPDATE `tbl_category_details` SET `lati`='$Latitude[$i]',`longi`='$Longitude[$i]',`description`='$desc[$i]' where `cat_id`=$cat_id[$i] ");

     }else{
          //echo 'not empty';
         // print_r($image[$i]);
        
    
           $temp= $_FILES['city_img']['tmp_name'][$i];
   $target_path = "../wp-content/plugins/category_city_plugin/images/".$cat_name[$i].'_'.$image[$i];     // Declaring Path for uploaded images.
  $name=$cat_name[$i].'_'.$image[$i];
  
   move_uploaded_file($temp,$target_path);
        //unlink("../wp-content/plugins/category_city_plugin/images/".$cat_name[$i].'_'.$image[$i];")
     if(move_uploaded_file($temp,$target_path)){
      $query_for_image1=mysql_query("select city_img from tbl_category_details where `cat_id`=$cat_id[$i]");
  
    $image_name1=mysql_fetch_row($query_for_image1);
        print_r($image_name1);
 @unlink('../wp-content/plugins/category_city_plugin/images/'.$cat_name[$i].'_'.$image_name1[$i]);}
       
       
    mysql_query("UPDATE `tbl_category_details` SET `lati`='$Latitude[$i]',`longi`='$Longitude[$i]',`description`='$desc[$i]',`city_img`='$name' where `cat_id`=$cat_id[$i] ");

     }
     
    }}
     
     
     
     
     
 $j=0;
   $query=mysql_query("select * from tbl_category_details"); 
   ?><?php
    while( $row=mysql_fetch_array($query)){
        
  
    ?>
   
     
       <tr><td>City Name:<span style="color: red;">*</span></td><td><label><?php echo $cat_name[$j]; ?></label></td></tr>
       <tr><td>Latitude:<span style="color: red;">*</span></td><td> <input type="text"  id="Latitude<?php echo $j; ?>" name="Latitude[]" value="<?php echo $row['lati'];?>" ><span id="lati<?php echo $j; ?>" style="color: red;font-size: 13px"></span></td></tr>
       <tr><td>Longitude:<span style="color: red;">*</span></td><td><input type="text" id="Longi<?php echo $j; ?>" name="Longitude[]" value="<?php echo $row['longi'];?>" ><span id="longi<?php echo $j; ?>" style="color: red;font-size: 13px"></span></td></tr>
       <tr><td>Description:<span style="color: red;">*</span></td><td><textarea name="Description[]" id="desc<?php echo $j; ?>" style="width: 961px; height: 163px;"  ><?php echo $row['description'];?></textarea><span id="dsc<?php echo $j; ?>" style="color: red;font-size: 13px" class="error"></span></td></tr>
       <tr><td>City Image :<span style="color: red;">*</span></td><td><input type="file" name="city_img[]" id="city_image<?php echo $j; ?>" value="<?php echo $row['city_img'];?>" ><span><img src="<?php echo site_url(); ?>/wp-content/plugins/category_city_plugin/images/<?php echo $row['city_img'];?>" class="image" style="width:100px; height:100px;" alt="" /></span><span id="establish<?php echo $j; ?>" style="color: red;font-size: 13px" class="error"></span></td></tr>
      
       <?php 
       
       
       $j++;
       } 
       ?><tr><td><input type="button" value="Update Details" class="button button-primary button-large" onclick="validation()"></td></tr>
           
    </table>
    
    </form>
 <?php   }
    //--------------------------------------------------- add code-------------------------------------------------------------------------------------------
    else{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {   
     $cat_id=array('10','11','12','13','14','15');
    
     $Latitude=$_POST['Latitude'];
     $Longitude=$_POST['Longitude'];
     $desc=$_POST['Description'];
     $image=$_FILES['city_img']['name'];
   //  echo '<pre>';
 //   print_r($_FILES['city_img']['tmp_name']); echo '</pre>';
     //print_r($Latitude);
    // print_r($Longitude);
    // print_r($desc);
    // print_r($image);
    
          $cat_name=array('NEW_CARIO','AL_AIN_AL_SOKHNA','AL_SHOROUK_CITY','RED_SEA','6TH_OF_OCTOBER','NORTH_COAST');
     //echo site_url();
    for ($i = 0;$i < count($image);$i++) {
         if(isset($image)==''){
         echo 'addyers';  
     }
     else{
         echo 'adderdfgdfg'; 
    $temp= $_FILES['city_img']['tmp_name'][$i];
   $target_path = "../wp-content/plugins/category_city_plugin/images/".$cat_name[$i].'_'.$image[$i];    // Declaring Path for uploaded images.
   
   $name=$cat_name[$i].'_'.$image[$i];
    move_uploaded_file($temp,$target_path);
    
    
  //  exit;
      mysql_query("insert into `tbl_category_details` (`lati`, `longi`, `description`, `city_img`, `cat_id`) values ('$Latitude[$i]','$Longitude[$i]','$desc[$i]','$name','$cat_id[$i]')");

        
    }
    
    }}
    ?>
<form method="post" action=""  enctype="multipart/form-data">
    <table class="table">
       <tr><td>City Name:</td><td><label><?php echo 'NEW CARIO'; ?></label></td></tr>
       <tr><td>Latitude:</td><td> <input type="text" name="Latitude[]" ></td></tr>
       <tr><td>Longitude: </td><td><input type="text" name="Longitude[]"  ></td></tr>
       <tr><td>Description:</td><td><textarea name="Description[]" style="width: 1001px; height: 166px;"  ></textarea></td></tr>
       <tr><td>City Image : </td><td><input type="file" name="city_img[]"  ></td></tr><br>
       
       
       
       
       <tr><td>City Name:</td><td><label><?php echo 'AL AIN AL SOKHNA'; ?></label></td></tr>
       <tr><td>Latitude:</td><td> <input type="text" name="Latitude[]" ></td></tr>
       <tr><td>Longitude: </td><td><input type="text" name="Longitude[]"  ></td></tr>
       <tr><td>Description:</td><td><textarea name="Description[]" style="width: 1001px; height: 166px;" ></textarea></td></tr>
       <tr><td>City Image : </td><td><input type="file" name="city_img[]"  ></td></tr>
       
       
       
       
       <tr><td>City Name:</td><td><label><?php echo 'AL SHOROUK CITY'; ?></label></td></tr>
       <tr><td>Latitude:</td><td> <input type="text" name="Latitude[]" ></td></tr>
       <tr><td>Longitude: </td><td><input type="text" name="Longitude[]"  ></td></tr>
       <tr><td>Description:</td><td><textarea name="Description[]" style="width: 1001px; height: 166px;" ></textarea></td></tr>
       <tr><td>City Image : </td><td><input type="file" name="city_img[]"  ></td></tr>
      
       
       <tr><td>City Name:</td><td><label><?php echo 'RED SEA'; ?></label></td></tr>
       <tr><td>Latitude:</td><td> <input type="text" name="Latitude[]" ></td></tr>
       <tr><td>Longitude: </td><td><input type="text" name="Longitude[]"  ></td></tr>
       <tr><td>Description:</td><td><textarea name="Description[]" style="width: 1001px; height: 166px;" ></textarea></td></tr>
       <tr><td>City Image : </td><td><input type="file" name="city_img[]"  ></td></tr>
      
       
       <tr><td>City Name:</td><td><label><?php echo '6TH OF OCTOBER'; ?></label></td></tr>
       <tr><td>Latitude:</td><td> <input type="text" name="Latitude[]" ></td></tr>
       <tr><td>Longitude: </td><td><input type="text" name="Longitude[]"  ></td></tr>
       <tr><td>Description:</td><td><textarea name="Description[]" style="width: 1001px; height: 166px;" ></textarea></td></tr>
       <tr><td>City Image : </td><td><input type="file" name="city_img[]"  ></td></tr>
       
       
       <tr><td>City Name:</td><td><label><?php echo 'NORTH COAST'; ?></label></td></tr>
       <tr><td>Latitude:</td><td> <input type="text" name="Latitude[]" ></td></tr>
       <tr><td>Longitude: </td><td><input type="text" name="Longitude[]"  ></td></tr>
       <tr><td>Description:</td><td><textarea name="Description[]" style="width: 1001px; height: 166px;" ></textarea></td></tr>
       <tr><td>City Image : </td><td><input type="file" name="city_img[]"  ></td></tr>
       <tr><td><input type="submit" value="Add Details" class="button button-primary button-large"></td></tr>
    </table>
    
    </form>
    <?php
    } 
}
