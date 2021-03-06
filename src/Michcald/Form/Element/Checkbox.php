<?php

namespace Michcald\Form\Element;

class Checkbox extends \Michcald\Form\Element
{

    public function __toString()
    {
        return '<input ' .
            'type="checkbox" ' .
            'name="' . $this->getName() . '" ' .
            'value="' . $this->getValue() . '"' .
            $this->getAttributesString() .
            ' />';
    }

}
