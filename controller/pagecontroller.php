<?php
/**
 * ownCloud - cernutil
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Hugo Gonzalez Labrador (CERN) <hugo.gonzalez.labrador@cern.ch>
 * @copyright Hugo Gonzalez Labrador (CERN) 2017
 */

namespace OCA\CernUtil\Controller;

use OCP\IRequest;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Controller;
use OCP\Util;

class PageController extends Controller {


	private $userId;
	private $instanceManager;

	public function __construct($AppName, IRequest $request, $UserId){
		parent::__construct($AppName, $request);
		$this->userId = $UserId;
		$this->instanceManager = \OC::$server->getCernBoxEosInstanceManager();
	}


	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function config() {
		$webDAVPrefix = \OC::$server->getConfig()->getSystemValue("cbox.webdavprefix", "/cernbox/webdav");
		$info = $this->instanceManager->get($this->userId, "files");
		$data = $info->getData();
		$url = Util::linkToAbsolute($webDAVPrefix) . $data['eos.file'];

		$helpLink = \OC::$server->getConfig()->getSystemValue("cbox.helpurl", "http://cernbox.web.cern.ch/cernbox/en/");

		return new DataResponse(['webdavurl' => $url, 'helplink' => $helpLink]);
	}
}