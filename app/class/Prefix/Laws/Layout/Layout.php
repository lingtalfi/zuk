<?php


namespace Prefix\Laws\Layout;


use Prefix\Laws\Layout\Exception\LayoutFileNotFoundException;
use Prefix\Laws\Widget\WidgetInterface;
use Prefix\Laws\WidgetGroup\WidgetGroupInterface;

class Layout
{
    private $layoutFile;
    private $widgets;
    private $widgetGroups;


    public function __construct()
    {
        $this->widgets = [];
        $this->widgetGroups = [];
    }


    public function init()
    {
        // creating the layout tree
        $this->prepareWidgetGroups();
        $this->prepareWidgets();
    }

    public function setLayoutFile($f)
    {
        $this->layoutFile = $f;
    }


    public function render()
    {
        $f = $this->layoutFile;
        if (file_exists($f)) {
            // collect the widgets/widget groups content recursively
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
        $pattern = '!pou!';
        return preg_replace_callback($pattern, function(){}, $s);
    }
}