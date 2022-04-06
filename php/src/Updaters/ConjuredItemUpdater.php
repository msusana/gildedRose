<?php

namespace App\Updaters;

use App\Updaters\ItemUpdater;
use App\Item;
use App\Interfaces\UpdaterInterface;

class ConjuredItemUpdater extends ItemUpdater 
{
    protected function decreaseQuality():void
    {
      if($this->item->sell_in >= 0){
        $this->item->quality -= 1;
      }else{
        $this->item->quality -= 2;
      }
      
    }

    public function updateSellIn():void
    {
      $this->item->sell_in -=1;
    }

    public function updateQuality():void
    {
      if($this->item->quality <= 1){
        $this->updateExpired();
      }else{
        $this->decreaseQuality();
      }
      
    }

    public function update():void
    {
      $this->updateSellIn();
      $this->updateQuality();
      
    }

    protected function updateExpired():void
    {
      $this->item->quality = 0;
    }

    public static function resolve(Item $item):bool
    {
        return ($item->name === 'Conjured Mana Cake');
    }

}
