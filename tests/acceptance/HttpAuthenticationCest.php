<?php

/**
 * Class HttpAuthenticationCest.
 */
class HttpAuthenticationCest
{
    /**
     * The string we expect see on the test site after authenticating.
     */
    const HTTPAUTH_EXPECTED_PAGE_CONTENT = 'Welcome';

    /**
     * Test response after authentication is 200.
     *
     * @param WebGuy $I
     *   The Guy object being used to test.
     */
    public function testAuthenticatedResponse(WebGuy $I)
    {
        $I->amOnPage('/');
        $I->seeResponseCodeIs(200);
    }

    /**
     * Test we see expected content in page after authentication.
     *
     * @param WebGuy $I
     *   The Guy object being used to test.
     */
    public function seeContentAfterAuthentication(WebGuy $I)
    {
        $I->amOnPage('/');
        $I->see(self::HTTPAUTH_EXPECTED_PAGE_CONTENT);
    }
}
