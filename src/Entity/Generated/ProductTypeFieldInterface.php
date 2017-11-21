<?php
namespace Loevgaard\DandomainFoundation\Entity\Generated;

/**
 * Implement this interface in ProductTypeField!
 * This is a combined interface that will automatically extend to contain the required functions.
 */
interface ProductTypeFieldInterface
{

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTypeField
     */
    public function setId(int $id);

    /**
     * @return string
     */
    public function getExternalId(): string;

    /**
     * @param string $externalId
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTypeField
     */
    public function setExternalId(string $externalId);

    /**
     * @return null|string
     */
    public function getLabel();

    /**
     * @param null|string $label
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTypeField
     */
    public function setLabel($label);

    /**
     * @return int|null
     */
    public function getLanguageId();

    /**
     * @param int|null $languageId
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTypeField
     */
    public function setLanguageId($languageId);

    /**
     * @return int|null
     */
    public function getNumber();

    /**
     * @param int|null $number
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTypeField
     */
    public function setNumber($number);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\ProductType[]
     */
    public function getProductTypes();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\ProductType[] $productTypes
     * @return \Loevgaard\DandomainFoundation\Entity\ProductTypeField
     */
    public function setProductTypes($productTypes);
}
