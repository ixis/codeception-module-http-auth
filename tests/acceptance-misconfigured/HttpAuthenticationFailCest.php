<?php

/**
 * Class HttpAuthenticationFailCest.
 */
class HttpAuthenticationFailCest
{
    /**
     * The string we expect see on the test site after authenticating.
     */
    const HTTPAUTH_EXPECTED_PAGE_CONTENT = 'This location IS protected by HTTP authentication.';

    /**
     * Test response after failing authentication is 401.
     *
     * @param MisconfiguredWebGuy $I
     *   The Guy object being used to test.
     */
    public function testFailedAuthenticatedResponse(MisconfiguredWebGuy $I)
    {
        $I->amOnPage('/protected/');
        $I->seeResponseCodeIs(401);
    }

    /**
     * Test we see expected content in page after authentication.
     *
     * @param MisconfiguredWebGuy $I
     *   The Guy object being used to test.
     */
    public function seeContentAfterAuthentication(MisconfiguredWebGuy $I)
    {
        $I->amOnPage('/protected/');
        $I->dontSee(self::HTTPAUTH_EXPECTED_PAGE_CONTENT);
    }
}
