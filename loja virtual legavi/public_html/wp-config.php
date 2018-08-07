<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'legavi_loja');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'legavi_root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '123@legavi!');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'n<iRuB%0,8F[IPSK:m2(;0,U-+JT+fBBKN|,ro%kWQjqnwS>}<71}G;eM#J]hn]B');
define('SECURE_AUTH_KEY',  '^C#(k;~,z`p}pJ!Di(djcgNO_]4(`!FYQ+|ZUq8*gb6oZ)?lz)D_5rzIfy6hV(|.');
define('LOGGED_IN_KEY',    'J]?YuW>k*sdAr+zv=+ZtREWU4qUUFcF.UZbUJh8-BA#>owQi;-zb6#<mAWRz:8<:');
define('NONCE_KEY',        '0_wfT`4t![)*8VIO>1)[u0=e+gHmOUwnU]pHWWqE;z ^m,>4VPqlhb<D2g*{`$JF');
define('AUTH_SALT',        'v1iY7,~8)VAkV {4U(4v8{jI)7QYf^ 7TK:MDT4_rY=HRXiC5i=d!d~[L:/`iq0p');
define('SECURE_AUTH_SALT', 'I-^JM4M(ql+F&rudU*)wShAv/X-oc.v>H?IEydOEm`i505m$Znpt`N0fKZ>(!yd4');
define('LOGGED_IN_SALT',   'n48U4B+5$`w[P#vx`*a(>pcn>v+KCZC!d+ihFUJK]iArL8J6ucN,y2Et&5d.c$.t');
define('NONCE_SALT',       'F9V0W:[c]* 4RF,bX+lkBx5?2.^m_S]9|`8=-onF~w6YV<kw~`gai3&7Z+4J0}PC');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';


/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
