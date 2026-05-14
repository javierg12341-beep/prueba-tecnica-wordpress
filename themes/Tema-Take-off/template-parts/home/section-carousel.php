<?php
$carrousel_tittle = get_field('carrousel_tittle');
$carrousel_action = get_field('carrousel_action');
?>

<section class="w-full px-section md:px-[42px] pb-[98px]">
    <div class=" flex flex-row justify-between pb-[98px]">
        <div class=" flex flex-col">
            <h2 class="md:text-grande text-mediana text-bold font-primary text-white">
                <?php echo esc_html($carrousel_tittle); ?>
            </h2>
            <h2 class="md:text-grande text-mediana text-bold font-primary text-colsecundary ">
                <?php echo esc_html($carrousel_action); ?>
            </h2>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icon/Flecha-boton.svg" alt="flecha"
        class="w-[42px]">
    </div>
    <?php get_template_part('template-parts/components/carousel'); ?>
</section>