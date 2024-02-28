<?php
/**
 * Plugin Name: Meu Plugin de Redirecionamento
 * Description: Um plugin simples para redirecionar páginas após 5 segundos com um shortcode.
 * Version: 1.1
 * Author: Seu Nome
 */

// Hook para adicionar um menu ao painel de administração
add_action('admin_menu', 'mpd_adicionar_menu');

function mpd_adicionar_menu() {
    add_menu_page('Configuração de Redirecionamento', 'Redirecionamento', 'manage_options', 'config-redirecionamento', 'mpd_pagina_config', 'dashicons-admin-links');
}

// Função para renderizar a página de configuração
function mpd_pagina_config() {
    // Verificar se o usuário tem permissão
    if (!current_user_can('manage_options')) {
        wp_die(__('Você não tem permissão suficiente para acessar esta página.'));
    }

    // Salvar a URL se o formulário for submetido
    if (isset($_POST['mpd_url_redirecionamento'])) {
        $url = esc_url_raw($_POST['mpd_url_redirecionamento']);
        update_option('mpd_url_redirecionamento', $url);
        echo '<div id="message" class="updated fade"><p><strong>Configurações salvas.</strong></p></div>';
    }

    // Recuperar a URL atual do banco de dados
    $url_salva = get_option('mpd_url_redirecionamento', '');

    // Formulário para inserir a URL de redirecionamento
    echo '<div class="wrap">
        <h2>Configuração de Redirecionamento</h2>
        <form method="post" action="">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">URL de Redirecionamento:</th>
                    <td><input type="url" name="mpd_url_redirecionamento" value="' . esc_attr($url_salva) . '" class="regular-text" /></td>
                </tr>
            </table>
            <p class="submit">
                <input type="submit" class="button-primary" value="Salvar" />
            </p>
        </form>
    </div>';
}

// Shortcode para o redirecionamento
add_shortcode('meu_redirecionamento', 'mpd_shortcode_redirecionamento');

function mpd_shortcode_redirecionamento() {
    $url = get_option('mpd_url_redirecionamento', '');

    if (!empty($url)) {
        $script = '<script type="text/javascript">
                setTimeout(function() {
                    window.location.href = "' . esc_js($url) . '";
                }, 5000);
            </script>
            <p>Esta página será redirecionada em <span id="contagem">5</span> segundos.</p>
            <script type="text/javascript">
                var tempo = 5;
                var intervalo = setInterval(function() {
                    tempo--;
                    document.getElementById("contagem").textContent = tempo;
                    if (tempo <= 0) clearInterval(intervalo);
                }, 1000);
            </script>';

        return $script;
    }

    return '';
}

