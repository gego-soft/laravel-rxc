<?php

use Orchestra\Testbench\TestCase;
use Gegosoft\Rxccoin\Traits\Rxccoind;
use Gegosoft\Rxccoin\Client as RxccoinClient;

class RxccoindTest extends TestCase
{
    use Rxccoind;

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \Gegosoft\Rxccoin\Providers\ServiceProvider::class,
        ];
    }

    /**
     * Get package aliases.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Rxccoind' => 'Gegosoft\Rxccoin\Facades\Rxccoind',
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('rxccoind.user', 'testuser');
        $app['config']->set('rxccoind.password', 'testpass');
    }

    /**
     * Test service provider.
     *
     * @return void
     */
    public function testServiceIsAvailable()
    {
        $this->assertTrue($this->app->bound('rxccoind'));
    }

    /**
     * Test facade.
     *
     * @return void
     */
    public function testFacade()
    {
        $this->assertInstanceOf(RxccoinClient::class, \Rxccoind::getFacadeRoot());
    }

    /**
     * Test helper.
     *
     * @return void
     */
    public function testHelper()
    {
        $this->assertInstanceOf(RxccoinClient::class, rxccoind());
    }

    /**
     * Test trait.
     *
     * @return void
     */
    public function testTrait()
    {
        $this->assertInstanceOf(RxccoinClient::class, $this->rxccoind());
    }

    /**
     * Test Daskcoin config.
     *
     * @return void
     */
    public function testConfig()
    {
        $config = rxccoind()->getConfig();

        $this->assertEquals(
            config('rxccoind.scheme'),
            $config['base_uri']->getScheme()
        );

        $this->assertEquals(
            config('rxccoind.host'),
            $config['base_uri']->getHost()
        );

        $this->assertEquals(
            config('rxccoind.port'),
            $config['base_uri']->getPort()
        );

        $this->assertEquals(config('rxccoind.user'), $config['auth'][0]);
        $this->assertEquals(config('rxccoind.password'), $config['auth'][1]);
    }
}
