<?php
/*This name will represent title in auto generated mail*/
define('NAME', ENV_APPLICATION_NAME);
/*Domain name like www.yourdomain.com*/
define('URL', ENV_APPLICATION_URL);
define('URL_ADMIN', URL . 'admin/');


/*Application Address*/
define('DIR_ROUTE', 'index.php?route=');
define('DIR', ENV_APPLICATION_DIR);
define('DIR_ADMIN', DIR . 'admin/');
define('DIR_APP', DIR_ADMIN . 'app/');
define('DIR_VIEW', DIR_APP . 'views/');
define('DIR_BUILDER', DIR_ADMIN . 'builder/');
define('DIR_IMAGE', DIR_ADMIN . 'public/images/');
define('DIR_UPLOADS', DIR_ADMIN . 'public/uploads/');
define('DIR_STORAGE', DIR_BUILDER . 'storage/');
define('DIR_LIBRARY', DIR_BUILDER . 'library/');
define('DIR_LANGUAGE', DIR_APP . 'language/');


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

define('AUTH_KEY', 'c&G)p{yCt<EQ3tL0qGm#Zc|5Lt)w907U*DgltlBOadOZM(J6yew7;Pt9>(?CBdW<');
define('LOGGED_IN_SALT', 'Xdb54;55S#CJ33cFq}VdvQvS7O6dfk~uj}C-A>gmie~b9zXI|oO*70Z|~#ewOI}W');
define('TOKEN', 'oQ913wsl6{WBlk#5jV5%VYExlFaIomj&75ZZ~(W3GREN#n)(jJp2QY7gugD))3L{');
define('TOKEN_SALT', 'rg(uyO0?I9uq5mx-hh4>V-XCPQ?Dx80{n7|?K?pU;-2WldDIOElXOvzT>p9P1zvN');

define('USER_ROLE', ['Med. Secretary', 'Admin','GCP Secretary']);
define('USER_ROLE_NAME', 'GCP Secretary');
define('FOLLOW_UP_DROPDOWN', ['W' => 'Weekly', '1' => '1 month', '2' => '2 month', '3' => '3 month', '4' => '4 month', '5' => '5 month']);
define('STATUS', ['NEW' => 'New','ACCEPTED' => 'Accepted','REJECTED' => 'Rejected']);