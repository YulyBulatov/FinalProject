<?php

namespace App;

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    // public function configureContainer(ContainerBuilder $containerBuilder, LoaderInterface $loader): void
    // {
    //     $containerBuilder->setParameter('kernel.project_dir', $this->getProjectDir());
    //     $containerBuilder->setParameter('kernel.secret_dir', $this->getProjectDir() . '/var/secret');
    //     $containerBuilder->setParameter('kernel.logs_dir', $this->getProjectDir() . '/var/log');

    //     // Load the services.yaml file
    //     $loader->load($this->getProjectDir() . '/config/services.yaml');
    // }
}
