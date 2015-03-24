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
            $validExtensions = array(
                'com', 'net', 'us'
            );
            $domain = JFactory::getApplication()->input->get('domain');
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

            return $domains;
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
                if ($data['regrinfo']['registered'] == 'yes')
                {
                    $parsed['html'] = '<li data-domain="' . $domain . '">' . $domain . ' Yes ' . '</li>';
                } else
                {
                    $parsed['html'] = '<li data-domain="' . $domain . '">' . $domain . ' No ' . '</li>';
                }
                return $parsed;
            }
        }

    }

}