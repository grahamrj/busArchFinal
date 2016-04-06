

<?php
/**
 * Created By: "David Dietz"
 * Date: 4/6/2016
 * Time: 12:22 AM
 */

?>
<?php
function string_sanitize($s) {
$result = preg_replace("/[^a-zA-Z0-9]+/", "", html_entity_decode($s, ENT_QUOTES));
return $result;
}
?>
