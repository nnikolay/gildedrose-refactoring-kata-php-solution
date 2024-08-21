<?php

declare(strict_types=1);

namespace GildedRose\UpdateStrategy;

use GildedRose\Item;

class SulfurasUpdateStrategy implements UpdateStrategyInterface
{
    public function update(Item $item): void
    {
        // No changes to Quality or SellIn, as Sulfuras is a legendary item.
    }
}
