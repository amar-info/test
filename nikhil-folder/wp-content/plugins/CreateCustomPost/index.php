<?php
/* Plugin Name: CreateCustomPosts
 
 * 
 */
add_action('admin_menu', 'my_menu_page_cutom_posts');

function my_menu_page_cutom_posts() {
add_menu_page('custom title', 'Create Custom Posts', 'manage_options', 'customly_creatingPosts', 'customly_creatingPosts');
}
function customly_creatingPosts(){
   
    $Current_user_id = get_current_user_id(); 
    $property=array(
        
         $array=array('title'=>'property',
           'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
           'image'=>'xyz.jpeg',
           'post_meta1'=>'post_meta1',
           'post_meta2'=>'post_meta2',
           'floor_image'=>'floorImage'         
           ),
    $array1=array('title'=>'propertyxyz',
           'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
           'image'=>'xyz1.jpeg',
           'post_meta1'=>'post_meta3',
           'post_meta2'=>'post_meta4',
           'floor_image'=>'floorImage1.jpg'         
           )
   
    );
  //print_r($property);
   
  foreach($property as $property_individual_value){
   //   echo $property_individual_value['title'];
      
        $my_post = array(
        'post_title' => $property_individual_value['title'],
        'post_content' => $property_individual_value['description'],
        'post_status' => 'Publish',
        'post_author' => $Current_user_id,
        'post_type' => 'property'
        
    );
    
    // Insert the post into the database
   $property_id = wp_insert_post($my_post);
   $image=$property_individual_value['image'];
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
    
    
    update_post_meta($property_id, 'post_type_property_Post_meta1', $property_individual_value['post_meta1']);
    update_post_meta($property_id, 'post_type_property_Post_meta2', $property_individual_value['post_meta2']);
    update_post_meta($property_id, 'post_type_property_floor_image', $property_individual_value['floor_image']);
      
  }
   
}