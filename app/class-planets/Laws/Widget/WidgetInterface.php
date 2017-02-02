<?php


namespace Laws\Widget;


use Laws\Node\NodeInterface;

interface WidgetInterface extends NodeInterface
{

    /**
     * get the configuration (from db or other mean)
     */
    public function init($configurationId = null);

    /**
     * @return string, return the content of the widget
     */
    public function render();



    public function setParent(NodeInterface $node);
    /**
     * @return NodeInterface|null
     */
    public function getParent();

}