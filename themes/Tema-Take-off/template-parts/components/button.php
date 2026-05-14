<?php

$variant = $args['variant'] ?? 'primary';


$classes = [
   
    'primary'   => 'flex gap-1.5 flex-row items-center bg-transparent rounded-[8px] md:rounded-2xl border border-white hover:border-colsecundary text-white font-medium py-2 px-[10px] md:py-4 md:px-[25px] transition-all duration-300 hover:scale-105 hover:shadow-xl',
    
    'secondary' => 'flex flex-row items-center justify-between gap-4 border-b border-white pb-1 w-fit uppercase text-white text-[12px] font-secondary font-medium hover:opacity-80 transition-all duration-300',

    'dark'      => 'flex gap-1.5 flex-row items-center bg-primary text-white border border-primary hover:bg-white hover:text-primary py-2 px-[10px] rounded-[8px]',
];

$final_class = $classes[$variant] ?? $classes['primary'];
?>

<a 
    href="<?php echo esc_url($args['link']); ?>" 
    class="<?php echo esc_attr($final_class); ?>"
>
    <span>
        <?php echo esc_html($args['text']); ?>
    </span>

    <img
        src="<?php echo get_template_directory_uri(); ?>/assets/icon/Flecha-boton.svg"
        alt="Flecha"
        class="w-4 h-auto"
    >
</a>