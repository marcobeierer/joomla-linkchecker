<?php
/*
 * @copyright  Copyright (C) 2016 - 2019 Marco Beierer. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */

namespace Joomla\Component\LinkChecker\Administrator\View\Main;

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\Toolbar\ToolbarHelper;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\LinkChecker\Administrator\Helper\LinkCheckerHelper;

class HtmlView extends BaseHtmlView
{
	public $websiteURLs = [];

	public $onLocalhost = false;

	public $maxFetchers = 10;

	public $token = '';

	public $loginPageURL = '';

	public $loginFormSelector = '';

	public $loginData = '';

	public $showMultilangWarning = false;

	public $email = '';

	public function display($tpl = null): void
	{
		$app = Factory::getApplication();

		ToolbarHelper::title(Text::_('COM_LINKCHECKER'));

		if ($app->getIdentity()->authorise('core.admin', 'com_linkchecker')) {
			ToolbarHelper::preferences('com_linkchecker');
		}

		$document = $app->getDocument();
		$wa       = $document->getWebAssetManager();

		$wa->useScript('jquery');
		$wa->registerAndUseScript(
			'com_linkchecker.app',
			'media/com_linkchecker/js/linkchecker-1.16.1.min.js',
			['version' => 'auto']
		);
		$wa->registerAndUseStyle(
			'com_linkchecker.wrapped',
			'media/com_linkchecker/css/wrapped.min.css',
			['version' => '5']
		);
		$wa->registerAndUseStyle(
			'com_linkchecker.custom',
			'media/com_linkchecker/css/custom.css',
			['version' => '1']
		);

		$wa->addInlineScript(
			"jQuery(function() { riot.mount('*', { linkchecker: riot.observable() }); });",
			[],
			[],
			[]
		);

		$params = ComponentHelper::getParams('com_linkchecker');

		$customWebsiteURL = trim((string) $params->get('custom_website_url', ''));

		if ($customWebsiteURL === '') {
			$this->websiteURLs = [Uri::root()];
			$isMultilangSupportNecessary = LinkCheckerHelper::isMultilangSupportNecessary();
		} else {
			$this->websiteURLs = [$customWebsiteURL];
			$isMultilangSupportNecessary = false;
		}

		$this->onLocalhost = preg_match('/^https?:\/\/(?:localhost|127\.0\.0\.1)/i', $this->websiteURLs[0]) === 1;
		$this->maxFetchers = (int) $params->get('max_fetchers', 10);
		$this->token       = trim((string) $params->get('token', ''));

		$this->loginPageURL      = (string) $params->get('login_page_url', '');
		$this->loginFormSelector = (string) $params->get('login_form_selector', '');
		$this->loginData         = (string) $params->get('login_data', '');

		if ($isMultilangSupportNecessary && $this->token !== '') {
			$this->websiteURLs = LinkCheckerHelper::loadMultilangData(
				function ($language, $langCode, $defaultLangCode, $sefRewrite) {
					$websiteURL = Uri::root() . 'index.php/' . $language->sef . '/';

					if ($sefRewrite) {
						$websiteURL = Uri::root() . $language->sef . '/';
					}

					return $websiteURL;
				}
			);
		}

		$this->showMultilangWarning = $isMultilangSupportNecessary && $this->token === '';

		if ($app->input->getInt('dev', 0) === 1) {
			$this->onLocalhost = false;
			$this->websiteURLs = ['https://www.marcobeierer.com/'];
		} elseif ($app->input->getInt('dev', 0) === 2) {
			$this->onLocalhost = false;
			$this->websiteURLs = ['https://www.marcobeierer.com/', 'https://www.marcobeierer.com/tools/link-checker'];
		}

		$this->email = (string) $app->getConfig()->get('mailfrom', '');

		parent::display($tpl);
	}
}
