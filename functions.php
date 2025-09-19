<?php
/**
 * Add CORS headers for development
 */
function laserred_add_cors_headers() {
    if (is_vite_development()) {
        header('Access-Control-Allow-Origin: http://localhost:3003');
        header('Access-Control-Allow-Methods: GET, OPTIONS');
        header('Access-Control-Allow-Credentials: true');
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
            header('Access-Control-Allow-Headers: ' . $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']);
        }
    }
}
add_action('init', 'laserred_add_cors_headers');

/**
 * Add type="module" to module scripts
 */
function laserred_script_module_type($tag, $handle, $src) {
    if (in_array($handle, ['vite', 'laserred-scripts'])) {
        return '<script type="module" src="' . esc_url($src) . '"></script>';
    }
    return $tag;
}
add_filter('script_loader_tag', 'laserred_script_module_type', 10, 3);

/**
 * Determines if we are in development mode by checking if Vite dev server is running
 */
function is_vite_development() {
    static $is_development = null;

    if ($is_development === null) {
        // Check if dev server is running by making a request to it
        $handle = curl_init('http://localhost:3003/@vite/client');
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_NOBODY, true);
        
        curl_exec($handle);
        $error = curl_errno($handle);
        curl_close($handle);

        $is_development = !$error;
    }

    return $is_development;
}

/**
 * Enqueue scripts and styles with Vite
 */
function laserred_enqueue_assets() {
    if (is_vite_development()) {
        // Add Vite client and module scripts
        add_action('wp_head', function () {
            echo '<script type="module" src="http://localhost:3003/@vite/client"></script>';
        });
        
        // Add main script
        add_action('wp_footer', function () {
            echo '<script type="module" src="http://localhost:3003/src/js/main.js"></script>';
        });
    } else {
        // Production - use built assets
        $manifest_path = get_template_directory() . '/dist/manifest.json';
        
        if (!file_exists($manifest_path)) {
            return;
        }

        $manifest = json_decode(file_get_contents($manifest_path), true);
        
        if (!isset($manifest['src/js/main.js'])) {
            return;
        }

        // Get the built JS file
        $js_file = $manifest['src/js/main.js']['file'];
        wp_enqueue_script('laserred-scripts', get_template_directory_uri() . '/dist/' . $js_file, [], null, true);

        // Get the built CSS file
        if (isset($manifest['src/js/main.js']['css']) && is_array($manifest['src/js/main.js']['css'])) {
            foreach($manifest['src/js/main.js']['css'] as $css_file) {
                wp_enqueue_style('laserred-styles', get_template_directory_uri() . '/dist/' . $css_file, [], null);
            }
        }
    }
}
add_action('wp_enqueue_scripts', 'laserred_enqueue_assets');
