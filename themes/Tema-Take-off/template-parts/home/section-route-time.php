<?php
$vuelo_titulo = get_field('vuelo_titulo');
$vuelos_texto = get_field('airplane_title_text');

if ($vuelos_texto):
    $filas = explode("\n", str_replace("\r", "", $vuelos_texto));
?>

<section class="w-full text-white overflow-hidden px-section">

    <div class="w-full overflow-x-auto">
        <div class="min-w-[400px] max-w-[800px] mx-auto">

       
            <div class="flex items-center justify-between mb-4">

              
                <div class="flex items-center gap-2 md:gap-[18px]">

                    <img 
                        src="<?php echo get_template_directory_uri(); ?>/assets/icon/Icono-avion.svg" 
                        alt="Icono avión"
                        class="w-5 h-5 md:w-6 md:h-6 object-contain"
                    >

                    <h2 class="uppercase font-primary font-bold tracking-widest text-sm md:text-lg text-white">
                        <?php echo esc_html($vuelo_titulo); ?>
                    </h2>

                </div>

            </div>

            <!-- Títulos -->
            <div class="grid grid-cols-[70px_280px_55px] md:grid-cols-[140px_520px_120px] gap-2 md:gap-4 mb-4">
                <span class="text-coltitle font-primary font-bold text-sm md:text-lg tracking-wide">
                    Time
                </span>

                <span class="text-coltitle font-primary font-bold text-sm md:text-lg tracking-wider">
                    Destination
                </span>

                <span class="text-coltitle font-primary font-bold text-sm md:text-lg tracking-wider">
                    Gate
                </span>
            </div>

            <!-- Filas -->
            <div class="flex flex-col gap-3">

                <?php foreach ($filas as $fila):

                    if (empty(trim($fila))) continue;

                    $datos = explode('|', $fila);

                    $hora = trim($datos[0] ?? '');
                    $dest = trim($datos[1] ?? '');
                    $puerta = trim($datos[2] ?? '');
                ?>

                <div class="grid grid-cols-[70px_280px_55px] md:grid-cols-[140px_520px_120px] gap-2 md:gap-4 items-center">

                    <!-- Hora -->
                    <div class="flex gap-[2px] md:gap-[3px] overflow-hidden">

                        <?php foreach (str_split($hora) as $char): ?>

                            <div
                                class="split-flap font-secondary text-colflap text-split-repflap md:text-split-flap font-medium"
                                data-final="<?php echo htmlspecialchars($char); ?>">

                                <div class="sf-top-static"><span>&nbsp;</span></div>
                                <div class="sf-bottom-static"><span>&nbsp;</span></div>
                                <div class="sf-top-flip"><span>&nbsp;</span></div>
                                <div class="sf-bottom-flip"><span>&nbsp;</span></div>

                            </div>

                        <?php endforeach; ?>

                    </div>

                    <!-- Destino -->
                    <div class="flex gap-[2px] md:gap-[3px] overflow-hidden">

                        <?php
                        $texto_destino = strtoupper($dest);
                        $max_espacios = 15;

                        $chars_dest = str_split($texto_destino);
                        $total_chars = count($chars_dest);

                        foreach ($chars_dest as $char):
                        ?>

                            <div
                                class="split-flap font-secondary text-colflap text-split-repflap md:text-split-flap font-medium"
                                data-final="<?php echo ($char !== ' ') ? htmlspecialchars($char) : ' '; ?>">

                                <div class="sf-top-static"><span>&nbsp;</span></div>
                                <div class="sf-bottom-static"><span>&nbsp;</span></div>
                                <div class="sf-top-flip"><span>&nbsp;</span></div>
                                <div class="sf-bottom-flip"><span>&nbsp;</span></div>

                            </div>

                        <?php endforeach; ?>

                        <?php for ($i = $total_chars; $i < $max_espacios; $i++): ?>

                            <div
                                class="split-flap font-secondary text-colflap text-split-repflap md:text-split-flap font-medium"
                                data-final=" ">

                                <div class="sf-top-static"><span>&nbsp;</span></div>
                                <div class="sf-bottom-static"><span>&nbsp;</span></div>
                                <div class="sf-top-flip"><span>&nbsp;</span></div>
                                <div class="sf-bottom-flip"><span>&nbsp;</span></div>

                            </div>

                        <?php endfor; ?>

                    </div>

                    <!-- Puerta -->
                    <div class="flex gap-[2px] md:gap-[3px]">

                        <?php foreach (str_split($puerta) as $char): ?>

                            <div
                                class="split-flap font-secondary text-colflap text-split-repflap md:text-split-flap font-medium"
                                data-final="<?php echo htmlspecialchars($char); ?>">

                                <div class="sf-top-static"><span>&nbsp;</span></div>
                                <div class="sf-bottom-static"><span>&nbsp;</span></div>
                                <div class="sf-top-flip"><span>&nbsp;</span></div>
                                <div class="sf-bottom-flip"><span>&nbsp;</span></div>

                            </div>

                        <?php endforeach; ?>

                    </div>

                </div>

                <?php endforeach; ?>

            </div>

        </div>
    </div>

</section>

<?php endif; ?>