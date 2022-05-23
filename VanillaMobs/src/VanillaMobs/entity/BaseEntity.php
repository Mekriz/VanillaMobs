<?php

namespace VanillaMobs\entity;

use pocketmine\entity\Creature;
use pocketmine\nbt\tag\{CompoundTag, ListTag, DoubleTag, FloatTag};

abstract class BaseEntity extends Creature{

public function nbtShoot(){
      $yaw = $this->yaw;
     $pitch = $this->pitch;
            return new CompoundTag("", [
                "Pos" => new ListTag("Pos", [
                    new DoubleTag("", $this->x + (-sin($yaw / 180 * M_PI) * cos($pitch / 180 * M_PI) * 0.5)),
                    new DoubleTag("", $this->y + 1.62),
                    new DoubleTag("", $this->z +(cos($yaw / 180 * M_PI) * cos($pitch / 180 * M_PI) * 0.5))
                ]),
                "Motion" => new ListTag("Motion", [
                    new DoubleTag("", -sin($yaw / 180 * M_PI) * cos($pitch / 180 * M_PI) * 1.2),
                    new DoubleTag("", -sin($pitch / 180 * M_PI) * 1.2),
                    new DoubleTag("", cos($yaw / 180 * M_PI) * cos($pitch / 180 * M_PI) * 1.2)
                ]),
                "Rotation" => new ListTag("Rotation", [
                    new FloatTag("", $yaw),
                    new FloatTag("", $pitch)
                ]),
            ]);
  }
}
