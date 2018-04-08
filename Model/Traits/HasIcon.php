<?php
/**
 * Copyright (c) 2018 Matthias Morin <matthias.morin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace TangoMan\FrontBundle\Model\Traits;

/**
 * Trait HasIcon
 * Bootstrap Glyphicon, FontAwesome or other FontIcon
 *
 * @package TangoMan\FrontBundle\Model\Traits
 */
trait HasIcon
{

    /**
     * Font icon
     * e.g: 'glyphicon glyphicon-user'
     *
     * @var string
     */
    protected $icon;

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     *
     * @return $this
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }
}
