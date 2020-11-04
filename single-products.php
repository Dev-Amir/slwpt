<?php get_header(); ?>

<div class="main">
    <?php
    if(isset($_POST['add_to_cart'])) {
        $product_id = intval($_POST['product_id']);

        do_action('add_to_cart', $product_id);
    }
    ?>

    <?php get_template_part('views/partials/header');?>
    <?php get_template_part('views/partials/single_content'); ?>
</div>
<?php get_footer(); ?>
