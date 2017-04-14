<?php
namespace App\Libraries\Filters;

use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;
use Intervention\Image\ImageManagerStatic as ImageMaker;

/**
 * Class RoundFilter
 * @package App\Libraries\Filters
 */
class RoundFilter implements FilterInterface
{
    /**
     * Escala padrão de arredondamento
     */
    const RADIUS_DEFAULT = 100;

    /**
     * @var int
     */
    private $_radius;

    /**
     * RoundFilter constructor.
     * @param $radius
     */
    public function __construct($radius = RADIUS_DEFAULT)
    {
        $this->_radius = $radius;
    }

    /**
     * Corta os corners (cantos) da imagem para ficar redonda
     * @param Image $image
     * @param $radius
     * @return resource
     */
    private function imageCreateCorners(Image $image, $radius)
    {
        $w = $image->getWidth();
        $h = $image->getHeight();
        $src = $image->getCore();

        $q = 10;
        $radius *= $q;

        do {
            $r = rand(0, 255);
            $g = rand(0, 255);
            $b = rand(0, 255);
        } while (imagecolorexact($src, $r, $g, $b) < 0);

        $nw = $w * $q;
        $nh = $h * $q;

        $img = imagecreatetruecolor($nw, $nh);
        $alphacolor = imagecolorallocatealpha($img, $r, $g, $b, 127);
        imagealphablending($img, false);
        imagesavealpha($img, true);
        imagefilledrectangle($img, 0, 0, $nw, $nh, $alphacolor);

        imagefill($img, 0, 0, $alphacolor);
        imagecopyresampled($img, $src, 0, 0, 0, 0, $nw, $nh, $w, $h);

        imagearc($img, $radius - 1, $radius - 1, $radius * 2, $radius * 2, 180, 270, $alphacolor);
        imagefilltoborder($img, 0, 0, $alphacolor, $alphacolor);
        imagearc($img, $nw - $radius, $radius - 1, $radius * 2, $radius * 2, 270, 0, $alphacolor);
        imagefilltoborder($img, $nw - 1, 0, $alphacolor, $alphacolor);
        imagearc($img, $radius - 1, $nh - $radius, $radius * 2, $radius * 2, 90, 180, $alphacolor);
        imagefilltoborder($img, 0, $nh - 1, $alphacolor, $alphacolor);
        imagearc($img, $nw - $radius, $nh - $radius, $radius * 2, $radius * 2, 0, 90, $alphacolor);
        imagefilltoborder($img, $nw - 1, $nh - 1, $alphacolor, $alphacolor);
        imagealphablending($img, true);
        imagecolortransparent($img, $alphacolor);

        $dest = imagecreatetruecolor($w, $h);
        imagealphablending($dest, false);
        imagesavealpha($dest, true);
        imagefilledrectangle($dest, 0, 0, $w, $h, $alphacolor);
        imagecopyresampled($dest, $img, 0, 0, 0, 0, $w, $h, $nw, $nh);

        $res = $dest;
        imagedestroy($src);
        imagedestroy($img);

        return $res;
    }

    /**
     * Aplica o filtro de imagem redonda
     * @param  Image $image
     * @return Image
     */
    public function applyFilter(Image $image)
    {
        return $image->setCore($this->imageCreateCorners($image, $this->_radius));
    }
}
