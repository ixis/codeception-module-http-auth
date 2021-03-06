Http Auth - Codeception module
===

## A Codeception module for passing HTTP authentication

[![Build Status](https://travis-ci.org/ixis/codeception-module-http-auth.svg?branch=master)](https://travis-ci.org/ixis/codeception-module-http-auth)

This simple Codeception module allows PhpBrowser to automatically pass HTTP authentication based on configuration.


## Install with Composer and Packagist

    {
        "require": {
            "codeception/codeception": "1.8.*",
            "ixis/codeception-module-http-auth": "dev-master"
        }
    }


## Example suite configuration

    modules:
        enabled:
            - PhpBrowser
            - HttpAuth
        config:
            PhpBrowser:
                url: 'http://example.com/protected/'
            HttpAuth:
                username: user
                password: password


## Codeception 2

This module isn't useful for Codeception 2.x, as HTTP authentication can be configured in PhpBrowser directly:

    modules:
        enabled:
            - PhpBrowser
        config:
            PhpBrowser:
                url: 'http://example.com/protected/'
                auth: ['testuser', 'testpassword']
