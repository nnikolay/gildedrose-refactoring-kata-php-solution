<?php

declare(strict_types=1);

namespace GildedRose\UpdateStrategy;

use GildedRose\Item;

class AgedBrieUpdateStrategy implements UpdateStrategyInterface
{
    public function update(Item $item): void
    {
        if ($item->quality < 50) {
            $item->quality++;
        }

        $item->sellIn--;

        if ($item->sellIn < 0 && $item->quality < 50) {
            $item->quality++;
        }
    }
}
