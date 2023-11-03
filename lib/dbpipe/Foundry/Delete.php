<?php
/**
 * Created by IntelliJ IDEA.
 * User: Chris Hansen (chris@iviking.org)
 * Date: 02-Dec-2022
 * Time: 4:22 PM
 */

namespace dbpipe\Foundry;

use dbpipe\Foundry\Traits\FindDataValues;

abstract class Delete extends Query
{
    use FindDataValues;

    abstract public function execute();
}
