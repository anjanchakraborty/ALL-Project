<?php
//autodownload on submitting
header('Content-disposition:attachment;filename="file.doc"');
header('Content-type:application/txt');
readfile('/var/www/save.com/public_html/Files/file.doc');
?>