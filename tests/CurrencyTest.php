<?php

namespace KuMex\SDK\Tests;

use KuMex\SDK\PublicApi\Currency;

class CurrencyTest extends TestCase
{
    protected $apiClass    = Currency::class;
    protected $apiWithAuth = false;

    /**
     * @dataProvider apiProvider
     * @param Currency $api
     * @throws \KuMex\SDK\Exceptions\BusinessException
     * @throws \KuMex\SDK\Exceptions\HttpException
     * @throws \KuMex\SDK\Exceptions\InvalidApiUriException
     */
    public function testGetList(Currency $api)
    {
        $currencies = $api->getList();
        $this->assertInternalType('array', $currencies);
        foreach ($currencies as $currency) {
            $this->assertArrayHasKey('currency', $currency);
            $this->assertArrayHasKey('name', $currency);
            $this->assertArrayHasKey('fullName', $currency);
            $this->assertArrayHasKey('precision', $currency);
            $this->assertArrayHasKey('withdrawalMinSize', $currency);
            $this->assertArrayHasKey('withdrawalMinFee', $currency);
            $this->assertArrayHasKey('isWithdrawEnabled', $currency);
            $this->assertArrayHasKey('isDepositEnabled', $currency);
        }
    }

    /**
     * @dataProvider apiProvider
     * @param Currency $api
     * @throws \KuMex\SDK\Exceptions\BusinessException
     * @throws \KuMex\SDK\Exceptions\HttpException
     * @throws \KuMex\SDK\Exceptions\InvalidApiUriException
     */
    public function testGetDetail(Currency $api)
    {
        $currency = $api->getDetail('BTC');
        $this->assertInternalType('array', $currency);
        $this->assertArrayHasKey('currency', $currency);
        $this->assertArrayHasKey('name', $currency);
        $this->assertArrayHasKey('fullName', $currency);
        $this->assertArrayHasKey('precision', $currency);
        $this->assertArrayHasKey('withdrawalMinSize', $currency);
        $this->assertArrayHasKey('withdrawalMinFee', $currency);
        $this->assertArrayHasKey('isWithdrawEnabled', $currency);
        $this->assertArrayHasKey('isDepositEnabled', $currency);
    }

    /**
     * @dataProvider apiProvider
     * @param Currency $api
     * @throws \KuMex\SDK\Exceptions\BusinessException
     * @throws \KuMex\SDK\Exceptions\HttpException
     * @throws \KuMex\SDK\Exceptions\InvalidApiUriException
     */
    public function testGetPrices(Currency $api)
    {
        $prices = $api->getPrices('USD', 'BTC,KCS');
        $this->assertInternalType('array', $prices);
        $this->assertNotEmpty($prices);
    }
}