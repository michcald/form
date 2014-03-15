<?php

namespace Michcald\Form\Element;

class Datetime extends \Michcald\Form\Element
{

    public function __toString()
    {
        return '<input ' .
            'type="datetime" ' .
            'name="' . $this->getName() . '" ' .
            'value="' . $this->getValue() . '"' .
            $this->getAttributesString() .
            ' />';
    }

}
