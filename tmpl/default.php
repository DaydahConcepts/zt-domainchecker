<!-- Add Style --->
<?php
defined('_JEXEC') or die;
$doc = JFactory::getDocument();
$doc->addStyleSheet('modules/mod_ztdomainchecker/assets/css/default.css');
$doc->addStyleSheet('modules/mod_ztdomainchecker/assets/font-awesome/css/font-awesome.min.css');
/* Add Zo2 Javascript Framework normally */
$script[] = '(function (w, $) {';
$script[] = 'if (typeof w.zo2 === \'undefined\') {';
$script[] = 'var _zo2 = {';
$script[] = 'settings: {';
$script[] = 'version: null,';
$script[] = 'frontendUrl: "' . JUri::root() .'",';
$script[] = 'backendUrl: "' . rtrim(JUri::root(), '/') . '/administrator' . '",';
$script[] = 'token: "' . JSession::getFormToken() . '"';
$script[] = '},';
$script[] = 'jQuery: $';
$script[] = '};';
$script[] = 'w.zo2 = _zo2;';
$script[] = '}';
$script[] = '})(window, jQuery);';
$doc->addScriptDeclaration(implode(PHP_EOL, $script));
?>
<script type="text/javascript" src="modules/mod_ztdomainchecker/assets/js/zo2.ajax.js"></script>
<script type="text/javascript" src="modules/mod_ztdomainchecker/assets/js/ztdomainchecker.js"></script>
<div class="zt-domain-wrap">
<div class="row-fluid">
    <label class="search-label span2">GET DOMAIN: </label>

    <div class="search span10">
        <input type="text" id="domain-name" class="form-control" maxlength="64" placeholder="Search"/>
        <button type="submit" class="btn btn-search" onClick="checkDomains('');">CHECK DOMAIN <i
                class="fa fa-angle-right"></i></button>
    </div>
</div>
<div id="zt-domain-ext">
<div class="zt-domain-ext-title clearfix">
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
<div class="zt-domain-results">
    <div class="zt-domain-results-title clearfix">
        <h2 class="close-results">Results check domain</h2>
    </div>
    <div class="zt-domain-list-results">
        <ul>
            <li class="zt-domain-item">
                <div class="row-fluid">
                    <div class="span8 zt-domain-name">zootemplate.com</div>
                    <div class="span2 zt-domain-price"><a href="#myModal" role="button" class="zt-whois"
                                                          data-toggle="modal"><i class="fa-eye fa"></i>Whois</a></div>
                    <div class="span2 zt-domain-available"><a href="#" class="not-available">taken</a></div>
                </div>
            </li>
            <li class="zt-domain-item">
                <div class="row-fluid">
                    <div class="span8 zt-domain-name">zootemplate.com</div>
                    <div class="span2 zt-domain-price">$30/years</div>
                    <div class="span2 zt-domain-available"><a href="#">available</a></div>
                </div>
            </li>
            <li class="zt-domain-item">
                <div class="row-fluid">
                    <div class="span8 zt-domain-name">zootemplate.com</div>
                    <div class="span2 zt-domain-price">$30/years</div>
                    <div class="span2 zt-domain-available"><i class="fa fa-spinner fa-spin"></i></div>
                </div>
            </li>
        </ul>
    </div>

    <!-- Moda -->

    <!-- Modal -->
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Modal header</h3>
        </div>
        <div class="modal-body">
            Whois Server Version 2.0<br><br>Domain names in the .com and .net domains can now be registered<br>with many
            different competing registrars. Go to http://www.internic.net<br>for detailed information.<br><br>Domain
            Name: ZOOTEMPLATE.COM<br>Registrar: GODADDY.COM, LLC<br>Sponsoring Registrar IANA ID: 146<br>Whois Server:
            whois.godaddy.com<br>Referral URL: http://registrar.godaddy.com<br>Name Server: NS55.DOMAINCONTROL.COM<br>Name
            Server: NS56.DOMAINCONTROL.COM<br>Status: clientDeleteProhibited
            http://www.icann.org/epp#clientDeleteProhibited<br>Status: clientRenewProhibited
            http://www.icann.org/epp#clientRenewProhibited<br>Status: clientTransferProhibited
            http://www.icann.org/epp#clientTransferProhibited<br>Status: clientUpdateProhibited
            http://www.icann.org/epp#clientUpdateProhibited<br>Updated Date: 25-oct-2014<br>Creation Date:
            17-dec-2010<br>Expiration Date: 17-dec-2016<br><br>&gt;&gt;&gt; Last update of whois database: Wed, 25 Mar
            2015 02:39:13 GMT &lt;&lt;&lt;<br><br>NOTICE: The expiration date displayed in this record is the date
            the<br>registrar's sponsorship of the domain name registration in the registry is<br>currently set to
            expire. This date does not necessarily reflect the expiration<br>date of the domain name registrant's
            agreement with the sponsoring<br>registrar. Users may consult the sponsoring registrar's Whois database
            to<br>view the registrar's reported date of expiration for this registration.<br><br>TERMS OF USE: You are
            not authorized to access or query our Whois<br>database through the use of electronic processes that are
            high-volume and<br>automated except as reasonably necessary to register domain names or<br>modify existing
            registrations; the Data in VeriSign Global Registry<br>Services' ("VeriSign") Whois database is provided by
            VeriSign for<br>information purposes only, and to assist persons in obtaining information<br>about or
            related to a domain name registration record. VeriSign does not<br>guarantee its accuracy. By submitting a
            Whois query, you agree to abide<br>by the following terms of use: You agree that you may use this Data
            only<br>for lawful purposes and that under no circumstances will you use this Data<br>to: (1) allow, enable,
            or otherwise support the transmission of mass<br>unsolicited, commercial advertising or solicitations via
            e-mail, telephone,<br>or facsimile; or (2) enable high volume, automated, electronic processes<br>that apply
            to VeriSign (or its computer systems). The compilation,<br>repackaging, dissemination or other use of this
            Data is expressly<br>prohibited without the prior written consent of VeriSign. You agree not to<br>use
            electronic processes that are automated and high-volume to access or<br>query the Whois database except as
            reasonably necessary to register<br>domain names or modify existing registrations. VeriSign reserves the
            right<br>to restrict your access to the Whois database in its sole discretion to ensure<br>operational
            stability. VeriSign may restrict or terminate your access to the<br>Whois database for failure to abide by
            these terms of use. VeriSign<br>reserves the right to modify these terms at any time.<br><br>The Registry
            database contains ONLY .COM, .NET, .EDU domains and<br>Registrars.<br><br>For more information on Whois
            status codes, please visit<br>https://www.icann.org/resources/pages/epp-status-codes-2014-06-16-en.<br>Domain
            Name: ZOOTEMPLATE.COM<br>Registrar URL: http://www.godaddy.com<br>Registrant Name: Registration Private<br>Registrant
            Organization: Domains By Proxy, LLC<br>Name Server: NS55.DOMAINCONTROL.COM<br>Name Server:
            NS56.DOMAINCONTROL.COM<br>DNSSEC: unsigned<br><br>For complete domain details go to:<br>http://who.godaddy.com/whoischeck.aspx?domain=ZOOTEMPLATE.COM<br><br>The
            data contained in GoDaddy.com, LLC's WhoIs database,<br>while believed by the company to be reliable, is
            provided "as is"<br>with no guarantee or warranties regarding its accuracy. This<br>information is provided
            for the sole purpose of assisting you<br>in obtaining information about domain name registration
            records.<br>Any use of this data for any other purpose is expressly forbidden without the prior written<br>permission
            of GoDaddy.com, LLC. By submitting an inquiry,<br>you agree to these terms of usage and limitations of
            warranty. In particular,<br>you agree not to use this data to allow, enable, or otherwise make possible,<br>dissemination
            or collection of this data, in part or in its entirety, for any<br>purpose, such as the transmission of
            unsolicited advertising and<br>and solicitations of any kind, including spam. You further agree<br>not to
            use this data to enable high volume, automated or robotic electronic<br>processes designed to collect or
            compile this data for any purpose,<br>including mining this data for your own personal or commercial
            purposes.<br><br>Please note: the registrant of the domain name is specified<br>in the "registrant" section.
            In most cases, GoDaddy.com, LLC<br>is not the registrant of domain names listed in this database.<br>
        </div>
    </div>
</div>
</div>