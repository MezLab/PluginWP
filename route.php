<?php

/**
 * Menu Principale
 * ROUTE: File
 */

add_action('admin_menu', 'page_index');

function page_index()
{
    add_menu_page(
        'WPackage', // Page Title
        'WPackage', // Menu Title
        'manage_options', // Capability
        'wpackage_dashboard', // Menu Slug
        'view_page_index', // Callback
        PLUGIN_URL . 'Media/cube_min.png', // Icon URL
        5 // Position
    );
}

function view_page_index()
{
    wpmez_views('view.index');
}


// <>-<>-<>-<>-<>-<>-<>-<>-<>-<>-<>-<>- //

/**
 * Pagina dedicata all'aggiornamento
 * del plugin, quali tematiche di
 * aggiornamento, eliminazione o archiviazione
 */

add_action('admin_menu', 'page_setting');

function page_setting()
{
    add_submenu_page(
        'wpackage_dashboard',
        'opzioni',
        'opzioni',
        'manage_options', // Capability
        'wpackage_settings', // Menu Slug
        'view_page_settings', // Callback
    );
}

function view_page_settings()
{
    wpmez_views('view.settings');
}


// <>-<>-<>-<>-<>-<>-<>-<>-<>-<>-<>-<>- //

/**
 * (App)
 */



// <>-<>-<>-<>-<>-<>-<>-<>-<>-<>-<>-<>- //
