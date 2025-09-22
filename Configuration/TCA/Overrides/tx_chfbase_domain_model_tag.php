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

// Add opposite usage info to 'items' column
$GLOBALS['TCA']['tx_chfbase_domain_model_tag']['columns']['items']['config']['allowed'] .= ',tx_chfpub_domain_model_essay,tx_chfpub_domain_model_volume';
$GLOBALS['TCA']['tx_chfbase_domain_model_tag']['columns']['items']['config']['MM_oppositeUsage']['tx_chfpub_domain_model_essay'] = ['label'];
$GLOBALS['TCA']['tx_chfbase_domain_model_tag']['columns']['items']['config']['MM_oppositeUsage']['tx_chfpub_domain_model_volume'] = ['label'];
