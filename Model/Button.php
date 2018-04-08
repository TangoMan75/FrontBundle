<?php
/**
 * Copyright (c) 2018 Matthias Morin <matthias.morin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

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
