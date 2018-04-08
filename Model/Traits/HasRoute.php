<?php
/**
 * Copyright (c) 2018 Matthias Morin <matthias.morin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace TangoMan\FrontBundle\Model\Traits;

/**
 * Trait HasRoute
 *
 * @package TangoMan\FrontBundle\Model\Traits
 */
trait HasRoute
{

    /**
     * Hyperlink route
     * e.g: 'app_admin_user_index'
     *
     * @var string
     */
    protected $route;

    /**
     * Append parameters to route
     *
     * @var array
     */
    protected $parameters = [];

    /**
     * Target URL or internal anchor
     * e.g.: '#article-1'
     *
     * @var string
     */
    protected $href = '#';

    /**
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param string $route
     *
     * @return $this
     */
    public function setRoute($route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * @return string
     */
    public function getCallback()
    {
        return $this->hasParameter('callback');
    }

    /**
     * Append target callback to route parameters
     *
     * @param string $callback
     *
     * @return $this
     */
    public function setCallback($callback)
    {
        if ( ! $this->hasParameter('callback')) {
            $this->addParameter('callback', $callback);
        }

        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->hasParameter('id');
    }

    /**
     * Append target id to route parameters
     *
     * @param int $id
     *
     * @return $this
     */
    public function setId($id)
    {
        if ( ! $this->hasParameter('id')) {
            $this->addParameter('id', $id);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->hasParameter('slug');
    }

    /**
     * Append target slug to route parameters
     *
     * @param string $slug
     *
     * @return $this
     */
    public function setSlug($slug)
    {
        if ( ! $this->hasParameter('slug')) {
            $this->addParameter('slug', $slug);
        }

        return $this;
    }

    /**
     * @param array $parameters
     *
     * @return $this
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * @return array $parameters
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param string $key
     *
     * @return string|null
     */
    public function getParameter($key)
    {
        if ($this->hasParameter($key)) {
            return $this->parameters[$key];
        }

        return null;
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function hasParameter($key)
    {
        if (array_key_exists($key, $this->parameters)) {
            return true;
        }

        return false;
    }

    /**
     * When parameter exists value is overwritten
     *
     * @param string $key
     * @param string $value
     *
     * @return $this
     */
    public function addParameter($key, $value)
    {
        $this->parameters[$key] = $value;

        return $this;
    }

    /**
     * @param string $parameter
     *
     * @return $this
     */
    public function removeParameter($parameter)
    {
        if ($this->hasParameter($parameter)) {
            unset($this->parameters[$parameter]);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param string $href
     *
     * @return HasRoute
     */
    public function setHref($href)
    {
        $this->href = $href;

        return $this;
    }
}
