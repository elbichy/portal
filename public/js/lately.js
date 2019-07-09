/**
 * Lately.js is a jQuery plugin that makes it easy to support automatically
 *
 * @name ViewImage.js
 * @version 1.0.2
 * @requires jQuery v2.0+
 * @author Tokin (Tokinx)
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
 *
 * For usage and examples, visit:
 * https://tokinx.github.io/lately/
 *
 * Copyright (c) 2017, Biji.IO
 */
(function ($) {
    $.extend({
        lately: function (options) {
            var setting = $.extend({
                    'target': '.time',
                    'lang': {
    'second': ' Seconds',
    'minute': ' Minutes',
    'hour': ' Hours',
    'day': ' Days',
    'month': ' Months',
    'year': ' Years',
    'ago': ' Ago',
    'error': 'NaN'
  }
                }, options),
                contains = $(setting.target);
            for (var i = 0; i < contains.length; i++) {
                var contain = $(contains[i]),
                    date = '';
                if ($(contain).is(":visible")) {
                    var datetime = $(contain).attr("datetime"),
                        title = $(contain).attr("title"),
                        htmls = $(contain).html();
                    if (datetime ? !isNaN(new Date(datetime = (datetime.replace(/(.*)[a-z](.*)\+(.*)/gi, "$1 $2")).replace(/-/g, "/"))) : false) date = datetime;
                    else if (title ? !isNaN(new Date(title = title.replace(/-/g, "/"))) : false) date = title;
                    else if (htmls ? !isNaN(new Date(htmls = htmls.replace(/-/g, "/"))) : false) date = htmls;
                    else return;
                    $(contain).html(lately_count(date));
                }
            }
            function lately_count(date) {
                var date = new Date(date),
                    second = (new Date().getTime() - date.getTime()) / 1000,
                    minute = second / 60,
                    hour = minute / 60,
                    day = hour / 24,
                    month = day / 30,
                    year = month / 12,
                    floor = Math.floor,
                    result = '';
                if (year >= 1) result = floor(year) + setting.lang.year;
                else if (month >= 1) result = floor(month) + setting.lang.month;
                else if (day >= 1) result = floor(day) + setting.lang.day;
                else if (hour >= 1) result = floor(hour) + setting.lang.hour;
                else if (minute >= 1) result = floor(minute) + setting.lang.minute;
                else if (second >= 1) result = floor(second) + setting.lang.second;
                else result = setting.lang.error;
                return result + setting.lang.ago;
            }
        }
    });
})(jQuery);
