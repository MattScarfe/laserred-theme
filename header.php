<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo( 'name' ); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="bg-white shadow-md py-4">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-gray-900 hover:text-red-600"><?php bloginfo( 'name' ); ?></a></h1>
        <p class="text-gray-600 mt-2"><?php bloginfo( 'description' ); ?></p>
    </div>
</header>
