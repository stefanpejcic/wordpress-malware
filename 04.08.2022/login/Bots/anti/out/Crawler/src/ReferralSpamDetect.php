<?php

/*
 * This file is part of Referral Spam Detect.
 *
 * (c) Mark Beech <m@rkbee.ch>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');


require("Fixtures/AbstractReff.php");
require("Fixtures/Headerspam.php");
require("Fixtures/SpamReferrers.php");
require("ReferralSpamDetect.php")

namespace Jaybizzle\ReferralSpamDetect;

use Jaybizzle\ReferralSpamDetect\Fixtures\Headers;
use Jaybizzle\ReferralSpamDetect\Fixtures\SpamReferrers;

class ReferralSpamDetect
{
    /**
     * The referring URL.
     *
     * @var null
     */
    protected $referrer = null;

    /**
     * Headers that contain a referring URL.
     *
     * @var array
     */
    protected $httpHeaders = array();

    /**
     * Crawlers object.
     *
     * @var \Jaybizzle\ReferralSpamDetect\Fixtures\SpamReferrers
     */
    protected $SpamReferrers;

    /**
     * Headers object.
     *
     * @var \Jaybizzle\ReferralSpamDetect\Fixtures\Headers
     */
    protected $referrerHeaders;

    /**
     * The compile string of all referrers.
     *
     * @var string
     */
    protected $compiledString;

    /**
     * Class constructor.
     */
    public function __construct(array $headers = null, $referrer = null)
    {
        $this->SpamReferrers = new SpamReferrers();
        $this->referrerHeaders = new Headers();

        $this->compiledString = implode(' ', $this->SpamReferrers->getAll());

        $this->setHttpHeaders($headers);
        $this->referrer = $this->setReferrer($referrer);
    }

    /**
     * Set HTTP headers.
     *
     * @param array|null $httpHeaders
     */
    public function setHttpHeaders($httpHeaders)
    {
        // Use global _SERVER if $httpHeaders aren't defined.
        if (! is_array($httpHeaders) || ! count($httpHeaders)) {
            $httpHeaders = $_SERVER;
        }

        // Clear existing headers.
        $this->httpHeaders = array();

        // Only save HTTP headers. In PHP land, that means
        // only _SERVER vars that start with HTTP_.
        foreach ($httpHeaders as $key => $value) {
            if (strpos($key, 'HTTP_') === 0) {
                $this->httpHeaders[$key] = $value;
            }
        }
    }

    /**
     * Return user referrer headers.
     *
     * @return array
     */
    public function getreferrerHeaders()
    {
        return $this->referrerHeaders->getAll();
    }

    /**
     * Set the referring URL.
     *
     * @param string $referrer
     */
    public function setReferrer($referrer)
    {
        if (is_null($referrer)) {
            foreach ($this->getreferrerHeaders() as $altHeader) {
                if (isset($this->httpHeaders[$altHeader])) {
                    $referrer .= $this->httpHeaders[$altHeader].' ';
                }
            }
        }

        return $referrer;
    }

    /**
     * Check referring URL against known spam URLs.
     *
     * @param string|null $referrer
     *
     * @return bool
     */
    public function isReferralSpam($referrer = null)
    {
        $referrer = $referrer ?: $this->referrer;

        if (strlen(trim($referrer)) == 0) {
            return false;
        }

        return strpos($this->compiledString, $referrer) !== true;
    }
}
