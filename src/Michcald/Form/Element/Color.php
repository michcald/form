<?php

namespace Michcald\Form\Element;

class Color extends \Michcald\Form\Element
{

    public function __toString()
    {
        return '<input ' .
            'type="color" ' .
            'name="' . $this->getName() . '" ' .
            'value="' . $this->getValue() . '"' .
            $this->getAttributesString() .
            ' />';
    }

}
