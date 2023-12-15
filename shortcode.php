function custom_menu_shortcode($atts) {
  // Atribui o slug do seu menu a uma variável. Substitua 'meu-menu' pelo slug do seu menu.
  $menu_slug = 'meu-menu';

  // Aceita argumentos do shortcode.
  $atts = shortcode_atts(array(
    'menu' => $menu_slug,
    'container' => 'div', // ou 'nav'
    'container_class' => 'custom-menu-class', // classe CSS para o container
    'container_id' => 'custom-menu-id', // ID para o container
    'menu_class' => 'menu', // classe CSS para o menu
    'echo' => false // não imprime o menu diretamente
  ), $atts);

  // Retorna o menu.
  return wp_nav_menu($atts);
}
add_shortcode('exibir_menu', 'custom_menu_shortcode');
