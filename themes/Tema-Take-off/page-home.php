<?php
/*
Template Name: TEMA-TAKE-OFF Home
*/
get_header();
?>

<section class="w-full h-auto bg-fondo">
    <div
        class="min-h-screen bg-cover bg-top bg-no-repeat bg-[linear-gradient(180deg,transparent_70%,#232A33_100%),linear-gradient(90deg,#232A33_0%,transparent_100%),url('../img/image-background-section-hero.png')]">
        <?php get_template_part('template-parts/home/section-hero'); ?>
        <?php get_template_part('template-parts/home/section-b2b'); ?>
        <?php get_template_part('template-parts/home/section-route-time'); ?>
    </div>
    <?php get_template_part('template-parts/home/section-momentum'); ?>
    <?php get_template_part('template-parts/home/section-carousel'); ?>
    <?php get_template_part('template-parts/home/section-tabs'); ?>
    <?php get_template_part('template-parts/home/section-with-you'); ?>
    <?php get_template_part('template-parts/home/section-sales-marketing'); ?>
    <?php get_template_part('template-parts/home/section-feeling-lost'); ?>
    <?php get_template_part('template-parts/home/section-form'); ?>
    <?php
    get_footer();
    ?>
</section>