<?php


namespace Laws\Widget;


use Laws\Node\NodeInterface;
use Laws\Util\LawsHelper;

class Widget implements WidgetInterface
{

    private $name;
    private $parent;


    public static function create()
    {
        return new static();
    }

    public function getName()
    {
        if (null === $this->name) {
            $this->name = LawsHelper::getShortName(get_called_class());
        }
        return $this->name;
    }

    public function init($configurationId = null)
    {
        // TODO: Implement init() method.
    }

    public function render()
    {
        // TODO: Implement render() method.
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
    public function getConfiguration($configurationId = null)
    {
        $conf = [];

    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

}