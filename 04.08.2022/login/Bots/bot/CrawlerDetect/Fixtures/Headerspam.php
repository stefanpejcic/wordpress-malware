<?php

/*
 * This file is part of Referral Spam Detect.
 *
 * (c) Mark Beech <m@rkbee.ch>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Jaybizzle\ReferralSpamDetect\Fixtures;

class Headers extends AbstractProvider
{
    /**
     * All possible HTTP headers that represent the referring URL.
     *
     * @var array
     */
    protected $data = array(
        'HTTP_REFERER',
    );
}