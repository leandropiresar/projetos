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
define('DB_NAME', 'wordpress4');

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
define('AUTH_KEY',         'U?-Zs?> X#r*l:%)-})Lmraansj&@7slX?1k8Mgawpl]}idP6gxRH@mZrEGQLJEC');
define('SECURE_AUTH_KEY',  'L?NZAxpau}+vc1:6zhYF;0+g,p9+9z}adxk81sm4NrGjOBlB:$xJZ#%d4W&XQ~,_');
define('LOGGED_IN_KEY',    'jT1afFsGxaG#HK8>/|fol[`qU-<jB,5sc=KZ=F|FmiZTV{R[o-a^tzf8Hjg+e0)@');
define('NONCE_KEY',        '+6zZZ|;f6>N2pp-,tii*(T*,>Z`x6QD$Y,V@:DL)J8?*4eWrRuS`I&Lf{GZL0lK2');
define('AUTH_SALT',        'gRuhPy>+$?:.oA7k^g]sw)#skVtk:|Yb}!NF0o.x#$0[j<C]5}Pd4FiyF}wa}Kh#');
define('SECURE_AUTH_SALT', 's$<~_tD+kHTaD)/Ws2+[*0uesW|-4 (+Wa p*D5*x,x6MW;T/C(:(#eftCyf(4^>');
define('LOGGED_IN_SALT',   'k(QC9`3cz; :]0N/`,Gl5Z!ez&d/tR-S=P$B,!6,e2(wwnXq>n#-/eh3G.E&6BAx');
define('NONCE_SALT',       '8xf;fyU-5(],hoAH:Yb6Z-O8D oa[o)`+x/*Dt>G(^!i8`L990r2~eRN{4J7lAT9');

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
