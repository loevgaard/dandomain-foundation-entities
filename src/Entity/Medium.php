<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Loevgaard\DandomainFoundation\Entity\Generated\MediumInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\MediumTrait;
use Loevgaard\DandomainFoundation;

/**
 * @ORM\Entity()
 * @ORM\Table(name="loevgaard_dandomain_media")
 */
class Medium implements MediumInterface
{
    use MediumTrait;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     **/
    protected $id;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", unique=true)
     */
    protected $externalId;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $height;

    /**
     * @var array|null
     *
     * @ORM\Column(nullable=true, type="array")
     */
    protected $mediaTranslations;

    /**
     * @var int|null
     *
     * @ORM\Column(nullable=true, type="integer")
     */
    protected $sortOrder;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $thumbnail;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $thumbnailHeight;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $thumbnailWidth;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $url;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true, type="string")
     */
    protected $width;

    /**
     * @var Product[]|ArrayCollection
     */
    protected $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    /**
     * Populates a medium based on the response from the Dandomain API
     *
     * See the properties here:
     * http://4221117.shop53.dandomain.dk/admin/webapi/endpoints/v1_0/ProductDataService/help/operations/GetDataProduct
     *
     * @param \stdClass|array $data
     */
    public function populateFromApiResponse($data)
    {
        $data = DandomainFoundation\objectToArray($data);

        $this
            ->setExternalId($data['id'])
            ->setHeight($data['height'])
            ->setMediaTranslations($data['mediaTranslations'])
            ->setSortorder($data['sortorder'])
            ->setThumbnail($data['thumbnail'])
            ->setThumbnailheight($data['thumbnailheight'])
            ->setThumbnailwidth($data['thumbnailwidth'])
            ->setUrl($data['url'])
            ->setWidth($data['width'])
        ;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return (int)$this->id;
    }

    /**
     * @param int $id
     * @return Medium
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getExternalId(): int
    {
        return (int)$this->externalId;
    }

    /**
     * @param int $externalId
     * @return Medium
     */
    public function setExternalId(int $externalId)
    {
        $this->externalId = $externalId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param null|string $height
     * @return Medium
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getMediaTranslations()
    {
        return $this->mediaTranslations;
    }

    /**
     * @param array|null $mediaTranslations
     * @return Medium
     */
    public function setMediaTranslations($mediaTranslations)
    {
        $this->mediaTranslations = $mediaTranslations;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * @param int|null $sortOrder
     * @return Medium
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @param null|string $thumbnail
     * @return Medium
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getThumbnailHeight()
    {
        return $this->thumbnailHeight;
    }

    /**
     * @param null|string $thumbnailHeight
     * @return Medium
     */
    public function setThumbnailHeight($thumbnailHeight)
    {
        $this->thumbnailHeight = $thumbnailHeight;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getThumbnailWidth()
    {
        return $this->thumbnailWidth;
    }

    /**
     * @param null|string $thumbnailWidth
     * @return Medium
     */
    public function setThumbnailWidth($thumbnailWidth)
    {
        $this->thumbnailWidth = $thumbnailWidth;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param null|string $url
     * @return Medium
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param null|string $width
     * @return Medium
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return ArrayCollection|Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param ArrayCollection|Product[] $products
     * @return Medium
     */
    public function setProducts($products)
    {
        $this->products = $products;
        return $this;
    }
}
