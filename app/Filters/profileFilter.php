<?php namespace App\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class profileFilter implements FilterInterface
{
    public function applyFilter(Image $image)
    {
		return $image->resize(null, 200, function ($constraint) {
			//$constraint->upsize();
		    $constraint->aspectRatio();
		});
    }
}