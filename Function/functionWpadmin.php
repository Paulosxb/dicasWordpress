function alterar_link_wp_admin() {
  // Definir o novo nome do link (sem o wp-admin)
  $novo_nome_link = 'sua-area-admin';

  // Função para gerar a nova URL
  function gerar_nova_url($path) {
    $dominio = get_site_url();
    return trailingslashit($dominio) . $novo_nome_link . '/' . $path;
  }

  // Substituir o filtro 'admin_url' para gerar a nova URL
  add_filter('admin_url', 'gerar_nova_url');

  // Substituir o filtro 'login_url' para gerar a nova URL de login
  add_filter('login_url', 'gerar_nova_url');
}

add_action('init', 'alterar_link_wp_admin');
