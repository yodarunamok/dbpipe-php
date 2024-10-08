<?php

namespace dbpipe\FMX;

use dbpipe\Foundry\QueryPart;

class Find extends \dbpipe\Foundry\Find
{
    const OPS = ["=="=>"eq", "!="=>"neq", ">"=>"gt", ">="=>"gte", "<"=>"lt", "<="=>"lte", "%%"=>"cn", "%."=>"bw", ".%"=>"ew"];
    protected $sourceIdentifier = "FMX";
    
    public function execute()
    {
        $queryString = "";
        foreach ($this->parts as $queryPart) {
            // as long as we've got a good operator, append the data to the query string accordingly
            if (isset(self::OPS[$queryPart->operator])) {
                $fieldName = urlencode($queryPart->identifier);
                $fieldValue = urlencode($queryPart->value);
                $queryString .= "{$fieldName}={$fieldValue}&{$fieldName}.op=" . self::OPS[$queryPart->operator] . "&";
            } else {
                trigger_error("Invalid operator specified (" . (string)$queryPart . ")", E_USER_ERROR);
            }
        }
        // Add any remaining query logic here
        $queryString .= "-find";
        // TODO: send the query
        // TODO: process the response
        // TODO: if we've got good data, build it into the standard format
        return "data goes here";
    }

}
