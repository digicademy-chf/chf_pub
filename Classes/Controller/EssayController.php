<?php
declare(strict_types=1);

# This file is part of the extension CHF Pub for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


namespace Digicademy\CHFPub\Controller;

use Psr\Http\Message\ResponseInterface;
use Digicademy\CHFPub\Domain\Model\Essay;
use Digicademy\CHFPub\Domain\Repository\EssayRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

defined('TYPO3') or die();

/**
 * Controller for Essay
 */
class EssayController extends ActionController
{
    private EssayRepository $essayRepository;

    public function injectEssayRepository(EssayRepository $essayRepository): void
    {
        $this->essayRepository = $essayRepository;
    }

    public function indexAction(): ResponseInterface
    {
        $this->view->assign('essays', $this->essayRepository->findAll());
        return $this->htmlResponse();
    }

    public function showAction(Essay $essay): ResponseInterface
    {
        $this->view->assign('essay', $essay);
        return $this->htmlResponse();
    }
}
