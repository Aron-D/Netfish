<?php
$arr = ['h2rR77VsF5c', 'GHBb25lzNVM', 'wteUW2sL7bc'];

foreach($arr as $videolink) {
$ytarray=explode("/", $videolink);
$ytendstring=end($ytarray);
$ytendarray=explode("?v=", $ytendstring);
$ytendstring=end($ytendarray);
$ytendarray=explode("&", $ytendstring);
$ytcode=$ytendarray[0];
echo "<iframe width=\"420\" height=\"315\" src=\"http://www.youtube.com/embed/$ytcode\" frameborder=\"0\" allowfullscreen></iframe><br><br>";
}

?>