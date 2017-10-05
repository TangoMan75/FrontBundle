<?php

namespace TangoMan\FrontBundle\Model;

/**
 * Class Th
 *
 * @package TangoMan\FrontBundle\Model
 */
class Th implements \JsonSerializable
{
    use Traits\JsonSerializable;
    use Traits\HasLabel;
    use Traits\IsProtected;
    use Traits\HasRoute;

    /**
     * Entity name to be used with orderBy
     *
     * @var string
     */
    private $name;

    /**
     * OrderBy default way
     * e.g.: 'ASC'
     *
     * @var string
     */
    private $way;

    /**
     * Add colspan attribute to <th> tag
     *
     * @var integer
     */
    private $colspan;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getWay()
    {
        return $this->way;
    }

    /**
     * @param string $way
     *
     * @return $this
     */
    public function setWay($way)
    {
        $way = strtoupper($way);
        if ($way == 'ASC' || $way == 'DESC') {
            $this->way = $way;
        } else {
            $this->way = 'ASC';
        }

        return $this;
    }

    /**
     * @return int
     */
    public function getColspan()
    {
        return $this->colspan;
    }

    /**
     * @param int $colspan
     *
     * @return $this
     */
    public function setColspan($colspan)
    {
        $this->colspan = $colspan;

        return $this;
    }
}
