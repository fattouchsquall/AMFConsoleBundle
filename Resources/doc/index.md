Getting started with AMFConsoleBundle
=======================================

1) Installation
----------------------------------


The first step is to tell composer that you want to download AMFConsoleBundle which can
be achieved by entering the following line at the command prompt:

```bash
    $ php composer.phar require amf/console-bundle: dev-develop
```

> ***Note*** This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

After the download of the files is achieved, register the bundle in `app/AppKernel.php`:

```php
# app/AppKernel.php

public function registerBundles()
{
    return array(
        // ...
        new AMF\ConsoleBundle\AMFConsoleBundle(),
    );
}
```

2) Configuration
-------------------------------

Now that you have properly installed the bundle, the next step is to configure it to work with the specific needs of your application.

> ***Note*** This conf can change between environments (production, development, release...). 

First of all, you must add the following minimal configuration to your `config.yml` file:

```yaml
# app/config/config.yml
    
amf_console:
    allowed_prefixs: ['amf']

```

Then, import routing file into `routing.yml` file:

```yaml
# app/config/routing.yml
    
amf_console:
    resource: "@AMFConsoleBundle/Resources/config/routing.yml"
    prefix:   /

```

3) Usage
--------

After that you can run your prefixed commands over a POST to a ReST url as this example: 

POST http://my_host/command/run with this JSON:

```json

{
"commands": [{"definition": "amf:readme", "arguments": [{"name": "--env", "value": "dev"}]}]
}

```

> ***Note*** if you want to execute an ordered commands , you must POST them in the order of execution.