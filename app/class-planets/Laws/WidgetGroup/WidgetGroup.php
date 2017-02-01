<?php


namespace Laws\WidgetGroup;


use Laws\Widget\WidgetInterface;

class WidgetGroup implements WidgetGroupInterface
{
    private $name;
    private $widgets;
    private $widgetGroups;

    public function __construct()
    {
        $this->widgets = [];
        $this->widgetGroups = [];
    }

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

    public function bindWidget(WidgetInterface $w)
    {
        $this->widgets[$w->getName()] = $w;
    }

    public function bindWidgetGroup(WidgetGroupInterface $wg)
    {
        $this->widgetGroups[$wg->getName()] = $wg;
    }



    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    public function setName($name)
    {
        $this->name = $name;
    }
}