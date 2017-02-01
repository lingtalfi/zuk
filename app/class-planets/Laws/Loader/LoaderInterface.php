<?php


namespace Laws\Loader;


use Laws\Layout\LayoutInterface;
use Laws\Widget\WidgetInterface;
use Laws\WidgetGroup\WidgetGroupInterface;

interface LoaderInterface
{


    /**
     * @return string|false, absolute path of the layout file, or false if not found
     */
    public function loadLayout(LayoutInterface $layout);

    /**
     * @return string|false, absolute path of the widget group file, or false if not found
     */
    public function loadWidgetGroup(WidgetGroupInterface $widgetGroup);

    /**
     * @return string|false, absolute path of the widget file, or false if not found
     */
    public function loadWidget(WidgetInterface $widget);


}