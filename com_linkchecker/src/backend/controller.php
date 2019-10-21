<?php
/*
 * @copyright  Copyright (C) 2016 - 2019 Marco Beierer. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');

class LinkCheckerController extends JControllerLegacy {
	function display($cacheable = false, $urlparams = array()) {
		$this->input->set('view', 'main');
		parent::display($cacheable, $urlparams);
	}

	/*
	function editurls() {
		$input = JFactory::getApplication()->input;
		$urls = $input->post->get('urls', array(), 'ARRAY');

		$editURLs = array();

		foreach ($urls as $url) {
			$uriy = JURI::getInstance($url);

			// TODO both methods don't work
			//$router = JFactory::getApplication('site')->getRouter(); // return AdministratorRouter instead of siterouter
			//$router = JApplicationCms::getInstance()->getRouter();

			$urlx = $router->parse($uriy);

			// $articleID = 0; // TODO
			//if ($articleID != 0) {
				$editURLs[$url] = $urlx; // TODO
			//}
		}

		header('Cache-Control: no-store');

		echo json_encode($editURLs);

		// necessary if application is not closed, then content-type gets overwritten
		$contentType = 'application/json';
		JFactory::getDocument()->setMimeEncoding($contentType);
		JResponse::setHeader('Content-Type', $contentType, true);
	}
	*/
}
