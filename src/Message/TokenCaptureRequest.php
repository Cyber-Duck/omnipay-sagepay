<?php

namespace Omnipay\SagePay\Message;

class TokenCaptureRequest extends \Omnipay\SagePay\Message\CaptureRequest
{

    protected function getBaseData()
    {
        $data = parent::getBaseData();
        /**
         * Modified Here to create token and store token
         */
        $data['CreateToken'] = 1;
        $data['StoreToken'] = 1;
        return $data;
    }
}
