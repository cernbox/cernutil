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

namespace OCA\CernUtil\AppInfo;

use OCP\AppFramework\App;

require_once __DIR__ . '/autoload.php';

$app = new App('cernutil');

\OCP\Util::addScript('cernutil', 'app');
