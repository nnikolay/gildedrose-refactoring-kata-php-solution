<?php

declare(strict_types=1);

namespace GildedRose\Service;

use GildedRose\Item;
use GildedRose\UpdateStrategy\AgedBrieUpdateStrategy;
use GildedRose\UpdateStrategy\BackstagePassUpdateStrategy;
use GildedRose\UpdateStrategy\ConjuredUpdateStrategy;
use GildedRose\UpdateStrategy\DefaultUpdateStrategy;
use GildedRose\UpdateStrategy\SulfurasUpdateStrategy;

class ItemUpdater
{
    private array $strategies;

    public function __construct(array $customStrategies = [])
    {
        $defaultStrategies = [
            'Aged Brie' => new AgedBrieUpdateStrategy(),
            'Backstage passes to a TAFKAL80ETC concert' => new BackstagePassUpdateStrategy(),
            'Sulfuras, Hand of Ragnaros' => new SulfurasUpdateStrategy(),
            'Conjured Mana Cake' => new ConjuredUpdateStrategy(),
            'default' => new DefaultUpdateStrategy(),
        ];

        $this->strategies = array_merge($defaultStrategies, $customStrategies);
    }

    public function updateItem(Item $item): void
    {
        $strategy = $this->strategies[$item->name] ?? $this->strategies['default'];
        $strategy->update($item);
    }
}
