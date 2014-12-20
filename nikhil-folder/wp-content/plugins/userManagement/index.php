<?php
/* Plugin Name: User Management 
 * Description: Managing all users.
 * Author: Amit Singh
 */

class propertyUser {

    public function __construct() {

        add_action('init', array($this, 'init'));
    }

   public function init() {

        remove_role('individual');
        remove_role('developer');
      
        add_role(
            'individual', __('Individual user'), array(
            'read' => false
             )
        ); 
        
        add_role(
            'developer', __('Developer'), array(
            'read' => false
             )
        );        
    }    
}

function suruKaro() {
    new propertyUser();
    
}

add_action('plugins_loaded', 'suruKaro', 15);

?>