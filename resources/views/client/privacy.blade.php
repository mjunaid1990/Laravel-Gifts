@extends('layouts.client')

@section('css')
<style>
    h2.title {
        font-size: 2rem;
    }
    h2, h3, h4, h5 {
        line-height: 1.5;
    }
    h2 {
        font-size: 24px;
    }
    h3 {
        font-size: 20px;
    }
    h4 {
        font-size: 18px;
    }
    h5 {
        font-size: 16px;
    }
    
</style>
@endsection

@section('content')

<div class="b-QNdonF">
    <div class="b-GjUpiu">
        <div class="b-fAUDcO">
            <div class="b-GpBDJU">
                <div class="b-qi87Hv">
                    <div class="b-SJd2qT">


                        <h2 class="title">{{$title}}</h2>
                        <br />
                        <article class="information">

                            <p> The E-GIFTS Card service is run by E-GIFTS UK LTD. E-GIFTS Bank manage the service on behalf of E-GIFTS Stores and payments are fulfilled by Worldpay Group. For more information about how E-GIFTS UK LTD will use your personal information, please see the <a target="_blank" href="h#"> E-GIFTS Stores Privacy Notice</a>. </p>
                            <p> When you select ‘payment’ you will be redirected to the Worldpay payment page so that you can provide your payment details and they can verify your identity, for more details on how Worldpay will process your data please see <a href="https://www.fisglobal.com/en/merchant-solutions-worldpay/worldpay-privacy-policy"> Worldpay’s privacy policy</a>. </p>
                            <div>
                                <h2>Cookie Policy</h2>
                                <p>Our Cookie Policy explains what cookies are and how we use cookies to enhance your experience on the E-GIFTS Card website. E-GIFTS Bank manage the deployment of cookies on <a href="https://e-gifts.uk">e-gifts.uk</a> on behalf of E-GIFTS UK LTD. </p>
                                <ul>
                                    <li>
                                        <a href="#what-is-a-cookie">What is a cookie?</a>
                                    </li>
                                    <li>
                                        <a href="#different-types-of-cookies">Different types of cookies</a>
                                    </li>
                                    <li>
                                        <a href="#cookies-used-on-our-site">Cookies used on our site</a>
                                    </li>
                                    <li>
                                        <a href="#manage-your-cookie-preferences">Manage your cookie preferences</a>
                                    </li>
                                </ul>
                                <h3 id="what-is-a-cookie">What is a cookie?</h3>
                                <p>A cookie is a small text file that is placed onto your computer, tablet or mobile device by websites that you visit. Cookies do a range of things to personalise and improve your browsing experience - please see ‘Different types of cookies’ tab for details on how they work.</p>
                                <h3>Common cookie terminology</h3>
                                <p>Here are some common terms to help you understand how cookies work and to identify the different types you might expect to find on certain sites:</p>
                                <dl>
                                    <dt>Session cookies</dt>
                                    <dd>These cookies are placed onto your device for the duration of your visit to a website and expire after you leave. </dd>
                                    <dt>Persistent cookies</dt>
                                    <dd>These are placed onto your device and remain in place for a while after you leave a website. These can make your visit to a site more convenient, such as remembering your saved passwords for next time. These can last for 1 day, 30 days or permanently, depending on the site. </dd>
                                </dl>
                                <p>Please note that a site may store data captured by a cookie beyond the cookie’s expiry date – please see the ‘Cookies used on our site’ tab for details on how we retain user data and why.</p>
                                <ul>
                                    <li>First-party cookies are placed onto your device from a site’s web domain/sub-domain when you visit. An example of a first-party cookie would be one sent from www.tescobank.com. Cookies sent from www.metrics.tescobank.com are also regarded as first-party, as it is a sub-domain of www.tescobank.com. </li>
                                    <li>Third party cookies are sent from a website that’s different to the one you’re visiting. For example, a cookie sent to your device from doubleclick.net will be from a third party vendor that works on behalf of E-GIFTS Bank. </li>
                                </ul>
                                <p>
                                    <a href="#">Visit the All About Cookies website for more information</a>.
                                </p>
                                <h3 id="different-types-of-cookies">Different Types of Cookies</h3>
                                <p>Cookies used across the E-GIFTS Cards website fall into the following categories:</p>
                                <dl>
                                    <dt>Essential</dt>
                                    <dd>Cookies that are necessary for a web service to work properly. Such as, accessing online banking or other secure environments.</dd>
                                    <dt>Measurement</dt>
                                    <dd>Cookies that collect information about how visitors access and use the E-GIFTS Cards website and information from the device being used. This data is used to help us make improvements to your site experience, as well as our site's performance, design and marketing and for fraud prevention and detection purposes.</dd>
                                    <dt>Experience</dt>
                                    <dd>Cookies that are used to support our website design tests and to give you a more personalised experience.</dd>
                                    <dt>Advertising</dt>
                                    <dd>These cookies are used to help show you more relevant adverts by personalising what you see. We might advertise E-GIFTS Bank products and offers when you visit other websites, using these cookies.</dd>
                                    <dt>Cookies not controlled by E-GIFTS Bank</dt>
                                    <dd>Across the website you will find links that lead to external websites and services provided by our trusted third parties, providers and partners. Please see the respective websites for details on their own cookie policies. See 'Cookies used on our site' tab.</dd>
                                </dl>
                                <h3 id="cookies-used-on-our-site">Cookies used on our site</h3>
                                <dl>
                                    <dt>Ensighten (Essential)</dt>
                                    <dd>
                                        <p>Purpose: Ensighten is the Tag Management software used by E-GIFTS Bank. It is used to deploy other technologies/generate data that is captured by other technologies. This technology does not retain any data.</p>
                                        <p>First party cookies</p>
                                        <p>Data Retention Period: N/A</p>
                                        <p>SESSION COOKIES</p>
                                        <ul>
                                            <li>customer_type</li>
                                            <li>ens_gpv_pn</li>
                                            <li>ens_internal_link</li>
                                            <li>ens_sc_event1</li>
                                            <li>ens_sc_event2</li>
                                            <li>ens_sc_event3</li>
                                            <li>ensCoverPolicy</li>
                                            <li>ensRef</li>
                                            <li>event4</li>
                                            <li>event6</li>
                                            <li>event7</li>
                                            <li>event8</li>
                                            <li>event9</li>
                                            <li>loanAmount</li>
                                            <li>tms_journey</li>
                                            <li>tms_retrieve_type</li>
                                            <li>tms_trav_journey</li>
                                            <li>tms_aggregator</li>
                                            <li>ensTargetingCheck</li>
                                            <li>ensPageNameCat</li>
                                            <li>ensPortalJourney</li>
                                            <li>ensRec</li>
                                        </ul>
                                        <p>PERSISTENT COOKIES</p>
                                        <ul>
                                            <li>s_ev20</li>
                                            <li>ensloggedin</li>
                                            <li>tms_document_referrer</li>
                                            <li>uuid</li>
                                            <li>TESCOBANK_ENSIGHTEN_PRIVACY_BANNER_VIEWED</li>
                                            <li>TESCOBANK_ENSIGHTEN_PRIVACY_Targeting</li>
                                        </ul>
                                    </dd>
                                    <dt>Adobe Analytics (Measurement)</dt>
                                    <dd>
                                        <p>Purpose: E-GIFTS Bank uses Adobe Analytics technology to measure website traffic and performance.</p>
                                        <p>A copy of the Adobe Analytics data is hosted with a UK based 3rd party partner of E-GIFTS Bank called Aquila Insight. They provide a technical environment for E-GIFTS Bank to run additional analysis on the performance of digital marketing. Aquila Insight retain this data for a maximum of 25 months.</p>
                                        <p>Data Retention Period: 37 months</p>
                                        <p>First party cookies (unless specified)</p>
                                        <p>SESSION COOKIES</p>
                                        <ul>
                                            <li>s_sq</li>
                                            <li>s_cc</li>
                                            <li>gpv_pn</li>
                                            <li>AMCVS</li>
                                        </ul>
                                        <p>PERSISTENT_COOKIES</p>
                                        <ul>
                                            <li>s_vi</li>
                                            <li>s_sq</li>
                                            <li>s_fid</li>
                                            <li>s_ev21</li>
                                            <li>s_dfa</li>
                                            <li>s_cc</li>
                                            <li>gpv_pn</li>
                                            <li>dpm (third party cookie)</li>
                                            <li>dextp (third party cookie)</li>
                                            <li>demdex (third party cookie)</li>
                                            <li>AMCVS</li>
                                        </ul>
                                    </dd>
                                    <dt>Decibel (Advertising)</dt>
                                    <dd>
                                        <p>Purpose: E-GIFTS Bank uses Decibel technology to better understand how users interact with different aspects of our website. The purpose of the data collected is to inform website design &amp; technical improvements.</p>
                                        <p>Third party cookies</p>
                                        <p>Data Retention Period: 12 months</p>
                                        <p>SESSION COOKIES</p>
                                        <ul>
                                            <li>da_sid</li>
                                        </ul>
                                        <p>PERSISTENT_COOKIES</p>
                                        <ul>
                                            <li>da_lid</li>
                                        </ul>
                                    </dd>
                                    <dt>KPMG Nunwood (Measurement)</dt>
                                    <dd>
                                        <p>Purpose: E-GIFTS Bank partners with KPMG Nunwood to collect website user &amp; customer experience feedback. The data collected is used to inform improvements in the E-GIFTS Bank digital &amp; customer experience.</p>
                                        <p>First party cookies (unless specified)</p>
                                        <p>Data Retention Period: 1 month</p>
                                        <p>SESSION COOKIES</p>
                                        <ul>
                                            <li>_f_popunder_min_nwd</li>
                                            <li>_f_popunder_page_visits_nwd</li>
                                            <li>ASPSESSIONIDCUTDSRTS (third party)</li>
                                            <li>_f_heartbeat_nwd (third party)</li>
                                        </ul>
                                    </dd>
                                    <dt>Optimise (Measurement)</dt>
                                    <dd>
                                        <p>Purpose: At E-GIFTS Bank we use Optimise to measure all affiliate marketing activity.</p>
                                        <p>Third Party Cookies</p>
                                        <p>Data Retention Period: 24 months</p>
                                        <p>PERSISTENT COOKIES</p>
                                        <ul>
                                            <li>OMG-796101</li>
                                            <li>OMGID</li>
                                            <li>OMGSession</li>
                                        </ul>
                                    </dd>
                                    <dt>DoubleClick (Advertising)</dt>
                                    <dd>
                                        <p>Purpose: DoubleClick is an ad serving technology and used by E-GIFTS Bank to track &amp; optimise its digital marketing activities.</p>
                                        <p>First party cookies</p>
                                        <p>Data Retention Period: 24 months</p>
                                        <p>PERSISTENT COOKIES</p>
                                        <ul>
                                            <li>_sonar</li>
                                            <li>IDE</li>
                                        </ul>
                                    </dd>
                                    <dt>Google Analytics (Advertising)</dt>
                                    <dd>
                                        <p>Purpose: Google Analytics allows E-GIFTS Bank to measure Google Search usage and to analyse &amp; optimise website landing pages and our visibility on search engines. It is also used to improve advertising by showing you the most relevant advertising content based on your interactions with our website.</p>
                                        <p>First party cookies</p>
                                        <p>Data Retention Period: a minimum of 25 months</p>
                                        <p>SESSION COOKIES</p>
                                        <ul>
                                            <li>__utmb</li>
                                            <li>__utmc</li>
                                            <li>__utmt</li>
                                        </ul>
                                        <p>PERSISTENT COOKIES</p>
                                        <ul>
                                            <li>__utma</li>
                                            <li>__utmv</li>
                                            <li>__utmz</li>
                                            <li>_ga</li>
                                            <li>_gid</li>
                                            <li>_gat</li>
                                            <li>_gac_UA-XXXXXXXX-X</li>
                                        </ul>
                                    </dd>
                                    <dt>Maxymiser (Experience)</dt>
                                    <dd>
                                        <p>Purpose: At E-GIFTS Bank the Maxymiser technology is used for two distinct purposes. To test web page/component design iterations &amp; to serve personalised experiences.</p>
                                        <p>First party cookies</p>
                                        <p>Data Retention Period: 12 months</p>
                                        <p>PERSISTENT COOKIES</p>
                                        <ul>
                                            <li>mmapi.store.p.0</li>
                                            <li>Txx_generated</li>
                                        </ul>
                                    </dd>
                                    <dt>Mediacom/Facebook (Advertising)</dt>
                                    <dd>
                                        <p>Purpose: Mediacom are an agency that support E-GIFTS Bank in the area of display advertising via Facebook. Mediacom use Facebook cookies to trigger display advertising that’s linked to your online browsing habits.</p>
                                        <p>First party cookies</p>
                                        <p>Data Retention Period: 180 days</p>
                                        <p>PERSISTENT COOKIES</p>
                                        <ul>
                                            <li>dpr</li>
                                            <li>datr</li>
                                            <li>c_user</li>
                                            <li>fr</li>
                                            <li>sb</li>
                                            <li>xs</li>
                                            <li>pl</li>
                                            <li>wd</li>
                                        </ul>
                                    </dd>
                                    <dt>Mediacom/Twitter (Advertising)</dt>
                                    <dd>
                                        <p>Purpose: Mediacom are an agency that support E-GIFTS Bank in the area of display advertising via Twitter. Mediacom use Twitter cookies to trigger display advertising that's linked to your online browsing habits.</p>
                                        <p>Data Retention Period: 90 days</p>
                                        <p>PERSISTENT COOKIES</p>
                                        <ul>
                                            <li>personalization_id</li>
                                            <li>guest_id</li>
                                        </ul>
                                    </dd>
                                    <dt>Amobee (Advertising)</dt>
                                    <dd>
                                        <p>Amobee uses cookies to trigger and improve display advertising by showing you the most relevant advertising content based on your interactions with our website and your browsing habits online. They also help measure the effectiveness of advertising campaigns.</p>
                                        <p>Third Party Cookies</p>
                                        <p>Data Retention Period: 13 months</p>
                                        <p>PERSISTENT COOKIES</p>
                                        <ul>
                                            <li>Turn.com</li>
                                        </ul>
                                    </dd>
                                    <dt>MIQ (Advertising)</dt>
                                    <dd>
                                        <p>MiQ uses cookies to trigger and improve display advertising by showing you the most relevant advertising content based on your interactions with our website and your browsing habits online. They also help measure the effectiveness of advertising campaigns.</p>
                                        <p>Third Party Cookies</p>
                                        <p>Data Retention Period: 18 months</p>
                                        <p>SESSION COOKIES</p>
                                        <ul>
                                            <li>sess</li>
                                            <li>token</li>
                                            <li>pses</li>
                                        </ul>
                                        <p>PERSISTENT COOKIES</p>
                                        <ul>
                                            <li>uuid2</li>
                                            <li>uids</li>
                                            <li>icu</li>
                                            <li>anj</li>
                                            <li>usersync</li>
                                        </ul>
                                    </dd>
                                    <dt>Snapchat (Advertising)</dt>
                                    <dd>
                                        <p>Snapchat uses cookies to show you the most relevant advertising content based on your online browsing habits and to measure the effectiveness of advertising campaigns.</p>
                                        <p>Third Party Cookies</p>
                                        <p>Data Retention Period: 24 months</p>
                                        <p>SESSION COOKIES</p>
                                        <ul>
                                            <li>lf_sid</li>
                                            <li>_gat_UA-{property-id}</li>
                                            <li>ngpskuephr</li>
                                            <li>sw-locale-detected</li>
                                            <li>SSN-"[long-uid]"</li>
                                            <li>JSESSIONID</li>
                                        </ul>
                                        <p>PERSISTENT COOKIES</p>
                                        <ul>
                                            <li>sc-cookies-accepted</li>
                                            <li>Marketing</li>
                                            <li>Performance</li>
                                            <li>Preferences</li>
                                            <li>sc_at</li>
                                            <li>sc-country</li>
                                            <li>bpazaws52gukakzc__*</li>
                                            <li>Q4_ASPX_PUBLIC_{user}</li>
                                            <li>adtsgidr5</li>
                                            <li>__cfduid</li>
                                            <li>XSRF-TOKEN</li>
                                            <li>giftfromsnap_session</li>
                                            <li>lf_uid</li>
                                            <li>__zlcmid</li>
                                            <li>_ga</li>
                                            <li>_gat</li>
                                            <li>_gid</li>
                                            <li>_ga_{container-id}</li>
                                            <li>_sca</li>
                                            <li>_scu</li>
                                            <li>_sctr</li>
                                            <li>_scid</li>
                                            <li>taboola_session_id</li>
                                            <li>t_gid</li>
                                            <li>taboola_fp_td_user_id</li>
                                            <li>obuid</li>
                                            <li>auid</li>
                                            <li>RoktRecogniser</li>
                                            <li>_uetsid</li>
                                            <li>_uetmsclkid</li>
                                            <li>_fbp</li>
                                            <li>_fbc</li>
                                            <li>sc_seen_popup</li>
                                            <li>UserMatchHistory</li>
                                            <li>Bcookie</li>
                                            <li>Bscookie</li>
                                            <li>Lang</li>
                                            <li>Lidc</li>
                                            <li>Lpv</li>
                                            <li>Pardot</li>
                                            <li>personalisation_id</li>
                                            <li>test_cookie</li>
                                            <li>_gcl_au</li>
                                            <li>visitor_id</li>
                                            <li>visitor_id-hash</li>
                                            <li>X-PP-L7</li>
                                            <li>X-PP-SILOVER</li>
                                            <li>akavpau_ppsd</li>
                                            <li>AKDC</li>
                                            <li>sc-language</li>
                                            <li>sw-locale</li>
                                        </ul>
                                    </dd>
                                </dl>
                                <h3 id="manage-your-cookie-preferences">Manage your cookie preferences</h3>
                                <p>Please note:</p>
                                <ul>
                                    <li>Your E-GIFTS Card website cookie consent preferences are specific to the device and browser you are using at the time of consent.</li>
                                    <li>So, if you visit using a different browser you will need to set your cookie consent preferences again.</li>
                                    <li>Likewise, if you visit using a different device you will need to set your cookie consent preferences again.</li>
                                    <li>If you clear your cookies you will need to set your cookie consent preferences again (as cookie consent preferences are stored in a cookie).</li>
                                    <li>You can amend your cookie consent preferences at any time by visiting this page.</li>
                                    <li>You can also amend your general cookie preferences via your browser settings.</li>
                                </ul>
                            </div>
                            <p>Want to change your cookie choices?</p>
                            <div class="ensButtons ensPrivacyPageBtnGift">
                                <div class="button raised blue" id="ensConsentBtn">
                                    <div class="ensCenter">Manage my cookies</div>
                                </div>
                            </div>
                            <p>&nbsp;</p>
                        </article>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
