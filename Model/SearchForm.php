<?php
/**
 * Copyright (c) 2018 Matthias Morin <matthias.morin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace TangoMan\FrontBundle\Model;

use TangoMan\FrontBundle\Model\SearchInput;

/**
 * Class SearchForm
 *
 * @package TangoMan\FrontBundle\Model
 */
class SearchForm implements \JsonSerializable
{

    use Traits\JsonSerializable;

    /**
     * @var array
     */
    private $inputs = [];

    /**
     * @var String
     */
    private $class;

    /**
     * @param array $inputs
     *
     * @return $this
     */
    public function setInputs($inputs)
    {
        $this->inputs = $inputs;

        return $this;
    }

    /**
     * @return array $inputs
     */
    public function getInputs()
    {
        return $this->inputs;
    }

    /**
     * @param \TangoMan\FrontBundle\Model\SearchInput $input
     *
     * @return bool
     */
    public function hasInput(SearchInput $input)
    {
        if (in_array($input, $this->inputs)) {
            return true;
        }

        return false;
    }

    /**
     * @param \TangoMan\FrontBundle\Model\SearchInput $input
     *
     * @return $this
     */
    public function addInput(SearchInput $input)
    {
        if ( ! $this->hasInput($input)) {
            $this->inputs[] = $input;
        }

        return $this;
    }

    /**
     * @param \TangoMan\FrontBundle\Model\SearchInput $input
     *
     * @return $this
     */
    public function removeInput(SearchInput $input)
    {
        $inputs = $this->inputs;

        if ($this->hasInput($input)) {
            $remove[]     = $input;
            $this->inputs = array_diff($inputs, $remove);
        }

        return $this;
    }

    /**
     * @return String
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param String $class
     *
     * @return SearchForm
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }
}
