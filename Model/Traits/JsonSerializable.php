<?php

namespace TangoMan\FrontBundle\Model\Traits;

/**
 * Trait JsonSerializable
 * Class must have `implements \JsonSerializable`
 *
 * @package TangoMan\FrontBundle\Model\Traits
 */
trait JsonSerializable
{
    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
