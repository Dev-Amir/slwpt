<?php


class SliderMetaBox
{

    public static function register_product_slider_meta_box()
    {
        add_meta_box(
            'product_slider_meta_box',
            'گالری تصاویر',
            'SliderMetaBox::product_slider_handler',
            'products'
        );
    }

    public static function product_slider_handler( $post ) {
        $post_slider_images = get_post_meta( $post->ID, 'slider_images', true);

        include get_template_directory() . DIRECTORY_SEPARATOR . 'views/Admin/Metaboxes/Product/product_slider.php';
    }

    public static function save_product_slider($product_id)
    {
        $new_post_slider_images = array();

        if(isset($_POST['sliders']) && count($_POST['sliders']) > 0) {
            $new_post_slider_images = $_POST['sliders'];
        }

        update_post_meta($product_id, 'slider_images', $new_post_slider_images);
    }
    
}
