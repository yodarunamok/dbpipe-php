<?php
/**
 * Created by IntelliJ IDEA.
 * User: Chris Hansen (chris@iviking.org)
 * Date: 02-Dec-2022
 * Time: 4:05 PM
 */

namespace dbpipe;

use dbpipe\Foundry\Traits\FindDataValues;

abstract class Find extends Query
{
    use FindDataValues;

    abstract public function execute();
}
