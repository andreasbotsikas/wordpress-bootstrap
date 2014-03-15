<?php

// Various string used as pll_e('the key'); or
// echo pll__('the key');
// 1st argument is the display name and the next one is the original text
   pll_register_string('Home Page Slider', 'SliderId');
   pll_register_string('Pager previous', '&larr; Previous');
   pll_register_string('Pager first', 'First');
   pll_register_string('Pager next', 'Next &rarr;');
   pll_register_string('Pager last', 'Last');
   pll_register_string('Search', 'Search');

// Image sizes
   add_image_size( 'lgreco-product', 210, 350, false);
   add_image_size( 'lgreco-product-list-item', 100, 150, false);
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
'show_ui' => true,
'capability_type' => 'post',
'hierarchical' => false,
'query_var' => true,
'rewrite' => array('slug' => 'products'),
'supports' => array('title','editor','thumbnail')
) );
register_taxonomy_for_object_type( 'category', 'products' );
add_rewrite_rule('products-el/page/?([0-9]{1,})/?$',
'index.php?pagename=products-el&paged=$matches[1]','top');
add_rewrite_rule('products/page/?([0-9]{1,})/?$',
'index.php?pagename=products&paged=$matches[1]','top');
add_rewrite_rule('products-el/([^/]+)/?$',
    'index.php?products=$matches[1]','top');
flush_rewrite_rules() ;
}
   
add_action( 'init', 'register_products_type' );

function productsLanguage($url, $post) {
    global $polylang;
    if ( $post->post_type == 'products'){
        // Get language of a post
        $postLang = $polylang->get_post_language($post->ID)->slug;
        if ($postLang!='en') {
            return str_replace('lgreco.eu/products','lgreco.eu/products-' . $postLang,$url);
        }
    }
    return $url;
}

add_filter('post_type_link', 'productsLanguage', 10, 2);

// http://premium.wpmudev.org/blog/easy-guide-to-displaying-custom-post-types-in-your-wordpress-theme/
// Don't forget to add the wpml-config to enable translation for custom type

// shortcodes

// wines
// Color/Aromas/ Taste 

 function getwinediv($type, $content){
    $output = '<div class="wineproperty ' . $type . ' row">';
    $output .= '<span class="col-xs-2"><img src="' . get_template_directory_uri() . '/images/wines/' . $type . '.png"/></span>';
    $output .= '<span class="col-xs-10">' . $content . '</p>';
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

?>