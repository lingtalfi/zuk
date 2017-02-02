<?php


namespace Core\Laws\Loader;

use Core\Application\Application;
use Core\Laws\Util\AppLawsHelper;
use Laws\Layout\LayoutInterface;
use Laws\Loader\LoaderInterface;
use Laws\Util\LawsHelper;
use Laws\Widget\WidgetInterface;
use Laws\WidgetGroup\WidgetGroupInterface;


/**
 *
 *
 *
 * This loader has two modes, depending on whether the <theme object> (see LoaderInterface source code)
 * belongs to a module or not.
 *
 *
 * If the <theme object> belongs to a module:
 * ==============================================
 *
 * The loader will try those locations, in the given order
 *
 *
 * - app/themes/$themeName/$moduleName/laws/
 * - class-modules/MyModule/themes/$themeName/laws/
 *
 * the laws directory structure is represented by the following example:
 *
 * - laws/
 *      - layouts/
 *          - OneColumnLayout.tpl
 *          - $controllerName.OneColumnLayout.tpl       (use this notation to be controller specific)
 *      - widgetgroups/
 *          - $widgetGroupName.tpl
 *          - $controllerName.$widgetGroupName.tpl      (use this notation to be controller specific)
 *      - widgets/
 *          - $widgetName.tpl
 *          - $controllerName.$widgetName.tpl           (use this notation to be controller specific)
 *
 *
 *
 *
 * If the <theme object> does not belong to a module:
 * ==============================================
 *
 * - themes/$themeName/_no_module/laws/   (same structure as the laws directory above)
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


        $moduleName = AppLawsHelper::getModuleName($layout);
        $controllerName = Application::get('CONTROLLER');
        $layoutName = LawsHelper::getShortName($layout);
        $d = $this->getApplicationLawsDir($moduleName);

        $f = $d . '/layouts/' . $this->applyControllerPrefix($layoutName, $controllerName) . '.tpl';
        if (false === file_exists($f)) {
            $f = $d . '/layouts/' . $layoutName . '.tpl';
            if (false !== $moduleName && false === file_exists($f)) {
                $d = $this->getModuleLawsDir($moduleName);
                $f = $d . '/layouts/' . $this->applyControllerPrefix($layoutName, $controllerName) . '.tpl';
                if (false === file_exists($f)) {
                    $f = $d . '/layouts/' . $layoutName . '.tpl';
                }
            }
        }

        if (file_exists($f)) {
            return $f;
        }
        return false;
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
    private function getApplicationLawsDir($moduleName)
    {
        $file = APP_ROOT . "/themes/" . Application::get('THEME') . '/';
        if (false === $moduleName) {
            $moduleName = "_no_module";
        }
        $file .= $moduleName . "/laws";
        return $file;
    }

    private function getModuleLawsDir($moduleName)
    {
        return APP_ROOT . "/class-modules/" . $moduleName . "/themes/" . Application::get('THEME') . '/laws';
    }

    private function applyControllerPrefix($string, $controllerName)
    {
        if (null === $controllerName) {
            return $string;
        }
        return $controllerName . '.' . $string;
    }


}

