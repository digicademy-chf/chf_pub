<?php
declare(strict_types=1);

# This file is part of the extension CHF Pub for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


defined('TYPO3') or die();

/**
 * Essay and its properties
 * 
 * Configuration of a database table and its editing interface in the
 * TYPO3 backend. This also serves as the basis for the Extbase
 * domain model. For more information on TCA and its options see
 * https://docs.typo3.org/m/typo3/reference-tca/main/en-us/.
 */
return [
    'ctrl' => [
        'title'                    => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.essay',
        'label'                    => 'title',
        'descriptionColumn'        => 'editorialNote',
        'tstamp'                   => 'tstamp',
        'crdate'                   => 'crdate',
        'delete'                   => 'deleted',
        'sortby'                   => 'sorting',
        'default_sortby'           => 'isHighlight ASC,title ASC',
        'versioningWS'             => true,
        'iconfile'                 => 'EXT:chf_pub/Resources/Public/Icons/TableEssay.svg',
        'origUid'                  => 't3_origuid',
        'hideAtCopy'               => true,
        'languageField'            => 'sys_language_uid',
        'transOrigPointerField'    => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'translationSource'        => 'l10n_source',
        'searchFields'             => 'uuid,title,publicationDate,revisionNumber,revisionDate,editorialNote,importOrigin,import',
        'enablecolumns'            => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
            'fe_group' => 'fe_group',
        ],
    ],
    'columns' => [
        'fe_group' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.fe_group',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'size' => 5,
                'maxitems' => 20,
                'items' => [
                    [
                        'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hide_at_login',
                        'value' => -1,
                    ],
                    [
                        'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.any_login',
                        'value' => -2,
                    ],
                    [
                        'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.usergroups',
                        'value' => '--div--',
                    ],
                ],
                'exclusiveKeys' => '-1,-2',
                'foreign_table' => 'fe_groups',
                'foreign_table_where' => 'ORDER BY fe_groups.title',
            ],
        ],
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l10n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'label' => '',
                        'value' => 0,
                    ],
                ],
                'foreign_table' => 'tx_chfpub_domain_model_essay',
                'foreign_table_where' => 'AND {#tx_chfpub_domain_model_essay}.{#pid}=###CURRENT_PID###'
                    . ' AND {#tx_chfpub_domain_model_essay}.{#sys_language_uid} IN (-1,0)',
                'default' => 0,
            ],
        ],
        'l10n_source' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
                'default' => '',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.enabled',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.hidden.description',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                        'invertStateDisplay' => true,
                    ]
                ],
            ]
        ],
        'starttime' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.starttime.description',
            'config' => [
                'type' => 'datetime',
                'format' => 'datetime',
                'eval' => 'int',
                'default' => 0,
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.endtime.description',
            'config' => [
                'type' => 'datetime',
                'format' => 'datetime',
                'eval' => 'int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2106),
                ],
            ],
        ],
        'parentResource' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.parentResource',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.parentResource.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingleBox',
                'foreign_table' => 'tx_chfbase_domain_model_resource',
                'foreign_table_where' => 'AND {#tx_chfbase_domain_model_resource}.{#pid}=###CURRENT_PID###'
                    . ' AND {#tx_chfbase_domain_model_resource}.{#type}=\'publicationResource\'',
                'sortItems' => [
                    'label' => 'asc',
                ],
                'required' => true,
            ],
        ],
        'parentVolume' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.essay.parentVolume',
            'description' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.essay.parentVolume.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'label' => '',
                        'value' => 0,
                    ],
                ],
                'foreign_table' => 'tx_chfpub_domain_model_volume',
                'foreign_table_where' => 'AND {#tx_chfpub_domain_model_volume}.{#pid}=###CURRENT_PID###',
                'sortItems' => [
                    'label' => 'asc',
                ],
            ],
        ],
        'parentEssay' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.essay.parentEssay',
            'description' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.essay.parentEssay.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectTree',
                'foreign_table' => 'tx_chfpub_domain_model_essay',
                'foreign_table_where' => 'AND {#tx_chfpub_domain_model_essay}.{#pid}=###CURRENT_PID###',
                'treeConfig' => [
                    'parentField' => 'parentEssay',
                    'appearance' => [
                        'showHeader' => true,
                        'expandAll' => true,
                    ],
                ],
                'maxitems' => 1,
                'size' => 8,
            ],
        ],
        'uuid' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.uuid',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.uuid.description',
            'config' => [
                'type' => 'uuid',
                'size' => 40,
                'required' => true,
            ],
        ],
        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.essay.title',
            'description' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.essay.title.description',
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
        'extent' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.extent',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.extent.description',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_chfbase_domain_model_extent',
                'foreign_field' => 'parent',
                'foreign_table_field' => 'parent_table',
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
                                'items' => [ // Please also add new items in this list to the overwrite of tx_chfbase_domain_model_extent
                                    [
                                        'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.extent.type.doi',
                                        'value' => 'doi',
                                        'group' => 'chfPub',
                                    ],
                                    [
                                        'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.extent.type.urn',
                                        'value' => 'urn',
                                        'group' => 'chfPub',
                                    ],
                                    [
                                        'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.extent.type.edition',
                                        'value' => 'edition',
                                        'group' => 'chfPub',
                                    ],
                                    [
                                        'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.extent.type.volume',
                                        'value' => 'volume',
                                        'group' => 'chfPub',
                                    ],
                                    [
                                        'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.extent.type.issue',
                                        'value' => 'issue',
                                        'group' => 'chfPub',
                                    ],
                                    [
                                        'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.extent.type.issn',
                                        'value' => 'issn',
                                        'group' => 'chfPub',
                                    ],
                                    [
                                        'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.extent.type.isbn',
                                        'value' => 'isbn',
                                        'group' => 'chfPub',
                                    ]
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'isHighlight' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractHeritage.isHighlight',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractHeritage.isHighlight.description',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => ''
                    ]
                ],
            ]
        ],
        'label' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.label',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.label.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectTree',
                'foreign_table' => 'tx_chfbase_domain_model_tag',
                'foreign_table_where' => 'AND {#tx_chfbase_domain_model_tag}.{#pid}=###CURRENT_PID###'
                    . ' AND {#tx_chfbase_domain_model_tag}.{#type}=\'labelTag\'',
                'MM' => 'tx_chfpub_domain_model_essay_tag_label_mm',
                'multiple' => 1,
                'treeConfig' => [
                    'parentField' => 'parentLabelTag',
                    'appearance' => [
                        'showHeader' => true,
                        'expandAll' => true,
                    ],
                ],
                'size' => 8,
            ],
        ],
        'sameAs' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.sameAs',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.sameAs.description',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_chfbase_domain_model_same_as',
                'foreign_field' => 'parent',
                'foreign_table_field' => 'parent_table',
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
            ],
        ],
        'authorshipRelation' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.authorshipRelation',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.authorshipRelation.description',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_chfbase_domain_model_relation',
                'MM' => 'tx_chfbase_domain_model_relation_any_record_mm',
                'MM_match_fields' => [
                    'tablenames' => 'tx_chfpub_domain_model_essay',
                    'fieldname' => 'authorshipRelation',
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
                                'default' => 'authorshipRelation',
                                'readOnly' => true,
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'licenceRelation' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.licenceRelation',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.licenceRelation.description',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_chfbase_domain_model_relation',
                'MM' => 'tx_chfbase_domain_model_relation_any_record_mm',
                'MM_match_fields' => [
                    'tablenames' => 'tx_chfpub_domain_model_essay',
                    'fieldname' => 'licenceRelation',
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
                                'default' => 'licenceRelation',
                                'readOnly' => true,
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'editorialSteps' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractHeritage.editorialSteps',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractHeritage.editorialSteps.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'items' => [
                    [
                        'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractHeritage.editorialSteps.checkDatabase',
                        'value' => 'checkDatabase',
                    ],
                    [
                        'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractHeritage.editorialSteps.checkStandard',
                        'value' => 'checkStandard',
                    ],
                    [
                        'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractHeritage.editorialSteps.checkForeignLanguage',
                        'value' => 'checkForeignLanguage',
                    ],
                    [
                        'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractHeritage.editorialSteps.checkPrevious',
                        'value' => 'checkPrevious',
                    ],
                    [
                        'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractHeritage.editorialSteps.checkFurther',
                        'value' => 'checkFurther',
                    ],
                    [
                        'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractHeritage.editorialSteps.checkAuthorityFiles',
                        'value' => 'checkAuthorityFiles',
                    ],
                ],
            ],
        ],
        'publicationSteps' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractHeritage.publicationSteps',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractHeritage.publicationSteps.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'items' => [
                    [
                        'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractHeritage.publicationSteps.started',
                        'value' => 'started',
                    ],
                    [
                        'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractHeritage.publicationSteps.edited',
                        'value' => 'edited',
                    ],
                    [
                        'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractHeritage.publicationSteps.checked',
                        'value' => 'checked',
                    ],
                    [
                        'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractHeritage.publicationSteps.deferred',
                        'value' => 'deferred',
                    ],
                    [
                        'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractHeritage.publicationSteps.revised',
                        'value' => 'revised',
                    ],
                    [
                        'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractHeritage.publicationSteps.publicationReady',
                        'value' => 'publicationReady',
                    ],
                ],
            ],
        ],
        'publicationDate' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractBase.publicationDate',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractBase.publicationDate.description',
            'config' => [
                'type' => 'datetime',
                'format' => 'date',
                'eval' => 'int',
                'default' => 0,
            ],
        ],
        'revisionNumber' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractBase.revisionNumber',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractBase.revisionNumber.description',
            'config' => [
                'type' => 'number',
                'size' => 13,
                'default' => 1,
                'range' => [
                    'lower' => 1,
                ],
                'required' => true,
            ],
        ],
        'revisionDate' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractBase.revisionDate',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractBase.revisionDate.description',
            'config' => [
                'type' => 'datetime',
                'format' => 'date',
                'eval' => 'int',
                'default' => 0,
            ],
        ],
        'editorialNote' => [
            'exclude' => true,
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractBase.editorialNote',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractBase.editorialNote.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 5,
                'max' => 2000,
                'eval' => 'trim',
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'essay' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.essay.essay',
            'description' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.essay.essay.description',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_chfpub_domain_model_essay',
                'foreign_field' => 'parentEssay',
                'enableCascadingDelete' => false,
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
            ],
        ],
        'contentElement' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractHeritage.contentElement',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractHeritage.contentElement.description',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tt_content',
                'foreign_field' => 'parent',
                'foreign_table_field' => 'parent_table',
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
            ],
        ],
        'footnote' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractHeritage.footnote',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractHeritage.footnote.description',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_chfbase_domain_model_footnote',
                'foreign_field' => 'parent',
                'foreign_table_field' => 'parent_table',
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
            ],
        ],
        'media' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractHeritage.media',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractHeritage.media.description',
            'config' => [
                'type' => 'file',
                'allowed' => 'common-media-types',
            ],
        ],
        'file' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractHeritage.file',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractHeritage.file.description',
            'config' => [
                'type' => 'file',
            ],
        ],
        'linkRelation' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.linkRelation',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.linkRelation.description',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_chfbase_domain_model_relation',
                'MM' => 'tx_chfbase_domain_model_relation_any_record_mm',
                'MM_match_fields' => [
                    'tablenames' => 'tx_chfpub_domain_model_essay',
                    'fieldname' => 'linkRelation',
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
                                'default' => 'linkRelation',
                                'readOnly' => true,
                            ],
                        ],
                    ],
                ],
            ],
        ],
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
                    'tablenames' => 'tx_chfpub_domain_model_essay',
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
                                'readOnly' => true,
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'importOrigin' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.importOrigin',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.importOrigin.description',
            'config' => [
                'type' => 'input',
                'size' => 40,
                'max' => 255,
                'eval' => 'trim',
            ],
        ],
        'import' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.import',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.import.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'max' => 100000,
                'eval' => 'trim',
            ],
        ],
        'asEssayOfPublicationRelation' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.essay.asEssayOfPublicationRelation',
            'description' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.essay.asEssayOfPublicationRelation.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_chfbase_domain_model_relation',
                'foreign_table_where' => 'AND {#tx_chfbase_domain_model_relation}.{#pid}=###CURRENT_PID###'
                    . ' AND {#tx_chfbase_domain_model_relation}.{#type}=\'publicationRelation\'',
                'MM' => 'tx_chfbase_domain_model_relation_essay_essay_mm',
                'MM_opposite_field' => 'essay',
                'multiple' => 1,
                'size' => 5,
                'autoSizeMax' => 10,
            ],
        ],
    ],
    'palettes' => [
        'contentElementFootnote' => [
            'showitem' => 'contentElement,--linebreak--,footnote,',
        ],
        'mediaFile' => [
            'showitem' => 'media,--linebreak--,file,',
        ],
        'iriUuid' => [
            'showitem' => 'iri,uuid,',
        ],
        'parentVolumeParentEssayParentResource' => [
            'showitem' => 'parentVolume,--linebreak--,parentEssay,parentResource,',
        ],
        'authorshipRelationLicenceRelation' => [
            'showitem' => 'authorshipRelation,--linebreak--,licenceRelation,',
        ],
        'editorialStepsPublicationSteps' => [
            'showitem' => 'editorialSteps,publicationSteps,',
        ],
        'publicationDateRevisionDateRevisionNumberEditorialNote' => [
            'showitem' => 'publicationDate,revisionDate,revisionNumber,--linebreak--,editorialNote,',
        ],
        'importOriginImport' => [
            'showitem' => 'importOrigin,--linebreak--,import,',
        ],
    ],
    'types' => [
        '0' => [
            'showitem' => 'type,title,extent,label,
            --div--;LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.structured,essay,
            --div--;LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.unstructured,--palette--;;contentElementFootnote,--palette--;;mediaFile,
            --div--;LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.bibliography,linkRelation,publicationRelation,sourceRelation,
            --div--;LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.placement,--palette--;;iriUuid,isHighlight,--palette--;;parentVolumeParentEssayParentResource,sameAs,
            --div--;LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.editorial,--palette--;;authorshipRelationLicenceRelation,--palette--;;editorialStepsPublicationSteps,--palette--;;publicationDateRevisionDateRevisionNumberEditorialNote,
            --div--;LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.import,--palette--;;importOriginImport,
            --div--;LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.usage,asEssayOfPublicationRelation,',
        ],
    ],
];
