<?php

function upload_image($folder,$img)
{
	$img->store('/',$folder);
	return 'images/'  $folder . $img->hasName();
}