<?php

namespace app\models\entities;

abstract class Entity
{
    abstract function all();
    abstract function save();

    public function set($prop, $value)
    {
        $this->{$prop} = $value;
    }

    public function get($prop)
    {
        if (property_exists($this, $prop)) {
            return $this->{$prop};
        } else {
            return null;
        }
    }
}