<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 27.08.2018
 * Time: 0:28
 */

namespace Scr\Core;


use ReCaptcha\ReCaptcha;

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

    public static function reCaptcha()
    {
        $secret = '6LfVo2wUAAAAAK6uL1TX_5DM_Okikq6ba1qzXkd5';

        $response = null;
        $reCaptcha = new ReCaptcha($secret);

        if (!empty($_POST)) {
            if ($_POST["g-recaptcha-response"]) {
                $response = $reCaptcha->verify(
                    $_POST["g-recaptcha-response"]
                );

                if ($response->isSuccess()) {
                    return true;
                }
                else {
                    $errors = $response->getErrorCodes();
                    $data['error-captcha'] = $errors;
                    return false;
                }
            }
        }
        else{
            return false;
        }

    }
}