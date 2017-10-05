<?php

namespace TangoMan\FrontBundle\Model;

/**
 * Class Button
 *
 * @package TangoMan\FrontBundle\Model
 */
class Button implements \JsonSerializable
{
    use Traits\IsElement;
    use Traits\IsStyled;
    use Traits\HasTooltip;
    use Traits\HasRoute;
    use Traits\HasAction;
    use Traits\IsProtected;
    use Traits\JsonSerializable;
}
