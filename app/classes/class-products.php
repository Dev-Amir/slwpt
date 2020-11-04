<?php


class Products
{
    const PRICE_META_KEY = 'product_price';
    const PRICE_WITH_DISCOUNT_META_KEY = 'product_price_with_discount';

    public static function price($product_id, $isPersian=true)
    {
        if(!$product_id) {
            return 0;
        }
        $product_price = get_post_meta($product_id, self::PRICE_META_KEY, true);

        if(intval($product_price) >= 1) {
            if($isPersian) {
                return Utility::persian_numbers(number_format(apply_filters(self::PRICE_META_KEY, $product_price)));
            }

            return apply_filters(self::PRICE_META_KEY, $product_price);
        }
    }

    public static function price_with_discount($product_id, $is_persian=true)
    {
        if(!$product_id) {
            return 0;
        }
        $product_price = get_post_meta($product_id, self::PRICE_WITH_DISCOUNT_META_KEY, true);

        if(intval($product_price) >= 1) {
            if($is_persian) {
                return Utility::persian_numbers(number_format(apply_filters(self::PRICE_WITH_DISCOUNT_META_KEY, $product_price)));
            }

            return apply_filters(self::PRICE_WITH_DISCOUNT_META_KEY, $product_price);
        }
    }

    public static function get_slider_images($product_id)
    {
        if(!$product_id){
            return 0;
        }

        $slider_images = get_post_meta($product_id, 'slider_images', false);

        return $slider_images;
    }

    public static function   find($product_id)
    {
        $product = get_post($product_id);

        return $product;
    }
}