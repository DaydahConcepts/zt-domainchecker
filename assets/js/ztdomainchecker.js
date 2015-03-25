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
            domainWrapper: "#zt-domain-wrap"            
        },
        check: function(){
            
        },
        whois: function(){
            
        }        
    };

    /**
     * Append to global Zo2
     */
    z.domain = _domain;

})(window, zo2, jQuery);