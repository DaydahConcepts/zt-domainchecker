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
            ext: "#zt-domain-ext",
            resultWrapper: '.zt-domain-results'
        },
        /**
         * Init function
         * @returns {undefined}
         */
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
            
            // Enter key handle
            $(this._elements.search).keypress(function (event) {
                if (event.which === 13) {
                    _self.check();
                    event.preventDefault();
                }
            });

            //Check Results
            $extCheckers.click(function () {
                if ($(this).hasClass('checker')) {
                    _self._checkBoxUncheck($(this));
                } else {
                    _self._checkBoxCheck($(this));
                }
            });
        },
        /**
         * Checkbox check
         * @param {type} $checkBox
         * @returns {undefined}
         */
        _checkBoxCheck: function ($checkBox) {
            if (!$checkBox.hasClass('checker')) {
                $checkBox.addClass('checker');
                $checkBox.find('.fa').removeClass('fa-square-o').addClass('fa-check-square-o');
                $checkBox.find('input').attr("checked", true);
            }
        },
        /**
         * Checkbox uncheck
         * @param {type} $checkBox
         * @returns {undefined}
         */
        _checkBoxUncheck: function ($checkBox) {
            if ($checkBox.hasClass('checker')) {
                $checkBox.removeClass('checker');
                $checkBox.find('.fa').removeClass('fa-check-square-o').addClass('fa-square-o');
                $checkBox.find('input').attr("checked", false);
            }
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
        /**
         * Check domain ajax
         * @returns {Boolean}
         */
        check: function () {
            var _self = this;
            var domainExt = this._getCheckArray();
            var value = $(this._elements.search).val();
            if (value.length < 3) {
                return false;
            }
            $(_self._elements.resultWrapper).slideDown();
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
            });
        },
        /**
         * Close all
         * @returns {undefined}
         */
        close: function () {
            $(this._elements.resultWrapper).slideUp();
            $(this._elements.ext).slideUp();
        },
        /**
         * Toggle extensions select
         * @param {type} thisPtr
         * @returns {undefined}
         */
        toggleExt: function (thisPtr) {
            var label = $(thisPtr).html();
            if ($(thisPtr).data('check-all') === true) {
                this.checkAll();
            } else {
                this.uncheckAll();
            }
            $(thisPtr).data('check-all', !$(thisPtr).data('check-all'));
            $(thisPtr).html($(thisPtr).data('label'));
            $(thisPtr).data('label', label);
        },
        /**
         * Check all checkbox
         * @returns {undefined}
         */
        checkAll: function () {
            var _self = this;
            var $extCheckers = $(this._elements.ext).find('span.check').find('input[type="checkbox"]');
            $extCheckers.each(function () {
                _self._checkBoxCheck($(this).closest('span'));
            });
        },
        /**
         * Uncheck all checkbox
         * @returns {undefined}
         */
        uncheckAll: function () {
            var _self = this;
            var $extCheckers = $(this._elements.ext).find('span.check').find('input[type="checkbox"]');
            $extCheckers.each(function () {
                _self._checkBoxUncheck($(this).closest('span'));
            });
        },
        /**
         * Whois ajax
         * @param {type} domain
         * @returns {undefined}
         */
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
        /**
         * Load each whois field
         * @param {type} whoisData
         * @returns {undefined}
         */
        loadWhois: function (whoisData, titleData) {
            $(this._elements.wrapper).find('#myModal').find('.modal-body').html(atob(whoisData));
            $(this._elements.wrapper).find('#myModalLabel').html(atob(titleData));
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