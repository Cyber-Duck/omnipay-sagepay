<?php

namespace Omnipay\SagePay\Message;

use Omnipay\Tests\TestCase;

class TokenAuthorizeRequestTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();

        $this->request = new TokenAuthorizeRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->request->initialize(
                array(
                    'amount' => '12.00',
                    'transactionId' => '123',
                    'card' => $this->getValidCard(),
                    'returnUrl' => 'https://www.example.com/return',
                )
        );
    }

    public function testProfile()
    {
        $this->assertSame($this->request, $this->request->setProfile('NORMAL'));
        $this->assertSame('NORMAL', $this->request->getProfile());
    }

    public function testGetData()
    {
        $data = $this->request->getData();

        $this->assertSame(1, $data['CreateToken']);
        $this->assertSame(1, $data['StoreToken']);
        $this->assertSame('https://www.example.com/return', $data['NotificationURL']);
        $this->assertSame('LOW', $data['Profile']);
    }
}
