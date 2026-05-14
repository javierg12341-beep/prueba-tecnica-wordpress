<?php

/*  Tap1 */
$tab1_title = get_field('tab1_title');
$tab1_description = get_field('tab1_description');

/*  Tap2 */
$tab2_title = get_field('tab2_title');
$tab2_description = get_field('tab2_description');

/*  Tap3 */
$tab3_title = get_field('tab3_title');
$tab3_description = get_field('tab3_description');

/*  Tap4 */
$tab4_title = get_field('tab4_title');
$tab4_description = get_field('tab4_description');

/* Array de los tabs */

$tabs = [

    [
        'title' => $tab1_title,
        'description' => $tab1_description,
    ],

    [
        'title' => $tab2_title,
        'description' => $tab2_description,
    ],

    [
        'title' => $tab3_title,
        'description' => $tab3_description,
    ],

    [
        'title' => $tab4_title,
        'description' => $tab4_description,
    ]

];

?>

<div class="w-full">

    <?php foreach ($tabs as $index => $tab): ?>

        <div class="tab-item border-b border-white/20 transition-all duration-500 cursor-pointer">

            <div class="flex justify-between items-start gap-[20px] md:gap-[233px] pb-[86px]">

                <!-- CONTENIDO -->
                <div class="flex flex-col gap-[25px] w-full">

                    <!-- TITULO -->
                    <?php if ($tab): ?>
                        <h2
                            class="tab-title font-primary font-medium text-mediana  md:text-[40px] text-white transition-all duration-500">
                            <?php echo nl2br(esc_html($tab['title'])); ?>
                        </h2>
                    <?php endif; ?>

                    <!-- DESCRIPCION -->
                    <div class=" tab-content overflow-hidden max-h-0 transition-all duration-500 ">

                     <?php if ($tab): ?>
                        <p class=" tab-description text-colsecundary text-[14px] md:text-[18px] font-light max-w-[700px] ">
                            <?php echo esc_html($tab['description']); ?>
                        </p>
                    <?php endif; ?>   
                    </div>

                </div>

                <!-- FLECHA -->
                <div class="shrink-0 pt-[10px]">

                    <svg xmlns="http://www.w3.org/2000/svg" class=" tab-arrow w-[42px] text-white transition-all duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />

                    </svg>

                </div>

            </div>

        </div>

    <?php endforeach; ?>

</div>