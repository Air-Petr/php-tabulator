# PHP tabulator

Pretty-print the tabular data in various ways.

## Instalation

``composer require ar-petr/php-tabulator``

## Usage

You will get a ``Tabulator`` class with a static interface:

```php
use AirPetr\Tabulator;

$body = [
    [1, 'Lila', 'Hevner'],
    [2, 'Florrie', 'Gravie'],
];

$header = ['id', 'first_name', 'last_name'];

echo Tabulator::getPlain($body); // Table without headers
echo Tabulator::getPlain($body, $header); // Table with headers
```

There are different types of output:

### Plain
```php
echo Tabulator::getPlain($data, $headers);

/*
id first_name last_name
 1 Lila       Hevner   
 2 Florrie    Gravie   
*/
```

### Simple
```php
echo Tabulator::getSimple($data, $headers);

/*
id first_name last_name
-- ---------- ---------
 1 Lila       Hevner   
 2 Florrie    Gravie   
*/
```

### GitHub
```php
echo Tabulator::getGitHub($data, $headers);

/*
| id | first_name | last_name |
| -- | ---------- | --------- |
|  1 | Lila       | Hevner    |
|  2 | Florrie    | Gravie    |
*/
```

More types may be added in the future.

## Numbers

Columns with numbers are flushed to the left.

```
| ip_address      | age  | account  |
| --------------- | ---- | -------- |
| 219.249.38.228  | 2362 | 12276.68 |
| 197.81.54.113   |   41 |  6496.03 |
| 176.111.139.6   |   64 |  3291.72 |
| 208.178.177.206 |   34 |  4311.57 |
```

## Demo

You can see some examples by running scripts from a ``demo`` folder:

```shell
php demo/plain.php
php demo/github.php
# etc.
```

## Testting

Run tests by:

``composer test``
