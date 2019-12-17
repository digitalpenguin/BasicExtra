Basic Extra for testing MODX 3 Alpha.

So far, having trouble parsing a schema and creating db table using `$manager->createObject(\BasicExtra\BasicData::class);`

Receiving errors:
```
/core/src/Revolution/modX.php : 2483) Could not find legacy class BasicExtra\BasicData after converting to MODX\Revolution\BasicExtra\BasicData
```
```
/core/vendor/xpdo/xpdo/src/xPDO/xPDO.php : 658) Could not load class: BasicExtra\BasicData from mysql.basicextra\basicdata
```
