<?php
declare(strict_types=1);

# This file is part of the extension CHF Pub for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


namespace Digicademy\CHFPub\Domain\Model;

use Digicademy\CHFBase\Domain\Model\AbstractBase;
use Digicademy\CHFBase\Domain\Model\AbstractRelation;
use Digicademy\CHFBase\Domain\Model\Traits\RecordTrait;
use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
use TYPO3\CMS\Extbase\Annotation\Validate;
use TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy;

defined('TYPO3') or die();

/**
 * Model for PublicationRelation
 */
class PublicationRelation extends AbstractRelation
{
    use RecordTrait;

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
     * @param AbstractBase $record
     * @return PublicationRelation
     */
    public function __construct(AbstractBase $record)
    {
        parent::__construct();
        $this->initializeObject();

        $this->setType('publicationRelation');
        $this->setRecord($record);
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
