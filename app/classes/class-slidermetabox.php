<?php


class SliderMetaBox
{

    public static function register_product_slider_meta_box()
    {
        add_meta_box(
            'product_price_meta_box',
            'قیمت محصول',
            'MetaBoxes::product_price_content_handler',
            'products'
        );
    }

    public static function product_price_content_handler( $post ) {
        $post_price = get_post_meta( $post->ID, '   ', true);

        include get_template_directory() . DIRECTORY_SEPARATOR . 'views/Admin/Metaboxes/Product/product_price.php';
    }

    public static function save_product_slider()
    {
        
    }
    
}