<?php
declare(strict_types=1);

# This file is part of the extension CHF Pub for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


namespace Digicademy\CHFPub\Controller;

use Psr\Http\Message\ResponseInterface;
use Digicademy\CHFPub\Domain\Model\Volume;
use Digicademy\CHFPub\Domain\Repository\VolumeRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

defined('TYPO3') or die();

/**
 * Controller for Books
 */
class BooksController extends ActionController
{
    private VolumeRepository $volumeRepository;

    public function injectVolumeRepository(VolumeRepository $volumeRepository): void
    {
        $this->volumeRepository = $volumeRepository;
    }

    public function indexAction(): ResponseInterface
    {
        $this->view->assign('volumes', $this->volumeRepository->findAll());
        return $this->htmlResponse();
    }

    public function showAction(Volume $volume): ResponseInterface
    {
        $this->view->assign('volume', $volume);
        return $this->htmlResponse();
    }
}
