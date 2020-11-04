<?php


class MetaBoxes {
	public static function register_product_price_meta_box() {
		add_meta_box(
			'product_price_meta_box',
			'قیمت محصول',
			'MetaBoxes::product_price_content_handler',
			'products'
		);
	}

	public static function product_price_content_handler( $post ) {
		$post_price = (int) get_post_meta( $post->ID, 'product_price', true);
        $post_price_with_discount = (int) get_post_meta( $post->ID, 'product_price_with_discount', true);

		include get_template_directory() . DIRECTORY_SEPARATOR . 'views/Admin/Metaboxes/Product/product_price.php';
	}

	public static function save_product_price($post_id) {
	    $errors = false;

	    if(isset($_POST['product_price']) && intval($_POST['product_price']) > 0) {
	        update_post_meta($post_id, 'product_price', intval($_POST['product_price']));

	        if(intval($_POST['product_price']) > 0) {
                update_post_meta($post_id, 'product_price_with_discount', intval($_POST['product_price_with_discount']));
            }

            return;
	    }

        $errors .= 'لطفا قیمت محصول را بدرستی وارد نمائید';

        update_option('my_admin_errors', $errors);
    }

    public static function validateInputs()
    {
        $errors = get_option('my_admin_errors');

        if($errors) {
            delete_option('my_admin_errors', $errors);

            echo '<div class="error"><p>' . $errors . '</p></div>';

        }
    }
}