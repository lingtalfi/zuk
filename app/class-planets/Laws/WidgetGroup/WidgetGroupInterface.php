<?php


namespace Laws\WidgetGroup;


use Laws\Widget\WidgetInterface;

interface WidgetGroupInterface
{
    public function getName();

    public function bindWidget(WidgetInterface $w);

    public function bindWidgetGroup(WidgetGroupInterface $wg);

}