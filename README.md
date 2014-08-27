Http Auth - Codeception module
===

## A Codeception module for passing HTTP authentication

[![Build Status](https://travis-ci.org/pfaocle/codeception-module-http-auth.svg?branch=master)](https://travis-ci.org/pfaocle/codeception-module-http-auth)

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

    modules:
        enabled:
            - PhpBrowser
            - HttpAuth
        config:
            PhpBrowser:
                url: 'http://localhost/myapp/'
            HttpAuth:
                username: user
                password: password
