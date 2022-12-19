<?php

declare(strict_types=1);

namespace Kreyu\Bundle\DataTableBundle\DependencyInjection;

use Kreyu\Bundle\DataTableBundle\Column\Type\ColumnTypeInterface;
use Kreyu\Bundle\DataTableBundle\Filter\FilterInterface;
use Kreyu\Bundle\DataTableBundle\Query\Factory\ProxyQueryFactoryInterface;
use Kreyu\Bundle\DataTableBundle\Type\DataTableTypeInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class KreyuDataTableExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yaml');

        $container
            ->registerForAutoconfiguration(ColumnTypeInterface::class)
            ->addTag('kreyu_data_table.column_type');

        $container
            ->registerForAutoconfiguration(FilterInterface::class)
            ->addTag('kreyu_data_table.filter');

        $container
            ->registerForAutoconfiguration(ProxyQueryFactoryInterface::class)
            ->addTag('kreyu_data_table.proxy_query_factory');

        $container
            ->registerForAutoconfiguration(DataTableTypeInterface::class)
            ->addTag('kreyu_data_table.type');
    }
}
