<?php
declare(strict_types=1);

# This file is part of the extension CHF Pub for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


namespace Digicademy\CHFPub\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
use TYPO3\CMS\Extbase\Annotation\ORM\Cascade;
use TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use Digicademy\CHFBase\Domain\Model\AbstractResource;
use Digicademy\CHFGloss\Domain\Model\GlossaryResource;

defined('TYPO3') or die();

/**
 * Model for PublicationResource
 */
class PublicationResource extends AbstractResource
{
    /**
     * Resource to use as a glossary for this resource
     * 
     * @var GlossaryResource|LazyLoadingProxy
     */
    #[Lazy()]
    protected GlossaryResource|LazyLoadingProxy $glossary;

    /**
     * List of all volumes compiled in this resource
     * 
     * @var ?ObjectStorage<Volume>
     */
    #[Lazy()]
    #[Cascade([
        'value' => 'remove',
    ])]
    protected ?ObjectStorage $allVolumes = null;

    /**
     * List of all essays compiled in this resource
     * 
     * @var ?ObjectStorage<Essay>
     */
    #[Lazy()]
    #[Cascade([
        'value' => 'remove',
    ])]
    protected ?ObjectStorage $allEssays = null;

    /**
     * Construct object
     *
     * @param string $uuid
     * @param string $langCode
     * @return PublicationResource
     */
    public function __construct(string $uuid, string $langCode)
    {
        parent::__construct($uuid, $langCode);
        $this->initializeObject();

        $this->setType('publicationResource');
    }

    /**
     * Initialize object
     */
    public function initializeObject(): void
    {
        $this->glossary = new LazyLoadingProxy();
        $this->allVolumes ??= new ObjectStorage();
        $this->allEssays ??= new ObjectStorage();
    }

    /**
     * Get glossary
     * 
     * @return GlossaryResource
     */
    public function getGlossary(): GlossaryResource
    {
        if ($this->glossary instanceof LazyLoadingProxy) {
            $this->glossary->_loadRealInstance();
        }
        return $this->glossary;
    }

    /**
     * Set glossary
     * 
     * @param GlossaryResource
     */
    public function setGlossary(GlossaryResource $glossary): void
    {
        $this->glossary = $glossary;
    }

    /**
     * Get all volumes
     *
     * @return ObjectStorage<Volume>
     */
    public function getAllVolumes(): ?ObjectStorage
    {
        return $this->allVolumes;
    }

    /**
     * Set all volumes
     *
     * @param ObjectStorage<Volume> $allVolumes
     */
    public function setAllVolumes(ObjectStorage $allVolumes): void
    {
        $this->allVolumes = $allVolumes;
    }

    /**
     * Add all volumes
     *
     * @param Volume $allVolumes
     */
    public function addAllVolumes(Volume $allVolumes): void
    {
        $this->allVolumes?->attach($allVolumes);
    }

    /**
     * Remove all volumes
     *
     * @param Volume $allVolumes
     */
    public function removeAllVolumes(Volume $allVolumes): void
    {
        $this->allVolumes?->detach($allVolumes);
    }

    /**
     * Remove all all volumes
     */
    public function removeAllAllVolumes(): void
    {
        $allVolumes = clone $this->allVolumes;
        $this->allVolumes->removeAll($allVolumes);
    }

    /**
     * Get all essays
     *
     * @return ObjectStorage<Essay>
     */
    public function getAllEssays(): ?ObjectStorage
    {
        return $this->allEssays;
    }

    /**
     * Set all essays
     *
     * @param ObjectStorage<Essay> $allEssays
     */
    public function setAllEssays(ObjectStorage $allEssays): void
    {
        $this->allEssays = $allEssays;
    }

    /**
     * Add all essays
     *
     * @param Essay $allEssays
     */
    public function addAllEssays(Essay $allEssays): void
    {
        $this->allEssays?->attach($allEssays);
    }

    /**
     * Remove all essays
     *
     * @param Essay $allEssays
     */
    public function removeAllEssays(Essay $allEssays): void
    {
        $this->allEssays?->detach($allEssays);
    }

    /**
     * Remove all all essays
     */
    public function removeAllAllEssays(): void
    {
        $allEssays = clone $this->allEssays;
        $this->allEssays->removeAll($allEssays);
    }
}
