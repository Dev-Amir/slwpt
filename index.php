<?php get_header(); ?>
<?php get_template_part('views/partials/header');?>
<div class="container clearfix">
	<?php get_template_part('views/partials/menu');?>
	<?php get_template_part('views/partials/slider');?>
    <div class="ruler">
    </div>
	<?php get_template_part('views/partials/bestsellers_products');?>
	<?php get_template_part('views/partials/banner_discount');?>
    <div class="clearfix">
    </div>
    <div class="span8 ml-0 fl">
	    <?php get_template_part('views/partials/new_products');?>
        <div class="ruler">
        </div>
	    <?php get_template_part('views/partials/special_products');?>
    </div>
	<?php get_template_part('views/partials/content_news');?>
</div>
<?php get_footer(); ?>
