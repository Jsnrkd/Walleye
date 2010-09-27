<?php

/**
 * Attempts to require a class at runtime if it has not been loaded yet.
 *
 * @param string $class_name
 * @return void
 */
function __autoload($class_name) {
    $class_name = str_replace('_', '.', $class_name);
    if (file_exists(Walleye::getServerBaseDir() . 'includes/app/controllers/' . strtolower($class_name) . '.php')) {
        require(Walleye::getServerBaseDir() . 'includes/app/controllers/' . strtolower($class_name) . '.php');
    }
    if (file_exists(Walleye::getServerBaseDir() . 'includes/app/models/' . strtolower($class_name) . '.php')) {
        require(Walleye::getServerBaseDir() . 'includes/app/models/' . strtolower($class_name) . '.php');
    }
}

/**
 * Takes a 1 dimensional array of data and returns a 256bit string hash whirlpool style
 *
 * @final
 * @access protected
 * @param array $data
 * @return string|null
 */
function encode($data) {
    if (is_array($data)) {
        return null;
    }
    return hash('whirlpool', $data);
}

/**
 * Will return a string of  an array in a decent fashion. Used mostly for logging
 *
 * @param array $array
 * @return string
 */
function print_array($array) {
    if (is_null ($array)) {
        return '';
    }
    $returnString = '';
    foreach ($array as $key => $value) {
        if (is_array ($key)) {
            $returnString .= print_array($key);
        }
        $returnString .= $key . ' - ' . $value . ' ';
    }
    return $returnString;
}

/**
 * Pass a string and this function will return the amount of days since then
 *
 * @param string $when should be a TIMESTAMP yyyy-mm-dd
 * @return int the number of days
 */
function daysFromNow($when) {
    return floor((time() - strtotime($when)) / (60 * 60 * 24));
}

/**
 * Creates a url slug from a string
 * @param string $string
 * @return string
 */
function slugify($string)
{
    return strtolower(trim(preg_replace(array('~[^0-9a-z]~i', '~-+~'), '-', preg_replace('~&([a-z]{1,2})(acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($string, ENT_QUOTES, 'UTF-8'))), '-'));
}


?>