<?php
declare(strict_types=1);

# This file is part of the extension CHF Pub for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


defined('TYPO3') or die();

/**
 * VolumeRelation and its properties
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

// Add select item 'volumeRelation'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tx_chfbase_domain_model_relation', 'type',
    [
        'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.volumeRelation.type.volumeRelation',
        'value' => 'volumeRelation',
        'group' => 'chfPub',
    ]
);

// Add columns 'volume' and 'volumePosition'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_chfbase_domain_model_relation',
    [
        'volume' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.volumeRelation.volume',
            'description' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.volumeRelation.volume.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_chfpub_domain_model_volume',
                'foreign_table_where' => 'AND {#tx_chfpub_domain_model_volume}.{#pid}=###CURRENT_PID###',
                'MM' => 'tx_chfpub_domain_model_relation_volume_volume_mm',
                'MM_opposite_field' => 'asVolumeOfVolumeRelation',
                'size' => 5,
                'autoSizeMax' => 10,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => false,
                    ],
                ],
                'required' => true,
            ],
        ],
        'volumePosition' => [
            'exclude' => true,
            'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.volumeRelation.volumePosition',
            'description' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.volumeRelation.volumePosition.description',
            'config' => [
                'type' => 'input',
                'size' => 40,
                'max' => 255,
                'eval' => 'trim',
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
                'required' => true,
            ],
        ],
    ]
);

// Create palette 'volumeVolumePosition'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
    'tx_chfbase_domain_model_relation',
    'volumeVolumePosition',
    'volume,volumePosition,'
);

// Add type 'volumeRelation' and its 'showitem' list
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
   'tx_chfbase_domain_model_relation',
   'hiddenParentResource,uuidType,record,volumeVolumePosition,description,',
   'volumeRelation'
);
