<?php

namespace TangoMan\FrontBundle\Model\Traits;

/**
 * Trait IsProtected
 *
 * @package TangoMan\FrontBundle\Model\Traits
 */
trait IsProtected
{
    /**
     * Pages where element should appear
     * e.g: ['app_admin_user_index','app_admin']
     *
     * @var array
     */
    protected $pages = [];

    /**
     * Roles granted privilege to see element
     * (null = no restrictions)
     * e.g: ['ROLE_ADMIN', 'ROLE_SUPER_ADMIN']
     *
     * @var array
     */
    protected $roles = [];

    /**
     * @param array $pages
     *
     * @return $this
     */
    public function setPages($pages)
    {
        if (is_array($pages)) {
            $this->pages = $pages;
        }

        return $this;
    }

    /**
     * @return array $pages
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * @param string $page
     *
     * @return bool
     */
    public function hasPage($page)
    {
        if (in_array($page, $this->pages)) {
            return true;
        }

        return false;
    }

    /**
     * @param string $page
     *
     * @return $this
     */
    public function addPage($page)
    {
        if (!$this->hasPage($page)) {
            $this->pages[] = $page;
        }

        return $this;
    }

    /**
     * @param string $page
     *
     * @return $this
     */
    public function removePage($page)
    {
        $pages = $this->pages;

        if ($this->hasPage($page)) {
            $remove[] = $page;
            $this->pages = array_diff($pages, $remove);
        }

        return $this;
    }

    /**
     * @param array $roles
     *
     * @return $this
     */
    public function setRoles($roles)
    {
        if (is_array($roles)) {
            $this->roles = $roles;
        }

        return $this;
    }

    /**
     * @return array $roles
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param string $role
     *
     * @return bool
     */
    public function hasRole($role)
    {
        if (in_array($role, $this->roles)) {
            return true;
        }

        return false;
    }

    /**
     * @param string $role
     *
     * @return $this
     */
    public function addRole($role)
    {
        if (!$this->hasRole($role)) {
            $this->roles[] = $role;
        }

        return $this;
    }

    /**
     * @param string $role
     *
     * @return $this
     */
    public function removeRole($role)
    {
        $roles = $this->roles;

        if ($this->hasRole($role)) {
            $remove[] = $role;
            $this->roles = array_diff($roles, $remove);
        }

        return $this;
    }
}
