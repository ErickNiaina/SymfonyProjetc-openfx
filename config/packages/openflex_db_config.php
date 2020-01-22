<?php
    $file = include __DIR__.'/../../../conf/conf.php';
    

     $container->setParameter('openflex_db_param', 
     'mysql://' 
     . $dolibarr_main_db_user . ':' 
     . $dolibarr_main_db_pass . '@' 
     . $dolibarr_main_db_host . ':' 
     . $dolibarr_main_db_port . '/' 
     . $dolibarr_main_db_name . '?serverVersion=5.7'
 );

?>