<?php

/*
 * (c) Remo Laubacher <remo.laubacher@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tedivm\Fetch;

use Silex\Application,
    Silex\ServiceProviderInterface;

/**
 * Tedivm/Fetch Service Provider for silex.
 *
 * @author Remo Laubacher <remo.laubacher@gmail.com>
 */
class FetchServiceProvider implements ServiceProviderInterface {

    public function register(Application $app) {

        $app['fetch.initialized'] = false;

        $app['fetch'] = $app->share(function ($app) {
            $options = array_replace(array('host' => 'localhost', 'user' => '', 'password' => '', 'port' => 993), $app['fetch.options']);

            $server = new \Fetch\Server($options['host'], $options['port']);
            if ($options['user']) {
                $server->setAuthentication($options['user'], $options['password']);
            }
            
            $app['fetch.initialized'] = true;
            
            return $server;
        });
    }

    public function boot(Application $app) {
        
    }

}
