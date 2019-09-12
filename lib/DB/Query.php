<?php


namespace DB;


class Query
{
    private $pipe;
    private $parts = [];
    private $errorState = 0;

    public function __construct($config)
    {
        if (!isset($this->pipe) || !($this->pipe instanceof Pipe)) {
            $this->pipe = new Pipe($config);
        }
    }

    public function &where($identifier)
    {
        // TODO: this is where much of the magic happens
        $tempPart = new Query\Part($identifier);
        $this->parts[] = $tempPart;
        return $tempPart;
    }

    public function execute()
    {
        // TODO: execute the query! -- This should use the specified query language and parser to return data
        return "data goes here";
    }
}
