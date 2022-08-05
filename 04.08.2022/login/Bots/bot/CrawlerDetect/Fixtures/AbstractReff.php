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

abstract class AbstractProvider
{
    /**
     * The data set.
     * 
     * @var array
     */
    protected $data;
    /**
     * Return the data set.
     * 
     * @return array
     */
    public function getAll()
    {
        return $this->data;
    }
}
