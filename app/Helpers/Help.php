<?php

function list_of_city()
{
	return ['Adrar','Aïn Defla','Aïn Témouchent','Alger','Annaba','Batna','Béchar','Béjaïa','Biskra','Blida','Bordj Bou Arréridj','Bouira','Boumerdès','Chlef','ConstantineDjelfa','El Bayadh','El Oued','El Tarf','Ghardaïa','Guelma','Illizi','Jijel','Khenchela','Laghouat','MSila','Mascara','Médéa','Mila','Mostaganem','Naama','Oran','Ouargla','Oum el Bouaghi','Relizane','Saïda','Sétif','Sidi Bel Abbès','Skikda','Souk Ahras','Tamanrasset','Tébess','Tiaret','Tindouf','Tipaza','Tissemsilt','Tizi Ouzou','Tlemcen'];
}

function genders()
{
	return ['woman','man','other'];
}

function limit_text($text,$number)
{
	return substr_replace($text, "...", $number);
}

function upload_image($folder,$img)
{
	$img->store('/',$folder);
	return 'images/' . $folder . $img->hashName();
}

function get_date($date,$format = 'd-m-Y')
{
	return date($format, strtotime($date));
}