# Joomla Link Checker

## TODO
- Implement AJAX endpoint for support of edit links.

## Changelog

### Next Release

### 1.13.1
*Release date: 1st August 2022*

- Added payment info.

### 1.13.0
*Release date: 10th October 2019*
- Features
	- Added selectable interval (daily, weekly, bi-weekly, every 30 days) to scheduler.
	- Added _Mark all with same status code and domain as working_ function.
	- Added new option to set URL to check a custom website.
		- Can be useful when the backend runs on another domain than the frontend.
- Improvements
	- Improved documentation/glossary.
- Bugfixes
	- Send no scheduler status request if token is not set, because it always results in an error.
	- Hide _Professional Version_ tab when token is used.

### 1.12.0
*Release date: 21th March 2019*
- Features
	- Export result as CSV file.
	- Result is saved on server for customers of the professional version. So the same result can be downloaded by multiple users or with multiple browsers.
	- Added form login support.
- Security
	- Fixed an XSS vulnerability.
- Improvements
	- Result from cache is loaded even if a check is currently running.
	- Old result is not cleared anymore when a new check is started, but just when the new check has finished.
	- Split up the 'Progress and Stats' tab in two separate tabs.
	- Added status code and response text to error message.
	- Added hint how to change scheduler email address.
	- Improved status codes page.
	- Improved professional version page.
- Bugfixes
	- Handle failed IsRunning request.
	- Reset retries count before every check.
	- Break very long links so that they don't break the layout.

### 1.11.0
*Release date: 12th May 2018*
- Added feedback form.

### 1.10.0
*Release date: 9th May 2018*
- New 'Mark as fixed on all pages' button.
- Compression of results before they get stored in browser cache.
- Fixed dropdown issue.

### 1.9.0
*Release date: 22th April 2018*
- Redesigned user interface.
	- Pagination.
	- All-in-one (links, images, videos, working redirects, unhandled resources) result view.
- Performance of user interface was improved so that it's now possible to view result tables with more than 100'000 broken links or redirects.
- Use IndexedDB instead of localStorage to store result so that the result set size is not limited to about 5 MB anymore.

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
