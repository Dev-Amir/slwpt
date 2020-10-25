<?php


class PostTypes {
	public static function make_product_post_types(  ) {
		$labels = array(
			'name'                  => _x( 'محصولات', 'Post type general name', 'textdomain' ),
			'singular_name'         => _x( 'محصول', 'Post type singular name', 'textdomain' ),
			'menu_name'             => _x( 'محصولات', 'Admin Menu text', 'textdomain' ),
			'name_admin_bar'        => _x( 'محصول', 'Add New on Toolbar', 'textdomain' ),
			'add_new'               => __( 'اضافه کردن', 'textdomain' ),
			'add_new_item'          => __( 'اضافه کردن محصول', 'textdomain' ),
			'new_item'              => __( 'جدید محصول', 'textdomain' ),
			'edit_item'             => __( 'ویرایش محصول', 'textdomain' ),
			'view_item'             => __( 'نمایش محصول', 'textdomain' ),
			'all_items'             => __( 'همه محصولات', 'textdomain' ),
			'search_items'          => __( 'جستجوی محصولات', 'textdomain' ),
			'parent_item_colon'     => __( 'والد محصولات:', 'textdomain' ),
			'not_found'             => __( 'محصولی یافت نشد.', 'textdomain' ),
			'not_found_in_trash'    => __( 'محصولی در زباله دان یافت نشد', 'textdomain' ),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'product' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'menu_icon' => 'dashicons-products',
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		);

		register_post_type( 'products', $args );
	}

	public static function add_price_column($columns){
	    $columns['product_price'] = 'قیمت';

	    return $columns;
    }

    public static function show_price_column($column, $post_id)
    {
        if($column === 'product_price') {
            $product_price = get_post_meta($post_id, 'product_price', true);

            echo Utility::persian_numbers(number_format($product_price));
        }
    }
}