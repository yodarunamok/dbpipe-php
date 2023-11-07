<?php
/**
 * Created by IntelliJ IDEA.
 * User: Chris Hansen (chris@iviking.org)
 * Date: 01-Dec-2022
 * Time: 4:38 PM
 * To change this template use File | Settings | File Templates.
 */

namespace dbpipe\Foundry\Traits;
use \dbpipe\Foundry\QueryPart;

trait FindDataValues
{
    use QueryParts;

    /**
     * @param $identifier
     * @return QueryPart
     */
    public function where($identifier): QueryPart
    {
        $tempPart = new QueryPart($identifier);
        $this->parts[] = $tempPart;
        return $tempPart;
    }
}
