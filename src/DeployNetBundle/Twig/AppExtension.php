<?php
namespace DeployNetBundle\Twig;


class AppExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('filesize', array($this, 'fileSizeFilter')),
            new \Twig_SimpleFilter('phoneNumber', array($this, 'phoneNumberFilter')),
        );
    }

    public function fileSizeFilter($size = null)
    {
        $kiloByte = 1024;
        $megaByte = $kiloByte * 1024;
        $gigaByte = $megaByte * 1024;
        $teraByte = $gigaByte * 1024;

        if ($size < $kiloByte) {
            return $size . 'B';
        } else if ($size < $megaByte) {
            return number_format(($size / $kiloByte)) . ' KB';
        } else if ($size < $gigaByte) {
            return number_format(($size / $megaByte)) . ' MB';
        } else if ($size < $teraByte) {
            return number_format(($size / $gigaByte)) . ' MB';
        }

        return 'unknown';
    }

    public function phoneNumberFilter($number)
    {
        $number = preg_replace("/[^0-9]/", "", $number);
        $length = strlen($number);
        switch($length) {
            case 7:
                return preg_replace("/([0-9]{3})([0-9]{4})/", "$1-$2", $number);
                break;
            case 10:
                return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $number);
                break;
            case 11:
                return preg_replace("/([0-9]{1})([0-9]{3})([0-9]{3})([0-9]{4})/", "$1($2) $3-$4", $number);
                break;
            default:
                return $number;
                break;
        }
    }

    public function getName()
    {
        return 'app_extension';
    }
}