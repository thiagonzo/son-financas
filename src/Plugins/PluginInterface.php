<?php

namespace Fin\Plugins;


use Fin\ServiceContainerInterface;

interface PluginInterface
{
    public function register(ServiceContainerInterface $container);
}
