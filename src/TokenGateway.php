<?php

/**
 * @see http://www.sagepay.co.uk/support/12/36/sage-pay-token-system-understanding-the-process
 * @see http://www.sagepay.co.uk/file/1171/download-document/sagepaytokensystemprotocolandintegrationguidelinev3.0_0.pdf
 * 
 * @category Token_Integration_Method
 * @package Omnipaysagepay
 * @author Luke Lincoln <buddhalincoln at gmail.com>
 * @license https://raw.githubusercontent.com/llincoln/omnipay-sagepay/master/LICENSE dwtful
 * @link https://github.com/llincoln/omnipay-sagepay
 */

namespace Omnipay\SagePay;

/**
 * Variation of the Server Gateway
 * Inspired by:
 * 
 * Need to use this in the wild
 * 
 * https://github.com/thephpleague/omnipay-sagepay/issues/14
 * 
 * https://github.com/thephpleague/omnipay-sagepay/issues/61
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
        $className = '\Omnipay\SagePay\Message\TokenAuthorizeRequest';
        return $this->createRequest($className, $parameters);
    }

    public function completeAuthorize(array $parameters = array())
    {
        $className = '\Omnipay\SagePay\Message\TokenCompleteAuthorizeRequest';
        return $this->createRequest($className, $parameters);
    }

    public function purchase(array $parameters = array())
    {
        $className = '\Omnipay\SagePay\Message\TokenPurchaseRequest';
        return $this->createRequest($className, $parameters);
    }

    public function capture(array $parameters = array())
    {
        $className = '\Omnipay\SagePay\Message\TokenCaptureRequest';
        return $this->createRequest($className, $parameters);
    }

    public function refund(array $parameters = array())
    {
        $className = '\Omnipay\SagePay\Message\TokenRefundRequest';
        return $this->createRequest($className, $parameters);
    }
}
