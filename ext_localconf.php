<?php
if(!defined('TYPO3_MODE'))   die('Access denied.');

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-all'][] = 'EXT:khloadbalanceddownloads/class.tx_khloadbalanceddownloads.php:&tx_khloadbalanceddownloads->contentPostProc_all';

?>