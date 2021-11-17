<?php

namespace CoffeeShop\Bundle\MakerCoffeeBundle;

use CoffeeShop\Bundle\MakerCoffeeBundle\Command\CoffeeCommand;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\Console\Application;

class MakeMeCoffeeBundle extends Bundle
{
    public function registerCommands(Application $application)
    {
        $container = $application->getKernel()->getContainer();

        $application->add(new CoffeeCommand());
    }
   
}
