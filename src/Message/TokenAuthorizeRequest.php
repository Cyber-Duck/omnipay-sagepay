<?php

namespace Omnipay\SagePay\Message;

class TokenAuthorizeRequest extends \Omnipay\SagePay\Message\ServerAuthorizeRequest
{

    protected function getBaseData()
    {
        $data = parent::getBaseData();
        $data['CreateToken'] = 1;
        $data['StoreToken'] = 1;
        return $data;
    }

    public function getData()
    {
        $this->validate('returnUrl');

        $data = $this->getBaseAuthorizeData();
        $data['NotificationURL'] = $this->getNotifyUrl();
        $data['RedirectURL'] = $this->getReturnUrl();
        $data['Profile'] = $this->getProfile();
        return $data;
    }

    protected function createResponse($data)
    {
        return $this->response = new TokenAuthorizeResponse($this, $data);
    }

}
