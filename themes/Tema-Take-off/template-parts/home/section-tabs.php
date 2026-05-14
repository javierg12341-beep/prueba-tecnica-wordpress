<?php
$agency_title_grande = get_field('agency_title_grande');
$agency_title = get_field('agency_title');
$agency_title_action = get_field('agency_title_action');
$agency_description = get_field('agency_description');
?>

<section class="relative w-full overflow-hidden px-[25px] md:px-[145px] py-[120px] md:py-[145px]">

    <?php if ($agency_title_grande): ?>

        <h2 id="agency-bg-title"
            class="absolute top-0 left-0 whitespace-nowrap text-[70px] md:text-[220px] leading-none font-semibold font-primary text-white/10 pointer-events-none select-none z-0 will-change-transform">
            <?php echo esc_html($agency_title_grande); ?>
        </h2>

    <?php endif; ?>

    <div class="relative z-10 flex flex-col">

        <div class="w-full flex flex-col">

            <?php if ($agency_title): ?>
                <h3 class="text-[24px] md:text-grande font-bold font-primary text-white">
                    <?php echo esc_html($agency_title); ?>
                </h3>
            <?php endif; ?>

            <?php if ($agency_title_action): ?>
                <h3
                    class=" relative left-[5%] md:left-[9%] top-0 md:top-[-25px] text-[24px] md:text-grande font-bold font-primary text-colsecundary">
                    <?php echo esc_html($agency_title_action); ?>
                </h3>
            <?php endif; ?>

        </div>

      
        <div class=" w-full grid grid-cols-1 md:grid-cols-[35%_65%] gap-[45px] md:gap-[85px] ps-0 md:ps-[34px]">

            <?php if ($agency_description): ?>
                <p class=" text-normal md:text-[24px] font-normal font-primary text-white">
                    <?php echo esc_html($agency_description); ?>
                </p>

            <?php endif; ?>

            <?php get_template_part('template-parts/components/accordion'); ?>

        </div>

    </div>

</section>