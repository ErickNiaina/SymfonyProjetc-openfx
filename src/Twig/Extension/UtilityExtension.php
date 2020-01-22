<?php

namespace App\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;


class UtilityExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('server_url', [$this, 'getServerUrl'])  
        ];
    }

    public function getServerUrl()
    {
        $protocol=$_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https' : 'http';
        return $protocol . '://' . $_SERVER['HTTP_HOST'];
    }
}