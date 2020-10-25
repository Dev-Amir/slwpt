<?php


class Products
{
    const PRICE_META_KEY = 'product_price';

    public static function price($product_id)
    {
        if(!$product_id) {
            return 0;
        }
        $product_price = get_post_meta($product_id, self::PRICE_META_KEY, true);

        if(intval($product_price) >= 1) {
            return Utility::persian_numbers(number_format(apply_filters(self::PRICE_META_KEY, $product_price)));
        }
    }

    public static function get_slider_images($product_id)
    {
        if(!$product_id){
            return 0;
        }

        $slider_images = get_post_meta($product_id, 'slider_images', false);


    }
}