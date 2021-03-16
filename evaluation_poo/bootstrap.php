<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('DOSSIER_UPLOADS', 'uploads');
define('DB_NAME', 'eval');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DIR_VIEWS', __DIR__.'/views/');
define('DIR_SRC', __DIR__.'/src/');

define('DIR_CONTROLLERS', DIR_SRC . 'controllers/');
define('DIR_MANAGERS', DIR_SRC . 'managers/');
define('DIR_MODELS', DIR_SRC . 'models/');
define('DIR_VALIDATORS', DIR_SRC . 'validators/');

spl_autoload_register(function($classe) {
    $dossiers = [DIR_CONTROLLERS, DIR_MANAGERS, DIR_MODELS, DIR_VALIDATORS];
    foreach($dossiers as $dossier) {
        $fichier = $dossier . $classe . '.php';
        if (file_exists( $fichier )) {
            include $fichier;
        }
    }
});

?>