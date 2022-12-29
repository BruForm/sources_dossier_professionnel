<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wp_yankee' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'S>HhK9JemB;V0U1uqwZZ)2)axdF&*vRKPB(gqIHP19q^]R^):,%IzU?t6DMM:&Z0' );
define( 'SECURE_AUTH_KEY',  'VX;cy=szo2|IFGs;>/!s(&El-[u.c6hK+>)%7T`e#cs4wQ;0.-iYpy@3)s6R p=f' );
define( 'LOGGED_IN_KEY',    '=Xi<T|a4l/Bx*B2;OvA>7wp9xBRt.o%QP}HV:k%nkg;.i]g2XY$0MbO8.r4w:Jls' );
define( 'NONCE_KEY',        'Y~NFV[5Cw^iMBjT[z^-VG,>yL$?$8|d6o7GVO=kz)nwfv~p;!zlo@xHRu_L1sEkq' );
define( 'AUTH_SALT',        'hGH3,w$HBg 01mQ]VrjR,D9k fP?ht1uwJzMjA^$Q[pMlQlkB~=joG2jRsNcotOc' );
define( 'SECURE_AUTH_SALT', 'fWg{h]sXDDfX+,RW`dN3AzfW%ue_tu5npeS9D6W-W`,T=|:PZ8L:w+)Yd4!&Y$;v' );
define( 'LOGGED_IN_SALT',   'cj]rTKrX.D.G7wSBcZO05A/rR>1FHI?d/_*vmSu++VCPXCoB0#149Df>h-WI>`jm' );
define( 'NONCE_SALT',       'Ybny:iXQ^niYMlvtu)Qr)QT`uDKzs5H9HfYMmv *J+RKZr&w=]huw=:C}: A449]' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
