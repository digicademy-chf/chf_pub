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
use Digicademy\CHFBase\Domain\Model\AbstractRelation;
use Digicademy\CHFBase\Domain\Model\Agent;
use Digicademy\CHFBase\Domain\Model\Location;
use Digicademy\CHFBase\Domain\Model\Period;
use Digicademy\CHFBib\Domain\Model\BibliographicEntry;
use Digicademy\CHFLex\Domain\Model\DictionaryEntry;
use Digicademy\CHFLex\Domain\Model\EncyclopediaEntry;
use Digicademy\CHFMap\Domain\Model\Feature;
use Digicademy\CHFMedia\Domain\Model\FileGroup;
use Digicademy\CHFObject\Domain\Model\SingleObject;
use Digicademy\CHFObject\Domain\Model\ObjectGroup;

defined('TYPO3') or die();

/**
 * Model for PublicationRelation
 */
class PublicationRelation extends AbstractRelation
{
    /**
     * Record to connect a relation to
     * 
     * @var Agent|Location|Period|BibliographicEntry|DictionaryEntry|EncyclopediaEntry|Feature|FileGroup|SingleObject|ObjectGroup|Essay|Volume|LazyLoadingProxy|null
     */
    #[Lazy()]
    protected Agent|Location|Period|BibliographicEntry|DictionaryEntry|EncyclopediaEntry|Feature|FileGroup|SingleObject|ObjectGroup|Essay|Volume|null $record = null;

    /**
     * Essay to relate to the record
     * 
     * @var Essay|LazyLoadingProxy|null
     */
    #[Lazy()]
    protected Essay|LazyLoadingProxy|null $essay = null;

    /**
     * Volume to relate to the record
     * 
     * @var Volume|LazyLoadingProxy|null
     */
    #[Lazy()]
    protected Volume|LazyLoadingProxy|null $volume = null;

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
     * @param Agent|Location|Period|BibliographicEntry|DictionaryEntry|EncyclopediaEntry|Feature|FileGroup|SingleObject|ObjectGroup|Essay|Volume $record
     * @param PublicationResource $parentResource
     * @return PublicationRelation
     */
    public function __construct(Agent|Location|Period|BibliographicEntry|DictionaryEntry|EncyclopediaEntry|Feature|FileGroup|SingleObject|ObjectGroup|Essay|Volume $record, PublicationResource $parentResource)
    {
        parent::__construct($parentResource);
        $this->initializeObject();

        $this->setType('publicationRelation');
        $this->setRecord($record);
    }

    /**
     * Get record
     * 
     * @return Agent|Location|Period|BibliographicEntry|DictionaryEntry|EncyclopediaEntry|Feature|FileGroup|SingleObject|ObjectGroup|Essay|Volume
     */
    public function getRecord(): Agent|Location|Period|BibliographicEntry|DictionaryEntry|EncyclopediaEntry|Feature|FileGroup|SingleObject|ObjectGroup|Essay|Volume
    {
        if ($this->record instanceof LazyLoadingProxy) {
            $this->record->_loadRealInstance();
        }
        return $this->record;
    }

    /**
     * Set record
     * 
     * @param Agent|Location|Period|BibliographicEntry|DictionaryEntry|EncyclopediaEntry|Feature|FileGroup|SingleObject|ObjectGroup|Essay|Volume
     */
    public function setRecord(Agent|Location|Period|BibliographicEntry|DictionaryEntry|EncyclopediaEntry|Feature|FileGroup|SingleObject|ObjectGroup|Essay|Volume $record): void
    {
        $this->record = $record;
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
