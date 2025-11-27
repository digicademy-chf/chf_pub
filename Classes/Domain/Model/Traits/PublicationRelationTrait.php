<?php
declare(strict_types=1);

# This file is part of the extension CHF Pub for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


namespace Digicademy\CHFPub\Domain\Model\Traits;

use Digicademy\CHFPub\Domain\Model\PublicationRelation;
use TYPO3\CMS\Extbase\Attribute\ORM\Lazy;
use TYPO3\CMS\Extbase\Attribute\ORM\Cascade;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

defined('TYPO3') or die();

/**
 * Trait for models to include a publication-relation property
 */
trait PublicationRelationTrait
{
    /**
     * Relevant text publications in the database
     * 
     * @var ObjectStorage<PublicationRelation>
     */
    #[Lazy()]
    #[Cascade([
        'value' => 'remove',
    ])]
    protected ObjectStorage $publicationRelation;

    /**
     * Get publication relation
     *
     * @return ObjectStorage<PublicationRelation>
     */
    public function getPublicationRelation(): ObjectStorage
    {
        return $this->publicationRelation;
    }

    /**
     * Set publication relation
     *
     * @param ObjectStorage<PublicationRelation> $publicationRelation
     */
    public function setPublicationRelation(ObjectStorage $publicationRelation): void
    {
        $this->publicationRelation = $publicationRelation;
    }

    /**
     * Add publication relation
     *
     * @param PublicationRelation $publicationRelation
     */
    public function addPublicationRelation(PublicationRelation $publicationRelation): void
    {
        $this->publicationRelation->attach($publicationRelation);
    }

    /**
     * Remove publication relation
     *
     * @param PublicationRelation $publicationRelation
     */
    public function removePublicationRelation(PublicationRelation $publicationRelation): void
    {
        $this->publicationRelation->detach($publicationRelation);
    }

    /**
     * Remove all publication relations
     */
    public function removeAllPublicationRelation(): void
    {
        $publicationRelation = clone $this->publicationRelation;
        $this->publicationRelation->removeAll($publicationRelation);
    }
}
