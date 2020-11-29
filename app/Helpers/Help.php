<?php

function upload_image($folder,$img)
{
	$img->store('/',$folder);
	return 'images/' . $folder . $img->hashName();
}

function get_date($date,$format = 'd-m-Y')
{
	return date($format, strtotime($date));
}