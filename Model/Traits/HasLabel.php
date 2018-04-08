<?php
/**
 * Copyright (c) 2018 Matthias Morin <matthias.morin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

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
