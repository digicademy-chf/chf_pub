<?php
declare(strict_types=1);

# This file is part of the extension CHF Pub for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


namespace Digicademy\CHFPub\Domain\Model;

use Digicademy\CHFBase\Domain\Model\AbstractHeritage;
use Digicademy\CHFBase\Domain\Model\Traits\ExtentTrait;
use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
use TYPO3\CMS\Extbase\Annotation\Validate;
use TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

defined('TYPO3') or die();

/**
 * Model for Essay
 */
class Essay extends AbstractHeritage
{
    use ExtentTrait;

    /**
     * Name of this essay
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
     * List of essays that are part of this essay
     * 
     * @var ?ObjectStorage<Essay>
     */
    #[Lazy()]
    protected ?ObjectStorage $essay = null;

    /**
     * Essay that this essay is part of
     * 
     * @var Essay|LazyLoadingProxy|null
     */
    #[Lazy()]
    protected Essay|LazyLoadingProxy|null $parentEssay = null;

    /**
     * Volume that this essay is part of
     * 
     * @var Volume|LazyLoadingProxy|null
     */
    #[Lazy()]
    protected Volume|LazyLoadingProxy|null $parentVolume = null;

    /**
     * Construct object
     *
     * @param string $title
     * @return Essay
     */
    public function __construct(string $title)
    {
        parent::__construct();
        $this->initializeObject();

        $this->setTitle($title);
        $this->setIri('es');
    }

    /**
     * Initialize object
     */
    public function initializeObject(): void
    {
        $this->extent ??= new ObjectStorage();
        $this->essay ??= new ObjectStorage();
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
     * Get parent essay
     * 
     * @return Essay
     */
    public function getParentEssay(): Essay
    {
        if ($this->parentEssay instanceof LazyLoadingProxy) {
            $this->parentEssay->_loadRealInstance();
        }
        return $this->parentEssay;
    }

    /**
     * Set parent essay
     * 
     * @param Essay
     */
    public function setParentEssay(Essay $parentEssay): void
    {
        $this->parentEssay = $parentEssay;
    }

    /**
     * Get parent volume
     * 
     * @return Volume
     */
    public function getParentVolume(): Volume
    {
        if ($this->parentVolume instanceof LazyLoadingProxy) {
            $this->parentVolume->_loadRealInstance();
        }
        return $this->parentVolume;
    }

    /**
     * Set parent volume
     * 
     * @param Volume
     */
    public function setParentVolume(Volume $parentVolume): void
    {
        $this->parentVolume = $parentVolume;
    }
}
