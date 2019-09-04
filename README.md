# dbp-php

For some time now I've wanted a really powerful database abstraction class. My first stab at this grew from my first
ever PHP project and is called FX.php. However, being my first PHP project, it's not really as well designed as it
could be -- it could be both more streamlined and easier to use.

Rather than trying to cram all of my learning into that project, my thought was to create something new. Enter db|.php
(read as "D B pipe dot P H P"). The name feels so perfect, I was surprised that no one seemed to have used it. On the
other hand, it is somewhat ostentatious, so maybe others just have better sense.

After mucking around a bit, the syntax I've come up with looks something like this:
```php
<?php
$query = new DB\Query();
$query->where("size")->equalTo("large");
$query->where("color")->notEqualTo("red");
$results = $query->execute();
```
Beautiful, no?

Now to make it work... Heh!

--Chris Hansen

Initial thoughts on data sources to support:
- PostgreSQL
- FileMaker Data API
- FileMaker XML
- MySQL
- PostgreSQL native libpq
- Elasticsearch
- Redis
- ODBC
- FileMaker Data Design Report

(There will be a better README here eventually, but this at least expresses things better than the prior one.)
