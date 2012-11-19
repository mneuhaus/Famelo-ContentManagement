<?php
namespace Famelo\ContentManagement\Controller;

/* *
 * This script belongs to the TYPO3.Expose package.              *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License as published by the *
 * Free Software Foundation, either version 3 of the License, or (at your *
 * option) any later version.                                             *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser       *
 * General Public License for more details.                               *
 *                                                                        *
 * You should have received a copy of the GNU Lesser General Public       *
 * License along with the script.                                         *
 * If not, see http://www.gnu.org/licenses/lgpl.html                      *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use Doctrine\ORM\Mapping as ORM;
use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * content controller for the Expose package; main entry point when this package is
 * used inside Phoenix.
 *
 */
class ContentController extends \TYPO3\Neos\Controller\Module\StandardController {

	/**
	 * Index action
	 *
	 * @return void
	 */
	public function indexAction() {
		$exposeRuntime = new \TYPO3\Expose\Core\ExposeRuntime($this->request, $this->response);

		if (isset($this->moduleConfiguration['defaultAction'])) {
			$exposeRuntime->setDefaultAction($this->moduleConfiguration['defaultAction']);
		}

		if (isset($this->moduleConfiguration['defaultController'])) {
			$exposeRuntime->setDefaultController($this->moduleConfiguration['defaultController']);
		}

		if (isset($this->moduleConfiguration['defaultArguments'])) {
			$exposeRuntime->setDefaultArguments($this->moduleConfiguration['defaultArguments']);
		}

		$this->view->assign('content', $exposeRuntime->execute());
	}

}

?>