/**
 * ownCloud - cernutil
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Hugo Gonzalez Labrador (CERN) <hugo.gonzalez.labrador@cern.ch>
 * @copyright Hugo Gonzalez Labrador (CERN) 2017
 */

(function ($, OC, OCA) {
	OCA.CernUtil = {};

	$(document).ready(function () {

		var url = OC.generateUrl('/apps/cernutil/config');
		$.get(url).success(function (response) {
			if (response.webdavurl) {
				OCA.CernUtil.Config = response;

				// Update the WebDAV URL shown in the Setting button in the UI
				$("#webdavurl").val(OCA.CernUtil.Config.webdavurl);

				// Point the help menu item to CERNBox documentation
				$("#settings #expanddiv li a[href='/index.php/settings/help']").attr("href", OCA.CernUtil.Config.helplink);
				$("#settings #expanddiv li a[href='/index.php/settings/help']").attr("target", "_blank");


			}
		});

	});

})(jQuery, OC, OCA);