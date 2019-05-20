<?php
class Validation
{
    function validateStrings($string)
    {
        $string = self::stripTagsStr($string);
        $string = self::trimStr($string);
        $string = self::regexStr($string);
        $string = self::stripAccents($string);
        return $string;
    }

    function stripTagsAndTrim($string)
    {
        $string = self::stripTagsStr($string);
        $string = self::trimStr($string);
        return $string;
    }

    function stripTagsStr($string)
    {
        return strip_tags($string);
    }

    function trimStr($string)
    {
        $string = ltrim($string);
        $string = rtrim($string);
        return $string;
    }

    function regexStr($string)
    {
        return preg_replace("/[^a-zA-Z0-9\s]/", "", $string);
    }

    function stripAccents($string)
    {
        return strtr(utf8_decode($string), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
    }

}