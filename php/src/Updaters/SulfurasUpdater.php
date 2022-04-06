<?php

namespace App\Updaters;
use App\Item;
use App\Interfaces\UpdaterInterface;
use App\Updaters\ItemUpdater;

class SulfurasUpdater extends ItemUpdater 
{
	public function update():void
  {
		$this->item->quality = 80;
  }
  
  public static function resolve(Item $item):bool
  {
      return ($item->name === 'Sulfuras, Hand of Ragnaros');
  }

}
