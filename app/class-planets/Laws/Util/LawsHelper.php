<?php


namespace Laws\Util;


use Laws\Exception\LawsException;
use Laws\Layout\LayoutInterface;
use Laws\Node\NodeInterface;
use Laws\Widget\WidgetInterface;
use Laws\WidgetGroup\WidgetGroupInterface;

class LawsHelper
{

    public static function getShortName($objectInstance)
    {
        if (false === is_string($objectInstance)) {
            $objectInstance = get_class($objectInstance);
        }
        $p = explode('\\', $objectInstance);
        return array_pop($p);
    }


    public static function getPath(NodeInterface $node, $absolute = true)
    {
        if ($node instanceof LayoutInterface) {
            if (true === $absolute) {
                return $node->getName();
            }
            return "";
        } elseif ($node instanceof WidgetGroupInterface || $node instanceof WidgetInterface) {
            $a = [];
            $parent = $node->getParent();
            if (null !== $parent) {

                while ($parent instanceof WidgetGroupInterface) {
                    $b = $parent;
                    $parent = $parent->getParent();
                    if (null === $parent) {
                        throw new LawsException("bad tree construction: the parent of " . get_class($b) . " should not be null");
                    }
                    $a[] = $parent;
                }
                $a[] = $node;
                if (true === $absolute) {
                    if ($parent instanceof LayoutInterface) {
                        array_unshift($a, $parent);
                    } else {
                        throw new LawsException("parent should have been a LayoutInterface, " . get_class($parent) . " given");
                    }
                }
                $a = array_map(function (NodeInterface $v) {
                    return $v->getName();
                }, $a);
                return implode('/', $a);
            } else {
                throw new LawsException("bad tree construction: the parent of " . get_class($node) . " should not be null");
            }
        }
    }


}

