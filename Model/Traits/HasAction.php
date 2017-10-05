<?php

namespace TangoMan\FrontBundle\Model\Traits;

/**
 * Trait HasAction
 * Action elements (buttons, links) can toggle dropdowns, modals, or popovers
 *
 * @link    https://getbootstrap.com/docs/3.3/javascript/#buttons-single-toggle
 * @link    https://getbootstrap.com/docs/3.3/javascript/#dropdowns
 * @link    https://getbootstrap.com/docs/3.3/javascript/#modals
 * @link    https://getbootstrap.com/docs/3.3/javascript/#popovers
 * @package TangoMan\FrontBundle\Model\Traits
 */
trait HasAction
{
    /**
     * Toggle attribute
     *
     * @link https://getbootstrap.com/docs/3.3/javascript/#buttons-single-toggle
     * @var boolean
     */
    protected $toggle;

    /**
     * Dropdown attribute
     *
     * @link https://getbootstrap.com/docs/3.3/javascript/#dropdowns
     * @var boolean
     */
    protected $dropdown;

    /**
     * Collapse attribute
     *
     * @link https://getbootstrap.com/docs/3.3/javascript/#collapse
     * @var boolean
     */
    protected $collapse;

    /**
     * Modal target
     * e.g.: '#myModal'
     *
     * @link https://getbootstrap.com/docs/3.3/javascript/#modals
     * @var string
     */
    protected $modal;

    /**
     * Popover text
     * e.g.: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'
     *
     * @link https://getbootstrap.com/docs/3.3/javascript/#popovers
     * @var string
     */
    protected $popover;

    /**
     * Togglable tabs
     *
     * @link https://getbootstrap.com/docs/3.3/javascript/#popovers
     * @var string
     */
    protected $tab;

    /**
     * Togglable pills
     *
     * @link https://getbootstrap.com/docs/3.3/javascript/#popovers
     * @var string
     */
    protected $pill;

    /**
     * @return bool
     */
    public function isToggle()
    {
        return $this->toggle;
    }

    /**
     * @param bool $toggle
     *
     * @return $this
     */
    public function setToggle($toggle)
    {
        $this->toggle = $toggle;

        if ($toggle) {
            $this->addDatum('toggle', 'button');
            $this->addAttribute('autocomplete', 'off');
            $this->addAria('aria-pressed', 'false');
        } else {
            $this->removeDatum('toggle');
            $this->removeAttribute('autocomplete');
            $this->removeAria('aria-pressed');
        }

        return $this;
    }

    /**
     * @return bool
     */
    public function isDropdown()
    {
        return $this->dropdown;
    }

    /**
     * @param bool $dropdown
     *
     * @return $this
     */
    public function setDropdown($dropdown)
    {
        $this->dropdown = $dropdown;

        if ($dropdown) {
            $this->addDatum('toggle', 'dropdown');
            $this->addAria('aria-expanded', 'false');
            $this->addAria('aria-haspopup', 'true');
        } else {
            $this->removeDatum('toggle');
            $this->removeAria('aria-expanded');
            $this->removeAria('aria-haspopup');
        }

        return $this;
    }

    /**
     * @return bool
     */
    public function isCollapse()
    {
        return $this->collapse;
    }

    /**
     * @param bool $collapse
     *
     * @return $this
     */
    public function setCollapse($collapse)
    {
        $this->collapse = $collapse;

        if ($collapse) {
            $this->addDatum('toggle', 'collapse');
            $this->addAria('aria-expanded', 'false');
            $this->addAria('aria-haspopup', 'true');
        } else {
            $this->removeDatum('toggle');
            $this->removeAria('aria-expanded');
            $this->removeAria('aria-haspopup');
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getModal()
    {
        return $this->modal;
    }

    /**
     * @param string $target
     *
     * @return $this
     */
    public function setModal($target)
    {
        $this->modal = $target;

        $this->setTag('button');
        $this->addAttribute('rel', 'modal');
        $this->addDatum('toggle', 'modal');
        $this->addDatum('target', $target);

        return $this;
    }

    /**
     * @return string
     */
    public function getPopover()
    {
        return $this->popover;
    }

    /**
     * @param string $popover
     *
     * @return $this
     */
    public function setPopover($popover)
    {
        $this->popover = $popover;

        $this->setTag('button');
        $this->addDatum('toggle', 'popover');
        $this->addDatum('placement', 'top');
        $this->addDatum('trigger', 'focus');
        $this->addDatum('content', $popover);

        return $this;
    }
}
