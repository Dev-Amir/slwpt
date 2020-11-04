<?php


class Basket
{
    protected $items;

    public static function add($product_id, $count=1)
    {
        self::init_basket();

        if(self::exist($product_id)) {
            $_SESSION['basket']['item'][$product_id]['count'] += 1;
            return;
        }

        $product = Products::find($product_id);
        $get_images = Products::get_slider_images($product_id);

        $_SESSION['basket']['item'][$product_id] = [
            'title' => $product->post_title,
            'price' => Products::price($product_id),
            'image' => $get_images[0][0],
            'count' => $count
        ];
    }

    public static function remove($product_id)
    {
        if(self::exist($product_id)) {
            echo 'test';
            unset($_SESSION['basket']['item'][$product_id]);
        }
    }

    public static function update($product_id, $count)
    {
        if(self::exist($product_id)) {
            if(intval($count) == 0) {
                self::remove($product_id);
                return;
            }

            $_SESSION['basket']['item'][$product_id]['count'] = $count;
        }
    }

    public static function exist($product_id)
    {
        return isset($_SESSION['basket']['item'][$product_id]);
    }

    public static function init_basket()
    {
        if (!isset($_SESSION['basket'])) {
            $_SESSION['basket'] = [];
        }
    }

    public static function total_count()
    {
        if(isset($_SESSION['basket']['item']) && count($_SESSION['basket']['item'])) {
            return count($_SESSION['basket']['item']);
        }

        return 0;
    }

}