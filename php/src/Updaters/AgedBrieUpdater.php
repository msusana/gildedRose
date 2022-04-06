<?php

namespace App\Updaters;

use App\Updaters\ItemUpdater;
use App\Item;
use App\Interfaces\UpdaterInterface;

class AgedBrieUpdater extends ItemUpdater
{
   
    public function updateSellIn():void
    {
      $this->item->sell_in -=1;
    }

    protected function increaseQuality():void
    {
      if($this->item->sell_in >= 0)
      {
        $this->item->quality += 1;
      }else
      {
        $this->item->quality += 2;
      }
    }

    public function update():void
    {
      $this->updateSellIn();
      $this->updateQuality();
      
    }
    public function updateQuality():void
    {
      if($this->item->quality <= 50)
      {
        $this->increaseQuality();
      }
    }
    
    public static function resolve(Item $item):bool
    {
        return ($item->name === 'Aged Brie');
    }

  
}
