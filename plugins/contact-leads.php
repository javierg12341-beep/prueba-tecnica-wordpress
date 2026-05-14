<?php
/*
Plugin Name: Leads Manager
Description: Guarda formularios de contacto en una tabla personalizada y permite administrarlos desde WordPress.
Version: 1.0.0
Author: Alejandro Garzón
*/

if (!defined('ABSPATH')) {
    exit;
}

/* Nombre de la tabla*/

function table_form_team()
{
    global $wpdb;
    return $wpdb->prefix . 'contact_leads';
}

/* Crecación de la tabla*/

register_activation_hook(__FILE__, 'create_table');

function create_table()
{
    global $wpdb;

    $table_name = table_form_team();
    $charset_collate = $wpdb->get_charset_collate();

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';

    $sql = "CREATE TABLE $table_name (
        id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        first_name VARCHAR(120) NOT NULL,
        last_name VARCHAR(120) NOT NULL,
        title VARCHAR(180) NOT NULL,
        company VARCHAR(180) NOT NULL,
        message TEXT NOT NULL,
        status VARCHAR(30) NOT NULL DEFAULT 'pendiente',
        created_at DATETIME NOT NULL,
        updated_at DATETIME NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    dbDelta($sql);
}

/* Recibe el formulario desde el frontend */

add_action('wp_ajax_cl_submit_form', 'lm_handle_form');
add_action('wp_ajax_nopriv_cl_submit_form', 'lm_handle_form');

function lm_handle_form()
{

    if (
        !isset($_POST['cl_submit_nonce']) ||
        !wp_verify_nonce(
            sanitize_text_field(wp_unslash($_POST['cl_submit_nonce'])),
            'cl_submit_form_action'
        )
    ) {

        wp_send_json([
            'success' => false,
            'message' => 'Nonce inválido'
        ]);
    }

    $first_name = isset($_POST['first_name'])
        ? sanitize_text_field(wp_unslash($_POST['first_name']))
        : '';

    $last_name = isset($_POST['last_name'])
        ? sanitize_text_field(wp_unslash($_POST['last_name']))
        : '';

    $title = isset($_POST['title'])
        ? sanitize_text_field(wp_unslash($_POST['title']))
        : '';

    $company = isset($_POST['company'])
        ? sanitize_text_field(wp_unslash($_POST['company']))
        : '';

    $message = isset($_POST['message'])
        ? sanitize_textarea_field(wp_unslash($_POST['message']))
        : '';

    if (
        empty($first_name) ||
        empty($last_name) ||
        empty($title) ||
        empty($company) ||
        empty($message)
    ) {

        wp_send_json([
            'success' => false,
            'message' => 'Todos los campos son obligatorios'
        ]);
    }

    global $wpdb;

    $table_name = table_form_team();

    $now = current_time('mysql');

    $inserted = $wpdb->insert(
        $table_name,
        [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'title' => $title,
            'company' => $company,
            'message' => $message,
            'status' => 'pendiente',
            'created_at' => $now,
            'updated_at' => $now,
        ],
        [
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s'
        ]
    );

    if (!$inserted) {
        wp_send_json_error(['message' => 'Error guardando en base de datos']);
    }

    wp_send_json_success(['message' => 'Mensaje enviado correctamente']);
    wp_die(); 
}

/* Redieccionamiento del frontend */

function lm_redirect_back($status = 'success')
{

    $referer = wp_get_referer();

    if (!$referer) {
        $referer = home_url('/');
    }

    $url = add_query_arg(
        [
            'contact_status' => $status
        ],
        $referer
    );

    wp_safe_redirect($url);
    exit;
}

/* Menú del wordpress admin*/

add_action('admin_menu', 'lm_admin_menu');

function lm_admin_menu()
{

    add_menu_page(
        'Contact Leads',
        'Contact Leads',
        'manage_options',
        'lm-contact-leads',
        'lm_admin_page',
        'dashicons-email-alt',
        26
    );
}

/* Guardar edicion desde el wordpress*/

add_action('admin_post_lm_update_lead', 'lm_admin_update_lead');

function lm_admin_update_lead()
{

    if (!current_user_can('manage_options')) {
        wp_die('No autorizado');
    }

    if (
        !isset($_POST['lm_edit_nonce']) ||
        !wp_verify_nonce(
            sanitize_text_field(wp_unslash($_POST['lm_edit_nonce'])),
            'lm_edit_lead'
        )
    ) {
        wp_die('Nonce inválido');
    }

    $id = isset($_POST['lead_id']) ? absint($_POST['lead_id']) : 0;

    if (!$id) {
        wp_die('ID inválido');
    }

    $first_name = isset($_POST['first_name'])
        ? sanitize_text_field(wp_unslash($_POST['first_name']))
        : '';

    $last_name = isset($_POST['last_name'])
        ? sanitize_text_field(wp_unslash($_POST['last_name']))
        : '';

    $title = isset($_POST['title'])
        ? sanitize_text_field(wp_unslash($_POST['title']))
        : '';

    $company = isset($_POST['company'])
        ? sanitize_text_field(wp_unslash($_POST['company']))
        : '';

    $message = isset($_POST['message'])
        ? sanitize_textarea_field(wp_unslash($_POST['message']))
        : '';

    $status = isset($_POST['status'])
        ? sanitize_text_field(wp_unslash($_POST['status']))
        : 'pendiente';

    $allowed_status = ['pendiente', 'contactado', 'descartado'];

    if (!in_array($status, $allowed_status, true)) {
        $status = 'pendiente';
    }

    global $wpdb;
    $table_name = table_form_team();

    $wpdb->update(
        $table_name,
        [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'title' => $title,
            'company' => $company,
            'message' => $message,
            'status' => $status,
            'updated_at' => current_time('mysql'),
        ],
        ['id' => $id],
        ['%s', '%s', '%s', '%s', '%s', '%s', '%s'],
        ['%d']
    );

    wp_safe_redirect(
        admin_url('admin.php?page=lm-contact-leads&updated=1')
    );
    exit;
}

/*Eliminar usuario */

add_action('admin_post_lm_delete_lead', 'lm_admin_delete_lead');

function lm_admin_delete_lead()
{

    if (!current_user_can('manage_options')) {
        wp_die('No autorizado');
    }

    $id = isset($_GET['id']) ? absint($_GET['id']) : 0;

    if (!$id) {
        wp_die('ID inválido');
    }

    if (
        !isset($_GET['_wpnonce']) ||
        !wp_verify_nonce(
            sanitize_text_field(wp_unslash($_GET['_wpnonce'])),
            'lm_delete_' . $id
        )
    ) {
        wp_die('Nonce inválido');
    }

    global $wpdb;
    $table_name = table_form_team();

    $wpdb->delete(
        $table_name,
        ['id' => $id],
        ['%d']
    );

    wp_safe_redirect(
        admin_url('admin.php?page=lm-contact-leads&deleted=1')
    );
    exit;
}



function lm_admin_page()
{

    if (!current_user_can('manage_options')) {
        return;
    }

    global $wpdb;

    $table_name = table_form_team();

    $action = isset($_GET['action'])
        ? sanitize_text_field(wp_unslash($_GET['action']))
        : '';

    $id = isset($_GET['id'])
        ? absint($_GET['id'])
        : 0;

    echo '<div class="wrap">';
    echo '<h1>Contact Leads</h1>';

    if (isset($_GET['updated'])) {
        echo '<div class="notice notice-success is-dismissible"><p>Registro actualizado.</p></div>';
    }

    if (isset($_GET['deleted'])) {
        echo '<div class="notice notice-success is-dismissible"><p>Registro eliminado.</p></div>';
    }

    /*Tabla del formulario para editar campos*/

    if ($action === 'edit' && $id > 0) {

        $lead = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT * FROM $table_name WHERE id = %d",
                $id
            )
        );

        if (!$lead) {
            echo '<p>Registro no encontrado.</p>';
            echo '</div>';
            return;
        }

        ?>
        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>"
            style="max-width:900px;background:#fff;padding:20px;margin-top:20px;border:1px solid #ddd;">
            <input type="hidden" name="action" value="lm_update_lead">
            <?php wp_nonce_field('lm_edit_lead', 'lm_edit_nonce'); ?>

            <input type="hidden" name="lead_id" value="<?php echo esc_attr($lead->id); ?>">

            <table class="form-table">
                <tr>
                    <th><label>Nombre</label></th>
                    <td>
                        <input type="text" name="first_name" value="<?php echo esc_attr($lead->first_name); ?>"
                            class="regular-text" required>
                    </td>
                </tr>

                <tr>
                    <th><label>Apellido</label></th>
                    <td>
                        <input type="text" name="last_name" value="<?php echo esc_attr($lead->last_name); ?>"
                            class="regular-text" required>
                    </td>
                </tr>

                <tr>
                    <th><label>Title</label></th>
                    <td>
                        <input type="text" name="title" value="<?php echo esc_attr($lead->title); ?>" class="regular-text"
                            required>
                    </td>
                </tr>

                <tr>
                    <th><label>Company</label></th>
                    <td>
                        <input type="text" name="company" value="<?php echo esc_attr($lead->company); ?>" class="regular-text"
                            required>
                    </td>
                </tr>

                <tr>
                    <th><label>Mensaje</label></th>
                    <td>
                        <textarea name="message" rows="6" class="large-text"
                            required><?php echo esc_textarea($lead->message); ?></textarea>
                    </td>
                </tr>

                <tr>
                    <th><label>Estado</label></th>
                    <td>
                        <select name="status">
                            <option value="pendiente" <?php selected($lead->status, 'pendiente'); ?>>Pendiente</option>
                            <option value="contactado" <?php selected($lead->status, 'contactado'); ?>>Contactado</option>
                            <option value="descartado" <?php selected($lead->status, 'descartado'); ?>>Descartado</option>
                        </select>
                    </td>
                </tr>
            </table>

            <p>
                <button type="submit" class="button button-primary">
                    Guardar cambios
                </button>

                <a href="<?php echo esc_url(admin_url('admin.php?page=lm-contact-leads')); ?>" class="button">
                    Volver
                </a>
            </p>
        </form>
        <?php

        echo '</div>';
        return;
    }

    /* Crea un lsitado con todos los usuarios registrados*/

    $rows = $wpdb->get_results(
        "SELECT * FROM $table_name ORDER BY created_at DESC"
    );
    ?>

    <table class="widefat striped" style="margin-top:20px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Title</th>
                <th>Company</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php if ($rows): ?>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <td><?php echo esc_html($row->id); ?></td>
                        <td><?php echo esc_html($row->first_name . ' ' . $row->last_name); ?></td>
                        <td><?php echo esc_html($row->title); ?></td>
                        <td><?php echo esc_html($row->company); ?></td>
                        <td><strong><?php echo esc_html($row->status); ?></strong></td>
                        <td><?php echo esc_html($row->created_at); ?></td>
                        <td>
                            <a
                                href="<?php echo esc_url(admin_url('admin.php?page=lm-contact-leads&action=edit&id=' . $row->id)); ?>">
                                Editar
                            </a>
                            |
                            <a href="<?php echo esc_url(
                                wp_nonce_url(
                                    admin_url('admin-post.php?action=lm_delete_lead&id=' . $row->id),
                                    'lm_delete_' . $row->id
                                )
                            ); ?>" onclick="return confirm('¿Seguro que deseas eliminar este registro?')">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">No hay registros todavía.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php
    echo '</div>';
}