<?php


namespace Laws\WidgetGroup;


use Laws\Node\NodeInterface;
use Laws\Widget\WidgetInterface;

class WidgetGroup implements WidgetGroupInterface
{
    private $name;
    private $widgets;
    private $widgetGroups;
    private $parent;

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
        $w->setParent($this);
        $this->widgets[$w->getName()] = $w;
    }

    public function bindWidgetGroup(WidgetGroupInterface $wg)
    {
        $wg->setParent($this);
        $this->widgetGroups[$wg->getName()] = $wg;
    }


    public function setParent(NodeInterface $node)
    {
        $this->parent = $node;
        return $this;
    }

    public function getParent()
    {
        return $this->parent;
    }





    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    public function setName($name)
    {
        $this->name = $name;
    }


}