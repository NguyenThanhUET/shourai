<?php

/**
 * Created by PhpStorm.
 * User: MSI
 * Date: 6/21/2018
 * Time: 10:26 AM
 */

namespace App\Entities;
class SDBStatusCode
{
    const OK = 'OK';
    const DataNull = 'DataNull';
    const Excep = 'Excep';
    const ApiError = 'ApiError';
    const WebError = 'WebError';
    const ACLNotPass = 'ACLNotPass';
    const ApiAuthNotPass = 'ApiAuthNotPass';
    const PDOExceoption = 'PDOExceoption';
    const ValidateError = 'ValidateError';
}
