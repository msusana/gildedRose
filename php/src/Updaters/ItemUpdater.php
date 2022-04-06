<?php

namespace App\Updaters;

use App\Interfaces\UpdaterInterface;
use App\Item;

class ItemUpdater implements UpdaterInterface
{

    protected $item;

    function __construct($item)
    {
        $this->item = $item;
    }

    public function __toString():string
    {
        return "{$this->item}";
    }

    protected function decreaseQuality():void
    {
      if($this->item->sell_in >= 0){
         $this->item->quality -=1;
      }else{
        $this->item->quality -=2;
      }
     
    }

    public function updateSellIn():void
    {
      $this->item->sell_in -= 1;
    }

    public function updateQuality():void
    {
      if($this->item->quality > 1 ){
        $this->decreaseQuality();
      }else{
        $this->item->quality = 0;
      }
      
    }

    protected function increaseQuality():void
    {
      /*TODO*/
    }

    public function update():void
    {
      $this->updateSellIn();
      $this->updateQuality();
    }

    protected function updateExpired():void
    {
         /*TODO*/ 
    }

    public static function resolve(Item $item):bool
    {
      return in_array($item->name, ["foo", "+5 Dexterity Vest", "Elixir of the Mongoose" ]);
    }
   
   
}

