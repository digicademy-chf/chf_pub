<?php
declare(strict_types=1);

# This file is part of the extension CHF Pub for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


defined('TYPO3') or die();

/**
 * EncyclopediaEntry and its properties
 * 
 * Extension of a database table and its editing interface in the
 * TYPO3 backend. This also serves as the basis for the Extbase
 * domain model. For more information on TCA and its options see
 * https://docs.typo3.org/m/typo3/reference-tca/main/en-us/.
 */

// Add column 'publicationRelation'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_chflex_domain_model_encyclopedia_entry',
    [
        'publicationRelation' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.abstractHeritage.publicationRelation',
            'description' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.abstractHeritage.publicationRelation.description',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_chfbase_domain_model_relation',
                'MM' => 'tx_chfbase_domain_model_relation_any_record_mm',
                'MM_match_fields' => [
                    'tablenames' => 'tx_chflex_domain_model_encyclopedia_entry',
                    'fieldname' => 'publicationRelation',
                ],
                'MM_opposite_field' => 'record',
                'multiple' => 1,
                'appearance' => [
                    'collapseAll' => true,
                    'expandSingle' => true,
                    'newRecordLinkAddTitle' => true,
                    'levelLinksPosition' => 'bottom',
                    'useSortable' => true,
                    'showPossibleLocalizationRecords' => true,
                    'showAllLocalizationLink' => true,
                    'showSynchronizationLink' => true,
                ],
                'overrideChildTca' => [
                    'columns' => [
                        'type' => [
                            'config' => [
                                'default' => 'publicationRelation',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ]
);
