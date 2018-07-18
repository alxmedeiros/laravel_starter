<?php
/**
 * Created by IntelliJ IDEA.
 * User: alexandre
 * Date: 29/09/17
 * Time: 13:46
 */

namespace Site\Filters;

use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;

class MiniThumbnailFilter implements FilterInterface {

	public function applyFilter(Image $image) {
		return $image->fit(46, 90);
	}

}