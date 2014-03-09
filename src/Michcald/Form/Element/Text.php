<?php

namespace Michcald\Form\Element;

class Text extends \Michcald\Form\Element
{
    public function __toString()
    {
        return '<input ' .
            'type="text" ' .
            'name="' . $this->getName() . '" ' .
            'value="' . $this->getValue() . '"' .
            $this->getAttributesString() .
            ' />';
    }
}
