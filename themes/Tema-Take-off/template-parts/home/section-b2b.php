<?php

$title_text_b2b = get_field('b2b_title_text');
$paragraph_text_b2b = get_field('b2b_text');
$button_text_b2b = get_field('b2b_button_text');
$button_link_b2b = get_field('b2b_button_link');

?>

<section class="w-full flex justify-center px-[0] md:px-[25px] pb-[108px] px-[25px]">
    <div class="w-full max-w-[800px] flex flex-col items-start gap-[35px]">

        <div class="flex flex-col items-start gap-[13px] max-w-[800px]">
            <?php if ($title_text_b2b): ?>
                <h2 class="font-bold text-[2.5rem] md:text-[3.125rem] font-family-primary text-white leading-tight text-left">
                    <?php echo esc_html($title_text_b2b); ?>
                </h2>
            <?php endif; ?>

            <?php if ($paragraph_text_b2b): ?>
                <h3 class="font-medium text-xl font-family-primary text-white text-left leading-relaxed max-w-[750px]">
                    <?php echo nl2br(esc_html($paragraph_text_b2b)); ?>
                </h3>
            <?php endif; ?>
        </div>

        <?php if ($button_text_b2b && $button_link_b2b): ?>
            <div class="flex justify-start">
                <?php
                get_template_part(
                    'template-parts/components/button',
                    null,
                    [
                        'text' => $button_text_b2b,
                        'link' => $button_link_b2b
                    ]
                );
                ?>
            </div>
        <?php endif; ?>

    </div>
</section>