<div>
    <div>
        <h3>
            قیمت محصول: &nbsp;
            <span class="span-price"><?php echo number_format($post_price) ?></span>
        </h3>
        <input type="number" placeholder="قیمت محصول" name="product_price" value="<?php echo $post_price ?>" class="input-price">
    </div>
    <div style="margin-top: 15px;">
        <h3>
            قیمت همراه تخفیف:
            <span class="span-price"><?php echo number_format($post_price_with_discount) ?></span>
        </h3>
        <input type="number" name="product_price_with_discount" value="<?php echo $post_price_with_discount ?>" class="input-price">
    </div>

    <script>
        var $ = jQuery;

        $(document).ready(function() {
            const inputPriceProduct = $('.input-price');

            inputPriceProduct.keyup(function(event) {
                let txtNumber = parseInt(event.target.value).toLocaleString();

                if (txtNumber === 'NaN') {
                    event.target.value = 0
                    txtNumber = 0;
                }

                $(this).parent().find('.span-price').text(txtNumber);
            });
        })
    </script>
</div>