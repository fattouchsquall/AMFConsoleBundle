Getting started with FtvenConsoleBundle
=======================================

1) Installation
----------------------------------


The first step is to tell composer that you want to download FtvenConsoleBundle which can
be achieved by entering the following line at the command prompt:

```bash
    $ php composer.phar require ftven/console-bundle: dev-develop
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
        new Ftven\ConsoleBundle\FtvenConsoleBundle(),
    );
}
```