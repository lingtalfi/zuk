<?php


namespace Core\Laws\Layout;


use Core\Laws\Loader\Loader;
use Laws\Layout\Layout;

class AppLayout extends Layout
{

    public function __construct()
    {
        parent::__construct();
        $this->setLoader(new Loader());
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
        // todo: create elementInstance->getPath
        // todo: app logger to say msg: file not found for widget $path...
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
