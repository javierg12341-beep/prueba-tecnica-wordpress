<?php
$withyou_title         = get_field('withyou_title');
$withyou_description   = get_field('withyou_description');
$timeline_titles_field    = get_field('timeline_titles');
$timeline_subtitles_field = get_field('timeline_subtitles');

function jumpseat_split_timeline($value) {
    if (is_array($value)) {
        return array_values(array_filter(array_map('trim', $value), fn($v) => $v !== ''));
    }
    $value = trim((string) $value);
    if ($value === '') {
        return [];
    }
    $items = preg_split('/\s*\|\s*|\r\n|\r|\n/', $value);
    return array_values(array_filter(array_map('trim', $items), fn($v) => $v !== ''));
}

$timeline_titles    = jumpseat_split_timeline($timeline_titles_field);
$timeline_subtitles = jumpseat_split_timeline($timeline_subtitles_field);
$timeline_count = max(count($timeline_titles), count($timeline_subtitles));
?>

<section class="relative w-full overflow-hidden py-[60px] md:py-[145px] px-section md:px-0 bg-[#1A1F26]">

    <h2 id="withyou-bg-title" class="absolute top-[13%] left-1/2 transform: translateX(-50%) whitespace-nowrap text-[70px] md:text-[200px] leading-none font-semibold font-secondary text-white/5 pointer-events-none select-none z-0">
        <span class="block -ml-[40px] md:-ml-[120px]">WITH</span>
        <span class="block ml-[30px] md:ml-[110px] -mt-[0.08em]">YOU</span>
    </h2>

     <img src="<?php echo get_template_directory_uri(); ?>/assets/img/degradadorosa.png" alt="Degradado"
        class="w-[70%] absolute left-[13%] top-[-8%] md:top-[-32%] ">

    <div class="relative z-10 flex flex-col items-center">

        <?php if ($withyou_title): ?>
            <h3 class="text-[32px] md:text-[50px] font-bold font-primary text-white text-center mb-4">
                <?php echo esc_html($withyou_title); ?>
            </h3>
        <?php endif; ?>

        <?php if ($withyou_description): ?>
            <div class="max-w-[650px] text-center mb-[80px]">
                <p class="text-sm md:text-mediana font-normal font-primary text-white/80">
                    <?php echo nl2br(esc_html($withyou_description)); ?>
                </p>
            </div>
        <?php endif; ?>

        <?php if ($timeline_count): ?>
            <!-- CONTENEDOR DE LA LÍNEA DE TIEMPO -->
            <div class="w-full max-w-[1000px] mx-auto relative px-0 md:px-10">
                
                <!-- 1. BLOQUE DE TEXTOS -->
                <div class="flex justify-between items-end mb-10 w-full relative">
                    <?php for ($i = 0; $i < $timeline_count; $i++): 
                        $title    = $timeline_titles[$i] ?? '';
                        $subtitle = $timeline_subtitles[$i] ?? '';
                        
                        $words = explode(' ', $subtitle, 2);
                        $first_word = $words[0] ?? '';
                        $rest_words = $words[1] ?? '';

                        $is_last = ($i === $timeline_count - 1);
                        $is_first = ($i === 0);
                    ?>
                        <div class="flex flex-col items-center text-center">
                            <!-- Título -->
                            <h4 class="text-[18px] md:text-[25px] font-bold font-primary mb-1 <?php echo $is_last ? 'bg-gradient-to-r from-[#49C6F3] to-[#F89485] bg-clip-text text-transparent' : 'text-white'; ?>">
                                <?php echo esc_html($title); ?>
                            </h4>

                            <!-- Subtítulo -->
                            <p class="text-ms md:text-mediana font-primary text-white whitespace-nowrap">
                                <span class="<?php echo $is_last ? 'bg-gradient-to-r from-[#49C6F3] to-[#F89485] bg-clip-text text-transparent font-bold' : 'text-colsecundary font-bold'; ?>">
                                    <?php echo esc_html($first_word); ?>
                                </span>
                                <span class="font-normal">
                                      <?php echo esc_html($rest_words); ?>
                                </span>
                            </p>
                        </div>
                    <?php endfor; ?>
                </div>

                <!-- LÍNEA Y PUNTOS (Punta a Punta) -->
                <div class="relative w-full flex items-center justify-center">
                    
                    <!-- El contenedor de los puntos define el inicio y fin de la línea -->
                    <div class="w-full flex justify-between items-center relative">
                        <div class="absolute left-0 right-0 h-[2px] bg-[#F89485] z-0"></div>

                        <?php for ($i = 0; $i < $timeline_count; $i++): ?>
                            <!-- Cada punto -->
                            <div class="w-[12px] h-[12px] rounded-full bg-[#F89485] border-2 border-[#1A1F26] z-10 shadow-sm"></div>
                        <?php endfor; ?>
                    </div>

                </div>

            </div>
        <?php endif; ?>

    </div>
</section>