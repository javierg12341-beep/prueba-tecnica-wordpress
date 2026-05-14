<?php
$feeling_title_grande = get_field('feeling_title_grande');
$feeling_title = get_field('feeling_title');
$feeling_title_action = get_field('feeling_title_action');
$feeling_img = get_field('feeling_img');
$feeling_title_des = get_field('feeling_title_des');
$feeling_description = get_field('feeling_description');
$feeling_button_text = get_field('feeling_button_text');
$feeling_button_link = get_field('feeling_button_link');

?>

<section class="relative w-full overflow-hidden py-[50px] md:py-[145px] px-section md:px-0">

    <?php if ($feeling_title_grande): ?>
        <h2 id="feeling-bg-title"
            class="absolute top-[6%] left-0 whitespace-nowrap text-[70px] md:text-[250px] leading-none font-semibold font-primary text-white/10 pointer-events-none select-none z-0 will-change-transform">
            <?php echo esc_html($feeling_title_grande); ?>
        </h2>
    <?php endif; ?>

    <div class="relative z-10 flex flex-col">
        <div class="w-full flex flex-col justify-center items-center">

            <?php if ($feeling_title): ?>
                <h3 class="text-2xl md:text-[7.5rem] font-bold font-primary text-white">
                    <?php echo esc_html($feeling_title); ?>
                </h3>
            <?php endif; ?>

        </div>

        <div class="w-full">
            <?php if ($feeling_title_action): ?>
                <h3
                    class=" relative left-[5%] md:left-[9%] top-0 md:top-[-25px] text-2xl md:text-[4.6875rem] font-bold font-primary text-colsecundary">
                    <?php echo esc_html($feeling_title_action); ?>
                </h3>
            <?php endif; ?>
        </div>

        <div class=" w-full grid grid-cols-1 md:grid-cols-[49%_51%] gap-[45px] md:gap-[60px] ps-0 md:pe-[148px]">

            <div>
                <?php if ($feeling_img): ?>
                    <img src="<?php echo esc_url($feeling_img['url']); ?>"
                        alt="<?php echo esc_attr($feeling_img['alt']); ?>" class="w-full mx-auto">
                <?php endif; ?>
            </div>
            <div class="w-full flex flex-col justify-start items-start gap-[37px]">
                <div class="w-full flex flex-col gap-4 md:pt-[29px]">
                    <?php if ($feeling_title_des): ?>
                        <h3 class=" text-normal md:text-[2.25rem] font-semibold font-primary text-white leading-10">
                            <?php echo esc_html($feeling_title_des); ?>
                        </h3>
                    <?php endif; ?>

                    <?php if ($feeling_description): ?>
                        <p class=" text-normal md:text-sm font-normal font-primary text-white">
                            <?php echo esc_html($feeling_description); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <?php if ($feeling_button_text && $feeling_button_link): ?>
                    <?php
                    get_template_part(
                        'template-parts/components/button',
                        null,
                        [
                            'text' => $feeling_button_text,
                            'link' => $feeling_button_link,
                            'variant' => 'primary'
                        ]
                    );
                    ?>
                <?php endif; ?>

            </div>

        </div>

    </div>

</section>