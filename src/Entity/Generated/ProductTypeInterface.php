<?php
namespace Loevgaard\DandomainFoundation\Entity\Generated;

/**
 * Implement this interface in ProductType!
 * This is a combined interface that will automatically extend to contain the required functions.
 */
interface ProductTypeInterface
{

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     * @return \Loevgaard\DandomainFoundation\Entity\ProductType
     */
    public function setId(int $id);

    /**
     * @return string
     */
    public function getExternalId(): string;

    /**
     * @param string $externalId
     * @return \Loevgaard\DandomainFoundation\Entity\ProductType
     */
    public function setExternalId(string $externalId);

    /**
     * @return null|string
     */
    public function getName();

    /**
     * @param null|string $name
     * @return \Loevgaard\DandomainFoundation\Entity\ProductType
     */
    public function setName($name);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\ProductTypeField[]
     */
    public function getProductTypeFields();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\ProductTypeField[] $productTypeFields
     * @return \Loevgaard\DandomainFoundation\Entity\ProductType
     */
    public function setProductTypeFields($productTypeFields);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\ProductTypeFormula[]
     */
    public function getProductTypeFormulas();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\ProductTypeFormula[] $productTypeFormulas
     * @return \Loevgaard\DandomainFoundation\Entity\ProductType
     */
    public function setProductTypeFormulas($productTypeFormulas);

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\ProductTypeVat[]
     */
    public function getProductTypeVats();

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Loevgaard\DandomainFoundation\Entity\ProductTypeVat[] $productTypeVats
     * @return \Loevgaard\DandomainFoundation\Entity\ProductType
     */
    public function setProductTypeVats($productTypeVats);
}
