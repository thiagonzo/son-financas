<?php
declare(strict_types=1);

namespace Fin\Plugins;

use Interop\Container\ContainerInterface;
use TG\Auth\Auth;
use Fin\ServiceContainerInterface;

class AuthPlugin implements PluginInterface
{

	public function register(ServiceContainerInterface $container)
	{
		$container->addLazy('auth', function(ContainerInterface $container){
			return new Auth();
		});
	}
}