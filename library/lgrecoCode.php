<?php

//require_once("debug.php");
// Various string used as pll_e('the key'); or
// echo pll__('the key');
// 1st argument is the display name and the next one is the original text
   pll_register_string('Home Page Slider', 'SliderId');
   pll_register_string('Pager previous', '&larr; Previous');
   pll_register_string('Pager first', 'First');
   pll_register_string('Pager next', 'Next &rarr;');
   pll_register_string('Pager last', 'Last');
   pll_register_string('Search', 'Search');
   pll_register_string('Search result for', 'Search results for');
   pll_register_string('Search result categories', 'In categories');
   pll_register_string('Products more', 'Read more...');
   pll_register_string('Products in category', 'Category products');
  pll_register_string('404 Header', 'Not found (404)');
  pll_register_string('404 Sorry text', 'Unfortunately the page you are looking for is not located. Please use the search field to search for the content you want or select from the product categories to browse our products.');

// Image sizes
   add_image_size( 'lgreco-product', 210, 350, false);
   add_image_size( 'lgreco-product-list-item', 100, 150, false);
  add_image_size( 'lgreco-homepage', 150, 150, false);
  
   function register_products_type(){
       $productlabels = array(
               'name'               => 'Products',
               'singular_name'      => 'Product',
               'menu_name'          => 'Products',
               'name_admin_bar'     => 'Product',
               'add_new_item'       => 'Add New product', 
               'new_item'           => 'New product',
               'edit_item'          => 'Edit product',
               'view_item'          => 'View product',
               'all_items'          => 'All products',
               'search_items'       => 'Search products',
               'not_found'          => 'No products found.',
               'not_found_in_trash' => 'No products found in Trash.'
           );
       register_post_type('products', array(
'label' => 'Products',
'labels' => $productlabels,
'description' => 'Ëgreco products',
'public' => true,
'menu_icon' => 'dashicons-cart',
'show_ui' => true,
'capability_type' => 'post',
'hierarchical' => false,
'query_var' => true,
'rewrite' => array('slug'=>'product'),
'supports' => array('title','editor','thumbnail')
) );
register_taxonomy_for_object_type( 'category', 'products' );
add_rewrite_rule('products-el/page/?([0-9]{1,})/?$','index.php?pagename=products-el&paged=$matches[1]','top');
add_rewrite_rule('products-el/([^/]+)/page/?([0-9]{1,})/?$','index.php?pagename=$matches[1]&paged=$matches[2]','top');
add_rewrite_rule('products-el/([^/]+)/([^/]+)/page/?([0-9]{1,})/?$','index.php?pagename=$matches[2]&paged=$matches[3]','top');
add_rewrite_rule('products/page/?([0-9]{1,})/?$','index.php?pagename=products&paged=$matches[1]','top');
//add_rewrite_rule('category/([^/]+)/?$','index.php?pagename=$matches[1]','top');
//add_rewrite_rule('category/([^/]+)/([^/]+)/?$','index.php?pagename=$matches[1]/$matches[2]','top');
//add_rewrite_rule('category/([^/]+)/([^/]+)/([^/]+)/?$','index.php?pagename=$matches[1]/$matches[2]/$matches[3]','top');
//add_rewrite_rule('category/([^/]+)/([^/]+)/([^/]+)/([^/]+)/?$','index.php?pagename=$matches[1]/$matches[2]/$matches[3]/$matches[4]','top');
//add_rewrite_rule('category/([^/]+)/page/?([0-9]{1,})/?$','index.php?pagename=$matches[1]&paged=$matches[2]','top');
//add_rewrite_rule('category/([^/]+)/([^/]+)/page/?([0-9]{1,})/?$','index.php?pagename=$matches[2]&paged=$matches[3]','top');
//add_rewrite_rule('category/([^/]+)/([^/]+)/([^/]+)/page/?([0-9]{1,})/?$','index.php?pagename=$matches[3]&paged=$matches[4]','top');
flush_rewrite_rules() ;
}
   
add_action( 'init', 'register_products_type' );

//function productsLanguage($url, $post) {
//    global $polylang;
//    if ( $post->post_type == 'products'){
//        // Get language of a post
//        $postLang = $polylang->get_post_language($post->ID)->slug;
//        if ($postLang!='en') {
//            return str_replace('lgreco.eu/product','lgreco.eu/products-' . $postLang,$url);
//        }
//    }
//    return $url;
//}

//add_filter('post_type_link', 'productsLanguage', 10, 2);

// http://premium.wpmudev.org/blog/easy-guide-to-displaying-custom-post-types-in-your-wordpress-theme/
// Don't forget to add the wpml-config to enable translation for custom type

// shortcodes

// wines
// Color/Aromas/ Taste 

 function getwinediv($type, $content){
    $output = '<div class="wineproperty ' . $type . ' row">';
    $output .= '<div class="col-xs-2 propertyImage">&nbsp;</div>';
    $output .= '<div class="col-xs-10">' . $content . '</div>';
    $output .= '</div>';
    return $output;
}

function winecolor( $atts, $content = null ) {
    return getwinediv('color',$content);
}

add_shortcode('winecolor', 'winecolor'); 

function winearomas( $atts, $content = null ) {
    return getwinediv('aromas',$content);
}

add_shortcode('winearomas', 'winearomas'); 

function winetaste( $atts, $content = null ) {
    return getwinediv('taste',$content);
}

add_shortcode('winetaste', 'winetaste'); 


// enqueue javascript
function lgreco_scripts(){
    
    wp_register_script( 'lgrecoscripts', 
      get_template_directory_uri() . '/library/lgrecoscripts.js', 
      array('jquery'), 
'1.2' );
    
    wp_register_script( 'lightbox', 
     get_template_directory_uri() . '/library/lightbox/lightbox-2.6.js', 
     array('jquery'), 
'1.2' );
    
    wp_register_style( 'lightbox', get_template_directory_uri() . '/library/lightbox/lightbox.css', array(), '2.6', 'all' );
    wp_enqueue_style( 'lightbox' );
    
wp_enqueue_script('lightbox');    
    wp_enqueue_script('lgrecoscripts');
    
}
add_action( 'wp_enqueue_scripts', 'lgreco_scripts' );

add_filter( 'post_thumbnail_html', 'my_lightbox_image_html', 10, 3 );

function my_lightbox_image_html( $html, $post_id, $post_image_id ) {
    if  (!empty($html)){
        $html = '<a href="' . wp_get_attachment_image_src( $post_image_id, 'full' )[0] . '" data-lightbox="postImage" title="' . esc_attr( get_the_title( $post_id ) ) . '" class="zoomImage">' . $html . '</a>';
    }
    return $html;

}


function remove_footer_admin () {
    echo '<span id="footer-thankyou">Customization by <a href="http://thinkit.gr" target="_blank">Think IT</a></span>.&nbsp;';
}
add_filter('admin_footer_text', 'remove_footer_admin');

//add_action('admin_head', 'updateStyles');
//// Check icons at http://melchoyce.github.io/dashicons/
//function updateStyles() {
//    echo '<style>
//    body, td, textarea, input, select {
//      font-family: "Lucida Grande";
//      font-size: 12px;
//    } 
//  </style>';
//}

function getBreadcrumb($post){
    $output = '';
    $cpost = $post;
    $pid = $cpost->post_parent;
    while ($pid>0){
        $cpost = get_post($pid);
        $output = '<a href="' . get_permalink($pid) .'">' . $cpost->post_title . '</a> &gt; ' . $output;
        $pid = $cpost->post_parent;
    }
    echo $output . $post->post_title;
}

// Flash cache dashboard
function clear_cache_dashboard_widget() {

	wp_add_dashboard_widget(
                 'actions_widget',         // Widget slug.
                 'Usefull actions',         // Title.
                 'actions_widget_function' // Display function.
        );	
}
add_action( 'wp_dashboard_setup', 'clear_cache_dashboard_widget' );

function actions_widget_function() {

echo '<a href="options-general.php?page=wpsupercache&tab=contents">Cache</a><br/>
<a href="nav-menus.php">Menus</a><br/>
<a href="admin.php?page=metaslider">Slideshows</a>';
} 


?>