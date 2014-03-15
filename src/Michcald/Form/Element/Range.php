<?php

namespace Michcald\Form\Element;

class Range extends \Michcald\Form\Element
{

    public function __toString()
    {
        return '<input ' .
            'type="range" ' .
            'name="' . $this->getName() . '" ' .
            'value="' . $this->getValue() . '"' .
            $this->getAttributesString() .
            ' />';
    }

}
