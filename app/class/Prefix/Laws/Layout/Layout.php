<?php


namespace Prefix\Laws\Layout;


use Prefix\Laws\Layout\Exception\LayoutFileNotFoundException;
use Prefix\Laws\Widget\WidgetInterface;
use Prefix\Laws\WidgetGroup\WidgetGroupInterface;

class Layout implements LayoutInterface
{
    private $layoutFile;
    private $widgets;
    private $widgetGroups;
    private $name;


    public function __construct()
    {
        $this->widgets = [];
        $this->widgetGroups = [];
    }


    public static function create()
    {
        return new static();
    }

    public function getName()
    {
        if (null === $this->name) {
            $this->name = get_called_class();
        }
        return $this->name;
    }


    public function init()
    {
        // creating the layout tree
        $this->prepareWidgetGroups();
        $this->prepareWidgets();
        return $this;
    }


    public function render()
    {
        $f = $this->layoutFile;
        if (file_exists($f)) {
            $s = $this->parseLayoutContent(file_get_contents($f));
            return $s;
        } else {
            throw new LayoutFileNotFoundException("Layout file not found: $f");
        }
    }

    public function bindWidgetGroup(WidgetGroupInterface $wg)
    {
        $this->widgetGroups[$wg->getName()] = $wg;
    }

    public function bindWidget(WidgetInterface $w)
    {
        $this->widgets[$w->getName()] = $w;
    }



    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    protected function prepareWidgetGroups()
    {

    }

    protected function prepareWidgets()
    {

    }

    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    protected function parseLayoutContent($s)
    {
        $pattern = '!\{wg:([a-zA-Z0-9]+)\}!';
        return preg_replace_callback($pattern, function ($match) {
            a($match);
        }, $s);
    }
}