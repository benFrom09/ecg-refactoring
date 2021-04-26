<?php

declare(strict_types=1);

use Psr\Http\Message\ServerRequestInterface;

if (!function_exists('d')) {
    /**
     * Format var_dump debug function
     *
     * @param [type] ...$vars
     * @return void
     */
    function d(...$vars)
    {
        echo '<pre><div class="container"><h3>debug: <hr></h3><p class="card" style="padding:20px;background:#222;color:red;">';
        var_dump($vars);
        echo '</p></div></pre>';
        die();
    }
}

if (!function_exists('dbConfig')) {
    /**
     * get the value of key in configuration file
     *
     * @param string $key
     * @return mixed
     */
    function dbConfig(string $key)
    {

        $dbConfig = require __DIR__ . "/config/database.php";
        if (array_key_exists($key, $dbConfig)) {
            return $dbConfig[$key];
        }
        $value = array_key_exists("default", $dbConfig) ? $dbConfig["connections"][$dbConfig["default"]][$key] : null;
        return $value;
    }
}


if (!function_exists('get_browser_lang')) {
    /**
     * get the browser language
     *
     * @param ServerRequestInterface $request
     * @param array|null $available
     * @param string|null $default
     * @return string
     */
    function get_browser_lang(ServerRequestInterface $request, ?array $available = [], ?string $default = null)
    {
        $array = $request->getServerParams();
        if (array_key_exists('HTTP_ACCEPT_LANGUAGE', $array) && !empty($array)) {
            $langs = explode(',', $array['HTTP_ACCEPT_LANGUAGE']);
            return $langs[0];
        }
    }
}

if (!function_exists('generateSymlink')) {
    /**
     * renerate symbolic link
     *
     * @param string $origin
     * @param string $symlink
     * @return void
     */
    function generateSymlink(string $origin, string $symlink)
    {
        if (!file_exists($symlink)) {
            mkdir($symlink);
        }
        symlink($origin, $symlink);
    }
}


if (!function_exists('isAuth')) {
    /**
     * check if auth is a key in $_SESSION
     *
     * @return boolean
     */
    function isAuth(): bool
    {
        return array_key_exists("auth", $_SESSION);
    }
}


if (!function_exists('formatDateToFrench')) {
    /**
     *  date to french format
     *
     * @param [type] $date
     * @param string $format
     * @param string $timezone
     * @return string
     */
    function formatDateToFrench($date, $format = "Y-m-d", $timezone = "Europe/Paris")
    {
        $month = (new DateTime($date))->setTimeZone(new DateTimeZone($timezone))->format($format);
        $months = [
            "January" => "Janvier", "February" => "Février", "March" => "Mars", "April" => "Avril",
            "May" => "Mai", "June" => "juin", "July" => "Juillet", "August" => "Aôut",
            "September" => "Septembre", "October" => "Octobre", "November" => "Novembre", "December" => "Décembre"
        ];
        return $months[$month];
    }
}

if (!function_exists('isAjax')) {
    /**
     * detect if is the request is ajax
     *
     * @return boolean
     */
    function isAjax(): bool
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }
}


if (!function_exists('detectLink')) {
    /**
     * dectect link in a plain text
     *
     * @param [type] $str
     * @param string $classname
     * @return string
     */
    function detectLink($str, $classname = "")
    {
        return preg_replace('#(https?://)([\w\d.&:\#@%/;$~_?\+-=]*)#', '<a class="' . $classname . '" href="$1$2" target="_blank">$2</a>', $str);
    }
}




if (!function_exists('formatEntityMethod')) {
    /**
     * Set the right method name for hydratation of entity setter
     *
     * @param string $string
     * @return string
     */
    function formatEntityMethod(string $string): string
    {
        $array = str_split($string);
        $newArray = [];
        for ($i = 0; $i < count($array); $i++) {

            if ($array[$i] == '_') {

                $array[$i + 1] = strtoupper($array[$i + 1]);
                $array[$i] = '';
            }
            $newArray[] = $array[$i];
        }

        return 'set' . ucfirst(implode($newArray));
    }
}
