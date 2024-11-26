<?php
declare(strict_types=1);

# This file is part of the extension CHF Pub for TYPO3.
#
# For the full copyright and license information, please read the
# LICENSE.txt file that was distributed with this source code.


namespace Digicademy\CHFPub\Controller;

use Digicademy\CHFBase\Domain\Repository\AbstractResourceRepository;
use Digicademy\CHFPub\Domain\Model\Essay;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

defined('TYPO3') or die();

/**
 * Controller for Blog
 */
class BlogController extends ActionController
{
    private AbstractResourceRepository $abstractResourceRepository;

    public function injectAbstractResourceRepository(AbstractResourceRepository $abstractResourceRepository): void
    {
        $this->abstractResourceRepository = $abstractResourceRepository;
    }

    public function indexAction(): ResponseInterface
    {
        $resourceIdentifier = $this->settings['resource'];
        $this->view->assign('resource', $this->abstractResourceRepository->findByIdentifier($resourceIdentifier));
        return $this->htmlResponse();
    }

    public function showAction(Essay $essay): ResponseInterface
    {
        $this->view->assign('essay', $essay);
        return $this->htmlResponse();
    }
}
