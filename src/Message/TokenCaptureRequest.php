<?php


namespace Omnipay\SagePay\Message;

class TokenCaptureRequest extends \Omnipay\SagePay\Message\CaptureRequest
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
