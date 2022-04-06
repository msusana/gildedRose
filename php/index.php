<?php
include "src/Updaters/ItemUpdater.php";
//include "src/Test.php";
include "src/ItemClassifier.php";
include "src/Item.php";
include "src/GildedRose.php";
include "src/Updaters/AgedBrieUpdater.php";


$item = new \App\Item('Aged Brie', 2, 0);
$test->categorize($item);

