<?php
declare(strict_types=1);

# This file is part of the extension CHF Pub for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


namespace Digicademy\CHFPub\Domain\Model;

use Digicademy\CHFBase\Domain\Model\AbstractResource;
use Digicademy\CHFGloss\Domain\Model\Traits\GlossaryTrait;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

/**
 * Model for AbstractPublicationResource
 */
class AbstractPublicationResource extends AbstractResource
{
    /**
     * Construct object
     *
     * @param string $langCode
     * @return PublicationResource
     */
    public function __construct(string $langCode)
    {
        parent::__construct($langCode);

        $this->setType('publicationResource');
    }
}

# If CHF Gloss is available
if (ExtensionManagementUtility::isLoaded('chf_gloss')) {

    /**
     * Model for PublicationResource (with glossary property)
     */
    class PublicationResource extends AbstractPublicationResource
    {
        use GlossaryTrait;
    }

# If no relevant extensions are available
} else {

    /**
     * Model for PublicationResource
     */
    class PublicationResource extends AbstractPublicationResource
    {}
}
