<?php
namespace DeployNetBundle\Twig;


class AppExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('filesize', array($this, 'fileSizeFilter')),
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

    public function getName()
    {
        return 'app_extension';
    }
}