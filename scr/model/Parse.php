<?php

namespace Scr\Model ;

class Parse
{
    public static function parse ($p1, $p2, $p3)
    {
        $pos1 = strpos($p1, $p2);
        if ($pos1 === false){
            return 0;
        }
        $string1 = substr($p1, $pos1);
        $pos2 = strpos($string1, $p3);
        return strip_tags(substr($string1, 0,  $pos2));
    }
}