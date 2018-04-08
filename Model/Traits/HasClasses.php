<?php
/**
 * Copyright (c) 2018 Matthias Morin <matthias.morin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace TangoMan\FrontBundle\Model\Traits;

/**
 * Trait HasClass
 *
 * @package  TangoMan\FrontBundle\Model\Traits
 */
trait HasClass
{

    /**
     * @var array
     */
    private $classes = [];

    /**
     * Get classes as string
     * e.g.: 'btn btn-warning btn-sm'
     *
     * @return string
     */
    public function getClasses()
    {
        return implode(' ', $this->classes);
    }

    /**
     * @param string $classes Class name
     *
     * @return $this
     */
    public function setClasses($classes)
    {
        $array = explode(' ', $classes);
        foreach ($array as $class) {
            $class = $this->formatClass($class);
            if ( ! in_array($class, $this->classes)) {
                $this->classes[] = $class;
            }
        }

        return $this;
    }

    /**
     * @param string $class Class name
     *
     * @return bool
     */
    public function hasClass($class)
    {
        $class = $this->formatClass($class);
        if (in_array($class, $this->classes)) {
            return true;
        }

        return false;
    }

    /**
     * @param string $class Class name
     *
     * @return $this
     */
    public function removeClass($class)
    {
        $class = $this->formatClass($class);
        unset($this->classes[$class]);

        return $this;
    }

    /**
     * @param string $class Class name
     *
     * @return string
     */
    private function formatClass($class)
    {
        $class = trim($class);
        $class = ltrim($class, '.');

        return $class;
    }
}
