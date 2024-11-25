<?php
declare(strict_types=1);

# This file is part of the extension CHF Pub for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


use Digicademy\CHFPub\Controller\BlogController;
use Digicademy\CHFPub\Controller\BooksController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

// Register 'Blog' content element
ExtensionUtility::configurePlugin(
    'CHFPub',
    'Blog',
    [
        BlogController::class => 'index, show',
    ],
    [], // None of the actions are non-cacheable
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);

// Register 'Books' content element
ExtensionUtility::configurePlugin(
    'CHFPub',
    'Books',
    [
        BooksController::class => 'index, show',
    ],
    [], // None of the actions are non-cacheable
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);
