<?php
declare(strict_types=1);

# This file is part of the extension CHF Pub for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


defined('TYPO3') or die();

/**
 * Volume and its properties
 * 
 * Configuration of a database table and its editing interface in the
 * TYPO3 backend. This also serves as the basis for the Extbase
 * domain model. For more information on TCA and its options see
 * https://docs.typo3.org/m/typo3/reference-tca/main/en-us/.
 */
return [
    'ctrl' => [
        'title'                    => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.volume',
        'label'                    => 'title',
        'descriptionColumn'        => 'editorial_note',
        'tstamp'                   => 'tstamp',
        'crdate'                   => 'crdate',
        'delete'                   => 'deleted',
        'sortby'                   => 'sorting',
        'default_sortby'           => 'is_highlight ASC,title ASC',
        'versioningWS'             => true,
        'iconfile'                 => 'EXT:chf_pub/Resources/Public/Icons/TableVolume.svg',
        'origUid'                  => 't3_origuid',
        'hideAtCopy'               => true,
        'languageField'            => 'sys_language_uid',
        'transOrigPointerField'    => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'translationSource'        => 'l10n_source',
        'searchFields'             => 'title,iri,uuid,publication_date,revision_date,revision_number,editorial_note,import_origin,import',
        'enablecolumns'            => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
            'fe_group' => 'fe_group',
        ],
    ],
    'columns' => [
        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.volume.title',
            'description' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.volume.title.description',
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
            ],
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
                'foreign_table_where' => 'AND {#tx_chfbase_domain_model_tag}.{#sys_language_uid} IN (-1, 0)'
                    . ' AND {#tx_chfbase_domain_model_tag}.{#pid} IN (###CURRENT_PID###, ###SITE:settings.chf.data.page###)'
                    . ' AND {#tx_chfbase_domain_model_tag}.{#type}=\'labelTag\'',
                'MM' => 'tx_chfbase_domain_model_tag_record_mm',
                'MM_match_fields' => [
                    'fieldname' => 'label',
                    'tablenames' => 'tx_chfpub_domain_model_volume',
                ],
                'MM_opposite_field' => 'items',
                'treeConfig' => [
                    'parentField' => 'parent_label_tag',
                    'appearance' => [
                        'showHeader' => true,
                        'expandAll' => true,
                    ],
                ],
                'size' => 8,
            ],
        ],
        'essay' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.volume.essay',
            'description' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.volume.essay.description',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_chfpub_domain_model_essay',
                'foreign_field' => 'parent_volume',
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
        'content_element' => [
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
        'link_relation' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.linkRelation',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.linkRelation.description',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_chfbase_domain_model_relation',
                'foreign_field' => 'record',
                'foreign_match_fields' => [
                    'type' => 'linkRelation'
                ],
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
                                'readOnly' => true,
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'publication_relation' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.abstractHeritage.publicationRelation',
            'description' => 'LLL:EXT:chf_pub/Resources/Private/Language/locallang.xlf:object.abstractHeritage.publicationRelation.description',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_chfbase_domain_model_relation',
                'foreign_field' => 'record',
                'foreign_match_fields' => [
                    'type' => 'publicationRelation'
                ],
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
                                'readOnly' => true,
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'is_teaser' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractHeritage.isTeaser',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractHeritage.isTeaser.description',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                    ]
                ],
            ]
        ],
        'is_highlight' => [
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
        'parent_resource' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.parentResource',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.parentResource.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingleBox',
                'foreign_table' => 'tx_chfbase_domain_model_resource',
                'foreign_table_where' => 'AND {#tx_chfbase_domain_model_resource}.{#sys_language_uid} IN (-1, 0)'
                    . ' AND {#tx_chfbase_domain_model_resource}.{#type}=\'publicationResource\'',
                'MM' => 'tx_chfbase_domain_model_resource_record_mm',
                'MM_match_fields' => [
                    'fieldname' => 'parent_resource',
                    'tablenames' => 'tx_chfpub_domain_model_volume',
                ],
                'MM_opposite_field' => 'items',
                'sortItems' => [
                    'label' => 'asc',
                ],
            ],
        ],
        'iri' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.iri',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.iri.description',
            'config' => [
                'type' => 'slug',
                'size' => 40,
                'appearance' => [
                    'prefix' => 'Digicademy\CHFBase\UserFunctions\FormEngine\SlugPrefix->getPrefix',
                ],
                'prependSlash' => false,
                'generatorOptions' => [
                    'prefixParentPageSlug' => false,
                    'replacements' => [
                        '/' => '',
                    ],
                ],
                'default' => 'vo',
                'eval' => 'uniqueInSite',
                'fallbackCharacter' => '',
                'required' => true,
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
        'same_as' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.sameAs',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.sameAs.description',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_chfbase_domain_model_sameas',
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
        'publication_date' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractBase.publicationDate',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractBase.publicationDate.description',
            'config' => [
                'type' => 'datetime',
                'format' => 'date',
                'default' => 0,
            ],
        ],
        'revision_date' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractBase.revisionDate',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.abstractBase.revisionDate.description',
            'config' => [
                'type' => 'datetime',
                'format' => 'date',
                'default' => 0,
            ],
        ],
        'revision_number' => [
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
        'editorial_note' => [
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
        'authorship_relation' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.authorshipRelation',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.authorshipRelation.description',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_chfbase_domain_model_relation',
                'foreign_field' => 'record',
                'foreign_match_fields' => [
                    'type' => 'authorshipRelation'
                ],
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
                                'readOnly' => true,
                            ],
                        ],
                        'role' => [
                            'config' => [
                                'default' => 'author',
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'licence_relation' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.licenceRelation',
            'description' => 'LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.licenceRelation.description',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_chfbase_domain_model_relation',
                'foreign_field' => 'record',
                'foreign_match_fields' => [
                    'type' => 'licenceRelation'
                ],
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
                                'readOnly' => true,
                            ],
                        ],
                        'role' => [
                            'config' => [
                                'default' => 'allContent',
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'editorial_steps' => [
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
        'publication_steps' => [
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
        'import_origin' => [
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
    ],
    'palettes' => [
        'isTeaserIsHighlight' => [
            'showitem' => 'is_teaser,is_highlight,',
        ],
        'iriUuid' => [
            'showitem' => 'iri,uuid,',
        ],
        'publicationDateRevisionDateRevisionNumber' => [
            'showitem' => 'publication_date,revision_date,revision_number,',
        ],
        'editorialStepsPublicationSteps' => [
            'showitem' => 'editorial_steps,publication_steps,',
        ],
    ],
    'types' => [
        '0' => [
            'showitem' => 'title,extent,label,
            --div--;LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.structured,essay,
            --div--;LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.unstructured,content_element,footnote,media,file,
            --div--;LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.bibliography,source_relation,link_relation,publication_relation,
            --div--;LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.management,--palette--;;isTeaserIsHighlight,parent_resource,--palette--;;iriUuid,same_as,
            --div--;LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.editorial,--palette--;;publicationDateRevisionDateRevisionNumber,editorial_note,authorship_relation,licence_relation,--palette--;;editorialStepsPublicationSteps,
            --div--;LLL:EXT:chf_base/Resources/Private/Language/locallang.xlf:object.generic.import,import_origin,import,',
        ],
    ],
];
