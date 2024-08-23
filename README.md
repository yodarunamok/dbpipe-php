# Welcome!

Are you unsatisfied with the available options to connect to databases? Me too.

For some time now I've wanted a really powerful database abstraction class. Though there are quite a few options out
there, all of the ones that I looked at fell short for me: either they didn't seem truly abstract (e.g. connections to
PostgreSQL are done with one syntax, MySQL connections with another), a data source that I wanted was missing (I work with a number of people that use FileMaker databases), or the
syntax was overly complicated. My first stab at this grew from my first ever PHP project and is called FX.php. However,
being my first ever PHP project, it's not really as well designed as it could be -- it could be both more streamlined and
easier to use.

Rather than trying to cram all of my learning into that project, my thought was to create something new. Enter db|.php
(read as "D B pipe dot P H P"). The name feels so perfect, I was surprised that no one seemed to have used it. On the
other hand, it *is* somewhat ostentatious, so maybe others just have better sense.

After mucking around a bit, the syntax I've come up with looks something like this:
```php
<?php
// A few notes:
// - The FMX namespace indicates a FileMaker XML datasource
// - The "products" parameter is the table (layout for FileMaker) to be queried
// - The .ini file would contain the settings for your data sources
$configPath = "/path/to/file/my_db_configurations.ini";
$query = new dbpipe\FMX\Find("products", $configPath);
$query->where("size")->equalTo("large");
$query->where("color")->notEqualTo("red");
$results = $query->execute();
```
Beautiful, no?

Some features of db|.php worth noting:

- The goal is true abstraction. (i.e. no special syntax for different data sources.)
- `.ini` files can be used for settings (PHP has some very powerful associated functionality.)
- Query syntax makes sense without prior knowledge of the class.
- In PHP arrays have some very powerful, object-like behavior; so that's leveraged where it makes sense.

Initial thoughts on data sources to support:
- `PGS` - PostgreSQL (this should also give us CockroachDB for free)
- `FMD` - FileMaker Data API
- `FMX` - FileMaker XML
- `MYS` - MySQL
- `ELS` - Elasticsearch
- `RED` - Redis
- `ODB` - ODBC
- `DDR` - FileMaker Data Design Report (XML syntax)
- `PGN` - PostgreSQL native libpq

So far, things are go slowing, but they're moving along. I hope this can be a tool that benefits a lot of people. Enjoy!

--Chris Hansen

## Getting Started

Requires PHP 7.2 or later.

### Configuration Directives

The available configuration directives are laid out below. There is a table just below these to lay out which directives are used by which data sources.

server
: The address of the database you wish to access. This may be an IP address, or a web address.

port
: The port on which the database listens. Often times there is a default, and this is optional.

id
: For many databases this would be a username, but as there are wrinkles in how this is handled, I thought it made some sense to use a recognizable, but slightly more generic word.

secret
: Similar to the preceding parameter, for many databases this would be a password. But again, there can be some variation, so I'm using a slightly more generic word.

protocol
: Some databases can be connected to both via http and https, for example. Where such distinctions exist, this parameter is where the desired option is set.

|              | PGS | FMD | FMX |
|:-------------|:---:|:---:|:---:|
| **server**   |  X  |  X  |  X  |
| **port**     |  X  |  X  |  X  |
| **id**       |  X  |  X  |  X  |
| **secret**   |  X  |  X  |  X  |
| **protocol** |     |     |  X  |

