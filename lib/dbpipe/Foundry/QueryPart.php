<?php
namespace dbpipe\Foundry;

class QueryPart
{
    private $identifier;
    private $operator;
    private $value;

    public function __construct($identifier)
    {
        $this->identifier = $identifier;
    }

    public function __toString()
    {
        return "$this->identifier $this->operator $this->value";
    }

    public function __get($name)
    {
        $availableAttributes = ["identifier", "operator", "value"];
        if (!in_array($name, $availableAttributes)) {
            trigger_error("Unknown or unavailable query part attribute requested ($name)", E_USER_ERROR);
            return null;
        }
        return $this->$name;
    }

    public function equalTo($data)
    {
        $this->setOperatorAndValue("==", $data);
    }

    public function notEqualTo($data)
    {
        $this->setOperatorAndValue("!=", $data);
    }

    public function greaterThan($data)
    {
        $this->setOperatorAndValue(">", $data);
    }

    public function greaterThanOrEqualTo($data)
    {
        $this->setOperatorAndValue(">=", $data);
    }

    public function lessThan($data)
    {
        $this->setOperatorAndValue("<", $data);
    }

    public function lessThanOrEqualTo($data)
    {
        $this->setOperatorAndValue("<=", $data);
    }

    public function contains($data)
    {
        $this->setOperatorAndValue("%%", $data);
    }

    public function beginsWith($data)
    {
        $this->setOperatorAndValue("%.", $data);
    }

    public function endsWith($data)
    {
        $this->setOperatorAndValue(".%", $data);
    }

    // Only private methods below

    private function setOperatorAndValue($operator, $value)
    {
        $this->operator = $operator;
        $this->value = $value;
    }
}