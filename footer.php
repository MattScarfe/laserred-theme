<?php
$phone = get_field('company_tel', 'option');
$email = get_field('company_email', 'option');
$address = get_field('company_address', 'option');
if ($address) :
    $address_1 = $address['address_line_1'];
    $address_2 = $address['address_line_2'];
    $address_town = $address['address_town'];
    $address_county = $address['address_county'];
    $address_postcode = $address['address_postcode'];
endif;
?>

<footer class="w-full bg-dark-default text-white py-8">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-6 px-8">

        <div class="md:col-span-3">
            <?php if ($phone) : ?>
                <p class="text-3xl"><?php echo esc_html($phone); ?></p>
            <?php endif; ?>

            <?php if ($email) : ?>
                <p class="text-3xl"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
            <?php endif; ?>

            <p class="mt-4">
                <?php if ($address_1) : ?>
                    <?php echo esc_html($address_1); ?>,
                <?php endif; ?>
                <?php if ($address_2) : ?>
                    <?php echo esc_html($address_2); ?>,
                <?php endif; ?>
                <?php if ($address_town) : ?>
                    <?php echo esc_html($address_town); ?>,
                <?php endif; ?>
                <?php if ($address_county) : ?>
                    <?php echo esc_html($address_county); ?>,
                <?php endif; ?>
                <?php if ($address_postcode) : ?>
                    <?php echo esc_html($address_postcode); ?>
                <?php endif; ?>
            </p>

            <p class="text-sm text-gray-700">
                © <?php echo date("Y"); ?> <?php bloginfo('name'); ?>. All rights reserved.
            </p>
        </div>

        <div class="md:col-span-1">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'menu_class'     => 'flex flex-col space-y-2',
                'link_before' => '<span class="text-white text-small hover:text-purple-theme transition-colors duration-200">',
                'link_after' => '</span>'
            ));
            ?>
        </div>

    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>