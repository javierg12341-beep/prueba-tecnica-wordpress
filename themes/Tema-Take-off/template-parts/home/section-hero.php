<?php

$hero_img = get_field('hero_image');
$banner_text = get_field('hero_banner_text');
$button_text = get_field('hero_button_text');
$button_link = get_field('hero_button_link');

?>

<section class="w-full md:pt-[193px] pt-[93px] pb-[95px] overflow-hidden ">
    <div class="relative px-section">

        <img id="nube2" class="absolute opacity-90 -translate-y-1/2 top-[74%] left-[-10%] max-w-[50%] w-full z-50 md:left-[0] md:top-[58%]"
            src="<?php echo get_template_directory_uri(); ?>/assets/img/Nube-1.png" alt="Nube fondo">

        <img id="nube1" class="absolute opacity-90 -translate-y-1/2 right-[-5%] top-[17%] max-w-[47%] w-full z-0"
            src="<?php echo get_template_directory_uri(); ?>/assets/img/Nube-2.png" alt="Nube frente">

        <?php if ($hero_img): ?>
            <img src="<?php echo esc_url($hero_img['url']); ?>" alt="<?php echo esc_attr($hero_img['alt']); ?>"
                class="w-[561px] mx-auto relative">
        <?php endif; ?>

    </div>
    <div class="flex items-center justify-center flex-col gap-[29px] px-section">

        <?php if ($banner_text): ?>
            <h2 class="font-medium text-sm font-family-primary text-white text-center">
                <?php echo esc_html($banner_text); ?>
            </h2>
        <?php endif; ?>


        <?php if ($button_text && $button_link): ?>
            <?php
            get_template_part(
                'template-parts/components/button',
                null,
                [
                    'text' => $button_text,
                    'link' => $button_link,
                    'variant' => 'primary'
                ]
            );
            ?>
        <?php endif; ?>
    </div>
</section>