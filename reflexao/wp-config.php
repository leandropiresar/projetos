<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'reflexao');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Kaj>u3K#LntVwI(f!&fFS6C*y*t:gn(PdL{XW.@f3Pq$sG3{@$$att#]yo/N[EBP');
define('SECURE_AUTH_KEY',  '}oFoeIzBnRF/%b=/3wlZ+7gyIHT7NBS(gsGZL|zS=[ZWq_X)9E7Wx2dOC-OLvyLj');
define('LOGGED_IN_KEY',    't)>7D)NcoeZQ2ll#dU@2g5=U3s{>06Ajc-_:=Qw08Y52!a@.NlX=IVW7~ AJm7`q');
define('NONCE_KEY',        '-(I9MJFAVY8M +rsMN-%Gl@)& % a7}QB}s3u91ic-FT1pIkB{qX.FKHqYe[s=]y');
define('AUTH_SALT',        'tJ(oUwH}aa1N`fKan+-lm5JY-5.kR=)-m~jn!`/<RC[i*xSrtA2<sN3)-}+@f!Hi');
define('SECURE_AUTH_SALT', '$R}jDirHYPTzB+:DRrAU?M6_X-3j)Di83R`)X[f!F5ejN^^,u./WX$b<b6e>}63#');
define('LOGGED_IN_SALT',   'XWMZd}{ElmE:i!zv*=z.*y.D3/DrrlP`h+@qd0k9nZG>g`KZia->) 9i4w(4jC%T');
define('NONCE_SALT',       '0M>$R-)d@!rGg-[#u,0 %/-!,2#!%j:wK2>i,c?I:e$(eCJxfW`;5)be+):^o AE');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);
define(‘WP_MEMORY_LIMIT’, ‘264M’);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
