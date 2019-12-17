Basic Extra for testing MODX 3 Alpha.

So far, having trouble creating db table using `$manager->createObject(\BasicExtra\BasicData::class);`

Receiving errors:
```
Fatal error: Uncaught Error: Class '\BasicExtra\mysql\BasicData' not found in core/vendor/xpdo/xpdo/src/xPDO/xPDO.php on line 801
```
```
Error: Class '\BasicExtra\mysql\BasicData' not found in core/vendor/xpdo/xpdo/src/xPDO/xPDO.php on line 801
```

Relevant code in build.schema.php:
```
require $sources['model'] . 'vendor/autoload.php';
$modx->log(1, class_exists('BasicExtra\\BasicData')); // returns true
// *****************
// createObjectContainer can't find the classes.
//
// Fatal error: Uncaught Error: Class '\BasicExtra\mysql\BasicData' not found in core/vendor/xpdo/xpdo/src/xPDO/xPDO.php on line 801
// Error: Class '\BasicExtra\mysql\BasicData' not found in core/vendor/xpdo/xpdo/src/xPDO/xPDO.php on line 801
// *****************
$manager->createObjectContainer(\BasicExtra\BasicData::class);
```
