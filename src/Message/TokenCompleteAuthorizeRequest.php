<?php

namespace Omnipay\SagePay\Message;

class TokenCompleteAuthorizeRequest extends \Omnipay\SagePay\Message\ServerCompleteAuthorizeRequest
{

    protected function getBaseData()
    {
        $data = parent::getBaseData();
        /**
         * Modified here to create token and store token
         */
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

        if (strtolower($this->httpRequest->request->get('VPSSignature')) !== $signature) {
            $debug = '';
            $debug .= 'Incoming Sig. ' . print_r($signaturedata, true);
            $debug .= 'VPSSignature ' . print_r($this->httpRequest->request->get('VPSSignature'), true);

            throw new \Omnipay\Common\Exception\InvalidResponseException($debug);
        }

        return $this->httpRequest->request->all();
    }
}
