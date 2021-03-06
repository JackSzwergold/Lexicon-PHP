<?php

/**
 * Lexicon Class (Lexicon.class.php) (c) by Jack Szwergold
 *
 * Lexicon Class is licensed under a
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
// Here is where the magic happens!

class textLexicon {

  public $DEBUG_MODE = FALSE;

  public function __construct() {
  } // __construct

  // Build the content object.
  function build_content_object ($content_object_array, $page_base, $page_base_suffix, $extra_endpoints, $type = 'undefined') {

    // Create the data JSON object.
    $parent_obj = new stdClass();

    // Set the endpoints.
    $endpoints = array('self' => $page_base . $page_base_suffix);
    foreach ($extra_endpoints as $endpoint_key => $endpoint_value) {
      $endpoints[$endpoint_value] = BASE_URL . $endpoint_value . '/' . $page_base_suffix;
    }

    // Add the endpoints to the object.
    $parent_obj->links = $endpoints;

    // Set the image data array to the image object.
    $child_obj = new stdClass();
    $child_obj->type = $type;
    $child_obj->attributes = $content_object_array['content'];
    $parent_obj->data = $child_obj;

    // Add the count info to the endpoint.
    $parent_obj->count = count($content_object_array);

    // Add the total info to the endpoint.
    $parent_obj->count = $content_object_array['count'];

    // Add the total info to the endpoint.
    $parent_obj->total = $content_object_array['total'];

    return $parent_obj;

  } // build_content_object


  // JSON encoding helper.
  function json_encode_helper ($data, $pretty_print = FALSE) {

    $ret = json_encode((object) $data);
    $ret = str_replace('\/','/', $ret);
    if ($pretty_print) {
      $ret = prettyPrint($ret);
    }

    return $ret;

  } // json_encode_helper

} // textLexicon

?>