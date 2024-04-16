Função para alterar o formato do link wp-admin no WordPress

Autor: Paulo Sergio (GitHub: https://github.com/Paulosxb)

Descrição:

Este código fornece uma função para o arquivo functions.php do WordPress que altera o formato padrão do link wp-admin para um formato mais seguro e personalizado.

Funcionalidades:

Altera o nome visível do link wp-admin para um nome de sua escolha (ex: sua-area-admin).
Mantém a funcionalidade original do painel de administração.
Contribui para a segurança do site, dificultando a adivinhação do URL de login.
Importante:

Backup: Crie um backup completo do seu tema e do banco de dados antes de realizar qualquer alteração.
Conhecimento em PHP: A edição do functions.php requer noções básicas de PHP.
Segurança: Utilize plugins de segurança dedicados ao WordPress, como Wordfence ou Sucuri Security.
Como usar:

Adicione o código ao functions.php:
Abra o arquivo functions.php do seu tema WordPress.
Copie e cole o código completo da função fornecida neste guia.
Substitua "sua-area-admin" pelo nome desejado para o link de administração.
Salve o arquivo functions.php.
Verifique a alteração:
Acesse o novo URL do seu painel de administração: [SEU_DOMÍNIO]/sua-area-admin.
Observações:

Este método altera apenas a URL visível, o caminho interno para o painel de administração ainda permanece wp-admin.
Consulte a documentação oficial do WordPress para mais informações sobre o functions.php: https://codex.wordpress.org/Functions_File_Explained
Contribuição:

Sinta-se à vontade para contribuir com sugestões, melhorias ou correções de bugs. Abra um issue no repositório GitHub: [URL inválido removido]

Agradecimentos:

Agradeço a todos que contribuíram para o desenvolvimento desta função.