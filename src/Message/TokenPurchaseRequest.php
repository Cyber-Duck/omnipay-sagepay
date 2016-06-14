<?php

namespace Omnipay\SagePay\Message;

class TokenPurchaseRequest extends \Omnipay\SagePay\Message\ServerPurchaseRequest
{

    protected function getBaseData()
    {
        $data = parent::getBaseData();
        $data['CreateToken'] = 1;
        $data['StoreToken'] = 1;
        return $data;
    }
}
