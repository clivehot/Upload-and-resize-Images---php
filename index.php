<?php



for ($x=0; $x<count($_FILES['file']['name']); $x++){
    
    $photo = $_FILES['file']['name'][$x];
$photo_tmp = $_FILES['file']['tmp_name'][$x];

$ext = pathinfo($photo,PATHINFO_EXTENSION);
$src = imagecreatefromjpeg($photo_tmp);

list($width_min,$height_min) = getimagesize($photo_tmp);

$newwidth_min = 350; //set compressed width
$newheight_min = ($height_min/$width_min)*$newwidth_min; //equation for compressed img height
$tmp_min=imagecreatetruecolor($newwidth_min, $newheight_min); //create frame for compressed image

imagecopyresampled($tmp_min,$src, 0, 0, 0, 0, $newwidth_min, $newheight_min, $width_min, $height_min);

imagejpeg($tmp_min,"images/".$photo,80);

?>

<div>
  <img src="<?php echo "images/".$photo; ?>" />
</div>

<?php

}

?>






