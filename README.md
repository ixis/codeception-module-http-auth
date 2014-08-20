Http Auth - Codeception module
===

## A Codeception module for passing HTTP authentication

This simple Codeception module allows PhpBrowser to automatically pass HTTP authentication based on configuration.

## Install with Composer

    {
        "repositories": [
            {
                "type": "vcs",
                "url": "https://github.com/pfaocle/codeception-module-http-auth.git"
            }
        ],
        "require": {
            "codeception/codeception": "1.8.*",
            "pfaocle/codeception-module-http-auth": "dev-master"
        }
    }


## Example suite configuration

    class_name: AcceptanceTester
    modules:
        enabled:
            - PhpBrowser
            - AcceptanceHelper
            - HttpAuth
        config:
            PhpBrowser:
                url: 'http://localhost/myapp/'
            HttpAuth:
                username: user
                password: password
