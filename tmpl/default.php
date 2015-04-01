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
$script[] = '';
$script[] = '(function (w, $) {';
$script[] = 'var _zo2 = {';
$script[] = '_settings: {';
$script[] = 'version: null,';
$script[] = 'frontendUrl: "' . JUri::root() . '",';
$script[] = 'backendUrl: "' . rtrim(JUri::root(), '/') . '/administrator' . '",';
$script[] = 'token: "' . JSession::getFormToken() . '",';
$script[] = 'itemId: ' . JFactory::getApplication()->getMenu()->getActive()->id;
$script[] = '},';
$script[] = 'jQuery: $';
$script[] = '};';
$script[] = 'if (typeof(w.zo2) === \'undefined\') {';
$script[] = 'w.zo2 = _zo2;';
$script[] = '}';
$script[] = 'else';
$script[] = '{';
$script[] = 'w.zo2._settings = $.extend({}, w.zo2._settings, _zo2._settings);';
$script[] = '}';
$script[] = '})(window, jQuery);';
$script[] = '';

$doc->addScriptDeclaration(implode(PHP_EOL, $script));

$ltds = ModZtdomaincheckerHelper::getLtds();
?>
<script type="text/javascript" src="modules/mod_ztdomainchecker/assets/js/zo2.ajax.js"></script>
<script type="text/javascript" src="modules/mod_ztdomainchecker/assets/js/ztdomainchecker.js"></script>
<div class="zt-domain-wrap" id="zt-domain-wrapper">
    <div class="row">
        <label class="search-label col-sm-2 col-md-2"><?php echo $params->get('label'); ?></label>

        <div class="zt-domain-search  col-sm-10 col-md-10">
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
            <?php foreach ($ltds as $listExt)
            {
                ?>
                <li class="pull-left">
                    <span class="check<?php echo (isset($listExt->checked) && $listExt->checked == 1) ? ' checker' : ''; ?>">
                        <?php if (isset($listExt->checked) && $listExt->checked == 1)
                        {
                            ?>
                            <i class="fa fa-check-square-o"></i>
                        <?php } else
                        {
                            ?>
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
            <div id="zt-domain-empty-item"  style="display:none;"> 
                <li class="zt-domain-item">
                    <div class="row">
                        <div class="col-sm-8 col-md-8 zt-domain-name"></div>
                        <div class="col-sm-2 col-md-2 zt-domain-price"><?php echo $params->get('checking') ?></div>
                        <div class="col-sm-2 col-md-2 zt-domain-available"><div id="circularG"><div id="circularG_1" class="circularG"></div><div id="circularG_2" class="circularG"></div><div id="circularG_3" class="circularG"></div><div id="circularG_4" class="circularG"></div><div id="circularG_5" class="circularG"></div><div id="circularG_6" class="circularG"></div><div id="circularG_7" class="circularG"></div><div id="circularG_8" class="circularG"></div></div></div>
                    </div>
            </div>
            </li>
            <ul></ul>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body"></div>
                </div>
            </div>
        </div>
    </div>
</div>