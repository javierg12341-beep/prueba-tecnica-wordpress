<?php wp_footer(); ?>

<?php

$footer_logo = get_field('footer_logo');
$footer_social1 = get_field('footer_social1');
$footer_title = get_field('footer_title');
$footer_address = get_field('footer_address');
$footer_logo2 = get_field('footer_logo2');


?>

<footer class="grid grid-cols-1 md:grid-cols-[50%_50%] h-auto px-section md:px-[65px] py-[76px] gap-[20px] md:gap-0">
    <div class="grid grid-cols-1 md:grid-cols-[20%_15%_30%_35%] w-full gap-[20px] justify-center md:justify-start">
        <div class="flex flex-col md:justify-start items-center">
             <?php if ($footer_logo): ?>
                <img src="<?php echo esc_url($footer_logo['url']); ?>" alt="<?php echo esc_attr($footer_logo['alt']); ?>"
                    class="w-[101px]">
            <?php endif; ?>
        </div>
        <div class="flex md:items-start justify-center">
            <?php if ($footer_social1): ?>
                <img src="<?php echo esc_url($footer_social1['url']); ?>" alt="<?php echo esc_attr($footer_social1['alt']); ?>"
                    class="w-[37px] h-auto object-contain">
            <?php endif; ?>
        </div>
        <div class="flex flex-col md:items-start items-center">
            <h3 class=" text-[12px] font-family font-bold text-colsecundary">
                <?php echo esc_html($footer_title); ?>
            </h3>
            <p class=" font-medium font-primary text-[10px] text-white">
                <?php echo esc_html($footer_address); ?>
            </p>
        </div>
        <div>
            <!-- MENU -->
            <nav class=" bg-transparent ">

                <?php
                wp_nav_menu([
                    'theme_location' => 'main-menu',
                    'container' => '',
                    'menu_class' => '
                    flex
                    flex-col
                    gap-[10px]
                    text-colsecundary
                    font-family 
                    text-[12px]
                    items-center
                    md:items-start
                ',
                ]);
                ?>

            </nav>

        </div>
    </div>

    <div class="flex md:justify-end justify-center">
        <?php if ($footer_logo2): ?>
            <img src="<?php echo esc_url($footer_logo2['url']); ?>" alt="<?php echo esc_attr($footer_logo2['alt']); ?>"
                class="w-[195px] h-auto object-contain">
        <?php endif; ?>
    </div>

</footer>
