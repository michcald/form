<?php

namespace Michcald\Form\Element;

class File extends \Michcald\Form\Element
{

    public function __toString()
    {
        return '<input ' .
            'type="file" ' .
            'name="' . $this->getName() . '" ' .
            $this->getAttributesString() .
            ' />';
    }

}
