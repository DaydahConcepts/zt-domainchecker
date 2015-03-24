<!-- Add Style --->
<?php
    defined('_JEXEC') or die;
    $doc = JFactory::getDocument();
    $doc->addStyleSheet('modules/mod_ztdomainchecker/assets/css/default.css');
    $doc->addStyleSheet('modules/mod_ztdomainchecker/assets/font-awesome/css/font-awesome.min.css');
?>

<div class="zt-domain-wrap">
    <div class="row-fluid">
        <label class="search-label span2">GET DOMAIN: </label>
        <div class="search span10">
            <input type="text" id="domain-name" class="form-control" maxlength="64" placeholder="Search" />
            <button type="submit" class="btn btn-search" onClick="checkDomains('');">CHECK DOMAIN <i class="fa fa-angle-right"></i></button>
        </div>
    </div>
    <div id="zt-domain-results">
        <div class="zt-domain-results-title clearfix">
            <p class="pull-left"><span>Check all domain types</span> ( such as: yourdomain.com, yourdomain.org, etc )</p>
            <p class="pull-right close-results"><i class="fa fa-times"></i></p>
        </div>
        <ul class="clearfix">
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_com" value="com" class="SCheckbox">
                    <label for="dot_com">.com</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_net" value="net" class="SCheckbox">
                    <label for="dot_net">.net</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_info" value="org" class="SCheckbox">
                    <label for="dot_info">.info</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_biz" value="biz" class="SCheckbox">
                    <label for="dot_biz">.biz</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_me" value="me" class="SCheckbox">
                    <label for="dot_me">.me</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_mobi" value="mobi" class="SCheckbox">
                    <label for="dot_mobi">.mobi</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_name" value="name" class="SCheckbox">
                    <label for="dot_name">.name</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_tv" value="tv" class="SCheckbox">
                    <label for="dot_tv">.tv</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_ws" value="ws" class="SCheckbox">
                    <label for="dot_ws">.ws</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_pw" value="pw" class="SCheckbox">
                    <label for="dot_pw">.pw</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_us" value="us" class="SCheckbox">
                    <label for="dot_us">.us</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_eu" value="eu" class="SCheckbox">
                    <label for="dot_eu">.eu</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_in" value="in" class="SCheckbox">
                    <label for="dot_in">.in</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_fr" value="fr" class="SCheckbox">
                    <label for="dot_fr">.fr</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_ca" value="ca" class="SCheckbox">
                    <label for="dot_ca">.ca</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_co" value="co" class="SCheckbox">
                    <label for="dot_co">.co</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_bz" value="bz" class="SCheckbox">
                    <label for="dot_bz">.bz</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_de" value="de" class="SCheckbox">
                    <label for="dot_de">.de</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_cc" value="cc" class="SCheckbox">
                    <label for="dot_cc">.cc</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_vn" value="vn" class="SCheckbox">
                    <label for="dot_vn">.vn</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_com_vn" value="com.vn" class="SCheckbox">
                    <label for="dot_com_vn">.com.vn</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_net_vn" value="net.vn" class="SCheckbox">
                    <label for="dot_net_vn">.net.vn</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_org_vn" value="org.vn" class="SCheckbox">
                    <label for="dot_org_vn">.org.vn</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_info_vn" value="info.vn" class="SCheckbox">
                    <label for="dot_info_vn">.info.vn</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_gov_vn" value="gov.vn" class="SCheckbox">
                    <label for="dot_gov_vn">.gov.vn</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_edu_vn" value="edu.vn" class="SCheckbox">
                    <label for="dot_edu_vn">.edu.vn</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_biz_vn" value="biz.vn" class="SCheckbox">
                    <label for="dot_biz_vn">.biz.vn</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_name_vn" value="name.vn" class="SCheckbox">
                    <label for="dot_name_vn">.name.vn</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_pro_vn" value="pro.vn" class="SCheckbox">
                    <label for="dot_pro_vn">.pro.vn</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_health_vn" value="health.vn" class="SCheckbox">
                    <label for="dot_health_vn">.health.vn</label>
                </span>
            </li>
        </ul>
    </div>
</div>
<script type="text/javascript">
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

    jQuery(document).ready(function (){

        var domainResults = jQuery('#zt-domain-results'),
            checkResults = jQuery('.check');

        //Focus Input Search Domain
        jQuery('#domain-name').focus(function(){
            jQuery(domainResults).slideDown();
        });

        //Close Results
        jQuery('.close-results').click(function(){
            jQuery(domainResults).slideUp();
        });

        //Check Results
        jQuery(checkResults).click(function(){
            if(jQuery(this).hasClass('checker')){
                jQuery(this).removeClass('checker');
                jQuery(this).find('.fa').removeClass('fa-check-square-o').addClass('fa-square-o');
                jQuery(this).find('input').attr("checked",true);
            } else {
                jQuery(this).addClass('checker');
                jQuery(this).find('.fa').removeClass('fa-square-o').addClass('fa-check-square-o');
                jQuery(this).find('input').attr("checked",false);
            }
        });
    });
</script>