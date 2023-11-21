<?php

declare(strict_types=1);

# This file is part of the extension CHF Pub for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


namespace Digicademy\CHFPub\Domain\Repository;

use Digicademy\CHFPub\Domain\Model\Volume;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Repository for Volume
 * 
 * @extends Repository<Volume>
 */
class VolumeRepository extends Repository
{
    protected $defaultOrderings = [
        'sorting'          => QueryInterface::ORDER_ASCENDING,
        'itemTitle'        => QueryInterface::ORDER_ASCENDING,
        'publicationTitle' => QueryInterface::ORDER_ASCENDING,
        'seriesTitle'      => QueryInterface::ORDER_ASCENDING,
        'meetingTitle'     => QueryInterface::ORDER_ASCENDING,
    ];
}

?>
