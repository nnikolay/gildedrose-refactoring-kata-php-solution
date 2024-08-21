<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\UpdateStrategy\AgedBrieUpdateStrategy;
use GildedRose\UpdateStrategy\BackstagePassUpdateStrategy;
use GildedRose\UpdateStrategy\DefaultUpdateStrategy;
use GildedRose\UpdateStrategy\SulfurasUpdateStrategy;

class GildedRose
{
    private array $strategies;

    public function __construct(
        private array $items,
        array $customStrategies = []
    ) {
        $defaultStrategies = [
            'Aged Brie' => new AgedBrieUpdateStrategy(),
            'Backstage passes to a TAFKAL80ETC concert' => new BackstagePassUpdateStrategy(),
            'Sulfuras, Hand of Ragnaros' => new SulfurasUpdateStrategy(),
            'default' => new DefaultUpdateStrategy(),
        ];

        $this->strategies = array_merge($defaultStrategies, $customStrategies);
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $strategy = $this->strategies[$item->name] ?? $this->strategies['default'];
            $strategy->update($item);
        }
    }
}
