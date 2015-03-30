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

$ltds = ModZtdomaincheckerHelper::getLtds($params->get('ltd', 'com:9$:checked;net:8$:checked;org:8$:checked;us:8$:checked;biz:8$;'));
?>
<script type="text/javascript" src="modules/mod_ztdomainchecker/assets/js/zo2.ajax.js"></script>
<script type="text/javascript" src="modules/mod_ztdomainchecker/assets/js/ztdomainchecker.js"></script>
<div class="zt-domain-wrap" id="zt-domain-wrapper">
    <div class="row-fluid">
        <label class="search-label span2"><?php echo $params->get('label'); ?></label>

        <div class="search span10">
            <input type="text" id="zt-domain-name" class="form-control" maxlength="64" placeholder="<?php echo $params->get('input'); ?>"/>
            <button type="submit" class="btn btn-search" onClick="zo2.domain.check();"><?php echo $params->get('button'); ?> <i
                    class="fa fa-angle-right"></i></button>
        </div>
    </div>
    <div id="zt-domain-ext">
        <div class="zt-domain-ext-title clearfix">
            <p class="pull-left"><span data-label="Uncheck All Domain Types" data-check-all="true" onclick="zo2.domain.toggleExt(this);"><?php echo $params->get('check_all_text'); ?></span> <?php echo $params->get('such_as'); ?></p>
            <p class="pull-right close-results"><i onclick="zo2.domain.close();" class="fa fa-times"></i></p>
        </div>
        <ul class="clearfix">
            <?php foreach($ltds as $listExt) { ?>
                <li class="pull-left">
                <span class="check<?php echo (isset($listExt->checked) && $listExt->checked == 1) ? ' checker' : ''; ?>">
                    <?php if(isset($listExt->checked) && $listExt->checked == 1) { ?>
                        <i class="fa fa-check-square-o"></i>
                    <?php } else { ?>
                        <i class="fa-square-o fa"></i>
                    <?php } ?>
                    <input type="checkbox" name="check-domain" id="dot_<?php echo $listExt->name; ?>" value="<?php echo $listExt->name; ?>" class="SCheckbox"<?php echo (isset($listExt->checked) && $listExt->checked == 1) ? 'checked="checked"' : ''; ?>>
                    <label for="dot_<?php echo $listExt->name; ?>">.<?php echo $listExt->name; ?></label>
                </span>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div class="zt-domain-results" style="display:none;">
        <div class="zt-domain-results-title clearfix">
            <h2 class="close-results"><?php echo $params->get('result'); ?></h2>
        </div>
        <div class="zt-domain-list-results">
            <ul></ul>
        </div>
        <!-- Whois Modal -->
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel"><?php echo $params->get('modal_title'); ?></h3>
            </div>
            <div class="modal-body"></div>
        </div>
    </div>
</div>