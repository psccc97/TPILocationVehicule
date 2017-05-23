<?php



//FONCTION DE CALCUL DE DISTANCE///////////////////////////////////////////////////////////////

/**
 * Fonction utiliser pour calculer la distance entre l'utilisateur et les véhicules
 * Lien : http://assemblysys.com/fr/calcul-de-distance-en-fonction-de-la-latitude-et-longitude-en-php/
 * @param type $point1_lat
 * @param type $point1_long
 * @param type $point2_lat
 * @param type $point2_long
 * @param type $unit
 * @param type $decimals
 * @return type
 */
function distanceCalculation($point1_lat, $point1_long, $point2_lat, $point2_long, $unit = 'km', $decimals = 2) {
	// Calcul de la distance en degrés
	$degrees = rad2deg(acos((sin(deg2rad($point1_lat))*sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat))*cos(deg2rad($point2_lat))*cos(deg2rad($point1_long-$point2_long)))));
 
	// Conversion de la distance en degrés à l'unité choisie (kilomètres, milles ou milles nautiques)
	switch($unit) {
		case 'km':
			$distance = $degrees * 111.13384; // 1 degré = 111,13384 km, sur base du diamètre moyen de la Terre (12735 km)
			break;
		case 'mi':
			$distance = $degrees * 69.05482; // 1 degré = 69,05482 milles, sur base du diamètre moyen de la Terre (7913,1 milles)
			break;
		case 'nmi':
			$distance =  $degrees * 59.97662; // 1 degré = 59.97662 milles nautiques, sur base du diamètre moyen de la Terre (6,876.3 milles nautiques)
	}
	return round($distance, $decimals);
}

