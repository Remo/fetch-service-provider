Tedivm/Fetch service provider for Silex
=======================================

Service provider wrapping [Tedivm/Fetch](https://github.com/tedivm/Fetch) to make its functionality available in Silex.


Sample Usage
============

    // set configuration
    $app['fetch.options'] = array(
        'host' => 'localhost',
        'user' => 'root',
        'password' => ''
    );
  
    $app->register(new Tedivm\Fetch\FetchServiceProvider());
  
    $mail = $app['fetch'];
    $messages = $mail->getMessages();
