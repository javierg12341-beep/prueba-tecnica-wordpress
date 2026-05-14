<?php
$phrase_img = get_field('phrase_img');
$phrase_text = get_field('phrase_text');
$phrase_action= get_field('phrase_action');
$author_text = get_field('author_text');
$occupation_text = get_field('occupation_text');
?>

<section
    class="w-full relative px-section overflow-hidden flex flex-col items-center  justify-center md:pt-[198px] pt-[50px] md:pb-[338px] pb-[50px]">

    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/degradadoazul-2.png" alt="Degradado"
        class="w-[32%] absolute right-[65%] top-0">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/degradadorosa.png" alt="Degradado"
        class="w-[50%] absolute left-[-17%] ">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/degradadorosa.png" alt="Degradado"
        class="w-[50%] absolute right-[-22%] top-0">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/degradadoazul-2.png" alt="Degradado"
        class="w-[32%] absolute right-0 top-[30%]">

    <div class="w-full max-w-[800px] mx-auto flex flex-col gap-8 md:gap-[61px]">

        <div class="flex items-center justify-center">
            <?php if ($phrase_img): ?>
                <img src="<?php echo esc_url($phrase_img['url']); ?>" alt="<?php echo esc_attr($phrase_img['alt']); ?>"
                    class="w-[100px] md:w-[138px] h-auto">
            <?php endif; ?>
        </div>


        <div class="relative w-full">

            <span class="absolute -top-10 -left-6 md:-top-16 md:left-[-96px] 
                         text-[150px] md:text-[300px] leading-none 
                         font-light font-family-primary text-white opacity-20 md:opacity-50 select-none">
                “
            </span>

            <?php if ($phrase_text): ?>
                <h2
                    class="relative font-bold text-2x1 md:text-titulos font-family-primary text-white leading-tight md:leading-12 pt-6 md:pt-0">
                    <?php
                    echo wp_kses_post($phrase_text);
                    ?>
                </h2>
                <h2
                    class="relative font-bold text-[16px] md:text-titulos font-family-primary text-colsecundary leading-tight md:leading-12">
                    <?php
                    echo wp_kses_post($phrase_action);
                    ?>
                </h2>
            <?php endif; ?>
        </div>

        <div class="flex flex-col items-end text-right">
            <?php if ($author_text): ?>
                <p class="font-normal text-base md:text-lg font-family-primary text-white leading-relaxed max-w-[750px]">
                    <?php echo esc_html($author_text); ?>
                </p>
            <?php endif; ?>

            <?php if ($occupation_text): ?>
                <p class="font-normal text-sm md:text-md font-family-primary text-gray-400 leading-relaxed max-w-[750px]">
                    <?php echo esc_html($occupation_text); ?>
                </p>
            <?php endif; ?>
        </div>
    </div>
</section>