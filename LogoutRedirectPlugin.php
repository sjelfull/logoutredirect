<?php
/**
 * Logout Redirect plugin for Craft CMS
 *
 * Configure where to send users after they logout.
 *
 * @author    Superbig
 * @copyright Copyright (c) 2017 Superbig
 * @link      https://superbig.co
 * @package   LogoutRedirect
 * @since     1.0.0
 */

namespace Craft;

class LogoutRedirectPlugin extends BasePlugin
{
    /**
     * @return mixed
     */
    public function init ()
    {
        parent::init();

        $redirectUrl     = craft()->config->get('redirectAfterLogout');
        $redirectCpUrl   = craft()->config->get('redirectAfterCpLogout');
        $redirectSiteUrl = craft()->config->get('redirectAfterSiteLogout');

        if ( !empty($redirectUrl) || !empty($redirectSiteUrl) || !empty($redirectCpUrl) ) {
            craft()->on('userSession.onLogout', function (Event $event) use ($redirectUrl, $redirectSiteUrl, $redirectCpUrl) {
                $isCpRequest   = craft()->request->isCpRequest();
                $isSiteRequest = craft()->request->isSiteRequest();

                if ( ($isCpRequest || $isSiteRequest) && $redirectUrl ) {
                    craft()->request->redirect($redirectUrl);
                }
                else if ( $isCpRequest && $redirectCpUrl ) {
                    craft()->request->redirect($redirectCpUrl);
                }
                else if ( $isSiteRequest && $redirectSiteUrl ) {
                    craft()->request->redirect($redirectSiteUrl);
                }
            });
        }

    }

    /**
     * @return mixed
     */
    public function getName ()
    {
        return Craft::t('Logout Redirect');
    }

    /**
     * @return mixed
     */
    public function getDescription ()
    {
        return Craft::t('Configure where to send users after they logout.');
    }

    /**
     * @return string
     */
    public function getDocumentationUrl ()
    {
        return 'https://superbig.co/plugins/logout-redirect';
    }

    /**
     * @return string
     */
    public function getReleaseFeedUrl ()
    {
        return 'https://superbig.co/plugins/logout-redirect/feed';
    }

    /**
     * @return string
     */
    public function getVersion ()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getSchemaVersion ()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getDeveloper ()
    {
        return 'Superbig';
    }

    /**
     * @return string
     */
    public function getDeveloperUrl ()
    {
        return 'https://superbig.co';
    }
}