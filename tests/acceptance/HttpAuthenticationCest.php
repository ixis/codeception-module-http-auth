<?php

/**
 * Class HttpAuthenticationCest.
 */
class HttpAuthenticationCest
{
    /**
     * The path to visit for content that is NOT protected by HTTP authentication.
     */
    const HTTP_AUTH_NON_PROTECTED_PATH = '/';

    /**
     * The path to visit for content that IS protected by HTTP authentication.
     */
    const HTTP_AUTH_PROTECTED_PATH = '/protected/';

    /**
     * The string we expect see on the non-protected page.
     */
    const HTTP_AUTH_EXPECTED_NON_PROTECTED_PAGE_CONTENT = 'This location is NOT protected by HTTP authentication.';

    /**
     * The string we expect see on the protected page after authenticating.
     */
    const HTTP_AUTH_EXPECTED_PROTECTED_PAGE_CONTENT = 'This location IS protected by HTTP authentication.';

    /**
     * Test response on a page without HTTP authentication enabled.
     *
     * Note it doesn't matter which environment this test runs in (misconfigured or otherwise): the path isn't protected
     * so we should always see a 200 response code and the correct page content.
     *
     * @param WebGuy $I
     *   The Guy object being used to test.
     */
    public function testNonProtectedPageResponse(WebGuy $I)
    {
        $I->amOnPage(self::HTTP_AUTH_NON_PROTECTED_PATH);
        $I->seeResponseCodeIs(200);
        $I->see(self::HTTP_AUTH_EXPECTED_NON_PROTECTED_PAGE_CONTENT);
    }

    /**
     * Test response after authentication is 200.
     *
     * @param WebGuy $I
     *   The Guy object being used to test.
     *
     * @env default
     */
    public function testAuthenticatedResponse(WebGuy $I)
    {
        $I->amOnPage(self::HTTP_AUTH_PROTECTED_PATH);
        $I->seeResponseCodeIs(200);
    }

    /**
     * Test we see expected content in page after authentication.
     *
     * @param WebGuy $I
     *   The Guy object being used to test.
     *
     * @env default
     */
    public function seeContentAfterAuthentication(WebGuy $I)
    {
        $I->amOnPage(self::HTTP_AUTH_PROTECTED_PATH);
        $I->see(self::HTTP_AUTH_EXPECTED_PROTECTED_PAGE_CONTENT);
    }

    /**
     * Test response after failing authentication is 401.
     *
     * @param WebGuy $I
     *   The Guy object being used to test.
     *
     * @env misconfigured
     */
    public function testFailedAuthenticatedResponse(WebGuy $I)
    {
        $I->amOnPage(self::HTTP_AUTH_PROTECTED_PATH);
        $I->seeResponseCodeIs(401);
    }

    /**
     * Test we see expected content in page after authentication.
     *
     * @param WebGuy $I
     *   The Guy object being used to test.
     *
     * @env misconfigured
     */
    public function dontSeeContentAfterFailedAuthentication(WebGuy $I)
    {
        $I->amOnPage(self::HTTP_AUTH_PROTECTED_PATH);
        $I->dontSee(self::HTTP_AUTH_EXPECTED_PROTECTED_PAGE_CONTENT);
    }
}
