<?php
declare(strict_types=1);

# This file is part of the extension CHF Pub for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

/**
 * ContentElement and its properties
 * 
 * Extension of a database table and its editing interface in the
 * TYPO3 backend. This also serves as the basis for the Extbase
 * domain model. For more information on TCA and its options see
 * https://docs.typo3.org/m/typo3/reference-tca/main/en-us/.
 */

// Add plugin 'Blog'
ExtensionUtility::registerPlugin(
    'CHFPub',
    'Blog',
    'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:plugin.blog',
    'tx-chfpub-plugin-blog',
    'heritage',
    'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:plugin.blog.description',
);

// Add plugin 'Books'
ExtensionUtility::registerPlugin(
    'CHFPub',
    'Books',
    'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:plugin.books',
    'tx-chfpub-plugin-books',
    'heritage',
    'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:plugin.books.description',
);

// Add data tab to plugin form
ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    '--div--;LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:plugin.generic.data,pi_flexform',
    'chfpub_blog,chfpub_books',
    'after:subheader',
);

// Add form for plugin 'Blog'
ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:EXT:chf_pub/Configuration/FlexForms/PluginData.xml',
    'chfpub_blog',
);

// Add form for plugin 'Books'
ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:EXT:chf_pub/Configuration/FlexForms/PluginData.xml',
    'chfpub_books',
);
