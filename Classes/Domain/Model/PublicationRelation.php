<?php
declare(strict_types=1);

# This file is part of the extension CHF Pub for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


namespace Digicademy\CHFPub\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
use TYPO3\CMS\Extbase\Annotation\Validate;
use TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy;
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
     * @var object|LazyLoadingProxy|null
     */
    #[Lazy()]
    protected object|null $record = null;

    /**
     * Volume to relate to the record
     * 
     * @var Volume|LazyLoadingProxy|null
     */
    #[Lazy()]
    protected Volume|LazyLoadingProxy|null $volume = null;

    /**
     * Essay to relate to the record
     * 
     * @var Essay|LazyLoadingProxy|null
     */
    #[Lazy()]
    protected Essay|LazyLoadingProxy|null $essay = null;

    /**
     * Page number or other location
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
        $this->setRecord($record);
    }

    /**
     * Get record
     * 
     * @return object
     */
    public function getRecord(): object
    {
        if ($this->record instanceof LazyLoadingProxy) {
            $this->record->_loadRealInstance();
        }
        return $this->record;
    }

    /**
     * Set record
     * 
     * @param object
     */
    public function setRecord(object $record): void
    {
        $this->record = $record;
    }

    /**
     * Get volume
     * 
     * @return Volume
     */
    public function getVolume(): Volume
    {
        if ($this->volume instanceof LazyLoadingProxy) {
            $this->volume->_loadRealInstance();
        }
        return $this->volume;
    }

    /**
     * Set volume
     * 
     * @param Volume
     */
    public function setVolume(Volume $volume): void
    {
        $this->volume = $volume;
    }

    /**
     * Get essay
     * 
     * @return Essay
     */
    public function getEssay(): Essay
    {
        if ($this->essay instanceof LazyLoadingProxy) {
            $this->essay->_loadRealInstance();
        }
        return $this->essay;
    }

    /**
     * Set essay
     * 
     * @param Essay
     */
    public function setEssay(Essay $essay): void
    {
        $this->essay = $essay;
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
