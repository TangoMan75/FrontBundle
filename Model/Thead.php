<?php
/**
 * Copyright (c) 2018 Matthias Morin <matthias.morin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace TangoMan\FrontBundle\Model;

use TangoMan\FrontBundle\Model\Th;

/**
 * Class Thead
 *
 * @package TangoMan\FrontBundle\Model
 */
class Thead implements \JsonSerializable
{

    use Traits\JsonSerializable;

    /**
     * Classes to be applied
     * e.g.: 'my-class bootstrap-class'
     *
     * @var string
     */
    private $class;

    /**
     * <th> tags collection
     *
     * @var array
     */
    private $ths = [];

    /**
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param string $class
     *
     * @return Thead
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * @param array $ths
     *
     * @return $this
     */
    public function setThs($ths)
    {
        $this->ths = $ths;

        return $this;
    }

    /**
     * @return array $ths
     */
    public function getThs()
    {
        return $this->ths;
    }

    /**
     * @param \TangoMan\FrontBundle\Model\Th $th
     *
     * @return bool
     */
    public function hasTh(Th $th)
    {
        if (in_array($th, $this->ths)) {
            return true;
        }

        return false;
    }

    /**
     * @param \TangoMan\FrontBundle\Model\Th $th
     *
     * @return $this
     */
    public function addTh(Th $th)
    {
        if ( ! $this->hasTh($th)) {
            $this->ths[] = $th;
        }

        return $this;
    }

    /**
     * @param \TangoMan\FrontBundle\Model\Th $th
     *
     * @return $this
     */
    public function removeTh(Th $th)
    {
        $ths = $this->ths;

        if ($this->hasth($th)) {
            $remove[]  = $th;
            $this->ths = array_diff($ths, $remove);
        }

        return $this;
    }
}
