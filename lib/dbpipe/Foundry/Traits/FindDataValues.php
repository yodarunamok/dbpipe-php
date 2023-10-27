<?php
/**
 * Created by IntelliJ IDEA.
 * User: Chris Hansen (chris@iviking.org)
 * Date: 01-Dec-2022
 * Time: 4:38 PM
 * To change this template use File | Settings | File Templates.
 */

namespace dbpipe\Foundry\Traits;

trait FindDataValues
{
    use QueryParts;

    /**
     * @param $identifier
     * @return Query\Part
     */
    public function where($identifier)
    {
        $tempPart = new Query\Part($identifier);
        $this->parts[] = $tempPart;
        return $tempPart;
    }
}
