<?php

/*
 * Variation of the Server Gateway
 * TODO: Variation of the Direct Gateway
 */
namespace Omnipay\SagePay;

//use \Omnipay\SagePay\Message\TokenAuthorizeRequest;
//use \Omnipay\SagePay\Message\TokenCompleteAuthorizeRequest;
//use \Omnipay\SagePay\Message\TokenPurchaseRequest;

class TokenGateway extends \Omnipay\SagePay\ServerGateway {

    public function getName() {
        return 'Sage Pay Server/Token';
    }

    public function authorize(array $parameters = array()) {
        return $this->createRequest('\Omnipay\SagePay\Message\TokenAuthorizeRequest', $parameters);
    }

    public function completeAuthorize(array $parameters = array()) {
        return $this->createRequest('\Omnipay\SagePay\Message\TokenCompleteAuthorizeRequest', $parameters);
    }

    public function purchase(array $parameters = array()) {
        return $this->createRequest('\Omnipay\SagePay\Message\TokenPurchaseRequest', $parameters);
    }

    public function capture(array $parameters = array()) {
        return $this->createRequest('\Omnipay\SagePay\Message\TokenRequest', $parameters);
    }

    public function refund(array $parameters = array()) {
        return $this->createRequest('\Omnipay\SagePay\Message\TokenRefundRequest', $parameters);
    }

}
