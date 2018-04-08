<?php
/**
 * Copyright (c) 2018 Matthias Morin <matthias.morin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace TangoMan\FrontBundle\Model;

/**
 * Class SearchOption
 *
 * @package TangoMan\FrontBundle\Model
 */
class SearchOption implements \JsonSerializable
{

    use Traits\JsonSerializable;

    /**
     * @var String
     */
    private $name;

    /**
     * @var String
     */
    private $value;

    /**
     * @return String
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param String $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return String
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param String $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
