<?php
/*
 * @copyright  Copyright (C) 2016 Marco Beierer. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */

defined('_JEXEC') or die('Restricted access');
?>

<div class="bootstrap3" style="margin-top: 10px;">
	<?php if ($this->onLocalhost): ?>
		<div class="alert alert-error">
			It is not possible to use this plugin in a local development environment. The backend service needs to crawl your website and this is just possible if your site is reachable from the internet.
		</div>
	<?php endif; ?>

	<linkchecker
		website-url="<?php echo $this->websiteURL; ?>"
		token="<?php echo $this->token; ?>">
	</linkchecker>

	<h3>Credits</h3>
	<p>The Link Checker for Joomla is developed and maintained by <a href="https://www.marcobeierer.com">Marco Beierer</a> and is also available as <a href="https://www.marcobeierer.com/tools/link-checker">online tool</a> and as <a href="https://www.marcobeierer.com/wordpress-plugins/link-checker">WordPress plugin</a>.</p>
</div>
