<?php

namespace Michcald\Form\Element;

class Select extends \Michcald\Form\Element
{
    private $options = array();

    public function addOption($name, $value)
    {
        $this->options[$name] = $value;

        return $this;
    }

    public function __toString()
    {
        $str = '<select ' .
            'name="' . $this->getName() . '" ' .
            $this->getAttributesString() .
            '>';

        foreach ($this->options as $label => $value) {
            $str .= '<option value="' . $value . '"';
            if ($value == $this->getValue()) {
                $str .= ' selected';
            }
            $str .= '>' . $label;
            $str .= '</option>';
        }

        $str .= '</select>';

        return $str;
    }

}
