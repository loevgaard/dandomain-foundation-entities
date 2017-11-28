<?php
namespace Loevgaard\DandomainFoundation\Entity\Generated;

/**
 * Implement this interface in Medium!
 * This is a combined interface that will automatically extend to contain the required functions.
 */
interface MediumInterface
{

    /**
     * Populates a medium based on the response from the Dandomain API
     *
     * See the properties here:
     * http://4221117.shop53.dandomain.dk/admin/webapi/endpoints/v1_0/ProductDataService/help/operations/GetDataProduct
     *
     * @param \stdClass|array $data
     */
    public function populateFromApiResponse($data);

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     * @return \Loevgaard\DandomainFoundation\Entity\Medium
     */
    public function setId(int $id);

    /**
     * @return int
     */
    public function getExternalId(): int;

    /**
     * @param int $externalId
     * @return \Loevgaard\DandomainFoundation\Entity\Medium
     */
    public function setExternalId(int $externalId);

    /**
     * @return null|string
     */
    public function getHeight();

    /**
     * @param null|string $height
     * @return \Loevgaard\DandomainFoundation\Entity\Medium
     */
    public function setHeight($height);

    /**
     * @return array|null
     */
    public function getMediaTranslations();

    /**
     * @param array|null $mediaTranslations
     * @return \Loevgaard\DandomainFoundation\Entity\Medium
     */
    public function setMediaTranslations($mediaTranslations);

    /**
     * @return int|null
     */
    public function getSortOrder();

    /**
     * @param int|null $sortOrder
     * @return \Loevgaard\DandomainFoundation\Entity\Medium
     */
    public function setSortOrder($sortOrder);

    /**
     * @return null|string
     */
    public function getThumbnail();

    /**
     * @param null|string $thumbnail
     * @return \Loevgaard\DandomainFoundation\Entity\Medium
     */
    public function setThumbnail($thumbnail);

    /**
     * @return null|string
     */
    public function getThumbnailHeight();

    /**
     * @param null|string $thumbnailHeight
     * @return \Loevgaard\DandomainFoundation\Entity\Medium
     */
    public function setThumbnailHeight($thumbnailHeight);

    /**
     * @return null|string
     */
    public function getThumbnailWidth();

    /**
     * @param null|string $thumbnailWidth
     * @return \Loevgaard\DandomainFoundation\Entity\Medium
     */
    public function setThumbnailWidth($thumbnailWidth);

    /**
     * @return null|string
     */
    public function getUrl();

    /**
     * @param null|string $url
     * @return \Loevgaard\DandomainFoundation\Entity\Medium
     */
    public function setUrl($url);

    /**
     * @return null|string
     */
    public function getWidth();

    /**
     * @param null|string $width
     * @return \Loevgaard\DandomainFoundation\Entity\Medium
     */
    public function setWidth($width);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Product[]
     */
    public function getProducts();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Product[] $products
     * @return \Loevgaard\DandomainFoundation\Entity\Medium
     */
    public function setProducts($products);
}
