<?php namespace EyeCore\Modules\ImageResizer\Models;

use Eloquent;
use \Image, \Storage;

/**
 * Class ImageResizer
 * @package EyeCore\Modules\ImageResizer\Models
 */
class ImageResizer extends Eloquent
{
    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string
     */
    protected $table = "imageresizer";

    /**
     * @var array
     */
    protected $guarded = [
        'id',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    /**
     * Image Resize Method
     * @param $image
     * @param null $width
     * @param null $height
     * @param string $format
     * @param int $quality
     * @param bool $background
     * @return string
     */
    public function resize($image, $width = null, $height = null, $format = 'jpg', $quality = 80, $background = 'transparent')
    {
        $options = [
            'type' => 'resize',
            'width' => $width,
            'height' => $height,
            'format' => $format,
            'quality' => $quality,
            'background' => $background,
            'original' => $image
        ];

        return getenv('AWS_URL') . '/imagecache/' . implode('/', $options);
    }

    /**
     * Image Fit Method
     * @param $image
     * @param null $width
     * @param null $height
     * @param string $format
     * @param int $quality
     * @param bool $background
     * @return string
     */
    public function fit($image, $width = null, $height = null, $format = 'jpg', $quality = 80, $background = 'transparent')
    {
        $options = [
            'type' => 'fit',
            'width' => $width,
            'height' => $height,
            'format' => $format,
            'quality' => $quality,
            'background' => $background,
            'original' => $image
        ];

        return getenv('AWS_URL') . '/imagecache/' . implode('/', $options);
    }
}
