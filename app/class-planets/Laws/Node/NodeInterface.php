<?php



namespace Laws\Node;


/**
 * A node is one of:
 *
 * - LayoutInterface
 * - WidgetInterface
 * - WidgetGroupInterface
 *
 */
interface NodeInterface{

    public function getName();
}