<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 26.08.2018
 * Time: 17:51
 */

namespace Scr\Core;


class Templater
{
    public static function view(string $pathToNameTemplateInclude, array $vars=null)
    {
        if ($vars != null) {
            extract($vars);
        }
        ob_start();
        include_once "../view/header.php";
        include_once "../view/{$pathToNameTemplateInclude}.php";
        include_once "../view/footer.php";
        return ob_get_clean();
        // TODO: Implement template() method.
    }
}