<?php

namespace Michcald\Form\Element;

class Number extends \Michcald\Form\Element
{

    public function __toString()
    {
        return '<input ' .
            'type="number" ' .
            'name="' . $this->getName() . '" ' .
            'value="' . $this->getValue() . '"' .
            $this->getAttributesString() .
            ' />';
    }

}
