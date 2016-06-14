<?php
/**
  * TODO: Variation of the Direct Gateway, possibly factory
  * 
  * @category Token_Integration_Method
  * @package Omnipaysagepay
  * @author llincoln <buddhalincoln@gmail.com>
  * @license https://raw.githubusercontent.com/llincoln/omnipay-sagepay/master/LICENSE dwtful
  * @link https://github.com/llincoln/omnipay-sagepay
 */
namespace Omnipay\SagePay;
/**
 * Variation of the Server Gateway
 * 
 */
class TokenGateway extends \Omnipay\SagePay\ServerGateway
{

    public function getName()
    {
        return 'Sage Pay Server/Token';
    }

    public function authorize(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\SagePay\Message\TokenAuthorizeRequest', $parameters);
    }

    public function completeAuthorize(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\SagePay\Message\TokenCompleteAuthorizeRequest', $parameters);
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\SagePay\Message\TokenPurchaseRequest', $parameters);
    }

    public function capture(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\SagePay\Message\TokenRequest', $parameters);
    }

    public function refund(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\SagePay\Message\TokenRefundRequest', $parameters);
    }

}
