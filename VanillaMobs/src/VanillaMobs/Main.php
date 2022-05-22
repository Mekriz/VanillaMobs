<?php

namespace VanillaMobs;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\DoubleTag;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\entity\Entity;
use pocketmine\item\Item;
use pocketmine\event\entity\EntitySpawnEvent;
use pocketmine\utils\Config;
use pocketmine\utils\Utils;
use pocketmine\scheduler\PluginTask;
use VanillaMobs\entity\animal\{Sheep, Cow, Chicken, Pig};
use VanillaMobs\entity\monster\{Zombie, Skeleton};

class Main extends PluginBase implements Listener{

  private static $classes;

  public function onLoad(){
   $classes = [
        Pig::class,
        Sheep::class,
        Cow::class,
        Chicken::class,
        Zombie::class,
        Skeleton::class
                        ];

    
   foreach($classes as $class){
    Entity::registerEntity($class);
}
            $item = Item::get(Item::SPAWN_EGG, $class::NETWORK_ID);
            if(!Item::isCreativeItem($item)){
                Item::addCreativeItem($item);
            }
  }

  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }



}
