<?php


chdir('..');
require_once('api/Simpla.php');

$filename = $_GET['file'];
$token = $_GET['token'];

$simpla = new Simpla();

if(!$simpla->config->check_token($filename, $token))
	exit('bad token');

/*resizing_image blog_image*/
$original_img_dir = null;
$resized_img_dir = null;
if (isset($_GET['type']) && !empty($_GET['type'])) {
    //copy case
    //$_GET['type'] - ïî ñóòè ïàïêà ñ íàðåçàííûìè(èëè ïðîñòî) êàðòèíêàìè
    if ($_GET['type'] == 'blog_resized') {
        $original_img_dir = $simpla->config->original_blog_dir;
        $resized_img_dir = $simpla->config->resized_blog_dir;
    }
}
/*/resizing_image blog_image*/

$resized_filename =  $simpla->image->resize($filename/*resizing_image blog_image*/, $original_img_dir, $resized_img_dir/*/resizing_image blog_image*/);

if(is_readable($resized_filename))
{
	header('Content-type: image');
	print file_get_contents($resized_filename);
}

