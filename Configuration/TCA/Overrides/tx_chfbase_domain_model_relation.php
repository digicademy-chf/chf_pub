<?php
declare(strict_types=1);

# This file is part of the extension CHF Pub for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


defined('TYPO3') or die();

/**
 * PublicationRelation and its properties
 * 
 * Extension of a database table and its editing interface in the
 * TYPO3 backend. This also serves as the basis for the Extbase
 * domain model. For more information on TCA and its options see
 * https://docs.typo3.org/m/typo3/reference-tca/main/en-us/.
 */

// Add select item group 'chfPub'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItemGroup('tx_chfbase_domain_model_relation', 'type',
    'chfPub',
    'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.chfPub'
);

// Add select item 'publicationRelation'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tx_chfbase_domain_model_relation', 'type',
    [
        'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.publicationRelation.type.publicationRelation',
        'value' => 'publicationRelation',
        'group' => 'chfPub',
    ]
);

// Add columns 'volume', 'essay', and 'volumePosition'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_chfbase_domain_model_relation',
    [
        'volume' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.publicationRelation.volume',
            'description' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.publicationRelation.volume.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_chfpub_domain_model_volume',
                'foreign_table_where' => 'AND {#tx_chfpub_domain_model_volume}.{#pid}=###CURRENT_PID###',
                'MM' => 'tx_chfbase_domain_model_relation_volume_volume_mm',
                'multiple' => 1,
                'sortItems' => [
                    'label' => 'asc',
                ],
            ],
        ],
        'essay' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.publicationRelation.essay',
            'description' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.publicationRelation.essay.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_chfpub_domain_model_essay',
                'foreign_table_where' => 'AND {#tx_chfpub_domain_model_essay}.{#pid}=###CURRENT_PID###',
                'MM' => 'tx_chfbase_domain_model_relation_essay_essay_mm',
                'multiple' => 1,
                'sortItems' => [
                    'label' => 'asc',
                ],
            ],
        ],
        'position' => [
            'exclude' => true,
            'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.publicationRelation.position',
            'description' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.publicationRelation.position.description',
            'config' => [
                'type' => 'input',
                'size' => 40,
                'max' => 255,
                'eval' => 'trim',
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
    ]
);

// Create palette 'volumeEssayPosition'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
    'tx_chfbase_domain_model_relation',
    'volumeEssayPosition',
    'volume,essay,--linebreak--,position,'
);

// Add type 'publicationRelation' and its 'showitem' list
$GLOBALS['TCA']['tx_chfbase_domain_model_relation']['types'] += ['publicationRelation' => [
    'showitem' => '--palette--;;typeUuid,record,--palette--;;volumeEssayPosition,--palette--;;parentResourceDescription,',
]];
