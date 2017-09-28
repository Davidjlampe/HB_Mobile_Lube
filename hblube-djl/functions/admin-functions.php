<?php 
//
// Theme Admin functions - with links to wordpress documentation on each
//


add_action( 'admin_init', 'djl_remove_menu_pages' );
function djl_remove_menu_pages() {

    global $user_ID;

    // Put in user level here. 'editor, author, etc'
    if ( current_user_can( 'editor' ) ) {

          //remove_menu_page( 'index.php' );                  //Dashboard
          //remove_menu_page( 'jetpack' );                    //Jetpack* 
          remove_menu_page( 'edit.php' );                   //Posts
          remove_menu_page( 'upload.php' );                 //Media
          //remove_menu_page( 'edit.php?post_type=page' );    //Pages
          remove_menu_page( 'edit-comments.php' );          //Comments
          remove_menu_page( 'themes.php' );                 //Appearance
          remove_menu_page( 'plugins.php' );                //Plugins
          remove_menu_page( 'users.php' );                  //Users
          remove_menu_page( 'tools.php' );                  //Tools
          //remove_menu_page( 'options-general.php' );        //Settings        


    }
}


function djl_add_theme_caps() {
    // gets the author role
    $role = get_role( 'editor' );

    // This only works, because it accesses the class instance.
    // would allow the author to edit others' posts for current theme only
    $role->add_cap( 'update_plugins' ); 
}
add_action( 'admin_init', 'djl_add_theme_caps');



// Remove dashboard widgets
function djl_remove_dashboard_meta() {
    if ( ! current_user_can( 'manage_options' ) ) {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        //remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
    }
}
add_action( 'admin_init', 'djl_remove_dashboard_meta' ); 