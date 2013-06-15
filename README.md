# The Redbean Implementation for Laravel 4

[Redbean PHP] (http://redbeanphp.com) is an ORM solution for PHP which is extremely easy to use, flexible in its execution, and powerful in its results. 

This composer package enables RedbeanPHP for Laravel 4. 

## Installation

Installation is easy. In your composer.json file, add

```json
"lj4/redbean-laravel4": "dev-master"
```

in your "require" section. Then, in app/config/app.php, add 

```php
'Lj4\RedbeanLaravel4\RedbeanLaravel4ServiceProvider'
```

in your providers array and

```php
'R' => 'Redbean\R',
```

in your aliases array. That's it!

## Namespaces?

If you are wondering why this implementation has namespaces, I've converted the rb.php file to namespaced one with a few tweaks to [this file] (http://redbeanphp.com/extra/php_5_3_namespaces).
