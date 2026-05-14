<?php

$banner_subtitle1 = get_field('banner_subtitle1');
$banner_subtitle2 = get_field('banner_subtitle2');

/* Array de los sliders */

$slides = [

    [
        'img' => get_field('banner1_img'),
        'title' => get_field('banner1_title'),
        'description' => get_field('banner_description1'),
        'button_text' => get_field('banner_button_text'),
        'button_link' => get_field('banner_button_link'),
    ],

    [
        'img' => get_field('banner2_img'),
        'title' => get_field('banner2_title'),
        'description' => get_field('banner2_description'),
        'button_text' => get_field('banner2_button_text'),
        'button_link' => get_field('banner2_button_link'),
    ],

    [
        'img' => get_field('banner3_img'),
        'title' => get_field('banner3_title'),
        'description' => get_field('banner3_description'),
        'button_text' => get_field('banner3_button_text'),
        'button_link' => get_field('banner3_button_link'),
    ]

];

?>

<div class="w-full h-auto bg-fondobanner rounded-tl-[6px] rounded-tr-[6px] overflow-hidden">

    <div
        class="flex flex-row border-b-2 border-colborder justify-between items-center p-2.5 md:pe-[17px] md:ps-[53px] md:py-[15px] md:px-[11px]">

        <div class="flex flex-row gap-[7.64px] items-center">

            <img src="<?php echo get_template_directory_uri(); ?>/assets/icon/icono-carrusel.svg" alt="icono carrusel"
                class="w-8">

            <?php if ($banner_subtitle1): ?>
                <p class="md:text-mediana text-base font-light font-secondary text-colborder">
                    <?php echo esc_html($banner_subtitle1); ?>
                </p>
            <?php endif; ?>


        </div>

        <?php if ($banner_subtitle2): ?>
            <p class="md:text-mediana text-base font-light font-secondary text-colborder">
                <?php echo esc_html($banner_subtitle2); ?>
            </p>
        <?php endif; ?>


    </div>


    <div class="relative overflow-hidden">


        <div id="carousel" class="flex transition-transform duration-700 ease-in-out">

            <?php foreach ($slides as $slide): ?>
                <?php if ($slide['img']): ?>
                    <div class="min-w-full">
                        <div class="grid grid-cols-1 md:grid-cols-[80%_20%] place-items-center">
                            <?php if ($slide): ?>
                                <img src="<?php echo esc_url($slide['img']['url']); ?>"
                                    alt="<?php echo esc_attr($slide['img']['alt']); ?>" class="w-full">
                            <?php endif; ?>

                            <div class="h-full flex flex-col gap-[12px] justify-between p-section md:pe-[15px] md:ps-[19px] md:pt-[93px] md:pb-[23px]">
                                <div class="flex flex-col gap-[12px]">
                                    <?php if ($slide): ?>
                                        <h3 class="text-normal font-semibold font-primary text-white">
                                            <?php echo esc_html($slide['title']); ?>
                                        </h3>
                                    <?php endif; ?>

                                    <?php if ($slide): ?>
                                        <p class="text-sm font-light font-primary text-white">
                                            <?php echo esc_html($slide['description']); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>

                                <div class="w-full flex justify-end">
                                    <?php if ($slide['button_text'] && $slide['button_link']): ?>
                                        <?php
                                        get_template_part(
                                            'template-parts/components/button',
                                            null,
                                            [
                                                'text' => $slide['button_text'],
                                                'link' => $slide['button_link'],
                                                'variant' => 'secondary'
                                            ]
                                        );
                                        ?>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<div class="flex justify-center items-center gap-[10px] pt-[18px] pb-[18px]">
    <?php foreach ($slides as $index => $slide): ?>
        <?php if ($slide['img']): ?>
            <button class="dot w-[10px] h-[10px] rounded-full transition-all duration-300
                <?php echo $index === 0
                    ? 'bg-white opacity-100'
                    : 'border border-white bg-transparent opacity-70'; ?>">
            </button>
       <?php endif; ?>
    <?php endforeach; ?>
</div>