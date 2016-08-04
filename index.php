<?php require('bootstrap.php');

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Yaml\Yaml;

$url = 'https://raw.githubusercontent.com/nadimtuhin/Font-Awesome/master/src/icons.yml';

$contents = Yaml::parse(file_get_contents($url));
$fonts = array_map(function($font) {
  return 'fa fa-'.$font['id'];
}, $contents['icons']);

$response = new JsonResponse();
$response->setData($fonts);
$response->send();
