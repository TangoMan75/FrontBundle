<?php
/**
 * Copyright (c) 2018 Matthias Morin <matthias.morin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace TangoMan\FrontBundle\Model\Traits;

/**
 * Trait IsElement
 * Represents dom element with tag name, type, class, style,
 * attributes, data-attributes, aria role, and disabled attribute
 *
 * @requires TangoMan\FrontBundle\Model\Traits\HasTooltip
 * @package  TangoMan\FrontBundle\Model\Traits
 */
trait IsElement
{

    /**
     * Element attributes
     * e.g.: ['foo' => 'bar']
     * will display: foo="bar"
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * Data attributes
     * e.g.: ['foo' => 'bar']
     * will display: data-foo="bar"
     *
     * @var array
     */
    protected $data = [];

    /**
     * Aria attributes
     * e.g.: ['role' => 'button']
     *
     * @var array
     */
    protected $arias = [];

    /**
     * Disabled attribute
     *
     * @var bool
     */
    protected $disabled;

    /**
     * @param array $attributes
     *
     * @return $this
     */
    public function setAttributes($attributes)
    {
        if (is_array($attributes)) {
            $this->attributes = $attributes;
        }

        return $this;
    }

    /**
     * @param string $key
     *
     * @return string|null
     */
    public function getAttribute($key)
    {
        if ($this->hasAttribute($key)) {
            return $this->attributes[$key];
        }

        return null;
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function hasAttribute($key)
    {
        if (array_key_exists($key, $this->attributes)) {
            return true;
        }

        return false;
    }

    /**
     * When attribute exists value is overwritten
     *
     * @param string $key
     * @param string $value
     *
     * @return $this
     */
    public function addAttribute($key, $value)
    {
        $this->attributes[$key] = $value;

        return $this;
    }

    /**
     * @param string $key
     *
     * @return $this
     */
    public function removeAttribute($key)
    {
        if ($this->hasAttribute($key)) {
            unset($this->attributes[$key]);
        }

        return $this;
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function setData($data)
    {
        if (is_array($data)) {
            $this->data = $data;
        }

        return $this;
    }

    /**
     * Merge tooltip attributes when wrap false
     *
     * @return array $data
     */
    public function getData()
    {
        if ($this->wrap) {
            return $this->data;
        }

        return array_merge($this->data, $this->getTooltipData());
    }

    /**
     * @param string $key
     *
     * @return string|null
     */
    public function getDatum($key)
    {
        if ($this->hasDatum($key)) {
            return $this->data[$key];
        }

        return null;
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function hasDatum($key)
    {
        if (array_key_exists($key, $this->data)) {
            return true;
        }

        return false;
    }

    /**
     * When data-attribute exists value is overwritten
     *
     * @param string $key
     * @param string $value
     *
     * @return $this
     */
    public function addDatum($key, $value)
    {
        $this->data[$key] = $value;

        return $this;
    }

    /**
     * @param string $key
     *
     * @return $this
     */
    public function removeDatum($key)
    {
        if ($this->hasDatum($key)) {
            unset($this->data[$key]);
        }

        return $this;
    }

    /**
     * @param array $arias
     *
     * @return $this
     */
    public function setArias($arias)
    {
        if (is_array($arias)) {
            $this->arias = $arias;
        }

        return $this;
    }

    /**
     * @return array $arias
     */
    public function getArias()
    {
        return $this->arias;
    }

    /**
     * @param string $key
     *
     * @return string|null
     */
    public function getAria($key)
    {
        if ($this->hasAria($key)) {
            return $this->arias[$key];
        }

        return null;
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function hasAria($key)
    {
        if (array_key_exists($key, $this->arias)) {
            return true;
        }

        return false;
    }

    /**
     * When aria exists value is overwritten
     *
     * @param string $key
     * @param string $value
     *
     * @return $this
     */
    public function addAria($key, $value)
    {
        $this->arias[$key] = $value;

        return $this;
    }

    /**
     * @param string $key
     *
     * @return $this
     */
    public function removeAria($key)
    {
        if ($this->hasAria($key)) {
            unset($this->arias[$key]);
        }

        return $this;
    }

    /**
     * @return bool
     */
    public function isDisabled()
    {
        return $this->disabled;
    }

    /**
     * @param bool $disabled
     *
     * @return $this
     */
    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;

        return $this;
    }
}
