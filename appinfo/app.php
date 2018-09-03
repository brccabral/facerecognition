<?php
/**
 * @copyright Copyright (c) 2016, Roeland Jago Douma <roeland@famdouma.nl>
 * @copyright Copyright (c) 2017, Matias De lellis <mati86dl@gmail.com>
 *
 * @author Roeland Jago Douma <roeland@famdouma.nl>
 * @author Matias De lellis <mati86dl@gmail.com>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

use OCA\FaceRecognition\AppInfo\Application;

$app = new Application();

\OC::$server->getNavigationManager()->add(function () {
	$l = \OC::$server->getL10N('facerecognition');
	return [
		'id' => 'facerecognition',
		'appname' => 'facerecognition',
		'order' => 100,
		'name' => $l->t('Face recognition'),
		'href' => \OC::$server->getURLGenerator()->linkToRoute('facerecognition.page.index'),
		'icon' => \OC::$server->getURLGenerator()->imagePath('facerecognition', 'app.svg'),
	];
});

\OC::$server->getEventDispatcher()->addListener('OCA\Files::loadAdditionalScripts', function(){
	\OCP\Util::addScript('facerecognition', 'files-tabview');
	\OCP\Util::addScript('facerecognition', 'files-plugin');
});
