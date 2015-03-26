<?php

use phpWhois\Whois;

if (!class_exists('ModZtdomaincheckerHelper'))
{
    require_once __DIR__ . '/libraries/idna_convert/idna_convert.class.php';
    require_once __DIR__ . '/libraries/phpWhois/src/WhoisClient.php';
    require_once __DIR__ . '/libraries/phpWhois/src/IpTools.php';
    require_once __DIR__ . '/libraries/phpWhois/src/Whois.php';

    class ModZtdomaincheckerHelper
    {

        public static function getAjax()
        {
            $domain = JFactory::getApplication()->input->get('domain');
            $validExtensions = JFactory::getApplication()->input->get('ext', array('com'), 'ARRAY');
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
            foreach($domains as $domainName){
                $html[] = '<li class="zt-domain-item" data-domain="' . $domainName . '">';
                $html[] = '<div class="row-fluid">';
                $html[] = '<div class="span8 zt-domain-name">' . $domainName . '</div>';
                $html[] = '<div class="span2 zt-domain-price">$30/years</div>';
                $html[] = '<div class="span2 zt-domain-available"><i class="fa fa-spinner fa-spin"></i></div>';
                $html[] = '</div>';
                $html[] = '</li>';
            }
            return array('domain' => $domains, 'html' => implode(PHP_EOL, $html));
        }

        public static function whoisAjax()
        {
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
                if($data['regrinfo']['registered'] == 'yes'){
                    $parsed['whois'] = implode('<br/>',$data['rawdata']);
                }
                return $parsed;
            }
        }

    }

}