<?php

namespace TangoMan\FrontBundle\Model\Traits;

/**
 * Trait HasAction
 * Action elements (buttons, links) can toggle dropdowns, modals, or popovers
 * @link https://getbootstrap.com/docs/3.3/javascript/#buttons-single-toggle
 * @link https://getbootstrap.com/docs/3.3/javascript/#dropdowns
 * @link https://getbootstrap.com/docs/3.3/javascript/#modals
 * @link https://getbootstrap.com/docs/3.3/javascript/#popovers
 *
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
     * @param string $content
     *
     * @return $this
     */
    public function setModal($content)
    {
        $this->modal = $content;
        $this->addAttribute('modal', $content);

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

        return $this;
    }
}
