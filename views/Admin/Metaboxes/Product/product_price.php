<div>
    <h3>
        قیمت محصول: &nbsp;
        <span id="span-price-product"><?php echo number_format($post_price) ?></span>
    </h3>
    <input type="text" name="product_price" value="<?php echo $post_price ?>" id="input-price-product">

    <script>
        const spanPriceProduct = document.getElementById('span-price-product');
        const inputPriceProduct = document.getElementById('input-price-product');

        inputPriceProduct.addEventListener('input', event => {
            let txtNumber = parseInt(event.target.value).toLocaleString();

            if(txtNumber === 'NaN') {
                event.target.value = 0
                txtNumber = 0;
            }

            spanPriceProduct.textContent = txtNumber;
        });
    </script>
</div>