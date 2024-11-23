<?php
declare(strict_types=1);

# This file is part of the extension CHF Pub for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


namespace Digicademy\CHFPub\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
use TYPO3\CMS\Extbase\Annotation\ORM\Cascade;
use TYPO3\CMS\Extbase\Annotation\Validate;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use Digicademy\CHFBase\Domain\Model\AbstractHeritage;
use Digicademy\CHFBase\Domain\Model\Extent;

defined('TYPO3') or die();

/**
 * Model for Volume
 */
class Volume extends AbstractHeritage
{
    /**
     * Name of this volume
     * 
     * @var string
     */
    #[Validate([
        'validator' => 'StringLength',
        'options' => [
            'maximum' => 255,
        ],
    ])]
    protected string $title = '';

    /**
     * List of extents relevant to this entry
     * 
     * @var ?ObjectStorage<Extent>
     */
    #[Lazy()]
    #[Cascade([
        'value' => 'remove',
    ])]
    protected ?ObjectStorage $extent = null;

    /**
     * List of essays that are part of this volume
     * 
     * @var ?ObjectStorage<Essay>
     */
    #[Lazy()]
    protected ?ObjectStorage $essay = null;

    /**
     * List of publication relations that use this volume
     * 
     * @var ?ObjectStorage<PublicationRelation>
     */
    #[Lazy()]
    protected ?ObjectStorage $asVolumeOfPublicationRelation = null;

    /**
     * Construct object
     *
     * @param string $title
     * @param PublicationResource $parentResource
     * @param string $uuid
     * @return Volume
     */
    public function __construct(string $title, PublicationResource $parentResource, string $uuid)
    {
        parent::__construct($parentResource, $uuid);
        $this->initializeObject();

        $this->setTitle($title);
    }

    /**
     * Initialize object
     */
    public function initializeObject(): void
    {
        $this->extent ??= new ObjectStorage();
        $this->essay ??= new ObjectStorage();
        $this->asVolumeOfPublicationRelation ??= new ObjectStorage();
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set title
     *
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * Get extent
     *
     * @return ObjectStorage<Extent>
     */
    public function getExtent(): ?ObjectStorage
    {
        return $this->extent;
    }

    /**
     * Set extent
     *
     * @param ObjectStorage<Extent> $extent
     */
    public function setExtent(ObjectStorage $extent): void
    {
        $this->extent = $extent;
    }

    /**
     * Add extent
     *
     * @param Extent $extent
     */
    public function addExtent(Extent $extent): void
    {
        $this->extent?->attach($extent);
    }

    /**
     * Remove extent
     *
     * @param Extent $extent
     */
    public function removeExtent(Extent $extent): void
    {
        $this->extent?->detach($extent);
    }

    /**
     * Remove all extents
     */
    public function removeAllExtent(): void
    {
        $extent = clone $this->extent;
        $this->extent->removeAll($extent);
    }

    /**
     * Get essay
     *
     * @return ObjectStorage<Essay>
     */
    public function getEssay(): ?ObjectStorage
    {
        return $this->essay;
    }

    /**
     * Set essay
     *
     * @param ObjectStorage<Essay> $essay
     */
    public function setEssay(ObjectStorage $essay): void
    {
        $this->essay = $essay;
    }

    /**
     * Add essay
     *
     * @param Essay $essay
     */
    public function addEssay(Essay $essay): void
    {
        $this->essay?->attach($essay);
    }

    /**
     * Remove essay
     *
     * @param Essay $essay
     */
    public function removeEssay(Essay $essay): void
    {
        $this->essay?->detach($essay);
    }

    /**
     * Remove all essays
     */
    public function removeAllEssay(): void
    {
        $essay = clone $this->essay;
        $this->essay->removeAll($essay);
    }

    /**
     * Get as volume of publication relation
     *
     * @return ObjectStorage<PublicationRelation>
     */
    public function getAsVolumeOfPublicationRelation(): ?ObjectStorage
    {
        return $this->asVolumeOfPublicationRelation;
    }

    /**
     * Set as volume of publication relation
     *
     * @param ObjectStorage<PublicationRelation> $asVolumeOfPublicationRelation
     */
    public function setAsVolumeOfPublicationRelation(ObjectStorage $asVolumeOfPublicationRelation): void
    {
        $this->asVolumeOfPublicationRelation = $asVolumeOfPublicationRelation;
    }

    /**
     * Add as volume of publication relation
     *
     * @param PublicationRelation $asVolumeOfPublicationRelation
     */
    public function addAsVolumeOfPublicationRelation(PublicationRelation $asVolumeOfPublicationRelation): void
    {
        $this->asVolumeOfPublicationRelation?->attach($asVolumeOfPublicationRelation);
    }

    /**
     * Remove as volume of publication relation
     *
     * @param PublicationRelation $asVolumeOfPublicationRelation
     */
    public function removeAsVolumeOfPublicationRelation(PublicationRelation $asVolumeOfPublicationRelation): void
    {
        $this->asVolumeOfPublicationRelation?->detach($asVolumeOfPublicationRelation);
    }

    /**
     * Remove all as volume of publication relations
     */
    public function removeAllAsVolumeOfPublicationRelation(): void
    {
        $asVolumeOfPublicationRelation = clone $this->asVolumeOfPublicationRelation;
        $this->asVolumeOfPublicationRelation->removeAll($asVolumeOfPublicationRelation);
    }
}
