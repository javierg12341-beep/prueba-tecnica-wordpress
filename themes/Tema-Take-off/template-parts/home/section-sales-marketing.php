<?php

$sales_title = get_field('sales_title');
$sales_description = get_field('sales_description');
$sales_button_text = get_field('sales_button_tex');
$sales_button_link = get_field('sales_button_link');
$sales_img = get_field('sales_img');

?>

<div class=" relative gap-7 bg-fondosection w-full h-auto p-6 pb-0 md:pt-[110px] md:pb-[120px] md:px-[90px] grid grid-cols-1 md:grid-cols-[70%_30%]  overflow-hidden">

    <div class=" flex flex-col gap-[34px]">

        <h2 class=" md:text-titulosgrandes text-mediana font-extrabold font-primary text-white w-[80%]">
            <?php echo esc_html($sales_title); ?>
        </h2>
        <div class=" flex flex-col gap-[34px] justify-start items-start ps-0 md:ps-[18px] w-full md:w-[45%]">
            <p class="text-white text-normal font-regular font-primary">
                <?php echo esc_html($sales_description); ?>
            </p>

            <?php if ($sales_button_text && $sales_button_link): ?>

                <?php
                get_template_part(
                    'template-parts/components/button',
                    null,
                    [
                        'text' => $sales_button_text,
                        'link' => $sales_button_link,
                        'variant' => 'primary'
                    ]
                );
                ?>

            <?php endif; ?>
        </div>
    </div>
    <div class="">
        <?php if ($sales_img): ?>
            <img id="img_sales" src="<?php echo esc_url($sales_img['url']); ?>" alt="<?php echo esc_attr($sales_img['alt']); ?>"
                  class="  md:absolute md:right-[-17%] md:bottom-0 contain-content">
        <?php endif; ?>
    </div>

</div>