<?php


namespace Laws\Loader;


use Laws\Layout\LayoutInterface;
use Laws\Widget\WidgetInterface;
use Laws\WidgetGroup\WidgetGroupInterface;


/**
 * The goal of the loader is to return the path of a file, given an <theme object>.
 * A <theme object> can be one of:
 *
 * - LayoutInterface
 * - WidgetGroupInterface
 * - WidgetInterface
 *
 *
 *
 *
 */
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