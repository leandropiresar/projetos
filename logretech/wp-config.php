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
define('DB_NAME', 'logretech');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'xA)D-$QY~nS7MA> ?dbnhv}zrdCf[I>xH}{=UDGt*:DaO^wy1Zn>Uv_ $P8Dvh+6');
define('SECURE_AUTH_KEY',  '68{-On$u:F3c%V?3p_2%K4#9%6swb%-YV^T/Ip<#5uio6XrF$HctKYfg** xSDCH');
define('LOGGED_IN_KEY',    'wL%>d8~Nnq*)|PrKu`jDRZ}${tfpa<4EqpAA%JGJE`E_b#/ppIm:AY>l#y.sfcTA');
define('NONCE_KEY',        '!DjfI{pG-?ChY{#$.06#3+LKb@;<BVL6_D8q[3I8zhNppJ<5@EOt|6lE]8F|#{C=');
define('AUTH_SALT',        'wb2!>U)}QtpzcW5us(o#Dbq&_vu!Q6qZ)$,wo2f(Yp2QvWxdxJpJ}9Wn&KAdC4UP');
define('SECURE_AUTH_SALT', 'K:i?PDQKAw5-6EG=s|$E;7T$^;>`#<ecxIN])O/vU[Gx.o7*-flrxopVFoCF s[{');
define('LOGGED_IN_SALT',   '7fqWE(y9<Anz4D)J6w e*ORbpuCKY^I!=!DiL9lo?inf@qO7RZj:AC)t41SnMhYt');
define('NONCE_SALT',       'e33*AHIk2%MN9|l5>||A]8zh$Dq2aeZtAQe<W5_p-8c|D.pJi+/@r{TSyRH`?sRs');

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
