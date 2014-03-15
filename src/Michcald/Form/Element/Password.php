<?php

namespace Michcald\Form\Element;

class Password extends \Michcald\Form\Element
{

    public function __toString()
    {
        return '<input ' .
            'type="password" ' .
            'name="' . $this->getName() . '" ' .
            'value="' . $this->getValue() . '"' .
            $this->getAttributesString() .
            ' />';
    }

}
