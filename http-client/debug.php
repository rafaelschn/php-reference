<?php 

$method = $_SERVER['REQUEST_METHOD'];
$args = [];
$files = array();

switch(strtoupper($method)):
  case 'GET':
	$args = $_GET;
	break;
  case 'POST':
  	$args = $_POST;
  	$files = $_FILES;
  	break;
  case 'PUT':
  case 'DELETE':
  	parse_str(file_get_contents("php://input"), $args);
  	break;
  	
endswitch;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Debug Request</title>
  </head>
  <body>
    <table>
	  <tbody>
	    <tr>
		  <td>Method:</td>
		  <td><?= $method ?></td>
		</tr>
		
		<?php foreach($args as $key => $value): ?>
		<?php if(is_scalar($value)): ?>
		<tr>
		  <td><?= $key ?></td>
		  <td><?= $value ?></td>
		</tr>
		<?php endif; ?>
		<?php endforeach; ?>
		
		<?php if(count($files) > 0): ?>
		<?= print_r($files); ?>
		<?php endif; ?>
		
	  </tbody>
    </table>
  </body>
</html>