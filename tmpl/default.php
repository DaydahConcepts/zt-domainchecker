<?php
/**
 * ZT Domain checker
 * 
 * @package     Joomla
 * @subpackage  Module
 * @version     1.0.0
 * @author      ZooTemplate 
 * @email       support@zootemplate.com 
 * @link        http://www.zootemplate.com 
 * @copyright   Copyright (c) 2015 ZooTemplate
 * @license     GPL v2
 */
defined('_JEXEC') or die('Restricted access');

$doc = JFactory::getDocument();
$doc->addStyleSheet('modules/mod_ztdomainchecker/assets/css/default.css');
$doc->addStyleSheet('modules/mod_ztdomainchecker/assets/font-awesome/css/font-awesome.min.css');
/* Add Zo2 Javascript Framework normally */
$script[] = '(function (w, $) {';
$script[] = 'if (typeof w.zo2 === \'undefined\') {';
$script[] = 'var _zo2 = {';
$script[] = 'settings: {';
$script[] = 'version: null,';
$script[] = 'frontendUrl: "' . JUri::root() . '",';
$script[] = 'backendUrl: "' . rtrim(JUri::root(), '/') . '/administrator' . '",';
$script[] = 'token: "' . JSession::getFormToken() . '"';
$script[] = '},';
$script[] = 'jQuery: $';
$script[] = '};';
$script[] = 'w.zo2 = _zo2;';
$script[] = '}';
$script[] = '})(window, jQuery);';
$doc->addScriptDeclaration(implode(PHP_EOL, $script));

$ltds = ModZtdomaincheckerHelper::getLtds($params->get('ltd'));
?>
<script type="text/javascript" src="modules/mod_ztdomainchecker/assets/js/zo2.ajax.js"></script>
<script type="text/javascript" src="modules/mod_ztdomainchecker/assets/js/ztdomainchecker.js"></script>
<div class="zt-domain-wrap" id="zt-domain-wrapper">
    <div class="row-fluid">
        <label class="search-label span2">GET DOMAIN: </label>

        <div class="search span10">
            <input type="text" id="zt-domain-name" class="form-control" maxlength="64" placeholder="Search"/>
            <button type="submit" class="btn btn-search" onClick="zo2.domain.check();">CHECK DOMAIN <i
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
                    <input type="checkbox" name="check-domain" id="dot_org" value="org" class="SCheckbox">
                    <label for="dot_org">.org</label>
                </span>
            </li>
            <li class="pull-left">
                <span class="check">
                    <i class="fa-square-o fa"></i>
                    <input type="checkbox" name="check-domain" id="dot_info" value="info" class="SCheckbox">
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
            <ul></ul>
        </div>
        <!-- Whois Modal -->
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Modal header</h3>
            </div>
            <div class="modal-body"></div>
        </div>
    </div>
</div>