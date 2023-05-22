<?php
defined('ABSPATH') || die();
/** @var $this NextendSocialProviderAdmin */

$lastUpdated = '2023-05-02';

$provider = $this->getProvider();
?>
<div class="nsl-admin-sub-content">
    <?php if (substr($provider->getLoginUrl(), 0, 8) !== 'https://'): ?>
        <div class="error">
            <p><?php printf(__('%1$s allows HTTPS OAuth Redirects only. You must move your site to HTTPS in order to allow login with %1$s.', 'nextend-facebook-connect'), 'Facebook'); ?></p>
            <p>
                <a href="https://nextendweb.com/nextend-social-login-docs/facebook-api-changes/#enforce-https" target="_blank"><?php _e('How to get SSL for my WordPress site?', 'nextend-facebook-connect'); ?></a>
            </p>
        </div>
    <?php else: ?>
        <div class="nsl-admin-getting-started">
            <h2 class="title"><?php _e('Getting Started', 'nextend-facebook-connect'); ?></h2>

            <p><?php printf(__('To allow your visitors to log in with their %1$s account, first you must create a %1$s App. The following guide will help you through the %1$s App creation process. After you have created your %1$s App, head over to "Settings" and configure the given "%2$s" and "%3$s" according to your %1$s App.', 'nextend-facebook-connect'), "Facebook", "App ID", "App secret"); ?></p>

            <p><?php do_action('nsl_getting_started_warnings', $provider, $lastUpdated); ?></p>

            <h2 class="title"><?php printf(_x('Create %s', 'App creation', 'nextend-facebook-connect'), 'Facebook App'); ?></h2>

            <ol>
                <li><?php printf(__('Navigate to %s', 'nextend-facebook-connect'), '<a href="https://developers.facebook.com/apps/" target="_blank">https://developers.facebook.com/apps/</a>'); ?></li>
                <li><?php printf(__('Log in with your %s credentials if you are not logged in.', 'nextend-facebook-connect'), 'Facebook'); ?></li>
                <li><?php printf(__('Click on the %1$s button and then choose the %2$s option as use case and press %3$s!', 'nextend-facebook-connect'), '"<b>Create App</b>"', '"<b>Set up Facebook Login</b>"', '"<b>Next</b>"'); ?></li>
                <li><?php printf(__('Pick the %1$s option for the platform.', 'nextend-facebook-connect'), '"<b>Website</b>"'); ?></li>
                <li><?php printf(__('For the question %1$s, select the %2$s option, then press %3$s.', 'nextend-facebook-connect'), '"<b>Are you building a game?</b>"', '"<b>No, I\'m not building a game</b>"', '"<b>Next</b>"'); ?></li>
                <li><?php printf(__('Fill the %1$s and %2$s fields. The specified app name will appear on your %3$s!', 'nextend-facebook-connect'), '"<b>Add an app name</b>"', '"<b>App contact email</b>"', '<a href="https://developers.facebook.com/docs/facebook-login/permissions/overview/" target="_blank">Consent Screen</a>'); ?></li>
                <li><?php printf(__('%1$sOptional%2$s: choose a %3$s if you would like to.', 'nextend-facebook-connect'), '<b>', '</b>', '"<b>Business Manager Account</b>"'); ?></li>
                <li><?php printf(__('Click the %1$s button and complete the Security Check.', 'nextend-facebook-connect'), '"<b>Create App</b>"'); ?></li>
                <li><?php printf(__('%1$sOptional%2$s: to request email address from the users:', 'nextend-facebook-connect'), '<b>', '</b>'); ?>
                    <ol>
                        <li><?php printf(__('Click on the %1$s tab on the left side and then click on the %2$s button that appears next to the %3$s item.', 'nextend-facebook-connect'), '"<b>Use cases</b>"', '"<b>Edit</b>"', '"<b>Authentication and account creation</b>"'); ?></li>
                        <li><?php printf(__('Find the %1$s permission and click the %2$s button.', 'nextend-facebook-connect'), '"<b>email</b>"', '"<b>Add</b>"'); ?></li>
                        <li><?php printf(__('Press the %1$s button on the top right corner, so you can return to the previous page.', 'nextend-facebook-connect'), '"<b>Go back</b>"'); ?></li>
                    </ol>
                </li>
                <li><?php printf(__('Click on the %1$s tab on the left side and then click on the %2$s button that appears next to the %3$s product, then choose %4$s.', 'nextend-facebook-connect'), '"<b>Products</b>"', '"<b>Configure</b>"', '"<b>Facebook Login</b>"', '"<b>Settings</b>"'); ?></li>
                <li><?php
                    $loginUrls = $provider->getAllRedirectUrisForAppCreation();
                    printf(__('Add the following URL to the %s field:', 'nextend-facebook-connect'), '"<b>Valid OAuth redirect URIs</b>"');
                    echo "<ul>";
                    foreach ($loginUrls as $loginUrl) {
                        echo "<li><strong>" . $loginUrl . "</strong></li>";
                    }
                    echo "</ul>";
                    ?>
                </li>
                <li><?php printf(__('Press the %s button.', 'nextend-facebook-connect'), '"<b>Save changes</b>"'); ?></li>
                <li><?php printf(__('On the left side, click on the %1$s tab, then click %2$s.', 'nextend-facebook-connect'), '"<b>Settings</b>"', '"<b>Basic</b>"') ?></li>
                <li><?php printf(__('Enter your domain name to the %1$s field, probably: %2$s', 'nextend-facebook-connect'), '"<b>App Domains</b>"', '<b>' . str_replace('www.', '', $_SERVER['HTTP_HOST']) . '</b>'); ?></li>
                <li><?php printf(__('Fill up the %1$s field. Provide a publicly available and easily accessible privacy policy that explains what data you are collecting and how you will use that data.', 'nextend-facebook-connect'), '"<b>Privacy Policy URL</b>"'); ?></li>
                <li><?php printf(__('At %1$s, choose the %2$s option, and enter the %3$s with the instructions on how users can delete their accounts on your site.', 'nextend-facebook-connect'), '"<b>User Data Deletion</b>"', '"<b>Data Deletion Instructions URL</b>"', '<i>URL of your page</i>*'); ?>
                    <ul>
                        <li><?php _e('To comply with GDPR, you should already offer possibility to delete accounts on your site, either by the user or by the admin:', 'nextend-facebook-connect'); ?></li>
                        <li>
                            <ul>
                                <li><?php printf(__('%1$sIf each user has an option to delete the account%2$s: the URL should point to a guide showing the way users can delete their accounts.', 'nextend-facebook-connect'), '<u>', '</u>'); ?></li>
                                <li><?php printf(__('%1$sIf the accounts are deleted by an admin%2$s: then you should have a section - usually in the Privacy Policy - with the contact details, where users can send their account erasure requests. In this case the URL should point to this section of the document.', 'nextend-facebook-connect'), '<u>', '</u>'); ?></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><?php printf(__('Select a %1$s, an %2$s.', 'nextend-facebook-connect'), '"<b>Category</b>"', '"<b>App Icon</b>"'); ?></li>
                <li><?php printf(__('Scroll down to the bottom of the page, press the %s button.', 'nextend-facebook-connect'), '"<b>+ Add platform</b>"'); ?></li>
                <li><?php printf(__('Select %1$s platform, then press %2$s and enter the following URL into the %3$s field: %4$s', 'nextend-facebook-connect'), '"<b>Website</b>"', '"<b>Next</b>"', '"<b>Website > Site URL</b>"', '<b>' . site_url() . '</b>'); ?></li>
                <li><?php printf(__('Press the %s button.', 'nextend-facebook-connect'), '"<b>Save changes</b>"'); ?></li>
                <li><?php printf(__('By default, your application only has Standard Access for the %1$s and %2$s permissions, which means that only you can log in with it. To get Advanced Access you will need to go trough the %3$s, that you can start on the %4$s tab on the left side.', 'nextend-facebook-connect'), '"public_profile"', '"email"', '<a href="https://developers.facebook.com/docs/development/release/business-verification" target="_blank">Business Verification</a>', '"<b>Verification</b>"'); ?></li>
                <li><?php printf(__('Currently your app is in Development Mode which also means that people outside of your business can not use it. Once your verification is completed, click on the %1$s tab and publish your app by clicking on the %1$s button at the bottom right corner. Before you press it, it is recommended to check the steps listed on the %2$s page, if you configured everything properly.', 'nextend-facebook-connect'), '"<b>Go live</b>"', '"Go live"'); ?></li>
                <li><?php printf(__('After everything is done, click on the %1$s tab, then click %2$s.', 'nextend-facebook-connect'), '"<b>Settings</b>"', '"<b>Basic</b>"') ?></li>
                <li><?php printf(__('At the top of the page you can find your %1$s and you can see your %2$s if you click on the %3$s button. These will be needed in plugin’s settings.', 'nextend-facebook-connect'), '"<b>App ID</b>"', '"<b>App secret</b>"', 'Show'); ?></li>
            </ol>

            <p><?php printf(__('<b>WARNING:</b> <u>Don\'t replace your Facebook App with another!</u> Since WordPress users with linked Facebook accounts can only login using the %1$s App, that was originally used at the time, when the WordPress account was linked with a %1$s Account.<br>
If you would like to know the reason of this, or you really need to replace the Facebook App, then please check our %2$sdocumentation%3$s.', 'nextend-facebook-connect'), 'Facebook', '<a href="https://nextendweb.com/nextend-social-login-docs/provider-facebook/#app_scoped_user_id" target="_blank">', '</a>'); ?></p>

            <br>
            <h2 class="title"><?php _e('Maintaining the Facebook App:', 'nextend-facebook-connect'); ?></h2>
            <p><?php printf(__('<strong><u>Facebook Data Use Checkup:</u></strong> To protecting people\'s privacy, Facebook might requests you to fill some forms, so they can ensure that your API access and data use comply with the Facebook policies.
If Facebook displays the "%1$s" modal for your App, then in our %2$sdocumentation%3$s you can find more information about the permissions that we need.', 'nextend-facebook-connect'), 'Data Use Checkup', '<a href="https://nextendweb.com/nextend-social-login-docs/provider-facebook/#data_use_checkup" target="_blank">', '</a>'); ?></p>

            <a href="<?php echo $this->getUrl('settings'); ?>"
               class="button button-primary"><?php printf(__('I am done setting up my %s', 'nextend-facebook-connect'), 'Facebook App'); ?></a>
        </div>
    <?php endif; ?>
</div>