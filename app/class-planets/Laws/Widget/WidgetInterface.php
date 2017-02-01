<?php


namespace Laws\Widget;


interface WidgetInterface
{
    public function getName();

    /**
     * get the configuration (from db or other mean)
     */
    public function init();

    /**
     * @return string, return the content of the widget
     */
    public function render();
}