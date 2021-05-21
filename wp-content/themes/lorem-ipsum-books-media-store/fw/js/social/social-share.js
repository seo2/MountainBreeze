(function ($) {
	"use strict";

	$(function () {

		function delicious_count(url) {
			var shares;
			$.getJSON(LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['site_protocol']+'://feeds.delicious.com/v2/json/urlinfo/data?callback=?&url=' + url, function (data) {
				shares = data[0] ? data[0].total_posts : 0;
				if (shares > 0 || z == 1) el.after('<span class="share_counter">' + shares + '</span>')
			});
		}

		function fb_count(url) {
			var shares;
			$.getJSON(LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['site_protocol']+'://graph.facebook.com/?callback=?&ids=' + url, function (data) {
				shares = data[url] && data[url].shares ? data[url].shares : 0;
				if (shares > 0 || z == 1) el.after('<span class="share_counter">' + shares + '</span>')
			})
		}

		function lnkd_count(url) {
			var shares;
			$.getJSON(LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['site_protocol']+'://www.linkedin.com/countserv/count/share?callback=?&url=' + url, function (data) {
				shares = data.count;
				if (shares > 0 || z == 1) el.after('<span class="share_counter">' + shares + '</span>')
			})
		}

		function mail_count(url) {
			var shares;
			$.getJSON(LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['site_protocol']+'://connect.mail.ru/share_count?callback=1&func=?&url_list=' + url, function (data) {
				shares = data.hasOwnProperty(url) ? data[url].shares : 0;
				if (shares > 0 || z == 1) el.after('<span class="share_counter">' + shares + '</span>')
			})
		}

		function odkl_count(url) {
			var shares;
			$.getScript(LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['site_protocol']+'://www.odnoklassniki.ru/dk?st.cmd=extLike&uid=' + idx + '&ref=' + url);
			if (!window.ODKL) window.ODKL = {};
			window.ODKL.updateCount = function (idx, number) {
				shares = number;
				if (shares > 0 || z == 1) el.after('<span class="share_counter">' + shares + '</span>')
			}
		}

		function pin_count(url) {
			var shares;
			$.getJSON(LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['site_protocol']+'://api.pinterest.com/v1/urls/count.json?callback=?&url=' + url, function (data) {
				shares = data.count;
				if (shares > 0 || z == 1) el.after('<span class="share_counter">' + shares + '</span>')
			})
		}

		function twi_count(url) {
			var shares;
			$.getJSON(LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['site_protocol']+'://urls.api.twitter.com/1/urls/count.json?callback=?&url=' + url, function (data) {
				shares = data.count;
				if (shares > 0 || z == 1) el.after('<span class="share_counter">' + shares + '</span>')
			})
		}

		function vk_count(url) {
			var shares;
			$.getScript(LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['site_protocol']+'://vk.com/share.php?act=count&index=' + idx + '&url=' + url);
			if (!window.VK) window.VK = {};
			window.VK.Share = {
				count: function (idx, number) {
					shares = number;
					if (shares > 0 || z == 1) el.after('<span class="share_counter">' + shares + '</span>')
				}
			}
		}

		function ya_count(url) {
			if (!window.Ya) window.Ya = {};
			window.Ya.Share = {
				showCounter: function (number) {
					window.yaShares = number
				}
			};
			$.getScript(LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['site_protocol']+'://wow.ya.ru/ajax/share-counter.xml?url=' + url, function () {
				var shares = window.yaShares;
				if (shares > 0 || z == 1) el.after('<span class="share_counter">' + shares + '</span>')
			})
		}

		$('.sc_socials_share a:not(.inited)').each(function (idx) {
			var el = $(this).addClass('inited'),
				cnt = el.data('count'),
				u = el.data('url'),					// share url
				z = el.data("zero-counter");		// show zero counter
			if (!u) u = location.href;
			if (!z) z = 1;
			if (cnt == "delicious") {
				delicious_count(u);
			} else if (cnt == "facebook") {
				fb_count(u);
			} else if (cnt == "linkedin") {
				lnkd_count(u);
			} else if (cnt == "mail") {
	            mail_count(u);
			} else if (cnt == "odnoklassniki") {
				odkl_count(u);
			} else if (cnt == "pinterest") {
				pin_count(u);
			} else if (cnt == "twitter") {
				twi_count(u);
			} else if (cnt == "vk" || cnt == "vk2") {
				vk_count(u);
			} else if (cnt == "ya") {
				ya_count(u);
			}
        })
    })
})(jQuery);
