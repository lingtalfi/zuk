<?php


namespace My;


use Prefix\Laws\Layout\Layout;
use Prefix\Laws\WidgetGroup\WidgetGroup;

class MyLayout extends Layout
{
    protected function prepareWidgetGroups()
    {
        $this->bindWidgetGroup(WidgetGroup::create("menutop"));
        $this->bindWidgetGroup(WidgetGroup::create("body"));
    }

    protected function prepareWidgets()
    {

    }

}