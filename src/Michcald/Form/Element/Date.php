<?php

namespace Michcald\Form\Element;

class Date extends \Michcald\Form\Element
{

    public function __toString()
    {
        return '<input ' .
            'type="date" ' .
            'name="' . $this->getName() . '" ' .
            'value="' . $this->getValue() . '"' .
            $this->getAttributesString() .
            ' />';
    }

}
