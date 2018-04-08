<?php
/**
 * Copyright (c) 2018 Matthias Morin <matthias.morin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace TangoMan\FrontBundle\Model\Traits;

/**
 * Trait HasTooltip
 * Defines bootstrap tooltip
 * Allows for elements to have both tooltip and toggle (e.g.: modals)
 *
 * @link    https://getbootstrap.com/docs/3.3/javascript/#tooltips
 * @package TangoMan\FrontBundle\Model\Traits
 */
trait HasTooltip
{

    /**
     * Valid bootstrap tooltip/popover placements
     *
     * @var array
     */
    protected $validPlacements
        = [
            'top',
            'right',
            'bottom',
            'left',
        ];

    /**
     * Tooltip text
     * e.g.: 'Edit this user'
     *
     * @var string
     */
    protected $tooltip;

    /**
     * Tooltip placement
     * e.g.: 'right'
     *
     * @var string
     */
    protected $tooltipPlacement = 'top';

    /**
     * @var boolean
     */
    protected $wrap = false;

    /**
     * Build tootlip data-attributes
     *
     * @return array
     */
    public function getTooltipData()
    {
        return [
            'toggle'         => 'tooltip',
            'placement'      => $this->tooltipPlacement,
            'original-title' => $this->tooltip,
        ];
    }

    /**
     * @return string
     */
    public function getTooltip()
    {
        return $this->tooltip;
    }

    /**
     * @param string $tooltip
     *
     * @return $this
     */
    public function setTooltip($tooltip)
    {
        $this->tooltip = $tooltip;
        if ($this->hasAttribute('toggle')) {
            $this->wrap = true;
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getTooltipPlacement()
    {
        return $this->tooltipPlacement;
    }

    /**
     * @param string $tooltipPlacement
     *
     * @return $this
     */
    public function setTooltipPlacement($tooltipPlacement)
    {
        if (in_array($tooltipPlacement, $this->validPlacements)) {
            $this->tooltipPlacement = $tooltipPlacement;
        }

        return $this;
    }

    /**
     * @return bool
     */
    public function isWrap()
    {
        return $this->wrap;
    }

    /**
     * @param bool $wrap
     *
     * @return $this
     */
    public function setWrap($wrap)
    {
        $this->wrap = $wrap;

        return $this;
    }

}
