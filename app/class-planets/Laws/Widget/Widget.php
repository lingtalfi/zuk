<?php


namespace Laws\Widget;


use Laws\Util\LawsHelper;

class Widget implements WidgetInterface
{

    private $name;


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

    public function init()
    {
        // TODO: Implement init() method.
    }

    public function render()
    {
        // TODO: Implement render() method.
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}