<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 27.08.2018
 * Time: 0:28
 */

namespace Scr\Core;


class System
{
    public static function trimName(string $name)
    {
        return (string) trim(htmlspecialchars(strip_tags($name)));
        // TODO: Implement trimName() method.
    }

    public static function check($title, $pattern = "/[^0-9a-zа-пр-яё]+/i")
    {
        $res = preg_match($pattern, $title);
        return $res;

    }
}