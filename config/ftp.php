<?php
return array(

    /*
	|--------------------------------------------------------------------------
	| Default FTP Connection Name
	|--------------------------------------------------------------------------
	|
	| Here you may specify which of the FTP connections below you wish
	| to use as your default connection for all ftp work.
	|
	*/

    'default' => 'connectionA',

    /*
    |--------------------------------------------------------------------------
    | FTP Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the FTP connections setup for your application.
    |
    */

    'connections' => array(

        'connectionA' => array(
            'host'   => 'xatsaautopartes.com',
            //'port'  => 22,
            'username' => 'u83465047',
            'password'   => 'kirayagami',
            'passive'   => false,
        ),
    ),
);