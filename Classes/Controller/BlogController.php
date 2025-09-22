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
    /**
     * Constructor takes care of dependency injection
     */
    public function __construct(
        protected readonly AbstractResourceRepository $abstractResourceRepository,
    ) {}

    /**
     * Show essay list
     *
     * @return ResponseInterface
     */
    public function indexAction(): ResponseInterface
    {
        // Get resource
        $resourceIdentifier = $this->settings['resource'];
        $this->view->assign('resource', $this->abstractResourceRepository->findByIdentifier($resourceIdentifier));

        // Create response
        return $this->htmlResponse();
    }

    /**
     * Show single essay
     *
     * @param Volume $volume
     * @return ResponseInterface
     */
    public function showAction(Essay $essay): ResponseInterface
    {
        // Get essay
        $this->view->assign('essay', $essay);

        // Create response
        return $this->htmlResponse();
    }
}
