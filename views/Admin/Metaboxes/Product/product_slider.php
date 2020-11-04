<div>
    <a href="#" class="add_slider_item">اضافه کردن آیتم</a>
</div>
<div class="slider_items_wrapper">
    <?php if(isset($post_slider_images) && $post_slider_images !== ''): ?>
        <?php
        foreach ($post_slider_images as $items) :
            ?>
            <div style="margin-top: 15px">
                <input type="text" name="sliders[]" value="<?php echo $items ?>"/>
                <a href="#" class="remove_slider_item">
                    <span class="dashicons dashicons-dismiss"></span>
                </a>
            </div>
        <? endforeach; ?>
    <?php endif; ?>
</div>

<script>
    const $ = jQuery;

    $(document).ready(function () {
        $('.add_slider_item').click(function (event) {
            event.preventDefault();

            const wrapper = $(".slider_items_wrapper");
            const newItem = `<div style="margin-top: 15px">
        <input type="text" name="sliders[]" />
        <a href="#" class="remove_slider_item">
            <span class="dashicons dashicons-dismiss"></span>
        </a>
    </div>`;

            wrapper.append(newItem);

        });

        $(document).on('click', '.remove_slider_item', function (event) {
            event.preventDefault();

            $(this).parent().slideUp(300);

            setTimeout(() => {
                $(this).parent().remove();
            }, 300);
        });
    });
</script>