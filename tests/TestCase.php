<?php
namespace Deiucanta\Smart\Tests;

use Illuminate\Foundation\Application;
use Illuminate\Database\Schema\Blueprint;
use Orchestra\Testbench\TestCase as Orchestra;
use Deiucanta\Smart\SmartServiceProvider;

class TestCase extends Orchestra
{
  protected function setUp()
  {
    parent::setUp();    
    
    // Laravel default configs

    // config(['auth.providers.users.model' => User::class]);
    // config(['auth.defaults.guard' => 'api']);
    // config(['auth.guards.api.driver' => 'keycloak']);

    // Set Keycloak Guard default configs

    // config(['keycloak.realm_public_key' => $this->plainPublicKey($this->publicKey)]);
    // config(['keycloak.user_provider_credential' => 'username']);
    // config(['keycloak.token_principal_attribute' => 'preferred_username']);
    // config(['keycloak.append_decoded_token' => false]);
    // config(['keycloak.allowed_resources' => 'myapp-backend']);

    // bootstrap 

    $this->setUpDatabase($this->app);
    // $this->withFactories(__DIR__ . '/Factories');
  }

  protected function setUpDatabase(Application $app)
  {
    $app['db']->connection()->getSchemaBuilder()->create('users', function (Blueprint $table) {
      $table->increments('id');
      $table->string('username');
      $table->timestamps();
    });
  }

  protected function getPackageProviders($app)
  {
    return [SmartServiceProvider::class];
  }
}