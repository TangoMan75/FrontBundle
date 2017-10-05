<?php

namespace TangoMan\FrontBundle\Model\Traits;

/**
 * Trait HasLabel
 *
 * @package TangoMan\FrontBundle\Model\Traits
 */
trait HasLabel
{
    /**
     * Label to be displayed
     *
     * @var string
     */
    protected $label;

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     *
     * @return $this
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }
}
