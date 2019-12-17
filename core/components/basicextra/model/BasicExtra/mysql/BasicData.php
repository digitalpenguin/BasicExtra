<?php
namespace BasicExtra\BasicData;
use BasicExtra\BasicData;

/**
 * @package @package BasicExtra
 */
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\', '/') . '/BasicData.php');
class BasicData_mysql extends BasicData {}