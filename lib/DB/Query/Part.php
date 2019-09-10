<?php


namespace DB\Query;


class Part
{
    private $identifier;
    private $operator;
    private $data;

    public function __construct($identifier)
    {
        $this->identifier = $identifier;
    }

    public function equalTo($data)
    {
        $this->setPart("==", $data);
    }

    public function notEqualTo($data)
    {
        $this->setPart("!=", $data);
    }

    public function greaterThan($data)
    {
        $this->setPart(">", $data);
    }

    public function greaterThanOrEqualTo($data)
    {
        $this->setPart(">=", $data);
    }

    public function lessThan($data)
    {
        $this->setPart("<", $data);
    }

    public function lessThanOrEqualTo($data)
    {
        $this->setPart("<=", $data);
    }

    public function contains($data)
    {
        $this->setPart("%%", $data);
    }

    public function beginsWith($data)
    {
        $this->setPart("%.", $data);
    }

    public function endsWith($data)
    {
        $this->setPart(".%", $data);
    }

    // Only private methods below

    private function setPart($operator, $data)
    {
        $this->operator = $operator;
        $this->data = $data;
    }
}
