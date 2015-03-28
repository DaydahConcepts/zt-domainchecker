/**
 * Zo2 domain addon
 * @param {object} w Window pointer
 * @param {object} z Zo2 pointer
 * @param {object} $ jQuery pointer
 * @returns {undefined}
 */
(function (w, z, $) {

    /**
     * Domain addon
     * @type {object}
     */
    var _domain = {
        /* Selector */
        _elements: {
            wrapper: "#zt-domain-wrapper",
            search: "#zt-domain-name",
            result: ".zt-domain-list-results",
            ext: "#zt-domain-ext"
        },
        _init: function () {
            var _self = this;
            var $extList = $(this._elements.ext);
            var $extCheckers = $extList.find('span.check');
            
            $(this._elements.search).focus(function () {
                $extList.slideDown();
            });
            
            $(this._elements.search).on('keyup', function () {
                if ($(this).val().length >= 3 || $(this).val() === '') {
                    $(_self._elements.search).css('border', '1px solid #d9d9d9');
                } else {
                    $(_self._elements.search).css('border', '1px solid red');
                }
            });

            //Check Results
            $extCheckers.click(function () {
                if ($(this).hasClass('checker')) {
                    $(this).removeClass('checker');
                    $(this).find('.fa').removeClass('fa-check-square-o').addClass('fa-square-o');
                    $(this).find('input').attr("checked", false);
                } else {
                    $(this).addClass('checker');
                    $(this).find('.fa').removeClass('fa-square-o').addClass('fa-check-square-o');
                    $(this).find('input').attr("checked", true);
                }
            });
        },
        /**
         * Get ext list
         * @returns {Array}
         */
        _getCheckArray: function () {
            var retVal = [];
            var $extCheckers = $(this._elements.ext).find('span.check').find('input[type="checkbox"]');
            $extCheckers.each(function () {
                if ($(this).is(':checked') === true) {
                    retVal.push($(this).val());
                }
            });
            return retVal;
        },
        check: function () {
            var _self = this;
            var domainExt = this._getCheckArray();
            var value = $(this._elements.search).val();
            if (value.length < 3) {
                return false;
            }
            $.ajax({
                url: z.settings.frontendUrl,
                dataType: "json",
                data: {
                    domain: value,
                    option: 'com_ajax',
                    module: 'ztdomainchecker',
                    format: 'json',
                    ext: domainExt
                }
            }).done(function (response) {
                $(response.data).each(function (index, value) {
                    if (value.hasOwnProperty('html')) {
                        $(_self._elements.result + '> ul').html(value.html);
                    }
                    if (value.hasOwnProperty('domain')) {
                        $(value.domain).each(function (cIndex, cValue) {
                            _self.whois(cValue);
                        });
                    }
                });
                $(_self._elements.ext).slideUp();
            });
        },
        whois: function (domain) {
            var _self = this;
            $.ajax({
                url: z.settings.frontendUrl,
                dataType: "json",
                data: {
                    domain: domain,
                    option: 'com_ajax',
                    module: 'ztdomainchecker',
                    method: "whois",
                    format: 'json'
                }
            }).done(function (response) {
                $(response.data).each(function (index, value) {
                    if (value.hasOwnProperty('domain') && value.hasOwnProperty('html')) {
                        $(_self._elements.result + '> ul').find('li[data-domain="' + domain + '"]').replaceWith(value.html);
                    }
                });
            });
        },
        loadWhois: function (whoisData) {
            $(this._elements.wrapper).find('#myModal').find('.modal-body').html(atob(whoisData));
        }
    };

    /**
     * Append to global Zo2
     */
    z.domain = _domain;

    $(w.document).ready(function () {
        z.domain._init();
    });

})(window, zo2, jQuery);