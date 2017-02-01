<?php


namespace Laws\Layout;


use Laws\Exception\LawsException;
use Laws\Layout\Exception\LayoutFileNotFoundException;
use Laws\Loader\LoaderInterface;
use Laws\Widget\WidgetInterface;
use Laws\WidgetGroup\WidgetGroupInterface;

class Layout implements LayoutInterface
{
    private $widgets;
    private $widgetGroups;
    private $name;

    /**
     * @var $loader LoaderInterface
     */
    private $loader;


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

    public function setLoader(LoaderInterface $loader)
    {
        $this->loader = $loader;
        return $this;
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
        try {
            $f = $this->loader->loadLayout($this);
            if (false !== $f && file_exists($f)) {
                $s = $this->parseLayoutFile($f);
                return $s;
            } else {
                throw new LayoutFileNotFoundException("layout file not found: $f");
            }
        } catch (\Exception $e) {
            $s = $this->onRenderError($e, "layout", $this);
            if (is_string($s)) {
                return $s;
            }
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


    /**
     * @param $name
     * @return WidgetGroupInterface
     * @throws LawsException
     */
    public function getWidgetGroup($name)
    {
        if (array_key_exists($name, $this->widgetGroups)) {
            return $this->widgetGroups[$name];
        }
        throw new LawsException("widget group not found: $name");
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
    protected function parseLayoutFile($f)
    {
//        $pattern = '!\{wg:([a-zA-Z0-9]+)\}!';
//        return preg_replace_callback($pattern, function ($match) {
//            a($match);
//        }, $s);
        include $f;
    }


    /**
     * type:
     * - layout
     * - widgetgroup
     * - widget
     *
     *
     * elementInstance:
     * - LayoutInterface
     * - WidgetGroupInterface
     * - WidgetInterface
     *
     */
    protected function onFileNotFound($type, $elementInstance)
    {

    }

    /**
     * type:
     * - layout
     * - widgetgroup
     * - widget
     *
     * elementInstance:
     * - LayoutInterface
     * - WidgetGroupInterface
     * - WidgetInterface
     */
    protected function onRenderError(\Exception $e, $type, $elementInstance)
    {

    }
}