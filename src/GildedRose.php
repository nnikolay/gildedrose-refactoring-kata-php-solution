<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\Service\ItemUpdater;

class GildedRose
{
    private ItemUpdater $itemUpdater;

    public function __construct(
        private array $items,
        array $customStrategies = []
    ) {
        $this->itemUpdater = new ItemUpdater($customStrategies);
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $this->itemUpdater->updateItem($item);
        }
    }
}
