<!--BLOCK TITLE-->
<h3 class="block-title">پرفروش</h3>
<!--PRODUCTS BLOCK-->
<div class="products list_carousel responsive">
    <?php
    $new_products = new WP_Query(array(
        'post_type' => 'products',
        'order' => 'DESC',
//        'orderby' => '',
        'meta_key' => Products::PRICE_META_KEY,
    ));
    ?>

    <ul id="productBestSale">
        <?php
        if ($new_products->have_posts()):
            ?>
            <?php
            while ($new_products->have_posts()): $new_products->the_post();
                ?>
                <?php $product_price = get_post_meta(get_the_ID(), 'product_price', true); ?>
                <li>
                    <a href="<?php echo get_permalink() ?>">
                        <div class="product fl">
                            <div class="product-new">
                            </div>
                            <div class="product-preview">
                                <img src="<?php Asset::image('products/1.jpg') ?>" alt="product">
                            </div>
                            <div class="product-info">
                                <h5>                                    <?php the_title() ?>
                                </h5>
                                <h4><span></span><?php echo Products::price(get_the_ID()); ?> تومان</h4>
                                <div class="button-box">
                                    <div>
                                        <i class="icon-shopping-cart"></i>
                                        <span>افزودن به سبد خرید</span>
                                    </div>
                                    <div>
                                        <i class="icon-refresh"></i>
                                    </div>
                                    <div>
                                        <i class="icon-heart"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="product-rating">
                                <div class="stars">
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star"></span>
                                </div>
                            </div>
                        </div>

                    </a>
                </li>
            <?php endwhile; ?>
        <?php
        else:
            ?>
            not post
        <?php endif; ?>
    </ul>
    <div class="clearfix">
    </div>
    <div class="carousel_nav">
        <a id="prev_productBestSale" class="prev" href="#">&lt;</a>
        <a id="next_productBestSale" class="next" href="#">&gt;</a>
    </div>
</div>
<!--/PRODUCTS BLOCK-->