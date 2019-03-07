<?php
/***************************
* Load Styles and Scripts
****************************/
function scp_front_styles() {   

    wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,800', false ); 
    wp_register_style( 'style', get_stylesheet_uri().'?v='.time() );    
    wp_enqueue_style( 'style' ); 
    wp_enqueue_script( 'validator', 'https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'captcha', 'https://www.google.com/recaptcha/api.js', array( 'jquery' ), '1.0.0', true );

    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/core.js?v='.time(), array( 'jquery' ), '1.0.0', true );
    wp_localize_script( 'scripts', 'siteUrlobject', array( 'siteUrl' => get_bloginfo( 'url' ) ) );
}
add_action( 'wp_enqueue_scripts', 'scp_front_styles' );


add_post_type_support( 'page', 'excerpt' );
/**********************
Register CV Post Type to handle file uploads
**********************/
// Register Custom Post Type
function cv_post_type() {

  $labels = array(
    'name'                  => _x( 'CV\'s', 'Post Type General Name', 'text_domain' ),
    'singular_name'         => _x( 'CV', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'             => __( 'CV\'s', 'text_domain' ),
    'name_admin_bar'        => __( 'CV', 'text_domain' ),
    'archives'              => __( 'Item Archives', 'text_domain' ),
    'attributes'            => __( 'Item Attributes', 'text_domain' ),
    'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
    'all_items'             => __( 'All Items', 'text_domain' ),
    'add_new_item'          => __( 'Add New Item', 'text_domain' ),
    'add_new'               => __( 'Add New', 'text_domain' ),
    'new_item'              => __( 'New Item', 'text_domain' ),
    'edit_item'             => __( 'Edit Item', 'text_domain' ),
    'update_item'           => __( 'Update Item', 'text_domain' ),
    'view_item'             => __( 'View Item', 'text_domain' ),
    'view_items'            => __( 'View Items', 'text_domain' ),
    'search_items'          => __( 'Search Item', 'text_domain' ),
    'not_found'             => __( 'Not found', 'text_domain' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
    'featured_image'        => __( 'Featured Image', 'text_domain' ),
    'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
    'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
    'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
    'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
    'items_list'            => __( 'Items list', 'text_domain' ),
    'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
    'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
  );
  $args = array(
    'label'                 => __( 'CV', 'text_domain' ),
    'description'           => __( 'Uploaded CV\'s', 'text_domain' ),
    'labels'                => $labels,
    'supports'              => array( 'title', ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-format-aside',
    'show_in_admin_bar'     => false,
    'show_in_nav_menus'     => false,
    'can_export'            => true,
    'has_archive'           => true,    
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );
  register_post_type( 'cv', $args );

}
add_action( 'init', 'cv_post_type', 0 );

/***************************
* Deque Jquery Migrate
****************************/
function dequeue_jquery_migrate( &$scripts){
	if(!is_admin()){
		$scripts->remove( 'jquery');
		$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
	}
}
add_filter( 'wp_default_scripts', 'dequeue_jquery_migrate' );


/***************************
* Remove some pesky code from the header that we dont need. 
****************************/
function removeHeadLinks() {
  remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
  remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
  remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
  remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
  remove_action( 'wp_head', 'index_rel_link' ); // index link
  remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
  remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
  remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
  remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version
}
add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');
add_filter('show_admin_bar', '__return_false');

/***************************
* Enable Post Thumbnails
****************************/
add_theme_support( 'post-thumbnails' );

/***************************
* Disable XMLRPC
****************************/
add_filter('xmlrpc_enabled', '__return_false');

/***************************
* Remove Wp Version Number
****************************/
function wpb_remove_version() {
	return '';
}
add_filter('the_generator', 'wpb_remove_version');

/***************************
* Credit in the admin footer
****************************/
function remove_footer_admin () {
	echo 'Fueled by <a href="http://www.wordpress.org" target="_blank">WordPress</a> | Theme By: <a href="http://www.knoppys.co.uk" target="_blank">Knoppys Digital</a></p>';
}
add_filter('admin_footer_text', 'remove_footer_admin');


/***************************
* Remove the welcome to WordPress stuff from teh dashboard, like we dont already know we're here.
****************************/
remove_action('welcome_panel', 'wp_welcome_panel');

/***************************
* Add jQuery to the wp_head()
****************************/
function insert_jquery(){
   wp_enqueue_script('jquery');
}
add_filter('wp_head','insert_jquery');

/***************************
* Load Menus
****************************/
register_nav_menus( array(
	'primary' => __( 'Primary' ),
) );

/***************************
* Register Sidebars
****************************/
$args1 = array(
	'name'          => __( 'Blog Sidebar' ),
	'id'            => 'sidebar-blog',
	'description'   => '',
  'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-block">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="sidetitle">',
	'after_title'   => '</h3>' 
); 
register_sidebar( $args1 );
$args2 = array(
  'name'          => __( 'Page Sidebar' ),
  'id'            => 'sidebar-page',
  'description'   => '',
  'class'         => '',
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h3 class="sidetitle">',
  'after_title'   => '</h3>'
); 
register_sidebar( $args2 );
$args3 = array(
  'name'          => __( 'Profile Sidebar' ),
  'id'            => 'sidebar-profile',
  'description'   => '',
  'class'         => '',
  'before_widget' => '<div id="%1$s" class="sidebar-block widget %2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h3 class="sidetitle">',
  'after_title'   => '</h3>'
); 
register_sidebar( $args3 );

/***************************
* Custom Excerpt Length
****************************/
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/*************************
Remove those peski emojis
*************************/
function disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );

function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}
add_filter( 'emoji_svg_url', '__return_false' );

/***************************
* Add a logo to the wp customiser
****************************/
function themename_custom_logo_setup() {
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

/*************************************http://knoppysdev.com/greenfield/wp-content/uploads/2017/06/cropped-logo.png
Add the company logo to the WP Login
*************************************/
function custom_loginlogo() {
echo '<style type="text/css">
h1 a {background-image: url('.get_site_url().'/wp-content/uploads/2017/06/cropped-logo.png) !important;     background-image: url(images/w-logo-blue.png?ver=20131202);
    background-image: none,url(images/wordpress-logo.svg?ver=20131107);
    -webkit-background-size: 84px;
    background-size: 100% !important;
    background-position: center top;
    background-repeat: no-repeat;
    color: #444;
    height: 100px !important;
    font-size: 20px;
    line-height: 1.3em;
    margin: 0 auto 25px;
    padding: 0;
    width: 100% !important;
    text-indent: -9999px;
    outline: 0;
    display: block;}
</style>';
}
add_action('login_head', 'custom_loginlogo');

/*************************************
Customsise the wp menu
Add and remove links in the wp menu to give you
a cleaner back end interface without a plugin.
************************************
function remove_menus(){
  
  remove_menu_page( 'index.php' );                  
  remove_menu_page( 'edit-comments.php' );
  remove_menu_page( 'themes.php' );
  remove_menu_page( 'plugins.php' );
  remove_menu_page( 'tools.php' );
  remove_menu_page( 'options-general.php' );  
}
add_action( 'admin_menu', 'remove_menus' );
function remove_menus_others(){
  
  remove_menu_page( 'edit.php?post_type=acf' );  
  remove_menu_page( 'admin.php?page=wppusher' );
  remove_menu_page( 'admin.php?page=wpcf7' );
}
add_action( 'admin_menu', 'remove_menus_others');

*/
/***************************
* Version 5 now uses get_nav_menu_items() insstead of wp_nav_menu()
* so technically we dont need this.
* It was used up to V4 with the bootstrap walker.
* It still has benefiots if you chose to use wp_nav_menu() anywhere else so Ill leave it in.
* **************************
* Ive used the following to remove all the
* junk classes wordpress adds to the tree
****************************/
add_filter('nav_menu_item_id', 'clear_nav_menu_item_id', 10, 3);
function clear_nav_menu_item_id($id, $item, $args) {
    return "";
}

add_filter('nav_menu_css_class', 'clear_nav_menu_item_class', 10, 3);
function clear_nav_menu_item_class($classes, $item, $args) {
    return array();
}

/***************************
* Ditch the comments style added to the head
****************************/
function remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action('widgets_init', 'remove_recent_comments_style');

/***************************
* Ditch the wp-embed script
****************************/
function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );


/***************************
* HTML Minify
* This is not a 100% tested function
* There are reports it can break on PHP7 and on 
* caching plugins however, on basic testing it is working. 
* You can simply comment the code out.
**************************
class WP_HTML_Compression {
    protected $compress_css = true;
    protected $compress_js = true;
    protected $info_comment = true;
    protected $remove_comments = true;
 
    protected $html;
    public function __construct($html) {
      if (!empty($html)) {
        $this->parseHTML($html);
      }
    }
    public function __toString() {
      return $this->html;
    }
    protected function bottomComment($raw, $compressed) {
      $raw = strlen($raw);
      $compressed = strlen($compressed);    
      $savings = ($raw-$compressed) / $raw * 100;   
      $savings = round($savings, 2);    
      return '<!-- HTML Minify | Gross page reduction of '.$savings.'% | From '.$raw.' Bytes, To '.$compressed.' Bytes -->';
    }
    protected function minifyHTML($html) {
      $pattern = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
      preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
      $overriding = false;
      $raw_tag = false;
      $html = '';
      foreach ($matches as $token) {
        $tag = (isset($token['tag'])) ? strtolower($token['tag']) : null;
        $content = $token[0];
        if (is_null($tag)) {
          if ( !empty($token['script']) ) {
            $strip = $this->compress_js;
          }
          else if ( !empty($token['style']) ) {
            $strip = $this->compress_css;
          }
          else if ($content == '<!--wp-html-compression no compression-->') {
            $overriding = !$overriding;
            continue;
          }
          else if ($this->remove_comments) {
            if (!$overriding && $raw_tag != 'textarea') {
              $content = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $content);
            }
          }
        }
        else {
          if ($tag == 'pre' || $tag == 'textarea') {
            $raw_tag = $tag;
          }
          else if ($tag == '/pre' || $tag == '/textarea') {
            $raw_tag = false;
          }
          else {
            if ($raw_tag || $overriding) {
              $strip = false;
            }
            else {
              $strip = true;
              $content = preg_replace('/(\s+)(\w++(?<!\baction|\balt|\bcontent|\bsrc)="")/', '$1', $content);
              $content = str_replace(' />', '/>', $content);
            }
          }
        }
        if ($strip) {
          $content = $this->removeWhiteSpace($content);
        }
        $html .= $content;
      }
      return $html;
    }
    public function parseHTML($html) {
      $this->html = $this->minifyHTML($html);
      if ($this->info_comment) {
        $this->html .= "\n" . $this->bottomComment($html, $this->html);
      }
    }
    protected function removeWhiteSpace($str) {
      $str = str_replace("\t", ' ', $str);
      $str = str_replace("\n",  '', $str);
      $str = str_replace("\r",  '', $str);
      while (stristr($str, '  ')) {
        $str = str_replace('  ', ' ', $str);
      }
      return $str;
    }
}
function wp_html_compression_finish($html) {
    return new WP_HTML_Compression($html);
}
function wp_html_compression_start() {
    ob_start('wp_html_compression_finish');
}
add_action('get_header', 'wp_html_compression_start');
**/
/******************
Custom job listings search form
******************/
function search_filter($query) {
  if ( !is_admin() && $query->is_main_query() ) {
    if ($query->is_search) {
      $query->set('post_type', array( 'bullhornjoblisting' ) );
    }
  }
}

add_action('pre_get_posts','search_filter');


/*************************
Refer failed login atempts back to the home page
*************************/

function custom_login_failed( $username ){

    $referrer = wp_get_referer();
    if ( $referrer && ! strstr($referrer, 'wp-login') && ! strstr($referrer,'wp-admin') )    {
        wp_redirect( add_query_arg('login', 'failed', $referrer) );
        exit;
    }
}
add_action( 'wp_login_failed', 'custom_login_failed' );

/*************************
Get the users role to enable conditional checks for different fields
*************************/
function kdl_get_user_role( $user = null ) {
  $user = $user ? new WP_User( $user ) : wp_get_current_user();
  return $user->roles ? $user->roles[0] : false;
}

/********************
Add a staff role
********************/
$result = add_role('staff',__( 'Staff' ),array(
        'read'         => true,  // true allows this capability
        'edit_posts'   => true,
        'delete_posts' => false, // Use false to explicitly deny
        'publish_posts' => true
    )
);



/********************
Add a candidate role
********************/
add_role('candidate',__( 'Candidate' ),array(
        'read'         => true,  // true allows this capability
        'edit_posts'   => false,
        'delete_posts' => false, // Use false to explicitly deny
        'publish_posts' => false
    )
);

  //Now allow them to upload a file to the server (CV)
  function allow_candidate_uploads() {
      $candidate = get_role('candidate');

      if ( ! $candidate->has_cap('upload_files') ) {
          $candidate->add_cap('upload_files');
      }
  }
  add_action('admin_init', 'allow_candidate_uploads');

/*************************
Candidate profile fields (user meta) 
*************************/
function display_candidate_profile_fields( $user ) {

  $role = kdl_get_user_role();
  if ($role == 'candidate') { ?>
      <h3>Candidate Information</h3>
      <table class="form-table">
        <tr>
          <th><label for="jobtitle">Contact Telephone</label></th>
          <td>
            <input type="text" name="user_telephone" id="user_telephone" value="<?php echo esc_attr( get_the_author_meta( 'user_telephone', $user->ID ) ); ?>" class="regular-text" />
          </td>
        </tr>
      </table>
  <?php } 

}
add_action( 'show_user_profile', 'display_candidate_profile_fields' );
add_action( 'edit_user_profile', 'display_candidate_profile_fields' );

function save_candidate_profile_fields( $user_id ) {

  if ( !current_user_can( 'edit_user', $user_id ) )
    return false;

  /* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
  update_usermeta( $user_id, 'user_telephone', $_POST['user_telephone'] ); 
}
add_action( 'personal_options_update', 'save_candidate_profile_fields' );
add_action( 'edit_user_profile_update', 'save_candidate_profile_fields' );


apply_filters( 'show_password_fields', $true, $profileuser ); 
/*************************
Update candidate information from profile page 
*************************/
function updatecandidateprofile() {   

      //Get the current user and process the candidate update form        

      $user = wp_get_current_user();
      $first_name = $_POST['user_firstname'];
      $last_name = $_POST['user_lastname'];
      $telephone = $_POST['user_telephone'];
      $datasaved = $_POST['datasaved'];

      if ( isset($_POST['user_email']) ) {
        $user->user_email = $_POST['user_email'];
        wp_update_user( array ('ID' => $user->ID, 'user_email' => esc_attr( $user->user_email ) ) ) ;
        update_user_meta($user->ID, 'last_name', $last_name);
        update_user_meta($user->ID, 'first_name', $first_name);
        update_user_meta($user->ID, 'user_telephone', $telephone);
        update_usermeta($user->ID, 'datasaved',$datasaved );
      }


      //Handle the CV Upload
      require_once( ABSPATH . 'wp-admin/includes/image.php' );
      require_once( ABSPATH . 'wp-admin/includes/file.php' );
      require_once( ABSPATH . 'wp-admin/includes/media.php' );         

      $attachment_id = media_handle_upload( 'user_cv', $_POST['post_id'] );



      if ( is_wp_error( $attachment_id ) ) {

      // There was an error uploading the image.

      } else {

        update_user_meta( $user->ID, 'user_cv', $attachment_id );
      
      }   

    $file = get_attached_file($attachment_id);
  
  ob_start(); ?>
 
   <form action="" method="post" class="user-profile" id="profileform" name="profileform" enctype="multipart/form-data">

    <h3><i class="fa fa-user"></i> Your personal information</h3>

    <label for="user_firstname">First Name (Required)</label>
    <input type="text" name="user_firstname" id="user_firstname" value="<?php if($user->user_firstname){echo $user->user_firstname;} ?>">
      
    <label for="user_lastname">Last Name (Required)</label>
    <input type="text" name="user_lastname" id="user_lastname" value="<?php if($user->user_lastname){echo $user->user_lastname;} ?>">

    <label for="user_email">Email Address (Required)</label>
    <input type="email" name="user_email" id="user_email" value="<?php if($user->user_email){echo $user->user_email;} ?>">
      
    <label for="user_telephone">Contact Telephone (Required)</label>
    <input type="tel" name="user_telephone" id="user_telephone" value="<?php if($user->user_telephone){echo $user->user_telephone;} ?>">
      
    <label for="user_cv">Your CV (Required)</label>
    <?php
    if (get_user_meta($user->ID, 'user_cv', true)) { ?>
      <div id="has-CV">
        <a href="<?php echo cvurl('url'); ?>"><i class="fa fa-arrow-circle-down" title="Download this CV"></i></a>
        <i class="fa fa-minus-circle" id="delete-cv" title="Delete this CV"></i>
      </div>     
    <?php } else { ?>
      <div id="has-no-CV"><input type="file" name="user_cv" id="user_cv" value="" multiple="false"/></div>
    <?php } ?>  
    <h3>How we use your data</h3>
    <p>I am happy for my data to be saved by Greenfield IT Recruitment on this website and internal systems to ease the process of further job applications.</p> 
    <input class="datasaved" type="checkbox" name="datasaved" value="yes" <?php if (get_user_meta($user->ID, 'datasaved', true) == 'yes') {echo 'checked';}?>>            
    <a target="_blank" href="<?php echo get_the_permalink('5203'); ?>" class="policy">Download our full policy</a>
  
      
    <?php //wp_nonce_field( 'profile-update', 'X5g3mkdAPkC9&g~' ); ?>
    <input type="hidden" name="post_id" id="post_id" value="<?php the_id(); ?>" />
    <input type="submit" class="btn" id="profile-update" value="Update">                        
  </form>   

  <?php return ob_get_clean();
}
add_action('init', 'updatecandidateprofile');



/*******************
Get the users CV URL
********************/
function cvurl($type){

  $id = get_current_user_id();

  if (get_user_meta($id, 'user_cv', true) && $type = 'url') {    
    $url = wp_get_attachment_url( get_user_meta($id, 'user_cv', true) );
    return $url;

  } elseif (get_user_meta($id, 'user_cv', true) && $type = 'title') {     
    $filename = basename( get_attached_file ( get_user_meta($id, 'user_cv', true) ) );
    return $title;
  }

}




/***************************
Password Rest form
*******************/
function knoppys_change_password_form() {
  global $post; 
 
    if (is_singular()) :
      $current_url = get_permalink($post->ID);
    else :
      $pageURL = 'http';
      if ($_SERVER["HTTPS"] == "on") $pageURL .= "s";
      $pageURL .= "://";
      if ($_SERVER["SERVER_PORT"] != "80") $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
      else $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
      $current_url = $pageURL;
    endif;    
  $redirect = $current_url;
 
  ob_start();
 
    // show any error messages after form submission
    knoppys_show_error_messages(); ?>
 
    <?php if(isset($_GET['password-reset']) && $_GET['password-reset'] == 'true') { ?>
      <div class="knoppys_message success">
        <span><?php _e('Password changed successfully', 'rcp'); ?></span>
      </div>
    <?php } ?>
    <form class="user-profile" id="knoppys_password_form" method="POST" action="<?php echo $current_url; ?>">
    <h3><i class="fa fa-lock"></i> Your password</h3>
      <fieldset>
        <p>
          <label for="knoppys_user_pass"><?php _e('New Password', 'rcp'); ?></label>
          <input name="knoppys_user_pass" id="knoppys_user_pass" class="required" type="password"/>
        </p>
        <p>
          <label for="knoppys_user_pass_confirm"><?php _e('Password Confirm', 'rcp'); ?></label>
          <input name="knoppys_user_pass_confirm" id="knoppys_user_pass_confirm" class="required" type="password"/>
        </p>
        <p>
          <input type="hidden" name="knoppys_action" value="reset-password"/>
          <input type="hidden" name="knoppys_redirect" value="<?php echo $redirect; ?>"/>
          <input type="hidden" name="knoppys_password_nonce" value="<?php echo wp_create_nonce('rcp-password-nonce'); ?>"/>
          <input class="btn" id="knoppys_password_submit" type="submit" value="<?php _e('Change Password', 'knoppys'); ?>"/>
        </p>
      </fieldset>
    </form>
  <?php
  return ob_get_clean();  
}
 
// password reset form
function knoppys_reset_password_form() {
  if(is_user_logged_in()) {
    return knoppys_change_password_form();
  }
}
add_shortcode('password_form', 'knoppys_reset_password_form');
 
 
function knoppys_reset_password() {
  // reset a users password
  if(isset($_POST['knoppys_action']) && $_POST['knoppys_action'] == 'reset-password') {
 
    global $user_ID;
 
    if(!is_user_logged_in())
      return;
 
    if(wp_verify_nonce($_POST['knoppys_password_nonce'], 'rcp-password-nonce')) {
 
      if($_POST['knoppys_user_pass'] == '' || $_POST['knoppys_user_pass_confirm'] == '') {
        // password(s) field empty
        knoppys_errors()->add('password_empty', __('Please enter a password, and confirm it', 'knoppys'));
      }
      if($_POST['knoppys_user_pass'] != $_POST['knoppys_user_pass_confirm']) {
        // passwords do not match
        knoppys_errors()->add('password_mismatch', __('Passwords do not match', 'knoppys'));
      }
 
      // retrieve all error messages, if any
      $errors = knoppys_errors()->get_error_messages();
 
      if(empty($errors)) {
        // change the password here
        $user_data = array(
          'ID' => $user_ID,
          'user_pass' => $_POST['knoppys_user_pass']
        );
        wp_update_user($user_data);
        // send password change email here (if WP doesn't)
        wp_redirect(add_query_arg('password-reset', 'true', $_POST['knoppys_redirect']));
        exit;
      }
    }
  } 
}
add_action('init', 'knoppys_reset_password');
 
if(!function_exists('knoppys_show_error_messages')) {
  // displays error messages from form submissions
  function knoppys_show_error_messages() {
    if($codes = knoppys_errors()->get_error_codes()) {
      echo '<div class="knoppys_message error">';
          // Loop error codes and display errors
         foreach($codes as $code){
              $message = knoppys_errors()->get_error_message($code);
              echo '<span class="knoppys_error"><strong>' . __('Error', 'rcp') . '</strong>: ' . $message . '</span><br/>';
          }
      echo '</div>';
    } 
  }
}
 
if(!function_exists('knoppys_errors')) { 
  // used for tracking error messages
  function knoppys_errors(){
      static $wp_error; // Will hold global variable safely
      return isset($wp_error) ? $wp_error : ($wp_error = new WP_Error(null, null, null));
  }
}


/**************
Paginate LInks
**************/
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="btn"';
}


function schema_details() {  ?>

    <script type='application/ld+json'>
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "url": "<?php echo get_site_url(); ?>",
      "logo": "<?php echo get_site_url(); ?>/wp-content/uploads/2017/06/cropped-logo-1.png"
    }
    {
      "@context": "http://schema.org",
      "@type": "Person",
      "name": "Greenfield IT Recruitment",
      "url": "<?php echo get_site_url(); ?>",
      "sameAs": [
        "https://www.facebook.com/Greenfield.IT",
        "https://twitter.com/greenfieldrec",
        "https://www.linkedin.com/company/660810"
      ]
    }
    </script>

    <?php
}

/***************************************
some login redirects to protect wp-admin
****************************************/
function wpse_lost_password_redirect() {
    wp_redirect( home_url() ); 
    exit;
}
add_action('after_password_reset', 'wpse_lost_password_redirect');

function my_login_redirect( $redirect_to, $request, $user ) {
  //is there a user to check?
  if ( isset( $user->roles ) && is_array( $user->roles ) ) {
    //check for admins
    if ( in_array( 'administrator', $user->roles ) ) {
      // redirect them to the default place
      return $redirect_to;
    } else {
      return get_site_url().'/find-a-job';
    }
  } else {
    return $redirect_to;
  }
}

add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );


add_action( 'init', 'blockusers_init' );
  function blockusers_init() {
    if ( 
      is_admin() && ! current_user_can( 'administrator' ) && 
      ! ( defined( 'DOING_AJAX' ) && DOING_AJAX )  &&
      ! ($_SERVER['REQUEST_METHOD'] === 'POST') )
    {
    wp_redirect( home_url() );
    exit;
  }
}

function term_classes($ID) {
  $terms = wp_get_post_terms($ID, 'JobType');
  foreach ($terms as $term) {
    return $term->name.' ';
  }
}

function knoppyslogin_callback() { ob_start(); ?>

    <div class="row">
    <div class="col-sm-6 login-slide">
      <h3><i class="fa fa-sign-in"></i>  Login : </h3>      
      <?php           
      $args = array(
        'redirect'=> get_site_url().'/find-a-job/',
        'value_remember' => true, 
        'label_remember' => __(),
        'label_username' => __(),
        'label_password' => __(),);
        wp_login_form( $args );           
      ?>    
      <a id="forgot-password">Forgot password</a> 
      <div id="forgot-form">
        <?php
        global $wpdb;

        $error = '';
        $success = '';

        // check if we're in reset form
        if( isset( $_POST['action'] ) && 'reset' == $_POST['action'] ) {

          $email = trim($_POST['user_login']);

          if( empty( $email ) ) {
            $error = 'Enter a username or e-mail address..';
          } else if( ! is_email( $email )) {
            $error = 'Invalid username or e-mail address.';
          } else if( ! email_exists( $email ) ) {
            $error = 'There is no user registered with that email address.';
          } else {

            $random_password = wp_generate_password( 12, false );
            $user = get_user_by( 'email', $email );

            $update_user = wp_update_user( array (
                'ID' => $user->ID,
                'user_pass' => $random_password
              )
            );

            // if  update user return true then lets send user an email containing the new password
            if( $update_user ) {
              $to = $email;
              $subject = 'Your new password';
              $sender = get_option('name');

              $message = 'Your new password is: '.$random_password;

              $headers[] = 'MIME-Version: 1.0' . "\r\n";
              $headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
              $headers[] = "X-Mailer: PHP \r\n";
              $headers[] = 'From: '.$sender.' < '.$email.'>' . "\r\n";

              $mail = wp_mail( $to, $subject, $message, $headers );
              if( $mail )
                $success = 'Check your email address for you new password.';

            } else {
              $error = 'Oops something went wrong updaing your account.';
            }

          }

          if( ! empty( $error ) )
            echo '<div class="message"><p class="error"><strong>ERROR:</strong> '. $error .'</p></div>';

          if( ! empty( $success ) )
            echo '<div class="error_login"><p class="success">'. $success .'</p></div>';
        }
        ?>
        <form method="post">
          <fieldset>
            <p>Please enter your username or email address. You will receive a link to create a new password via email.</p>
            <p><label for="user_login">Username or E-mail:</label>
              <?php $user_login = isset( $_POST['user_login'] ) ? $_POST['user_login'] : ''; ?>
              <input type="text" name="user_login" id="user_login" value="<?php echo $user_login; ?>" /></p>
            <p>
              <input type="hidden" name="action" value="reset" />
              <input type="submit" value="Get New Password" class="button" id="submit" />
            </p>
          </fieldset>
        </form>
      </div>

  <!--html code-->

    </div>
    <div class="col-sm-6">
      <h3><i class="fa fa-hand-pointer-o"></i>  Upload your CV : </h3>      
      <form action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" method="post">
          <p><input type="text" name="user_login" value="" id="user_login" class="input" placeholder="Your name" /></p>
          <p><input type="text" name="user_email" value="" id="user_email" class="input" placeholder="Your email"  /></p>         
          <?php do_action('register_form'); ?>
          <input type="submit" value="Next step" id="register" />
          <input type="hidden" name="redirect_to" value="<?php echo get_site_url(); ?>/new-candidate">
      </form>     
    </div>
  </div>
  <div class="col-md-12 close">
    <p><i class="fa fa-close"></i>  Close this window</p>
  </div>

  <script type="text/javascript">
    jQuery(document).ready(function(){
      jQuery('#forgot-password').on('click', function(){
        jQuery('#loginform').hide();
        jQuery('#forgot-password').hide();
        jQuery('#forgot-form').show();
      });
      jQuery('.close').on('click', function(){
        jQuery('.loginsection').slideUp();
      });
    });
  </script>
  
    
  <?php $content = ob_get_clean();
  echo $content;

  wp_die();
}
add_action( 'wp_ajax_knoppyslogin', 'knoppyslogin_callback' );
add_action( 'wp_ajax_nopriv_knoppyslogin', 'knoppyslogin_callback' );


//Show the application form 
function showapplicationform_callback() { ob_start(); ?>

  <form id="jobApplication" name="jobApplication" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" enctype="multipart/form-data" onsubmit="return validation(this)">
    <div class="col-sm-6">
      <input type="text" name="fullName" placeholder="Full Name: (required)" required>
      <input type="email" name="email" placeholder="Email: (required)" required>
      <input type="tel" name="tel" placeholder="Telephone: (required)" patern='^\+?\d{0,13}' required>
      <textarea name="message" placeholder="Quick message"></textarea>
      <span>Please upload a copy of your cv in .doc or .docx format. We will accept a pdf.</span>
      <span><input type="file" name="cv" accept=".doc,.docx,.pdf" required></span>
    </div>
    <div class="col-sm-6">
      <p><strong>Protecting your data</strong><br>Please tick this box to confirm you give your permission for Greenfield to store and process your personal data for the purposes of securing you a new job</p>
      <input type="checkbox" id="applyconsent">
      <input type="hidden" name="action" value="email_appliaction_form">
      <input type="hidden" name="jobTitle" value="<?php echo get_the_title($_POST['jobid']); ?>">
      <input type="hidden" name="jobLocation" value="<?php echo get_post_meta($_POST['jobid'],'Location',true); ?>">
      <input type="hidden" name="post_id" id="post_id" value="<?php echo $_POST['jobid'] ?>" />
      <input type="hidden" name="check" value="">
      <button disabled type="submit" class="btn" name="submit" id="applysubmit">Submit</button>
    </div>
  </form>
  <script type="text/javascript">
    jQuery('input#applyconsent').change(function(){
      if (jQuery(this).is(':checked')) {
        jQuery('button#applysubmit').prop('disabled', false);   
      } else {
        jQuery('button#applysubmit').prop('disabled', true);  
      }
    })
  </script>


  <?php 
  $content = ob_get_clean();
  echo $content;
  wp_die();
}
add_action( 'wp_ajax_showapplicationform', 'showapplicationform_callback' );
add_action( 'wp_ajax_nopriv_showapplicationform', 'showapplicationform_callback' );

