<?php

declare(strict_types=1);

namespace Kreyu\Bundle\DataTableBundle\Column\View\Factory;

use Kreyu\Bundle\DataTableBundle\Column\ColumnInterface;
use Kreyu\Bundle\DataTableBundle\Column\View\ColumnViewInterface;
use Kreyu\Bundle\DataTableBundle\View\DataTableViewInterface;

interface ColumnValueViewFactoryInterface
{
    public function create(DataTableViewInterface $dataTable, ColumnInterface $column, mixed $value): ColumnViewInterface;
}
