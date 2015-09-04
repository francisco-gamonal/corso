<?php

<<<<<<< HEAD


return [



    /*

      |--------------------------------------------------------------------------

      | Application Debug Mode

      |--------------------------------------------------------------------------

      |

      | When your application is in debug mode, detailed error messages with

      | stack traces will be shown on every error that occurs within your

      | application. If disabled, a simple generic error page is shown.

      |

     */



    'debug' => env('APP_DEBUG', false),

    /*

      |--------------------------------------------------------------------------

      | Application URL

      |--------------------------------------------------------------------------

      |

      | This URL is used by the console to properly generate URLs when using

      | the Artisan command line tool. You should set this to the root of

      | your application so that it is used when running Artisan tasks.

      |

=======
return [

    /*
      |--------------------------------------------------------------------------
      | Application Debug Mode
      |--------------------------------------------------------------------------
      |
      | When your application is in debug mode, detailed error messages with
      | stack traces will be shown on every error that occurs within your
      | application. If disabled, a simple generic error page is shown.
      |
     */

    'debug' => env('APP_DEBUG', false),

    /*
      |--------------------------------------------------------------------------
      | Application URL
      |--------------------------------------------------------------------------
      |
      | This URL is used by the console to properly generate URLs when using
      | the Artisan command line tool. You should set this to the root of
      | your application so that it is used when running Artisan tasks.
      |
>>>>>>> 6974cb14911169446eba67f6a887378ea3ed0dc9
     */

    'url' => 'http://localhost',

    /*
<<<<<<< HEAD

      |--------------------------------------------------------------------------

      | Application Timezone

      |--------------------------------------------------------------------------

      |

      | Here you may specify the default timezone for your application, which

      | will be used by the PHP date and date-time functions. We have gone

      | ahead and set this to a sensible default for you out of the box.

      |

=======
      |--------------------------------------------------------------------------
      | Application Timezone
      |--------------------------------------------------------------------------
      |
      | Here you may specify the default timezone for your application, which
      | will be used by the PHP date and date-time functions. We have gone
      | ahead and set this to a sensible default for you out of the box.
      |
>>>>>>> 6974cb14911169446eba67f6a887378ea3ed0dc9
     */

    'timezone' => 'UTC',

    /*
<<<<<<< HEAD

      |--------------------------------------------------------------------------

      | Application Locale Configuration

      |--------------------------------------------------------------------------

      |

      | The application locale determines the default locale that will be used

      | by the translation service provider. You are free to set this value

      | to any of the locales which will be supported by the application.

      |

=======
      |--------------------------------------------------------------------------
      | Application Locale Configuration
      |--------------------------------------------------------------------------
      |
      | The application locale determines the default locale that will be used
      | by the translation service provider. You are free to set this value
      | to any of the locales which will be supported by the application.
      |
>>>>>>> 6974cb14911169446eba67f6a887378ea3ed0dc9
     */

    'locale' => 'es',

    /*
<<<<<<< HEAD

      |--------------------------------------------------------------------------

      | Application Fallback Locale

      |--------------------------------------------------------------------------

      |

      | The fallback locale determines the locale to use when the current one

      | is not available. You may change the value to correspond to any of

      | the language folders that are provided through your application.

      |

     */

    'fallback_locale' => 'es',

    /*

      |--------------------------------------------------------------------------

      | Encryption Key

      |--------------------------------------------------------------------------

      |'Maatwebsite\Excel\ExcelServiceProvider',

      | This key is used by the Illuminate encrypter service and should be set

      | to a random, 32 character string, otherwise these encrypted strings

      | will not be safe. Please do this before deploying an application!

      |

=======
      |--------------------------------------------------------------------------
      | Application Fallback Locale
      |--------------------------------------------------------------------------
      |
      | The fallback locale determines the locale to use when the current one
      | is not available. You may change the value to correspond to any of
      | the language folders that are provided through your application.
      |
     */

    'fallback_locale' => 'en',

    /*
      |--------------------------------------------------------------------------
      | Encryption Key
      |--------------------------------------------------------------------------
      |
      | This key is used by the Illuminate encrypter service and should be set
      | to a random, 32 character string, otherwise these encrypted strings
      | will not be safe. Please do this before deploying an application!
      |
>>>>>>> 6974cb14911169446eba67f6a887378ea3ed0dc9
     */

    'key' => env('APP_KEY', 'SomeRandomString'),

    'cipher' => MCRYPT_RIJNDAEL_128,

    /*
<<<<<<< HEAD

      |--------------------------------------------------------------------------

      | Logging Configuration

      |--------------------------------------------------------------------------

      |

      | Here you may configure the log settings for your application. Out of

      | the box, Laravel uses the Monolog PHP logging library. This gives

      | you a variety of powerful log handlers / formatters to utilize.

      |

      | Available Settings: "single", "daily", "syslog", "errorlog"

      |

=======
      |--------------------------------------------------------------------------
      | Logging Configuration
      |--------------------------------------------------------------------------
      |
      | Here you may configure the log settings for your application. Out of
      | the box, Laravel uses the Monolog PHP logging library. This gives
      | you a variety of powerful log handlers / formatters to utilize.
      |
      | Available Settings: "single", "daily", "syslog", "errorlog"
      |
>>>>>>> 6974cb14911169446eba67f6a887378ea3ed0dc9
     */

    'log' => 'daily',

    /*
<<<<<<< HEAD

      |--------------------------------------------------------------------------

      | Autoloaded Service Providers

      |--------------------------------------------------------------------------

      |

      | The service providers listed here will be automatically loaded on the

      | request to your application. Feel free to add your own services to

      | this array to grant expanded functionality to your applications.

      |

=======
      |--------------------------------------------------------------------------
      | Autoloaded Service Providers
      |--------------------------------------------------------------------------
      |
      | The service providers listed here will be automatically loaded on the
      | request to your application. Feel free to add your own services to
      | this array to grant expanded functionality to your applications.
      |
>>>>>>> 6974cb14911169446eba67f6a887378ea3ed0dc9
     */

    'providers' => [

<<<<<<< HEAD


=======
>>>>>>> 6974cb14911169446eba67f6a887378ea3ed0dc9
        /*
         * Laravel Framework Service Providers...
         */

        'Illuminate\Foundation\Providers\ArtisanServiceProvider',
        'Illuminate\Auth\AuthServiceProvider',
        'Illuminate\Bus\BusServiceProvider',
        'Illuminate\Cache\CacheServiceProvider',
        'Illuminate\Foundation\Providers\ConsoleSupportServiceProvider',
        'Illuminate\Routing\ControllerServiceProvider',
        'Illuminate\Cookie\CookieServiceProvider',
        'Illuminate\Database\DatabaseServiceProvider',
        'Illuminate\Encryption\EncryptionServiceProvider',
        'Illuminate\Filesystem\FilesystemServiceProvider',
        'Illuminate\Foundation\Providers\FoundationServiceProvider',
        'Illuminate\Hashing\HashServiceProvider',
        'Illuminate\Mail\MailServiceProvider',
        'Illuminate\Pagination\PaginationServiceProvider',
        'Illuminate\Pipeline\PipelineServiceProvider',
        'Illuminate\Queue\QueueServiceProvider',
        'Illuminate\Redis\RedisServiceProvider',
        'Illuminate\Auth\Passwords\PasswordResetServiceProvider',
        'Illuminate\Session\SessionServiceProvider',
        'Illuminate\Translation\TranslationServiceProvider',
        'Illuminate\Validation\ValidationServiceProvider',
        'Illuminate\View\ViewServiceProvider',
        'Illuminate\Html\HtmlServiceProvider',
<<<<<<< HEAD

        /*

         * Application Service Providers...

         */

        Corso\Providers\AppServiceProvider::class,
        Corso\Providers\BusServiceProvider::class,
        Corso\Providers\ConfigServiceProvider::class,
        Corso\Providers\EventServiceProvider::class,
        Corso\Providers\RouteServiceProvider::class,

        /*New*/

        Maatwebsite\Excel\ExcelServiceProvider::class,
        Barryvdh\DomPDF\ServiceProvider::class,
        yajra\Datatables\DatatablesServiceProvider::class,
=======
        'Illuminate\Broadcasting\BroadcastServiceProvider',

        /*
         * Application Service Providers...
         */
        'Corso\Providers\AppServiceProvider',
        'Corso\Providers\BusServiceProvider',
        'Corso\Providers\ConfigServiceProvider',
        'Corso\Providers\EventServiceProvider',
        'Corso\Providers\RouteServiceProvider',

        /*New*/
        'Maatwebsite\Excel\ExcelServiceProvider',
        'Barryvdh\DomPDF\ServiceProvider',
>>>>>>> 6974cb14911169446eba67f6a887378ea3ed0dc9

    ],

    /*
      |--------------------------------------------------------------------------
      | Class Aliases
      |--------------------------------------------------------------------------
      |
      | This array of class aliases will be registered when this application
      | is started. However, feel free to register as many as you wish as
      | the aliases are "lazy" loaded so they don't hinder performance.
      |
     */

    'aliases' => [

<<<<<<< HEAD


        'App' => Illuminate\Support\Facades\App::class,
        'Artisan' => Illuminate\Support\Facades\Artisan::class,
        'Auth' => Illuminate\Support\Facades\Auth::class,
        'Blade' => Illuminate\Support\Facades\Blade::class,
        'Bus' => Illuminate\Support\Facades\Bus::class,
        'Cache' => Illuminate\Support\Facades\Cache::class,
        'Config' => Illuminate\Support\Facades\Config::class,
        'Cookie' => Illuminate\Support\Facades\Cookie::class,
        'Crypt' => Illuminate\Support\Facades\Crypt::class,
        'DB' => Illuminate\Support\Facades\DB::class,
        'Eloquent' => Illuminate\Database\Eloquent\Model::class,
        'Event' => Illuminate\Support\Facades\Event::class,
        'File' => Illuminate\Support\Facades\File::class,
        'Hash' => Illuminate\Support\Facades\Hash::class,
        'Input' => Illuminate\Support\Facades\Input::class,
        'Inspiring' => Illuminate\Foundation\Inspiring::class,
        'Lang' => Illuminate\Support\Facades\Lang::class,
        'Log' => Illuminate\Support\Facades\Log::class,
        'Mail' => Illuminate\Support\Facades\Mail::class,
        'Password' => Illuminate\Support\Facades\Password::class,
        'Queue' =>Illuminate\Support\Facades\Queue::class,
        'Redirect' => Illuminate\Support\Facades\Redirect::class,
        'Redis' => Illuminate\Support\Facades\Redis::class,
        'Request' => Illuminate\Support\Facades\Request::class,
        'Response' => Illuminate\Support\Facades\Response::class,
        'Route' => Illuminate\Support\Facades\Route::class,
        'Schema' => Illuminate\Support\Facades\Schema::class,
        'Session' => Illuminate\Support\Facades\Session::class,
        'Storage' => Illuminate\Support\Facades\Storage::class,
        'URL' => Illuminate\Support\Facades\URL::class,
        'Validator' => Illuminate\Support\Facades\Validator::class,
        'View' =>Illuminate\Support\Facades\View::class,
        'Html' => Illuminate\Html\HtmlFacade::class,
        'Form' => Illuminate\Html\FormFacade::class,
        'Excel' => Maatwebsite\Excel\Facades\Excel::class,
        'PDF' => Barryvdh\DomPDF\Facade::class,
        'Datatables' => yajra\Datatables\Datatables::class,

    ],

];

=======
        'App' => 'Illuminate\Support\Facades\App',
        'Artisan' => 'Illuminate\Support\Facades\Artisan',
        'Auth' => 'Illuminate\Support\Facades\Auth',
        'Blade' => 'Illuminate\Support\Facades\Blade',
        'Bus' => 'Illuminate\Support\Facades\Bus',
        'Cache' => 'Illuminate\Support\Facades\Cache',
        'Config' => 'Illuminate\Support\Facades\Config',
        'Cookie' => 'Illuminate\Support\Facades\Cookie',
        'Crypt' => 'Illuminate\Support\Facades\Crypt',
        'DB' => 'Illuminate\Support\Facades\DB',
        'Eloquent' => 'Illuminate\Database\Eloquent\Model',
        'Event' => 'Illuminate\Support\Facades\Event',
        'File' => 'Illuminate\Support\Facades\File',
        'Hash' => 'Illuminate\Support\Facades\Hash',
        'Input' => 'Illuminate\Support\Facades\Input',
        'Inspiring' => 'Illuminate\Foundation\Inspiring',
        'Lang' => 'Illuminate\Support\Facades\Lang',
        'Log' => 'Illuminate\Support\Facades\Log',
        'Mail' => 'Illuminate\Support\Facades\Mail',
        'Password' => 'Illuminate\Support\Facades\Password',
        'Queue' => 'Illuminate\Support\Facades\Queue',
        'Redirect' => 'Illuminate\Support\Facades\Redirect',
        'Redis' => 'Illuminate\Support\Facades\Redis',
        'Request' => 'Illuminate\Support\Facades\Request',
        'Response' => 'Illuminate\Support\Facades\Response',
        'Route' => 'Illuminate\Support\Facades\Route',
        'Schema' => 'Illuminate\Support\Facades\Schema',
        'Session' => 'Illuminate\Support\Facades\Session',
        'Storage' => 'Illuminate\Support\Facades\Storage',
        'URL' => 'Illuminate\Support\Facades\URL',
        'Validator' => 'Illuminate\Support\Facades\Validator',
        'View' => 'Illuminate\Support\Facades\View',
        'Html' => 'Illuminate\Html\HtmlFacade',
        'Form' => 'Illuminate\Html\FormFacade',
        'Excel' => 'Maatwebsite\Excel\Facades\Excel',
        'PDF' => 'Barryvdh\DomPDF\Facade',

    ],

];
>>>>>>> 6974cb14911169446eba67f6a887378ea3ed0dc9
