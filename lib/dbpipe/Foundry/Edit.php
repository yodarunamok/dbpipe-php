<?php
/**
 * Created by IntelliJ IDEA.
 * User: Chris Hansen (chris@iviking.org)
 * Date: 02-Dec-2022
 * Time: 4:27 PM
 */

namespace dbpipe\Foundry;

use dbpipe\Foundry\Traits\FindDataValues;
use dbpipe\Foundry\Traits\SetDataValues;

abstract class Edit extends Query
{
    use FindDataValues;
    use SetDataValues;

    abstract public function execute();
}
