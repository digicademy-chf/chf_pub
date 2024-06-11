<?php
declare(strict_types=1);

# This file is part of the extension CHF Pub for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


namespace Digicademy\CHFPub\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
use TYPO3\CMS\Extbase\Annotation\Validate;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use Digicademy\CHFBase\Domain\Model\AbstractRelation;

defined('TYPO3') or die();

/**
 * Model for PublicationRelation
 */
class PublicationRelation extends AbstractRelation
{
    /**
     * Record to connect a relation to
     * 
     * @var ?ObjectStorage<object>
     */
    #[Lazy()]
    protected ?ObjectStorage $record;

    /**
     * Volume to relate to the record
     * 
     * @var ?ObjectStorage<Volume>
     */
    #[Lazy()]
    protected ?ObjectStorage $volume;

    /**
     * Essay to relate to the record
     * 
     * @var ?ObjectStorage<Essay>
     */
    #[Lazy()]
    protected ?ObjectStorage $essay;

    /**
     * Page number or other location in the volume or essay to relate to
     * 
     * @var string
     */
    #[Validate([
        'validator' => 'StringLength',
        'options' => [
            'maximum' => 255,
        ],
    ])]
    protected string $position = '';

    /**
     * Construct object
     *
     * @param object $parentResource
     * @param string $uuid
     * @param object $record
     * @return PublicationRelation
     */
    public function __construct(object $parentResource, string $uuid, object $record)
    {
        parent::__construct($parentResource, $uuid);
        $this->initializeObject();

        $this->setType('publicationRelation');
        $this->addRecord($record);
    }

    /**
     * Initialize object
     */
    public function initializeObject(): void
    {
        $this->record ??= new ObjectStorage();
        $this->volume ??= new ObjectStorage();
        $this->essay ??= new ObjectStorage();
    }

    /**
     * Get record
     *
     * @return ObjectStorage<object>
     */
    public function getRecord(): ?ObjectStorage
    {
        return $this->record;
    }

    /**
     * Set record
     *
     * @param ObjectStorage<object> $record
     */
    public function setRecord(ObjectStorage $record): void
    {
        $this->record = $record;
    }

    /**
     * Add record
     *
     * @param object $record
     */
    public function addRecord(object $record): void
    {
        $this->record?->attach($record);
    }

    /**
     * Remove record
     *
     * @param object $record
     */
    public function removeRecord(object $record): void
    {
        $this->record?->detach($record);
    }

    /**
     * Remove all records
     */
    public function removeAllRecord(): void
    {
        $record = clone $this->record;
        $this->record->removeAll($record);
    }

    /**
     * Get volume
     *
     * @return ObjectStorage<Volume>
     */
    public function getVolume(): ?ObjectStorage
    {
        return $this->volume;
    }

    /**
     * Set volume
     *
     * @param ObjectStorage<Volume> $volume
     */
    public function setVolume(ObjectStorage $volume): void
    {
        $this->volume = $volume;
    }

    /**
     * Add volume
     *
     * @param Volume $volume
     */
    public function addVolume(Volume $volume): void
    {
        $this->volume?->attach($volume);
    }

    /**
     * Remove volume
     *
     * @param Volume $volume
     */
    public function removeVolume(Volume $volume): void
    {
        $this->volume?->detach($volume);
    }

    /**
     * Remove all volumes
     */
    public function removeAllVolume(): void
    {
        $volume = clone $this->volume;
        $this->volume->removeAll($volume);
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
     * Get position
     *
     * @return string
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * Set position
     *
     * @param string $position
     */
    public function setPosition(string $position): void
    {
        $this->position = $position;
    }
}
