<?php

namespace Michcald;

use Michcald\Form;

/**
 * @author Michael Caldera <michcald@gmail.com>
 */
class Form
{
    private $name;
    private $method;
    private $action;
    private $elements = array();
    private $values = array();

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function addElement(Form\Element $element)
    {
        $this->elements[] = $element;

        return $this;
    }

    public function getElements()
    {
        return $this->elements;
    }

    public function getElement($name)
    {
        foreach ($this->elements as $element) {
            if ($element->getName() == $name) {
                return $element;
            }
        }

        throw new \Exception('Element not found: ' . $name);
    }

    public function setValues(array $values)
    {
        foreach ($this->getElements() as $element) {
            $key = $element->getName();
            if (!array_key_exists($key, $values)) {
                $this->values[$key] = null;
            } else {
                $this->values[$key] = $values[$key];
            }
        }

        return $this;
    }

    public function getValues()
    {
        return $this->values;
    }

    public function isValid()
    {
        $valid = true;

        foreach ($this->elements as $element) {

            $value = $this->values[$element->getName()];

            if (!$element->isValid($value)) {
                $valid = false;
            }
        }

        return $valid;
    }

    public function getErrorMessages()
    {
        $errors = array();

        foreach ($this->elements as $field) {
            $errors[$field->getName()] = $field->getErrorMessages();
        }

        return $errors;
    }

}
