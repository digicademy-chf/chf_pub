<?php
declare(strict_types=1);

# This file is part of the extension CHF Pub for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


defined('TYPO3') or die();

/**
 * Extent and its properties
 * 
 * Extension of a database table and its editing interface in the
 * TYPO3 backend. This also serves as the basis for the Extbase
 * domain model. For more information on TCA and its options see
 * https://docs.typo3.org/m/typo3/reference-tca/main/en-us/.
 */

// Please also add new items in this list to the overwriteChildTca in tx_chfpub_domain_model_volume and tx_chfpub_domain_model_essay

// Add select item group 'chfPub'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItemGroup('tx_chfbase_domain_model_extent', 'type',
    'chfPub',
    'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.chfPub'
);

// Add select item 'doi'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tx_chfbase_domain_model_extent', 'type',
    [
        'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.extent.type.doi',
        'value' => 'doi',
        'group' => 'chfPub',
    ]
);

// Add select item 'urn'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tx_chfbase_domain_model_extent', 'type',
    [
        'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.extent.type.urn',
        'value' => 'urn',
        'group' => 'chfPub',
    ]
);

// Add select item 'edition'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tx_chfbase_domain_model_extent', 'type',
    [
        'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.extent.type.edition',
        'value' => 'edition',
        'group' => 'chfPub',
    ]
);

// Add select item 'volume'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tx_chfbase_domain_model_extent', 'type',
    [
        'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.extent.type.volume',
        'value' => 'volume',
        'group' => 'chfPub',
    ]
);

// Add select item 'issue'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tx_chfbase_domain_model_extent', 'type',
    [
        'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.extent.type.issue',
        'value' => 'issue',
        'group' => 'chfPub',
    ]
);

// Add select item 'issn'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tx_chfbase_domain_model_extent', 'type',
    [
        'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.extent.type.issn',
        'value' => 'issn',
        'group' => 'chfPub',
    ]
);

// Add select item 'isbn'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tx_chfbase_domain_model_extent', 'type',
    [
        'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.extent.type.isbn',
        'value' => 'isbn',
        'group' => 'chfPub',
    ]
);
