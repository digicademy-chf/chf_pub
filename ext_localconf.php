<?php
declare(strict_types=1);

# This file is part of the extension CHF Pub for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


use Digicademy\CHFPub\Controller\EssayController;
use Digicademy\CHFPub\Controller\VolumeController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

// Register 'PubEssay' content element
ExtensionUtility::configurePlugin(
    'CHFObject',
    'PubEssay',
    [
        EssayController::class => 'index',
        EssayController::class => 'show',
    ],
);

// Register 'PubVolume' content element
ExtensionUtility::configurePlugin(
    'CHFObject',
    'PubVolume',
    [
        VolumeController::class => 'index',
        VolumeController::class => 'show',
    ],
);
