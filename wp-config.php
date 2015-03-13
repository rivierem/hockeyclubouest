<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur 
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'hco_db');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'hco_user');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'AHhdh6r4ywBaamx5');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '>aDkTGCjd!MVU[;hK|/Ln9pycTM,|$F[1f]R~;PoAHXp!s*7Ya!<$c7I1+Sf3zhf');
define('SECURE_AUTH_KEY',  'HMFg7k3$C )v}ibTzGk+W|4y#[L-`sWMayE/)#=NRT_Ikhfky1Ns?nTH!9M|>cw/');
define('LOGGED_IN_KEY',    'XI5^|j|7t(<vGt2!L9z-Mw@Zr.?H1lC5f^IpWwklpdelrH>-:7#w`FqunH}!G=V_');
define('NONCE_KEY',        '4l*.wF$.o2B+cyk5IBTzk8gs@|Ma@T~&sa oI|`Q2-ny(|,`c#Z],+9QT59Ndy-U');
define('AUTH_SALT',        '/L+|49#v(92v5+?zTfNoV5%A9.;LB$0IM|V&AP(@E|rfaoNmeV`r]#XrEHNK4aN0');
define('SECURE_AUTH_SALT', 'TBg~N|fu3*--?UJc?m_P-8`bG8j4# sE+w^z58 c7B6EPXeMl) 5|GQAlVEjf37c');
define('LOGGED_IN_SALT',   'B#Ex/pkI^IH3!-cI%fgUb3uEM}p91Yy6O|QxPI)80kTeE&Z>m9AViGL;g<Rciw7_');
define('NONCE_SALT',       '?A|o1N/4f#UtJ?7Q2puHyer&f~^1 {-P!TV&R;hs|qT>mnDCJU7Y7XvfDRW.zm&4');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'hco_';

/** 
 * Pour les développeurs : le mode deboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');