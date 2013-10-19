<?php
//this method will sanitize a table entry so sql injection is prevented
function array_sanitize(&$item){
    $item = mysql_real_escape_string($item);
}
//this method will sanitize a single field so sql injection is prevented
function sanitize($data) {
   return mysql_real_escape_string($data);
}
//this method will output all methods
function output_errors($errors){
  return '<ul><li>' . implode('</li><li>', $errors). '</li></ul>';  
}
?>