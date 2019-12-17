<?php
/**
 * Build Schema script
 *
 * @package BasicExtra
 * @subpackage build
 */

$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + $mtime[0];
$tstart = $mtime;
set_time_limit(0);

/* define package name */
define('PKG_NAME','BasicExtra');
define('PKG_NAME_LOWER',strtolower(PKG_NAME));

/* define sources */
$root = dirname(dirname(__FILE__)).'/';
$sources = array(
    'root' => $root,
    'core' => $root.'core/components/'.PKG_NAME_LOWER.'/',
    'model' => $root.'core/components/'.PKG_NAME_LOWER.'/model/',
    'assets' => $root.'assets/components/'.PKG_NAME_LOWER.'/',
);

require_once dirname(__FILE__) . '/build.config.php';
require_once(MODX_BASE_PATH.'core/src/Revolution/modX.php');
$modx = new \MODX\Revolution\modX();
$modx->initialize('mgr');
echo '<pre>';
$modx->setLogLevel(modX::LOG_LEVEL_INFO);
$modx->setLogTarget('ECHO');

$manager= $modx->getManager();
$generator= $manager->getGenerator();

$generator->classTemplate= <<<EOD
<?php
/**
 * [+phpdoc-package+]
 */
class [+class+] extends [+extends+] {}
EOD;
$generator->platformTemplate= <<<EOD
<?php
/**
 * [+phpdoc-package+]
 */
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\\\', '/') . '/[+class+].php');
class [+class+]_[+platform+] extends [+class+] {}
EOD;
$generator->mapHeader= <<<EOD
<?php
/**
 * [+phpdoc-package+]
 */
EOD;

//$generator->parseSchema($sources['model'] . 'schema/'.PKG_NAME_LOWER.'.mysql.schema.xml', $sources['model']);




require $sources['model'] . 'vendor/autoload.php';
$modx->log(1, class_exists('BasicExtra\\BasicData')); // returns true
// *****************
// createObjectContainer can't find the classes.
//
// Fatal error: Uncaught Error: Class '\BasicExtra\mysql\BasicData' not found in core/vendor/xpdo/xpdo/src/xPDO/xPDO.php on line 801
// Error: Class '\BasicExtra\mysql\BasicData' not found in core/vendor/xpdo/xpdo/src/xPDO/xPDO.php on line 801
// *****************
$manager->createObjectContainer(\BasicExtra\BasicData::class);




$mtime= microtime();
$mtime= explode(" ", $mtime);
$mtime= $mtime[1] + $mtime[0];
$tend= $mtime;
$totalTime= ($tend - $tstart);
$totalTime= sprintf("%2.4f s", $totalTime);

echo "\nExecution time: {$totalTime}\n";

exit ();