<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2010 Markus Bucher - kuehlhaus AG (m.bucher@kuehlhaus.com)
 *  All rights reserved
 *
 *  This script is part of the Typo3 project. The Typo3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
/**
 * class 'tx_khloadbalanceddownloads' for the 'khloadbalanceddownloads' extension.
 *
 */


class tx_khloadbalanceddownloads {
	var $extKey = 'khloadbalanceddownloads';
	/**
	 * Parse HTML
	 *
	 * @param	object		$pObj: parent object
	 * @return	void
	 */
	function contentPostProc_all(&$params) {
    $extKey = 'khloadbalanceddownloads';
	  $_extConfig = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$extKey]);
	  
	  // Debug mode?
	  if($_extConfig['debug']==1) define(DEBUG, TRUE);

// 	  print_r($_extConfig);
    $r = $_extConfig['replace0'];
	  if(KHDEBUG==TRUE) echo $rand = rand(0,2);
	  if($_extConfig['random']==1) {  //Taking a random value to determin, which Server should be responsible
  	  switch($rand) {
        case 0:
          $r = $_extConfig['replace0']; 
          break;
        case 1:
          $r = $_extConfig['replace1']; 
          break;
        case 2:
          $r = $_extConfig['replace2']; 
          break;
        default:
          $r = $_extConfig['replace0'];
      }
	  }else {
      $r = $_extConfig['replace0'];
    }
    $s = $_extConfig['search']; 
    if(KHDEBUG) echo "r: $r, s: $s";
    
    //Check if $r is empty
    if(!isset($r) || $r == "" || $r == NULL) return; //do nothing
    
    return $params['pObj']->content = str_replace($s, $r,$params['pObj']->content);
  }
}

?>
