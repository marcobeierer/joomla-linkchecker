<?php
/*
 * @copyright  Copyright (C) 2016 Marco Beierer. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');

class LinkCheckerViewMain extends JViewLegacy {
	function display($tmpl = null) {
		JToolbarHelper::title(JText::_('COM_LINKCHECKER'));

		if (JFactory::getUser()->authorise('core.admin', 'com_linkchecker')) {
			JToolbarHelper::preferences('com_linkchecker');
		}

		JHtml::_('jquery.framework');

		$doc = JFactory::getDocument();
		$params = JComponentHelper::getParams('com_linkchecker');

		$doc->addScript('https://static.marcobeierer.com/cdn/linkchecker/v1/resulttable.tag', 'riot/tag');
		$doc->addScript('https://static.marcobeierer.com/cdn/linkchecker/v1/linkchecker.tag', 'riot/tag');
		$doc->addScript('https://static.marcobeierer.com/cdn/riot/v2/riot+compiler.min.js', 'text/javascript');
		$doc->addScriptDeclaration("riot.mount('*', { linkchecker: riot.observable() });");

		$doc->addStyleSheet('https://static.marcobeierer.com/cdn/bootstrap/v3/css/wrapped.min.css');

		$this->onLocalhost = preg_match('/^https?:\/\/(?:localhost|127\.0\.0\.1)/i', JURI::root()) === 1; // TODO improve localhost detection
		$this->websiteURL = JURI::root();
		$this->token = $params->get('token');
		$this->maxFetchers = $params->get('max_fetchers', 10);

		if (JFactory::getApplication()->input->getInt('dev', 0) === 1) {
			$this->onLocalhost = false;
			$this->websiteURL = 'https://www.marcobeierer.com';
		}

		parent::display();
	}
}
