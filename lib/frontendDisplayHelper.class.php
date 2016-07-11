<?php

/**
 * Frontend Display Helper Class (frontendDisplayHelper.class.php) (c) by Jack Szwergold
 *
 * Frontend Display Helper Class is licensed under a
 * Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License.
 *
 * You should have received a copy of the license along with this
 * work. If not, see <http://creativecommons.org/licenses/by-nc-sa/4.0/>.
 *
 * w: http://www.preworn.com
 * e: me@preworn.com
 *
 * Created: 2016-07-10, js
 * Version: 2016-07-10, js: creation & development
 *
 */

//**************************************************************************************//
// Require the basics.

require_once BASE_FILEPATH . '/lib/Words.class.php';

//**************************************************************************************//
// The beginnings of a front end display helper class.

class frontendDisplayHelper {

  private $controller = '';
  private $page_base = '';
  private $page_base_suffix = '';

  private $url_parts = '';
  private $VIEW_MODE = 'small';
  private $DEBUG_MODE = FALSE;
  private $html_content = '';
  private $json_content = '';

  //**************************************************************************************//
  // Set the controller.
  public function setController ($value) {
    if (!empty($value)) {
      $this->controller = $value;
    }
  } // setController


  //**************************************************************************************//
  // Set the page base.
  public function setPageBase ($value) {
    if (!empty($value)) {
      $this->page_base = $value;
    }
  } // setPageBase


  //**************************************************************************************//
  // Set the page base.
  public function setPageBaseSuffix ($value) {
    if (!empty($value)) {
      $this->page_base_suffix = $value;
    }
  } // setPageBaseSuffix


  public function initContent ($DEBUG_MODE = FALSE) {

 	//**************************************************************************************//
	// Set the view mode.
	$this->VIEW_MODE = $this->controller;

 	//**************************************************************************************//
	// Set the debug mode.
	$this->DEBUG_MODE = $DEBUG_MODE;

    //**************************************************************************************//
    // Set the view mode.

    if (!empty($this->VIEW_MODE) && $this->VIEW_MODE == 'random') {
      $mode_keys = array_keys($mode_options);
      shuffle($mode_keys);
      $this->VIEW_MODE = $mode_keys[0];
    }
    else if (!empty($this->VIEW_MODE) && !array_key_exists($this->VIEW_MODE, $mode_options)) {
      $this->VIEW_MODE = 'words';
    }

    //**************************************************************************************//
    // Set the JSON directory.

    $json_dir = 'lib/';

    //**************************************************************************************//
    // Set the JSON filename.

    $json_filename = $json_dir . 'words.json';

    //**************************************************************************************//
    // Check if there is a JSON directory. If not? Exit.

    if (!is_file($json_filename)) {
      die('Sorry. The required JSON file could not be found.');
    }

    //**************************************************************************************//
    // Get the JSON file contents.

    $json_content = file_get_contents($json_filename);

    //**************************************************************************************//
    // Decode the JSON file contents.

    $json_decoded = json_decode($json_content, FALSE);

	if (TRUE) {
		echo '<pre>';
		print_r($json_decoded);
		echo '<pre>';
		die();
	}

    // Set the body content.
    $this->html_content = 'HTML content could go here.';

    // Process the JSON content.
    $this->json_content = $json_content;

  } // initContent


  //**************************************************************************************//
  // Get the view mode.
  public function getViewMode () {
    return $this->VIEW_MODE;
  } // getViewMode


  //**************************************************************************************//
  // Get the page title.
  public function getPageTitle () {
    return $this->page_title;
  } // getPageTitle


  //**************************************************************************************//
  // Get the URL parts.
  public function getURLParts () {
    return $this->url_parts;
  } // getURLParts


  //**************************************************************************************//
  // Get the HTML content.
  public function getHTMLContent () {
    return $this->html_content;
  } // getHTMLContent


  //**************************************************************************************//
  // Get the JSON content.
  public function getJSONContent () {
    return $this->json_content;
  } // getJSONContent


} // frontendDisplayHelper

?>