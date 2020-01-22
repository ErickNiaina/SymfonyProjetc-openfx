<?php

use App\Kernel;
use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\HttpFoundation\Request;

require dirname(__DIR__).'/of_ERH/config/bootstrap.php';

if ($_SERVER['APP_DEBUG']) {
    umask(0000);

    Debug::enable();
}

if ($trustedProxies = $_SERVER['TRUSTED_PROXIES'] ?? $_ENV['TRUSTED_PROXIES'] ?? false) {
    Request::setTrustedProxies(explode(',', $trustedProxies), Request::HEADER_X_FORWARDED_ALL ^ Request::HEADER_X_FORWARDED_HOST);
}

if ($trustedHosts = $_SERVER['TRUSTED_HOSTS'] ?? $_ENV['TRUSTED_HOSTS'] ?? false) {
    Request::setTrustedHosts([$trustedHosts]);
}

$kernel = new Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
 
//  <VirtualHost *:80>
//     ServerAdmin openflex.eric@admin
//     ServerName openflex.eric
//     ServerAlias www.openflex.eric
//     DocumentRoot /var/www/html/eric/openflex/openflex/htdocs/
//     ErrorLog ${APACHE_LOG_DIR}/error.log
//     CustomLog ${APACHE_LOG_DIR}/access.log combined
//     <directory /var/www/html/web/openflex/openflex/htdocs/>
// 	AllowOverride All
//     </Directory>
// </VirtualHost>