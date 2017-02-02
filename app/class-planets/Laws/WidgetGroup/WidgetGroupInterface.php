<?php


namespace Laws\WidgetGroup;


use Laws\Node\NodeInterface;
use Laws\Widget\WidgetInterface;

interface WidgetGroupInterface extends NodeInterface
{

    public function bindWidget(WidgetInterface $w);

    public function bindWidgetGroup(WidgetGroupInterface $wg);


    public function setParent(NodeInterface $node);

    /**
     * @return NodeInterface|null
     */
    public function getParent();

}