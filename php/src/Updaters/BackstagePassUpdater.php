<?php

namespace App\Updaters;

use App\Updaters\ItemUpdater;
use App\Item;
use App\Interfaces\UpdaterInterface;

class BackstagePassUpdater extends ItemUpdater
{
    private int $quality_level;

    public function updateSellIn():void
    {
      $this->item->sell_in -=1;
    }

    public function updateQualityLevel():void
    {
        if($this->item->sell_in < 5 ){
          $this->quality_level = 3;
        }elseif($this->item->sell_in < 10){
          $this->quality_level = 2;
        }else{
          $this->quality_level = 1;
        }
    }

    public function updateQuality():void
    {
        $this->updateQualityLevel();
    }

    protected function increaseQuality():void
    {
      $this->item->quality += $this->quality_level;
      if($this->item->quality >= 50)
      {
        $this->item->quality = 50;
      }
    }

    public function update():void
    {
      $this->updateSellIn();
      
      if($this->item->sell_in >= 0){
          $this->updateQuality();
          $this->increaseQuality();
      }else{
          $this->updateExpired();
      }

    }

    protected function updateExpired():void
    {
      $this->item->quality = 0;
    }
    
    public static function resolve(Item $item):bool
    {
        return ($item->name === 'Backstage passes to a TAFKAL80ETC concert');
    }


}
