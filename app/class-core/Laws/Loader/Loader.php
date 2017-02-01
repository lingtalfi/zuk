<?php


namespace Core\Laws\Loader;

use Core\Application\Application;
use Laws\Layout\LayoutInterface;
use Laws\Loader\LoaderInterface;
use Laws\Util\LawsHelper;
use Laws\Widget\WidgetInterface;
use Laws\WidgetGroup\WidgetGroupInterface;


/**
 * This loader loads from those locations (and in this order):
 *
 * - application (with a module)
 * - application (without a module)
 * - module (only if the caller is a module)
 *
 *
 * The application structure looks like this if there is a module
 *
 * - themes/$themeName/$moduleName/laws   (same structure as the laws directory of the module structure)
 *
 *
 * - themes/$themeName/_no_module/laws   (same structure as the laws directory of the module structure)
 *
 *
 *
 *
 *
 * The module structure should look like this:
 *
 * - class-modules/MyModule/themes/
 *          - $themeName        (default theme name is default)
 *              - laws/
 *                  - layouts/
 *                      - OneColumnLayout.tpl
 *                      - $controllerName.OneColumnLayout.tpl       (use this notation to be controller specific)
 *                  - widgetgroups/
 *                      - $widgetGroupName.tpl
 *                      - $controllerName.$widgetGroupName.tpl      (use this notation to be controller specific)
 *                  - widgets/
 *                      - $widgetName.tpl
 *                      - $controllerName.$widgetName.tpl           (use this notation to be controller specific)
 *
 *
 *
 *
 *
 *
 *
 *
 */
class Loader implements LoaderInterface
{


    /**
     * @return string, absolute path of the layout file
     */
    public function loadLayout(LayoutInterface $layout)
    {
        $controllerName = Application::get('CONTROLLER');
        $d = $this->getLawsDir($layout);
        $layoutName = LawsHelper::getShortName($layout);

        $f = $d . '/layouts/' . $this->applyControllerPrefix($layoutName, $controllerName) . '.tpl';
        a($f);
        if (false === file_exists($f)) {
            $f = $d . '/layouts/' . $layoutName . '.tpl';
            a($f);
        }

        az("end");
    }


    /**
     * @return string, absolute path of the widget group file
     */
    public function loadWidgetGroup(WidgetGroupInterface $widgetGroup)
    {
        // TODO: Implement loadWidgetGroup() method.
    }


    /**
     * @return string, absolute path of the widget file
     */
    public function loadWidget(WidgetInterface $widget)
    {
        // TODO: Implement loadWidget() method.
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    /**
     * @return false|string
     */
    private function getModuleName($objectInstance)
    {
        return false;
    }


    private function getLawsDir($objectInstance)
    {
        $file = APP_ROOT . "/themes/";
        $m = $this->getModuleName($objectInstance);
        if (false === $m) {
            $m = "_no_module";
        }
        $file .= $m . "/laws";
        return $file;
    }

    private function applyControllerPrefix($file, $controllerName)
    {
        if (null === $controllerName) {
            return $file;
        }
        return $controllerName . '.' . $file;
    }
}

