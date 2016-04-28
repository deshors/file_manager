<?php

$pictures = glob('img/*.jpg');
debug($pictures);



foreach($pictures as $picture){
	$picture_once = basename($picture);

	$query = $db->prepare('SELECT * FROM products WHERE picture LIKE :picture');
	$query->bindValue(':picture', $picture_once, PDO::PARAM_STR);
	$query->execute();
	$product = $query->fetch();

	$picture_old_name = $product['name'];
	$picture_new_name = cleanString($picture_old_name);

}

//faire une requête qui va chercher un nom de produit associé à chaque image du répertoire img/*

/*Nettoyer le nom du produit pour remplacer:
	-les espaces par des tirets
	-tous les caractères spéciaux
	-tous les caractères accentués par leur equivalent non-accentué

Renommer les fichiers du répertoire img/* avec le newname (php.net/rename)*/

?>