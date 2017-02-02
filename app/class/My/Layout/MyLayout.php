<?php


namespace My\Layout;


use Core\Laws\Layout\AppLayout;
use Laws\WidgetGroup\WidgetGroup;
use My\Widget\FooterWidget;
use My\Widget\SocialLinksWidget;

class MyLayout extends AppLayout
{




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