<?php


namespace DB\FMX;


class Query extends \DB\Query
{
	const OPS = ["=="=>"eq", "!="=>"neq", ">"=>"gt", ">="=>"gte", "<"=>"lt", "<="=>"lte", "%%"=>"cn", "%."=>"bw", ".%"=>"ew"];

	public function __construct($tableName, $config = false, $sourceIdentifier = "FMX")
	{
		parent::__construct($tableName, $config, $sourceIdentifier);
	}

	public function execute()
    {
    	$queryString = "";
    	// TODO: what to do about an empty query?
		foreach ($this->parts as $queryPart) {
			// TODO: switch on the operator, and create the query based on the data
			if (isset(self::OPS[$queryPart->operator])) {
				// TODO: add FMX formatted query string to current string
				$queryString .= "";
			} else {
				// TODO: didn't find the operator, so return an error
			}
		}
        // TODO: add any remaining query logic here
		// TODO: send the query
		// TODO: process the response
		// TODO: if we've got good data, build it into the standard format
        return "data goes here";
    }
}