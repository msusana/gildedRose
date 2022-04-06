<?php

namespace Test;

use App\DirectorFactories;
use App\ItemClassifier;
use App\UpdaterFactory;
use App\Item;


class GildedRoseTest extends \PHPUnit\Framework\TestCase {
    public function testFoo() {
        $items      = [new Item("foo", 0, 0)];
        $itemClassifier = new ItemClassifier();
        $updaterFactory = new UpdaterFactory();
        $directorFactories = new DirectorFactories($itemClassifier, $updaterFactory );

        $gildedRose = new \App\GildedRose($items, $directorFactories);
        $gildedRose->updateQuality();
        $this->assertEquals("foo", $items[0]->name);
    }
}


