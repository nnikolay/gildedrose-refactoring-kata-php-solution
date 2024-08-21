<?php

declare(strict_types=1);

namespace GildedRose\UpdateStrategy;

use GildedRose\Item;

interface UpdateStrategyInterface
{
    public function update(Item $item): void;
}
