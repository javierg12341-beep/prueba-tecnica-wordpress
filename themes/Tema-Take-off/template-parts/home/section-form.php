<?php

$title_form = get_field('title_form');
$title_active_form = get_field('title_active_form');
$img_form = get_field('img_form');
$contact_form = get_field('contact_form');
$pharse_form = get_field('pharse_form');
$form_button_text = get_field('form_button_text');
$form_button_link = get_field('form_button_link');

$title_form_gen = [
    'title' => $title_form,
    'active' => $title_active_form
];
?>

<section class="w-full relative px-section px-25px md:px-0 pt-[45px] md:pb-[300px] pt-[50px] md:pt-[145px]  overflow-hidden">
    
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/degradadoazul-3.png" alt="Degradado"
         class="w-[70%]  absolute top-[-12%] left-0  z-0 pointer-events-none">

    <div class="relative z-30 md:px-[100px] md:w-[889px] px-[20px] md:px-0 w-full mx-auto bg-fondo shadow-[-6px_6px_26px_0px_#0F1317] pt-[47px] pb-[83px] flex flex-col items-center gap-[41px]">

        <?php if (!empty($title_form_gen['title']) || !empty($title_form_gen['active'])): ?>

            <h2 class="font-primary text-mediana md:text-[32px] font-bold">
                <span class="text-white">
                    <?php echo nl2br(esc_html($title_form_gen['title'])); ?>
                </span>
                <span class="text-colsecundary">
                    <?php echo nl2br(esc_html($title_form_gen['active'])); ?>
                </span>
            </h2>

        <?php endif; ?>
        
        <?php get_template_part('template-parts/global/form'); ?>

        <hr class="w-full h-[1px] bg-[#F2F2F2] shadow-[-6px_6px_26px_0px_#ffff] border-0">
        
        <div class="w-full grid grid-cols-1 md:grid-cols-[40%_60%] gap-[20px] justify-center items-center">
            <div>
                <?php if ($img_form): ?>
                    <img src="<?php echo esc_url($img_form['url']); ?>" alt="<?php echo esc_attr($img_form['alt']); ?>"
                        class="w-full md:w-[561px] mx-auto relative">
                <?php endif; ?>
            </div>
            <div class="w-full flex flex-col gap-[25px]">
                <?php if ($contact_form): ?>
                    <p class=" text-normal md:text-mediana font-normal font-secondary text-white">
                        <?php echo esc_html($contact_form); ?>
                    </p>
                <?php endif; ?>
                <?php if ($pharse_form): ?>
                    <h3 class=" relative md:left-[15px] text-normal md:text-mediana font-semibold font-secondary bg-gradient-to-r from-[#49C6F3] to-[#F89485] bg-clip-text text-transparent leading-10">
                        <?php echo esc_html($pharse_form); ?>
                    </h3>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="w-full flex justify-center items-center">
            <?php if ($form_button_text && $form_button_link): ?>
                <?php
                get_template_part(
                    'template-parts/components/button',
                    null,
                    [
                        'text' => $form_button_text,
                        'link' => $form_button_link,
                        'variant' => 'primary'
                    ]
                );
                ?>
            <?php endif; ?>
        </div>
    </div>
</section>