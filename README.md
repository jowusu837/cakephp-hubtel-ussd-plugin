# Hubtel USSD CakePHP plugin

This plugin allows your cakephp application to have a USSD interface using Hubtel USSD service. 
See [Hubtel developer documentation](https://developers.hubtel.com/documentations/ussd) for more details on acquiring a USSD short code and setting up your USSD application 

## Requirements

The master branch has the following requirements:

* CakePHP 2.2.0 or greater.
* PHP 5.3.0 or greater.

## Installation

* Clone/Copy the files in this directory into `app/Plugin/Ussd`
* Ensure the plugin is loaded in `app/Config/bootstrap.php` by calling `CakePlugin::load('Ussd', array('bootstrap' => true, 'routes' => true));`
* Create an application [here](https://unity.hubtel.com/premiumussd/applications) and bind it to your ussd interface which will be something like `http://your-application.com/ussd`.
* Test your USSD application by dialing your application's shortcode from your phone.
* You can see logs of your USSD application in `app/tmp/logs/ussd.log`.
* A File cache is also provided by default which you can write data you want to persist accross pages by using `Cache::write('key', 'value', 'ussd')`.
* To add more pages to your USSD application flow, simply create a component for it under `app/Plugin/Ussd/Controller/Component` like so:

```
App::uses('UssdComponent', 'Ussd.Controller/Component');

class Page3Component extends UssdComponent {

    public function run() {

        return "This is page 3.";
    }

}

```


## Reporting issues

If you have a problem with this plugin, please open an issue on [GitHub](https://github.com/cakephp/debug_kit/issues).

## Contributing

If you'd like to contribute to this project, simply send me an email.

