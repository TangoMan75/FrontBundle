<?php

namespace TangoMan\FrontBundle\Model\Traits;

/**
 * Trait HasIputType
 *
 * @package  TangoMan\FrontBundle\Model\Traits
 */
trait HasIputType
{
    /**
     * Valid html5 input types
     *
     * @var array
     */
    protected $validInputTypes = [
        'button',
        'color',
        'date',
        'datetime',
        'datetime-local',
        'divider',
        'email',
        'file',
        'keygen',
        'month',
        'number',
        'password',
        'phone',
        'range',
        'reset',
        'search',
        'select',
        'submit',
        'tel',
        'text',
        'time',
        'url',
        'week',
    ];

    /**
     * Type attribute
     * e.g.: 'button', 'reset', 'submit'
     *
     * @var string
     */
    protected $type;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType($type)
    {
        if (in_array($type, $this->validInputTypes)) {
            $this->type = $type;
        }

        return $this;
    }
}
