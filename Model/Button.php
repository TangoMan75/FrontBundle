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

    /**
     * @return array
     */
    public function jsonSerialize()
    {
//        $json = [];
//        if ($this->name) {
//            $json['name'] = $this->name;
//        }
//
//        if ($this->type) {
//            $json['type'] = $this->type;
//        }
//
//        if ($this->icon) {
//            $json['icon'] = $this->icon;
//        }
//
//        if ($this->label) {
//            $json['label'] = $this->label;
//        }
//
//        if ($this->badge) {
//            $json['badge'] = $this->badge;
//        }
//
//        if ($this->class) {
//            $json['class'] = $this->class;
//        }
//
//        if ($this->style) {
//            $json['style'] = $this->style;
//        }
//
//        if ($this->route) {
//            $json['route'] = $this->route;
//        }
//
//        if ($this->disabled) {
//            $json['disabled'] = $this->disabled;
//        }
//
//        if ($this->toggle) {
//            $json['toggle'] = $this->toggle;
//        }
//
//        if ($this->tooltip) {
//            $json['tooltip'] = $this->tooltip;
//        }
//
//        if ($this->dropdown) {
//            $json['dropdown'] = $this->dropdown;
//        }
//
//        if ($this->modal) {
//            $json['modal'] = $this->modal;
//        }
//
//        if ($this->popover) {
//            $json['popover'] = $this->popover;
//        }
//
//        if (count($this->parameters)) {
//            $json['parameters'] = json_encode($this->parameters);
//        }
//
//        if (count($this->attributes)) {
//            $json['attributes'] = json_encode($this->attributes);
//        }
//
//        if (count($this->data)) {
//            $json['data'] = json_encode($this->data);
//        }
//
//        if (count($this->pages)) {
//            $json['pages'] = json_encode($this->pages);
//        }
//
//        if (count($this->arias)) {
//            $json['arias'] = json_encode($this->arias);
//        }

        return get_object_vars($this);
    }
}
