<?php
namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Translatable\Translation;
use Loevgaard\DandomainFoundation\Entity\Generated\TagValueTranslationInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\TagValueTranslationTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_tag_value_translations")
 */
class TagValueTranslation implements TagValueTranslationInterface
{
    use TagValueTranslationTrait;
    use Translation;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=191)
     **/
    protected $text;

    /**
     * @return null|string
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param null|string $text
     * @return TagValueTranslation
     */
    public function setText(?string $text)
    {
        $this->text = $text;
        return $this;
    }
}