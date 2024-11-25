<?php
declare(strict_types=1);

# This file is part of the extension CHF Pub for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


use TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider;
use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;

defined('TYPO3') or die();

// Extension-provided icons
return [
    'tx-chfpub' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:chf_pub/Resources/Public/Icons/Extension.svg',
    ],
    'tx-chfpub-table-essay' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:chf_pub/Resources/Public/Icons/TableEssay.svg',
    ],
    'tx-chfpub-table-volume' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:chf_pub/Resources/Public/Icons/TableVolume.svg',
    ],
    'tx-chfpub-plugin-blog' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:chf_pub/Resources/Public/Icons/PluginBlog.svg',
    ],
    'tx-chfpub-plugin-books' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:chf_pub/Resources/Public/Icons/PluginBooks.svg',
    ],
];
