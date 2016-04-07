# zt-domainchecker

You are looking for a nice domain name? And you don’t know whether this domain is available or not? Or if you need one Joomla extension allowing to check the domains’ availability. Stop worrying about these things right now, let’s check our ZT Domain Checker. This Joomla extensions provides your customers a quick and easy way to see if a domain is available to be purchased or if someone else already owns the domain.

ZT Domain Checker is an domain search and whois extension for Joomla! with the power of thick box and ajax technology. ZT Domain Checker is based on [PHPWhois package](https://github.com/phpWhois/phpWhois). This package contains a Whois (RFC954) library for PHP. It allows a PHP program to create a Whois object, and obtain the output of a whois query with the lookup function.

The response is an array containing, at least, an element ‘rawdata’, containing the raw output from the whois request.

In addition, if the domain belongs to a registrar for which a special handler exists, the special handler will parse the output and make additional elements available in the response. The keys of these additional elements are described in the file HANDLERS.md.

It fully supports IDNA (internationalized) domains names as defined in RFC3490, RFC3491, RFC3492 and RFC3454.

It also supports ip/AS whois queries which are very useful to trace SPAM. You just only need to pass the doted quad ip address or the AS (Autonomus System) handle instead of the domain name. Limited, non-recursive support for Referral Whois (RFC 1714/2167) is also provided.


## KEY Features

* Domain Checker (checks domain availabilty)
* Whois Detail (whois information for domains)
* Easy to define which TLDs can be checked by the domain check by creating different profiles that can be selected in the front-end
* Easy to customise any label
* Easy to customise the forward/redirect URL
* Easy to change the design anytime with a minimum of time to your template
* Choose to display or hide over a dozen domain extensions, ie: .com, .mobi, .net, .name, .info, etc.


## Backend Configuration 

* Label: Get Domain 
* Button: Search
* Dropbox Label: Domain Types
* Check All Text: Check All Domain Types
* Result: Result 
* Forward URL: index.php/result


## Change Logs

### Version 1.0.3 Release Apr 07, 2016

* Fixed Cannot redeclare class idna_convert error


### Version 1.0.2 release Apr 05, 2016

* Fix forward URL issue

### Version 1.0.1 release Apr 01, 2015

* improve update domain list instantly for quick loading

### Version 1.0.0 release Mar 30, 2015

* Initial release 