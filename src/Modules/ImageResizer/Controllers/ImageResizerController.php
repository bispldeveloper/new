<?php namespace EyeCore\Modules\ImageResizer\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

/**
 * Class ImageResizerController
 * @package EyeCore\Modules\ImageResizer\Controllers
 */
class ImageResizerController extends Controller
{
	/**
	 * @param $type
	 * @param $width
	 * @param $height
	 * @param $format
	 * @param $quality
	 * @param $background
	 * @param $image
	 * @return mixed
	 * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
	 */
	public function resize($type, $width, $height, $format, $quality, $background, $image)
	{
		$newImage = Image::make(Storage::disk('s3')->get($image));
		$newImage->{$type}($width, $height, function($constraint) {
			$constraint->aspectRatio();
		});
		
		if($background == 'transparent') {
			$newImage->resizeCanvas($width, $height, 'center', false, 'rgba(0, 0, 0, 0)')
				->encode('png', $quality)
				->stream();
		} elseif($background) {
			$image = $newImage->resizeCanvas($width, $height, 'center', false, $background)->stream();
			
			$newImage = Image::canvas($width, $height, $background);
			$newImage->insert($image);
			$newImage->encode($format, $quality)->stream();
		} else {
			$newImage->resizeCanvas($width, $height)->encode($format, $quality)->stream();
		}
		
		return response($newImage->__toString())
			->header('Content-Type', $newImage->mime())
			->header('Cache-Control', 'max-age=604800, public')
			->header('Etag', md5($newImage->__toString()));
	}
}
