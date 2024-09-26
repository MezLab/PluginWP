<?php


/**
 * Setting funzionalità varie
 */

// Controllo ruolo Administrator dell'utente
function wpmez_admin()
{
    if (!is_admin()) {
        wpmez_views('views/view.404');
        exit();
    };
}

function wpmez_app_route(string $app, string $type, string $page, $data = null)
{
    require PLUGIN_PATH . 'App/' . $app . '/' . $type . '/' . $page . '.php';
    return $data;
}

function wpmez_partials(string $page)
{
    require PLUGIN_PATH . 'views/partials/' . $page . '.php';
}

function wpmez_views(string $path, $data = null)
{
    require PLUGIN_PATH . 'views/' . $path . '.php';
    return $data;
}

function wpmez_only_alfa(string $string)
{
    $pattern = '/^[a-zA-Z0-9 ]+$/';
    if (preg_match($pattern, $string)) {
        return true;
    } else {
        return false;
    }
}

function wpmez_navigation_app()
{
    $path = PLUGIN_PATH . 'App/';
    $list_app = array_diff(scandir($path), array('..', '.', '.DS_Store'));

    $apps = array();

    foreach ($list_app as $key => $value) {
        $res = file_get_contents($path . '/' . $value . '/readme.json');
        array_push($apps, json_decode($res, TRUE));
    }

    return $apps;
}

// Controllo Date
function wpmez_compareDate(string $date)
{
    $bool = null;
    /** Variabili Iniziali */
    $Published = new DateTime("now");
    $DeadLine = new DateTime($date);

    $ggTotal = $Published->diff($DeadLine); // gg trascorsi dalla pubblicazione fino alla scadenza

    if ($Published > $DeadLine) {
        $bool = true;
    } else {
        $bool = false;
    }

    return [
        'scaduto' => $bool,
    ];
}

// Scrive un messaggio
function wpmez_text(string $text, string $class)
{
    '<p class="' . $class . '">' . $text . '</p>';
    return;
}

// Carica le classi
function wpmez_autoloader($class = [])
{
    for ($i = 0; $i < count($class); $i++) {
        require PLUGIN_PATH . "{$class[$i]}.php";
    }
}

// Dump & Die
function wpmez_dd($element)
{
    echo '<pre>';
    echo var_dump($element);
    echo '</pre>';

    die();
}

//-----------------------------------------------

/**
 * Setting CSS & JS Admin
 */

/**
 * Enqueue a script in the WordPress admin on edit.php.
 * @param int $hook Hook suffix for the current admin page.
 */

function wpdocs_admin_script()
{
    wp_enqueue_style('stylesheet', PLUGIN_URL . 'admin/css/style.css', array(), '2.6.8');
    // Register the script
    wp_enqueue_script('my-script', PLUGIN_URL . 'admin/js/script.js', array(), '1.6.2', false);

    // Carica lo script di Bootstrap
    wp_enqueue_script('popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js', array(), '2.11.8', true);

    // Carica lo script di Excel JS
    wp_enqueue_script('exceljs', 'https://cdnjs.cloudflare.com/ajax/libs/exceljs/4.4.0/exceljs.min.js', array(), '4.4.0', true);

    // Carica lo script di File Saver
    wp_enqueue_script('fileSaver', 'https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js', array(), '2.0.5', true);
}
add_action('admin_enqueue_scripts', 'wpdocs_admin_script');

//-----------------------------------------------


/**
 * Setting CSS & JS Public
 */

/**
 * Enqueue a script in the WordPress admin on edit.php.
 * @param int $hook Hook suffix for the current admin page.
 */

function wpdocs_public_script()
{
    // Carica lo stile del plugin
    wp_enqueue_style('style-ebike', PLUGIN_URL . 'App/Ebike/library/css/style.css', array(), '1.0.1');

}
add_action('wp_enqueue_scripts', 'wpdocs_public_script');
