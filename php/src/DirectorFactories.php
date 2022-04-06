<?php

namespace App;

use App\Interfaces\ClassifierInterface;
use App\Interfaces\FactoryInterface;
use App\Interfaces\UpdaterInterface;
use App\Item;
use App\UpdaterFactory;
use App\ItemClassifier;

class DirectorFactories 
{
    public ClassifierInterface $itemClassifier;
    public FactoryInterface $updaterFactory;

    function __construct(ClassifierInterface  $itemClassifier, FactoryInterface $updaterFactory)
    {
      $this->itemClassifier = $itemClassifier;
      $this->updaterFactory = $updaterFactory;
    }

}