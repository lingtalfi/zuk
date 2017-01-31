<?php


namespace Prefix\Laws\WidgetGroup;


class WidgetGroup implements WidgetGroupInterface
{
    private $name;


    public static function create($name)
    {
        $o = new self();
        $o->setName($name);
        return $o;
    }

    //------------------------------------------------------------------------------/
    // WidgetGroupInterface
    //------------------------------------------------------------------------------/
    public function getName()
    {
        return $this->name;
    }

    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    public function setName($name)
    {
        $this->name = $name;
    }
}