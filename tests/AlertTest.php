<?php

use Orchid\Alert\Alert;
use Orchid\Alert\Contracts\SessionStoreInterface;
use PHPUnit\Framework\TestCase;

class AlertTest extends TestCase
{
    protected $store;
    protected $alert;

    public function setUp()
    {
        $this->store = Mockery::mock(SessionStoreInterface::class);
        $this->alert = new Alert($this->store);
    }

    /** @test */
    public function it_should_flash_an_info_alert_to_the_session()
    {
        $this->store->shouldReceive('flash')->with('flash_notification.message', 'test');
        $this->store->shouldReceive('flash')->with('flash_notification.level', 'info');
        $this->alert->info('test');
    }

    /** @test */
    public function it_should_flash_a_success_alert_to_the_session()
    {
        $this->store->shouldReceive('flash')->with('flash_notification.message', 'test');
        $this->store->shouldReceive('flash')->with('flash_notification.level', 'success');
        $this->alert->success('test');
    }

    /** @test */
    public function it_should_flash_a_error_alert_to_the_session()
    {
        $this->store->shouldReceive('flash')->with('flash_notification.message', 'test');
        $this->store->shouldReceive('flash')->with('flash_notification.level', 'danger');
        $this->alert->error('test');
    }

    /** @test */
    public function it_should_flash_a_warning_alert_to_the_session()
    {
        $this->store->shouldReceive('flash')->with('flash_notification.message', 'test');
        $this->store->shouldReceive('flash')->with('flash_notification.level', 'warning');
        $this->alert->warning('test');
    }
}
