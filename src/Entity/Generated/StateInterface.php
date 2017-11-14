<?php
namespace Loevgaard\DandomainFoundation\Entity\Generated;

/**
 * Implement this interface in State!
 * This is a combined interface that will automatically extend to contain the required functions.
 */
interface StateInterface
{

    /**
     * Populates a shipping method based on the response from the Dandomain API
     *
     * See the properties here:
     * http://4221117.shop53.dandomain.dk/admin/webapi/endpoints/v1_0/OrderService/help/operations/GetOrder
     *
     * @param \stdClass|array $data
     * @return StateInterface
     */
    public function populateFromApiResponse($data);

    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return StateInterface
     */
    public function setId($id);

    /**
     * @return int
     */
    public function getExternalId();

    /**
     * @param int $externalId
     * @return StateInterface
     */
    public function setExternalId($externalId);

    /**
     * @return bool|null
     */
    public function getExclStatistics();

    /**
     * @param bool|null $exclStatistics
     * @return StateInterface
     */
    public function setExclStatistics($exclStatistics);

    /**
     * @return bool|null
     */
    public function getisDefault();

    /**
     * @param bool|null $isDefault
     * @return StateInterface
     */
    public function setIsDefault($isDefault);

    /**
     * @return null|string
     */
    public function getName();

    /**
     * @param null|string $name
     * @return StateInterface
     */
    public function setName($name);
}
