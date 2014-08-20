<?php

namespace Codeception\Module;

use Codeception\Exception\Module as ModuleException;
use Codeception\Module;

/**
 * Http Auth - a Codeception module to pass HTTP Authentication in PhpBrowser automatically.
 *
 * When set the appropriate configuration is set, this module will automatically pass HTTP Authentication at the start
 * of each test suite run.
 *
 * Configuration:
 *
 * ```
 * modules:
 *     enabled:
 *         - PhpBrowser
 *         - WebHelper
 *         - HttpAuth
 *     config:
 *         PhpBrowser:
 *             url: 'http://localhost/myapp/'   # A site with HTTP Authentication enabled.
 *         HttpAuth:
 *             username: my_user
 *             password: my_password
 * ```
 */
class HttpAuth extends Module
{
    /**
     * Define a character used to mask the HTTP Authentication password in debug output.
     */
    const HTTPAUTH_PASSWORD_CHAR = '*';

    /**
     * Initialize - ensure we have the required configuration.
     *
     * @throws \Codeception\Exception\Module
     */
    public function _initialize()
    {
        if (empty($this->config['username']) || empty($this->config['password'])) {
            throw new ModuleException(
                __CLASS__,
                'Http Auth is not configured - both a username and password are required.'
            );
        }
    }

    /**
     * Perform an initial HTTP Authentication before the suite runs.
     */
    public function _before()
    {
        $this->passHttpAuthentication();
    }

    /**
     * Pass HTTP Authentication using credentials provided in module configuration.
     */
    public function passHttpAuthentication()
    {
        \Codeception\Util\Debug::debug(sprintf(
            'Authenticating with username %s, password %s.',
            $this->config['username'],
            str_repeat(self::HTTPAUTH_PASSWORD_CHAR, strlen($this->config['password']))
        ));

        /** @var \Codeception\Module\PhpBrowser $I */
        $I = $this->getModule('PhpBrowser');
        $I->amHttpAuthenticated($this->config['username'], $this->config['password']);
    }
}
