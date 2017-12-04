<?php

namespace Loevgaard\DandomainFoundation\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Translatable\Translation;
use Loevgaard\DandomainFoundation\Entity\Generated\CategoryTranslationInterface;
use Loevgaard\DandomainFoundation\Entity\Generated\CategoryTranslationTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ldf_category_translations")
 */
class CategoryTranslation extends AbstractEntity implements CategoryTranslationInterface
{
    use CategoryTranslationTrait;
    use Translation;


}
