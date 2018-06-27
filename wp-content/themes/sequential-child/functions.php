<?php
function my_theme_enqueue_styles() {

    $parent_style = 'sequential-style'; 

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// ------------ Overrides sequential_body_classes function --------------//

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to blogs without a sidebar
	if ( ! is_active_sidebar( 'sidebar-1' ) || is_post_type_archive( 'jetpack-testimonial' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of show-tagline to blogs depending on the theme options.
	if ( 1 == get_theme_mod( 'sequential_tagline' ) ) {
		$classes[] = 'show-tagline';
	}

	// Adds a class of full-width-layout to blogs depending on the page template.
	if ( is_page_template( 'page-templates/front-page.php' ) || is_page_template( 'page-templates/grid-page.php' ) || is_page_template( 'page-templates/full-width-page.php' ) || is_404() || is_post_type_archive( 'jetpack-testimonial' ) || is_page_template( 'templates/front.php' ) || is_page_template( 'templates/gallery.php' ) ) {
		$classes[] = 'full-width-layout';
	}

	// Adds a class of extra-spacing to blogs depending on the page template.
	if ( is_page_template( 'page-templates/grid-page.php' ) || is_page_template( 'page-templates/full-width-page.php' ) || is_404() ) {
		$classes[] = 'extra-spacing';
	}

	return $classes;
}
add_filter( 'body_class', 'body_classes' , 25);



// Renames add to cart button on product page
add_filter( 'add_to_cart_text', 'woo_custom_single_add_to_cart_text' );                // < 2.1
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_single_add_to_cart_text' );  // 2.1 +
  
function woo_custom_single_add_to_cart_text() {
  
    return __( 'Dodaj u korpu', 'woocommerce' );
  
}

// Renames add to cart button on shop page
add_filter( 'add_to_cart_text', 'woo_custom_product_add_to_cart_text' );            // < 2.1
add_filter( 'woocommerce_product_add_to_cart_text', 'woo_custom_product_add_to_cart_text' );  // 2.1 +
  
function woo_custom_product_add_to_cart_text() {
  
    return __( 'Dodaj u korpu', 'woocommerce' );
  
}

// Renames 
add_filter ( 'wc_add_to_cart_message', 'wc_add_to_cart_message_filter', 10, 2 );
function wc_add_to_cart_message_filter($message, $product_id = null) {
    $titles[] = get_the_title( $product_id );

    $titles = array_filter( $titles );
    $added_text = sprintf( _n( 'Proizvod %s je dodat u korpu.', 'Proizvod %s je dodat u korpu.', sizeof( $titles ), 'woocommerce' ), wc_format_list_of_items( $titles ) );

    $message = sprintf( '%s <a href="%s" class="button">%s</a>&nbsp;<a href="%s" class="button">%s</a>',
                    esc_html( $added_text ),
                    esc_url( wc_get_page_permalink( 'checkout' ) ),
                    esc_html__( 'Na kasu', 'woocommerce' ),
                    esc_url( wc_get_page_permalink( 'shop' ) ),
                    esc_html__( 'Nastavi kupovinu', 'woocommerce' ));

    return $message;
}



add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
	// First name edited
	$fields['billing']['billing_first_name']['label'] = 'Ime';
	$fields['billing']['billing_first_name']['placeholder'] = '';
	$fields['billing']['billing_first_name']['required'] = false;
	// Last name edited
	$fields['billing']['billing_last_name']['label'] = 'Prezime';
	$fields['billing']['billing_last_name']['placeholder'] = '';
	$fields['billing']['billing_last_name']['required'] = false;
	// Country field rename
	$fields['billing']['billing_country']['label'] = 'Država';
	//Removes state field
	unset($fields['billing']['billing_state']);
	// Phone field renamed
	$fields['billing']['billing_phone']['label'] = 'Telefon';
	// Email field edited
	$fields['billing']['billing_email']['label'] = 'E-mail';
	$fields['billing']['billing_email']['required'] = false;
	// Order comment edited
	$fields['order']['order_comments']['label'] = 'Napomena';
	$fields['order']['order_comments']['placeholder'] = 'Ovde možete napisati vašu napomenu ili zahtev.';

     return $fields;
}
// Other solution for checkout fields when the first one doesn't work (Woocommerce documentation)
add_filter( 'woocommerce_default_address_fields' , 'wpse_120741_wc_def_state_label' );
function wpse_120741_wc_def_state_label( $address_fields ) {
	$address_fields['address_1']['label'] = 'Adresa';
	$address_fields['address_1']['placeholder'] = '';
	$address_fields['address_1']['required'] = true;
	// Renames city field
	$address_fields['city']['label'] = 'Grad';
	$address_fields['city']['placeholder'] = '';
	// Renames postcode field
	$address_fields['postcode']['label'] = 'Poštanski broj';
	$address_fields['postcode']['placeholder'] = '';
	$address_fields['postcode']['required'] = false;
     return $address_fields;
}

// Renames Place Order button
add_filter( 'woocommerce_order_button_text', 'woo_custom_order_button_text' ); 

function woo_custom_order_button_text() {
    return __( 'Poruči', 'woocommerce' ); 
}
























?>