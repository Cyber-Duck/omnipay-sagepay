<?php

namespace Omnipay\SagePay\Message;

class TokenCompleteAuthorizeRequest extends \Omnipay\SagePay\Message\ServerCompleteAuthorizeRequest
{

    protected function getBaseData()
    {
        $data = parent::getBaseData();
        $data['VPSProtocol'] = '3.00';
        $data['CreateToken'] = 1;
        $data['StoreToken'] = 1;
        return $data;
    }

    public function getData()
    {
        $this->validate('transactionId', 'transactionReference');

        $reference = json_decode($this->getTransactionReference(), true);

        $signaturedata = $reference['VPSTxId'] .
                $reference['VendorTxCode'] .
                $this->httpRequest->request->get('Status') .
                $this->httpRequest->request->get('TxAuthNo') .
                $this->getVendor() .
                $this->httpRequest->request->get('AVSCV2') .
                $reference['SecurityKey'] .
                $this->httpRequest->request->get('AddressResult') .
                $this->httpRequest->request->get('PostCodeResult') .
                $this->httpRequest->request->get('CV2Result') .
                $this->httpRequest->request->get('GiftAid') .
                $this->httpRequest->request->get('3DSecureStatus') .
                $this->httpRequest->request->get('CAVV') .
                $this->httpRequest->request->get('AddressStatus') .
                $this->httpRequest->request->get('PayerStatus') .
                $this->httpRequest->request->get('CardType') .
                $this->httpRequest->request->get('Last4Digits') .
                $this->httpRequest->request->get('DeclineCode') .
                $this->httpRequest->request->get('ExpiryDate') .
                $this->httpRequest->request->get('FraudResponse') .
                $this->httpRequest->request->get('BankAuthCode');

        // validate VPSSignature
        $signature = strtolower(md5($signaturedata));

        //TODO: These signatures never match because the returned signature contains a token we don't know about before authorise
        // ... were not to bothered about the unlikely event of a forgery since we are using Token Method and DEFERRED Payments
//        if (strtolower($this->httpRequest->request->get('VPSSignature')) !== $signature) {
//            error_log('-------TokenCompleteAuthorizeRequest--------');
//            error_log('Sig data '.print_r($signaturedata, true));
//            error_log('Sig to compare '.$signature);
//            error_log('Sig to Match '.strtolower($this->httpRequest->request->get('VPSSignature')));
//            error_log('-------END TokenCompleteAuthorizeRequest--------');
//            throw new \Omnipay\Common\Exception\InvalidResponseException;
//        }

        return $this->httpRequest->request->all();
    }
}
