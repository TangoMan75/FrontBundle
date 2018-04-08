<?php
/**
 * Copyright (c) 2018 Matthias Morin <matthias.morin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace TangoMan\FrontBundle\Model\Traits;

/**
 * Trait HasBadge
 * Bootstrap style badge
 *
 * @package TangoMan\FrontBundle\Model\Traits
 */
trait HasBadge
{

    /**
     * Text to be shown in badge
     * e.g.: '255 messages'
     *
     * @var string
     */
    protected $badge;

    /**
     * @return string
     */
    public function getBadge()
    {
        return $this->badge;
    }

    /**
     * @param string $badge
     *
     * @return $this
     */
    public function setBadge($badge)
    {
        $this->badge = $badge;

        return $this;
    }
}
