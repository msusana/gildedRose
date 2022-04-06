<?php

namespace App;

use App\Interfaces\ClassifierInterface;
use App\Updaters\AgedBrieUpdater;
use App\Updaters\BackstagePassUpdater;
use App\Updaters\ConjuredItemUpdater;
use App\Updaters\SulfurasUpdater;
use App\Updaters\ItemUpdater;
use App\UpdaterFactory;

//This classed is a some sort of factory used to create a new Updater based on item name
class ItemClassifier implements ClassifierInterface
{
    private string $path = "src/Updaters/*.php";
    private array $filenames; 
    private string $pathClass = "\\App\Updaters\\";

    public function __construct()
    {
        $this->filenames = $this->getFilenames();
    }

    public function categorize($item):string
    {
  
        for ($i=0; $i < count($this->filenames); $i++) { 
            $updater = $this->pathClass.$this->filenames[$i];
            if($updater::resolve($item))
            { 
                return $updater;
            }; 
        }
        
    }
    

    public function getFilenames():array
    {
        $filenames = [];

        foreach(glob($this->path) as $filename)
        {
            $parts = explode('/', $filename);
            $className= explode('.',$parts[2]);
            array_push($filenames, $className[0]);
        };

        return $filenames;
    }

 

}


