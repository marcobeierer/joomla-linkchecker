<?php
/*
 * @copyright  Copyright (C) 2016 - 2019 Marco Beierer. All rights reserved.
 * @license    http://www.gnu.org/licenses/agpl-3.0.html GNU/AGPL
 */

namespace Joomla\Component\LinkChecker\Administrator\Helper;

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\LanguageHelper;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\Registry\Registry;

class LinkCheckerHelper
{
	public static function isLanguageFilterEnabled(): bool
	{
		return PluginHelper::isEnabled('system', 'languagefilter');
	}

	public static function doRemoveDefaultPrefix(): bool
	{
		if (!self::isLanguageFilterEnabled()) {
			return false;
		}

		$languageFilterPlugin = PluginHelper::getPlugin('system', 'languagefilter');
		$languageFilterParams = new Registry($languageFilterPlugin->params ?? '');

		return (int) $languageFilterParams->get('remove_default_prefix', 0) === 1;
	}

	public static function isMultilangSupportNecessary(): bool
	{
		$config = Factory::getApplication()->getConfig();
		$sef    = (int) $config->get('sef', 0);

		return self::isLanguageFilterEnabled() && $sef === 1 && !self::doRemoveDefaultPrefix();
	}

	public static function loadMultilangData(callable $prepareElementCallback): array
	{
		$config = Factory::getApplication()->getConfig();
		$sef    = (int) $config->get('sef', 0);

		if (!self::isLanguageFilterEnabled() || $sef !== 1) {
			return [];
		}

		$sefRewrite      = (int) $config->get('sef_rewrite', 0) === 1;
		$defaultLangCode = (string) $config->get('language', 'en-GB');
		$languages       = LanguageHelper::getLanguages();
		$websites        = [];

		foreach ($languages as $language) {
			if (empty($language->lang_code)) {
				continue;
			}

			$langCode            = (string) $language->lang_code;
			$websites[$langCode] = $prepareElementCallback($language, $langCode, $defaultLangCode, $sefRewrite);
		}

		return $websites;
	}
}
