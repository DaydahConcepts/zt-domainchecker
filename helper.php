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

use phpWhois\Whois;

if (!class_exists('ModZtdomaincheckerHelper'))
{
    require_once __DIR__ . '/libraries/idna_convert/idna_convert.class.php';
    require_once __DIR__ . '/libraries/phpWhois/src/WhoisClient.php';
    require_once __DIR__ . '/libraries/phpWhois/src/IpTools.php';
    require_once __DIR__ . '/libraries/phpWhois/src/Whois.php';

    class ModZtdomaincheckerHelper
    {

        public static function getParams()
        {
            jimport('joomla.application.module.helper');
            jimport('joomla.html.parameter');
            $module = JModuleHelper::getModule('mod_ztdomainchecker');
            return new JRegistry($module->params);
        }

        public static function getAjax()
        {
            $params = self::getParams();
            $domain = strtolower(JFactory::getApplication()->input->get('domain'));
            $validExtensions = JFactory::getApplication()->input->get('ext', array('com', 'net', 'org'), 'ARRAY');
            $parts = explode('.', $domain);
            $keyword = array_shift($parts);
            $extension = implode('.', $parts);
            // Have extension
            if ($extension != '')
            {
                if (!in_array($extension, $validExtensions))
                {
                    $validExtensions[] = $extension;
                }
            }
            foreach ($validExtensions as $extension)
            {
                $domains[] = $keyword . '.' . $extension;
            }
            foreach ($domains as $domainName)
            {
                $html[] = '<li class="zt-domain-item" data-domain="' . $domainName . '">';
                $html[] = '<div class="row-fluid">';
                $html[] = '<div class="span8 zt-domain-name">' . $domainName . '</div>';
                $html[] = '<div class="span2 zt-domain-price">'.$params->get('checking').'</div>';
                $html[] = '<div class="span2 zt-domain-available"><div id="circularG"><div id="circularG_1" class="circularG"></div><div id="circularG_2" class="circularG"></div><div id="circularG_3" class="circularG"></div><div id="circularG_4" class="circularG"></div><div id="circularG_5" class="circularG"></div><div id="circularG_6" class="circularG"></div><div id="circularG_7" class="circularG"></div><div id="circularG_8" class="circularG"></div></div></div>';
                $html[] = '</div>';
                $html[] = '</li>';
            }
            return array('domain' => $domains, 'html' => implode(PHP_EOL, $html));
        }

        public static function whoisAjax()
        {
            $params = self::getParams();
            $domain = JFactory::getApplication()->input->get('domain');
            $deep = JFactory::getApplication()->input->get('deep', false);

            $whois = new Whois();
            $whois->deepWhois = $deep;

            $data = $whois->lookup($domain);

            //$parsed['whois'] = implode(PHP_EOL, $data['rawdata']);
            //$parsed['name'] = $data['regrinfo']['domain']['name'];
            //$parsed['nameservers'] = implode(PHP_EOL, $data['regrinfo']['domain']['nserver']);

            if ($deep == false)
            {
                $parsed['domain'] = $domain;
                $parsed['available'] = !($data['regrinfo']['registered'] == 'yes');
                if ($data['regrinfo']['registered'] == 'yes')
                {
                    $html[] = '<li class="zt-domain-item">';
                    $html[] = '<div class="row-fluid">';
                    $html[] = '<div class="span8 zt-domain-name">' . $domain . '</div>';
                    $html[] = '<div class="span2 zt-domain-price"><a href="#myModal" onclick="zo2.domain.loadWhois(\'' . base64_encode(implode('<br/>', $data['rawdata'])) . '\');" role="button" class="zt-whois"';
                    $html[] = 'data-toggle="modal"><i class="fa-eye fa"></i>'. $params->get('whois') .'</a></div>';
                    $html[] = '<div class="span2 zt-domain-available"><a href="#" onclick="return false;" class="not-available">' . $params->get('taken') . '</a></div>';
                    $html[] = '</div>';
                    $html[] = '</li>';
                } else
                {
                    $html[] = '<li class="zt-domain-item">';
                    $html[] = '<div class="row-fluid">';
                    $html[] = '<div class="span8 zt-domain-name">' . $domain . '</div>';
                    $html[] = '<div class="span2 zt-domain-price">' . self::getPrice($domain) . '/years</div>';
                    $html[] = '<div class="span2 zt-domain-available"><a href="#">' . $params->get('available') . '</a></div>';
                    $html[] = '</div>';
                    $html[] = '</li>';
                }
                $parsed['html'] = implode(PHP_EOL, $html);
                return $parsed;
            }
        }

        public static function getLtds()
        {
            $params = self::getParams();
            $ltds = $params->get('ltd', 'com:10 USD:checked|net:10 USD:checked|org:10 USD:checked|info:10 USD:checked|us:10 USD:checked|biz:10 USD:checked|asia:10 USD|pro:10 USD|uk:10 USD|co.uk:10 USD|me:10 USD|co:10 USD|vn:10 USD|com.vn:10 USD');
            $extensions = explode('|', $ltds);
            foreach ($extensions as $extension)
            {
                $parts = explode(':', $extension);
                if (count($parts) >= 2)
                {
                    if (isset($parts[2]) && $parts[2] == 'checked')
                    {
                        $item = new JObject();
                        $item->name = $parts[0];
                        $item->price = $parts[1];
                        $item->checked = true;
                    } else
                    {
                        $item = new JObject();
                        $item->name = $parts[0];
                        $item->price = $parts[1];
                        $item->checked = false;
                    }
                    $list[] = $item;
                }
            }
            return $list;
        }

        public static function getPrice($domain)
        {
            $list = self::getLtds();
            $ext = substr($domain, strpos($domain, '.') + 1);
            foreach ($list as $item)
            {
                if ($item->name == $ext)
                {
                    return $item->price;
                }
            }
            return '???';
        }

    }

}