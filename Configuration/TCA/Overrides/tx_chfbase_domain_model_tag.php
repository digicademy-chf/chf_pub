<?php
declare(strict_types=1);

# This file is part of the extension CHF Pub for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


defined('TYPO3') or die();

/**
 * LabelTag and its properties
 * 
 * Extension of a database table and its editing interface in the
 * TYPO3 backend. This also serves as the basis for the Extbase
 * domain model. For more information on TCA and its options see
 * https://docs.typo3.org/m/typo3/reference-tca/main/en-us/.
 */

// Add column 'asLabelOfVolume'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_chfbase_domain_model_tag',
    [
        'asLabelOfVolume' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.labelTag.asLabelOfVolume',
            'description' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.labelTag.asLabelOfVolume.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_chfpub_domain_model_volume',
                'foreign_table_where' => 'AND {#tx_chfpub_domain_model_volume}.{#pid}=###CURRENT_PID###',
                'MM' => 'tx_chfpub_domain_model_volume_tag_label_mm',
                'MM_opposite_field' => 'label',
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
                'readOnly' => true,
            ],
        ],
    ]
);

// Add column 'asLabelOfEssay'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_chfbase_domain_model_tag',
    [
        'asLabelOfEssay' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.labelTag.asLabelOfEssay',
            'description' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.labelTag.asLabelOfEssay.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_chfpub_domain_model_essay',
                'foreign_table_where' => 'AND {#tx_chfpub_domain_model_essay}.{#pid}=###CURRENT_PID###',
                'MM' => 'tx_chfpub_domain_model_essay_tag_label_mm',
                'MM_opposite_field' => 'label',
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
                'readOnly' => true,
            ],
        ],
    ]
);
