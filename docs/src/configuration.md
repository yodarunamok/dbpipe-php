# Configuration

## Configuration Files

To minimize repetition on code, **db|.php** uses `.ini` files to consolidation configuration information. In addition, because there's a built in PHP function to parse these files, it should keep things fast. First off, a couple of general notes about configuration files:

1. Whenever possible, configuration files should be stored outside of your web server's document root. When a file is below the document root, there's always the possibility that something will happen and the file containing all of the information needed to access your database will be available to the internet at large. Not pretty. To that end, the built in `phpinfo()` function can be used to review your server's `INCLUDE_PATH` settings. Generally, there's at least one path in there that is completely outside of the document root, making it a good place for sensitive files.
1. If you must keep your configuration files in a sub-optimal spot, be sure to follow the example of `config_template.ini.php`. First, the file is formatted so as to be **both** a valid `PHP` file, _and_ a valid `.ini` file. As long as your server is properly handling `PHP` files, a person who attempts to access a config file will see nothing important. That said, option one is far preferable.

### Configuration Settings

Available settings are outlined below. Each setting is marked as one of two types:

- `required` : All connections require these settings. If you leave one of these out of a data source block, you'll just see an error.
- `optional` : If one of these settings is omitted, dbPipe will attempt to make an intelligent guess based on standards for the data source.

<div class="dbp_settings"></div>

### Connection Agnostic Settings

These are settings which are relevant to all supported data sources.

#### address (required)

The address of the data source. This can be either an IP address (e.g. 192.168.1.7) or a DNS address (e.g. mydata.mydomain.com)

#### port (optional)

The port at which the data source may be reached. Usually and integer; see specific data source sections for any exceptions.

### FileMaker XML (FMX) Settings
