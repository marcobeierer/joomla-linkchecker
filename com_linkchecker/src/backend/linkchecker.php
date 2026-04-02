<?php
/*
 * @copyright  Copyright (C) 2016 - 2019 Marco Beierer. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;

$app  = Factory::getApplication();
$user = $app->getIdentity();

if (!$user->authorise('core.manage', 'com_linkchecker')) {
	throw new \Exception(Text::_('JERROR_ALERTNOAUTHOR'), 403);
}

$controller = $app->bootComponent('com_linkchecker')
	->getMVCFactory()
	->createController('Display', 'Administrator', ['default_view' => 'main']);

$controller->execute($app->input->getCmd('task'));
$controller->redirect();
