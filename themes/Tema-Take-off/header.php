<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

</head>

<body <?php body_class(); ?>>

<?php
$settings = get_page_by_path('theme-settings');
$logo = $settings ? get_field('header_logo', $settings->ID) : null;
?>

<header class="absolute top-0 left-0 w-full z-50 py-6">

    <div class="max-w-[1440px] mx-auto px-[125px] flex items-center justify-between gap-2 md:gap-0">

        <!-- LOGO -->
        <a href="<?php echo home_url(); ?>">

            <?php if ($logo): ?>
                <img
                    src="<?php echo esc_url($logo['url']); ?>"
                    alt="<?php echo esc_attr($logo['alt']); ?>"
                    class="w-[101px] h-auto object-contain"
                >
            <?php endif; ?>

        </a>

        <!-- BOTÓN HAMBURGUESA -->
        <button id="button-menu" class="text-white text-3xl md:hidden">
            ☰
        </button>

        <!-- MENU -->
        <nav class="menu-container hidden md:block absolute md:static md:top-10 top-[80px] right-[20px] bg-[#111] md:bg-transparent p-5 md:p-0 rounded-[10px]">

            <?php
            wp_nav_menu([
                'theme_location' => 'main-menu',
                'container'      => '',
                'menu_class'     => '
                    menu
                    flex
                    flex-col
                    md:flex-row
                    gap-6
                    text-white
                    font-semibold
                    text-sm
                ',
            ]);
            ?>

        </nav>

    </div>

</header>

