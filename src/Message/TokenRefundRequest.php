<?php

/*
 * Omnipay Token Integration
 * Token Refund Request
 */

namespace Omnipay\SagePay\Message;

class TokenRefundRequest extends \Omnipay\SagePay\Message\RefundRequest
{

    protected function getBaseData()
    {
        $data = parent::getBaseData();
        $data['VPSProtocol'] = '3.00';
        $data['CreateToken'] = 1;
        $data['StoreToken'] = 1;
        return $data;
    }
}
