# Joomla Link Checker

## Changelog

### Next Release

### 1.8.0
*Release date: 19th April 2018*
- Auto-resume support if the Link Checker gets opened and a check is already running on the server.
- Implemented a warning for high crawl-delays.
- Added a stop button to stop the current check.
- Implemented protection for check hijacking if token is used.

### 1.7.0
*Release date: 17th April 2018*
- Highlighting of redirects.
- Added option to show working redirects.
	- Has to be enabled in the settings.

### 1.6.0
*Release date: 9th April 2018*
- Results are saved now and don't get discarded when leaving the Link Checker anymore.
- Improved navigation with tabs.
- More detailed stats.
- Crawler
	- Added status code 603 (Unknown authority error) with explanation.
	- Added cookie support.

### 1.5.0
*Release date: 4th March 2018*
- Added support for broken embedded YouTube videos.
- Remove all whitespace (line breaks, spaces, tabs) from token. This prevents Copy and Paste issues.
- Improvement notification message for daily checks.
- Crawler performance improvements.

### 1.4.0
*Release date: 1st March 2018*
- Added origin system parameter.
- Added info box to scheduler and hide register form if no token is present.
- Hide broken images string and show info that not available.
- Implemented three retries if request could not be sent or no response was received.
- Explain changed status codes (598 is now 601 and 599 is 602).
- Added unhandled resources and images.
- Crawler
	- Implemented better blocked by robots detection and handling (for external links).

### 1.3.0
*Release date: 25th February 2018*
- Fixed broken links could be removed from the results table with the _Mark as fixed_ button. 
- Added section for links blocked by robots.txt and a _Mark as working_ button to mark them as working after a manual check.
- Added common status code information.
- Broken links in the result table are linked now for the case that someone likes to verify that a link is really broken.
- Set default concurrent connections to three.
- Fixed a permissions bug (used perms of Sitemap Generator in backend view).
- Improvements to the crawler.

### 1.2.0
*Release date: 18th June 2016*
- Added scheduler support.

### 1.1.0
*Release date: 11th June 2016*
- Improved support for multilingual sites in professional version.

### 1.0.0
*Release date: 31th May 2016*
- Added option to select maximum number of concurrent connections.

### 1.0.0-beta.1
*Release date: 5th January 2016*
- Initial release for Joomla.

## Libraries
- [lscache](https://github.com/pamelafox/lscache)
- [Riot.js](http://riotjs.com/)
- jQuery
- jquery.serialize-object
