<?php
declare(strict_types=1);

# This file is part of the extension CHF Pub for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


defined('TYPO3') or die();

/**
 * PublicationResource and its properties
 * 
 * Extension of a database table and its editing interface in the
 * TYPO3 backend. This also serves as the basis for the Extbase
 * domain model. For more information on TCA and its options see
 * https://docs.typo3.org/m/typo3/reference-tca/main/en-us/.
 */

// Add select item 'publicationResource'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tx_chfbase_domain_model_resource', 'type',
    [
        'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.publicationResource.type.publicationResource',
        'value' => 'publicationResource',
    ]
);

// Add columns 'allVolumes' and 'allEssays'
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_chfbase_domain_model_resource',
    [
        'allVolumes' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.publicationResource.allVolumes',
            'description' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.publicationResource.allVolumes.description',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_chfpub_domain_model_volume',
                'foreign_field' => 'parentResource',
                'foreign_sortby' => 'sorting',
                'appearance' => [
                    'collapseAll' => true,
                    'expandSingle' => true,
                    'newRecordLinkAddTitle' => true,
                    'levelLinksPosition' => 'top',
                    'useSortable' => false,
                    'showPossibleLocalizationRecords' => true,
                    'showAllLocalizationLink' => true,
                    'showSynchronizationLink' => true,
                ],
            ],
        ],
        'allEssays' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.publicationResource.allEssays',
            'description' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.publicationResource.allEssays.description',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_chfpub_domain_model_essay',
                'foreign_field' => 'parentResource',
                'foreign_sortby' => 'sorting',
                'appearance' => [
                    'collapseAll' => true,
                    'expandSingle' => true,
                    'newRecordLinkAddTitle' => true,
                    'levelLinksPosition' => 'top',
                    'useSortable' => false,
                    'showPossibleLocalizationRecords' => true,
                    'showAllLocalizationLink' => true,
                    'showSynchronizationLink' => true,
                ],
            ],
        ],
    ]
);

// Add type 'publicationResource' and its 'showitem' list
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
   'tx_chfbase_domain_model_resource',
   'hiddenUuid,typeUri,titleLangCode,glossary,description,sameAs,
   --div--;LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.editorial,authorshipRelation,licenceRelation,publicationDateRevisionNumberRevisionDate,editorialNote,
   --div--;LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.content,allAgents,allFileCollections,allLocations,allPeriods,allRelations,allTags,allVolumes,allEssays,
   --div--;LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.import,importOrigin,importState,',
   'publicationResource'
);
