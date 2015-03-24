<div class="container">
    <div class="row">
        <h2>Slider Search box</h2>
        <div class="search">
            <input type="text" class="form-control domain input-sm" maxlength="64" placeholder="Search" />
            <button type="submit" class="btn btn-primary btn-sm" onClick="checkDomains('');">Search</button>
        </div>
    </div>
    <div id="zt-domain-results">
        <ul>

        </ul>
    </div>
</div>
<script>
    function whois(domain) {
        jQuery.ajax({
            url: "<?php echo JUri::root(); ?>",
            dataType: "json",
            data: {
                domain: domain,
                option: 'com_ajax',
                module: 'ztdomainchecker',
                method: "whois",
                format: 'json'
            }
        }).done(function (data) {

            jQuery('#zt-domain-results ul').append(data.data.html);
        })
    }

    function checkDomains() {
        var value = jQuery('input.domain').val();
        jQuery.ajax({
            url: "<?php echo JUri::root(); ?>",
            dataType: "json",
            data: {
                domain: value,
                option: 'com_ajax',
                module: 'ztdomainchecker',
                format: 'json'
            }
        }).done(function (respond) {
            jQuery(respond.data).each(function (index, value) {
                whois(value);
            });
        })
    }
</script>