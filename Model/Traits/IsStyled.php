<?php

namespace TangoMan\FrontBundle\Model\Traits;

/**
 * Trait IsStyled
 * Styled elements can have icon, label, or badge
 *
 * @package TangoMan\FrontBundle\Model\Traits
 */
trait IsStyled
{
    /**
     * Font icon
     * e.g: 'glyphicon glyphicon-user'
     *
     * @var string
     */
    protected $icon;

    /**
     * Label to be displayed
     *
     * @var string
     */
    protected $label;

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

    /**
     * @param string $tooltip
     *
     * @return $this
     */
    public function setTooltip($tooltip)
    {
        $this->addAttribute('tooltip', $tooltip);

        if (!$this->hasAttribute('tooltip')) {
            $this->addAttribute('tooltip', $tooltip);
        }

        return $this;
    }
}
