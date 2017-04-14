<?php
namespace App\Libraries\Filters;

use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;

/**
 * Class OpacityFilter
 * @package App\Libraries\Filters
 */
class OpacityFilter implements FilterInterface
{
    /**
     * Valor da opacidade
     * @var float
     */
    private $_opacity;

    /**
     * OpacityFilter constructor.
     * @param float $opacity
     */
    public function __construct($opacity = 0.5)
    {
        $this->_opacity = $opacity;
    }

    /**
     * Applies filter to given image
     *
     * @param  Image $image
     * @return Image
     */
    public function applyFilter(Image $image)
    {
        $core = $image->getCore();
        imagealphablending($core, false);
        imagesavealpha($core, true);
        $transparency = 1 - $this->_opacity;
        imagefilter($core, IMG_FILTER_COLORIZE, 0,0,0,127*$transparency);
        return $image->setCore($core);
    }
}