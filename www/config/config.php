<?php
/*This name will represent title in auto generated mail*/
define('NAME', ENV_APPLICATION_NAME);
/*Domain name like www.yourdomain.com*/
define('URL', ENV_APPLICATION_URL);
define('URL_ADMIN', URL.'admin/');


/*Application Address*/
define('DIR_ROUTE', 'index.php?route=');
define('DIR', ENV_APPLICATION_DIR);
define('DIR_ADMIN', DIR.'admin/');
define('DIR_APP', DIR.'app/');
define('DIR_BUILDER', DIR.'builder/');
define('DIR_VIEW', DIR_APP.'views/');
define('DIR_IMAGE', DIR.'public/images/');
define('DIR_UPLOADS', DIR.'public/uploads/');
define('DIR_STORAGE', DIR_BUILDER.'storage/');
define('DIR_LIBRARY', DIR_BUILDER.'library/');
define('DIR_LANGUAGE', DIR_APP.'language/');


/** MySQL settings - You can get this info from your web host **/
/*MySQL database host*/
define('DB_HOSTNAME', ENV_DB_HOSTNAME);
/*MySQL database username*/
define('DB_USERNAME', ENV_DB_USERNAME);
/*MySQL database password*/
define('DB_PASSWORD', ENV_DB_PASSWORD);
/*MySQL database Name*/
define('DB_DATABASE', ENV_DB_DATABASE);
/*Table Prefix*/
define('DB_PREFIX', ENV_DB_PREFIX);

define('AUTH_KEY', 'Z5%UzUZrYfCU7NwFun?bVsynppdy;0);erX4tUHGH6R4n7%-Uk?;g{o}u-pDcTB2');
define('LOGGED_IN_SALT', 'DnA*0XQTP(V{&kvJ6|o?7)wjL|4oiC9T~7<VQaTNJeJQlOz*IGgQR6L(#mCo)?K;');
define('TOKEN', 'R9pnQ}))(hB}Kyb#9&RVePHYK&crHED);CW5HvJX#N}B#>c-i&<jscNOw7xuZBYR');
define('TOKEN_SALT', 'ugK)00e6YMxJ9CfF66L&W1G?EtKC|wJ-?79eYGAYAh7Kl|m2%4OR?b~aq%O>liBs');
define('ROLE', ['0' => 'Patient','3' => 'Doctor', '7' => 'Med. Secretary', '9' => 'Optometrist', '11' => 'GCP Secretary']);
define('CC','chetanthumar@gmail.com');