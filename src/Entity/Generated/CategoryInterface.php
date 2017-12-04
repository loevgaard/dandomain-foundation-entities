<?php
namespace Loevgaard\DandomainFoundation\Entity\Generated;

/**
 * Implement this interface in Category!
 * This is a combined interface that will automatically extend to contain the required functions.
 */
interface CategoryInterface extends AbstractEntityInterface
{

    /**
     * Populates a variant based on the response from the Dandomain API
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
     * @return \Loevgaard\DandomainFoundation\Entity\Category
     */
    public function setId(int $id);

    /**
     * @return int
     */
    public function getExternalId(): int;

    /**
     * @param int $externalId
     * @return \Loevgaard\DandomainFoundation\Entity\Category
     */
    public function setExternalId(int $externalId);

    /**
     * @return string
     */
    public function getNumber(): string;

    /**
     * @param string $number
     * @return \Loevgaard\DandomainFoundation\Entity\Category
     */
    public function setNumber(string $number);

    /**
     * @return null|string
     */
    public function getB2bGroupId();

    /**
     * @param null|string $b2bGroupId
     * @return \Loevgaard\DandomainFoundation\Entity\Category
     */
    public function setB2bGroupId($b2bGroupId);

    /**
     * @return \DateTimeImmutable|null
     */
    public function getCreatedDate();

    /**
     * @param \DateTimeImmutable|null $createdDate
     * @return \Loevgaard\DandomainFoundation\Entity\Category
     */
    public function setCreatedDate($createdDate);

    /**
     * @return int|null
     */
    public function getCustomInfoLayout();

    /**
     * @param int|null $customInfoLayout
     * @return \Loevgaard\DandomainFoundation\Entity\Category
     */
    public function setCustomInfoLayout($customInfoLayout);

    /**
     * @return int|null
     */
    public function getCustomListLayout();

    /**
     * @param int|null $customListLayout
     * @return \Loevgaard\DandomainFoundation\Entity\Category
     */
    public function setCustomListLayout($customListLayout);

    /**
     * @return int|null
     */
    public function getDefaultParentId();

    /**
     * @param int|null $defaultParentId
     * @return \Loevgaard\DandomainFoundation\Entity\Category
     */
    public function setDefaultParentId($defaultParentId);

    /**
     * @return \DateTimeImmutable|null
     */
    public function getEditedDate();

    /**
     * @param \DateTimeImmutable|null $editedDate
     * @return \Loevgaard\DandomainFoundation\Entity\Category
     */
    public function setEditedDate($editedDate);

    /**
     * @return int|null
     */
    public function getInfoLayout();

    /**
     * @param int|null $infoLayout
     * @return \Loevgaard\DandomainFoundation\Entity\Category
     */
    public function setInfoLayout($infoLayout);

    /**
     * @return int|null
     */
    public function getInternalId();

    /**
     * @param int|null $internalId
     * @return \Loevgaard\DandomainFoundation\Entity\Category
     */
    public function setInternalId($internalId);

    /**
     * @return int|null
     */
    public function getListLayout();

    /**
     * @param int|null $listLayout
     * @return \Loevgaard\DandomainFoundation\Entity\Category
     */
    public function setListLayout($listLayout);

    /**
     * @return bool|null
     */
    public function getModified();

    /**
     * @param bool|null $modified
     * @return \Loevgaard\DandomainFoundation\Entity\Category
     */
    public function setModified($modified);

    /**
     * @return array|null
     */
    public function getParentIdList();

    /**
     * @param array|null $parentIdList
     * @return \Loevgaard\DandomainFoundation\Entity\Category
     */
    public function setParentIdList($parentIdList);

    /**
     * @return array|null
     */
    public function getSegmentIdList();

    /**
     * @param array|null $segmentIdList
     * @return \Loevgaard\DandomainFoundation\Entity\Category
     */
    public function setSegmentIdList($segmentIdList);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Category[]
     */
    public function getChildrenCategories();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Category[] $childrenCategories
     * @return \Loevgaard\DandomainFoundation\Entity\Category
     */
    public function setChildrenCategories($childrenCategories);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Category[]
     */
    public function getParentCategories();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Category[] $parentCategories
     * @return \Loevgaard\DandomainFoundation\Entity\Category
     */
    public function setParentCategories($parentCategories);

    /**
     * @return \Loevgaard\DandomainFoundation\Entity\Product[]
     */
    public function getProducts(): array;

    /**
     * @param \Loevgaard\DandomainFoundation\Entity\Product[] $products
     * @return \Loevgaard\DandomainFoundation\Entity\Category
     */
    public function setProducts(array $products);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Segment[]
     */
    public function getSegments();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\Segment[] $segments
     * @return \Loevgaard\DandomainFoundation\Entity\Category
     */
    public function setSegments($segments);

    
    public function hydrate(array $data);

    
    public function extract(): array;
}
