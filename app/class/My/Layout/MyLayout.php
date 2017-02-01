<?php


namespace My\Layout;


use Core\Laws\Loader\Loader;
use Laws\Layout\Layout;
use Laws\WidgetGroup\WidgetGroup;
use My\Widget\FooterWidget;
use My\Widget\SocialLinksWidget;

class MyLayout extends Layout
{


    public function __construct()
    {
        parent::__construct();
        $this->setLoader(new Loader());
    }

    protected function prepareWidgetGroups()
    {
        $this->bindWidgetGroup(WidgetGroup::create("menutop"));
        $this->bindWidgetGroup(WidgetGroup::create("body"));
        $this->bindWidgetGroup(WidgetGroup::create("footer"));
    }

    protected function prepareWidgets()
    {
        $this->getWidgetGroup("footer")->bindWidget(FooterWidget::create());
        $this->getWidgetGroup("footer")->bindWidget(SocialLinksWidget::create());
    }

}