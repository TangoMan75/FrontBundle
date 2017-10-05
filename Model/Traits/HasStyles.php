<?php

namespace TangoMan\FrontBundle\Model\Traits;

/**
 * Trait HasStyles
 *
 * @package TangoMan\FrontBundle\Model\Traits
 */
trait HasStyles
{
    /**
     * @var array
     */
    private $styles = [];

    /**
     * Get styles as string
     * e.g.: 'background-color: red; color: yellow; border: 1px solid green'
     *
     * @return string
     */
    public function getStyles()
    {
        return implode(
            ';', array_map(
                   function ($array) {
                       return implode(': ', $array);
                   },
                   $this->styles
               )
        );
    }

    /**
     * Style attributes
     * e.g.: 'backgroud-image: url(./images/logo.jpg);'
     *
     * @param string $styles
     *
     * @return $this
     */
    public function setStyles($styles)
    {
        $array = explode(';', $styles);
        foreach ($array as $style) {
            $pair = explode(':', $style);
            if (count($pair) == 2) {
                $key = trim($pair[0]);
                $value = trim($pair[1]);
                $this->addStyle($key, $value);
            }
        }

        return $this;
    }

    /**
     * @param string $key Style name
     *
     * @return bool
     */
    public function hasStyle($key)
    {
        $key = trim($key);
        if (array_key_exists($key, $this->styles)) {
            return true;
        }

        return false;
    }

    /**
     * When style exists value is overwritten
     *
     * @param string $key
     * @param string $value
     *
     * @return $this
     */
    public function addStyle($key, $value)
    {
        $this->styles[$key] = $value;

        return $this;
    }

    /**
     * @param string $style Style name
     *
     * @return $this
     */
    public function removeStyle($style)
    {
        $style = trim($style);
        unset($this->styles[$style]);

        return $this;
    }
}