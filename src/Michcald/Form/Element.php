<?php

namespace Michcald\Form;

abstract class Element
{
    private $name;
    private $value;
    private $attributes = array();
    private $filters = array();
    private $validators = array();

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function addAttribute($name, $value)
    {
        $this->attributes[$name] = $value;

        return $this;
    }

    public function getAttribute($name)
    {
        if (!isset($this->attributes[$name])) {
            throw new \Excpetion('Element not found: ' . $name);
        }

        return $this->attributes[$name];
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    protected function getAttributesString()
    {
        $str = '';

        foreach ($this->attributes as $name => $value) {
            $str .= ' ' . $name . '="' . $value . '"';
        }

        return $str;
    }

    public function addValidator(\Michcald\Validator $validator)
    {
        $this->validators[] = $validator;

        return $this;
    }

    public function isValid()
    {
        foreach ($this->validators as $validator) {
            if (!$validator->validate($this->getValue())) {
                return false;
            }
        }

        return true;
    }

    public function getErrorMessages()
    {
        $errors = array();

        foreach ($this->validators as $validator) {
            if (!$validator->validate($this->getValue())) {
                $errors = array_merge($errors, $validator->getErrorMessages());
            }
        }

        return $errors;
    }

    abstract public function __toString();
}
