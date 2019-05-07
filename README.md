# AfricasTalking notifications channel for Laravel 5.3+

This package makes it easy to send notifications using [AfricasTalking](https://africastalking.com/) with Laravel 5.3+.

## Contents

- [Requirements](#requirements)
- [Installation](#installation)
	- [Setting up the AfricasTalking service](#setting-up-the-AfricasTalking-service)
- [Usage](#usage)
- [Changelog](#changelog)
- [Testing](#testing)
- [Security](#security)
- [Contributing](#contributing)
- [Credits](#credits)
- [License](#license)


## Requirements

- [Sign up](https://account.africastalking.com/auth/register) for a free AfricasTalking account
- Create a new API Key under Settings in the Sandbox section

## Installation

You can install the package via composer:

``` bash
composer require m-shule/africastalking
```

for Laravel 5.4 or lower, you must add the service provider to your config:

```php
// config/app.php
'providers' => [
    ...
    MShule\AfricasTalking\AfricasTalkingServiceProvider::class,
],
```

### Setting up the AfricasTalking service

Add the environment variables to your `config/services.php`:

```php
// config/services.php
...
'africastalking' => [
    'api_key' => env('AFRICASTALKING_API_KEY'),
    'username' => env('AFRICASTALKING_USERNAME'),
    'from' => env('AFRICASTALKING_FROM'),
],
...
```

Add your AfricasTalking API key, username, and from number/short code to your `.env`:

```php
// .env
...
AFRICASTALKING_API_KEY=
AFRICASTALKING_USERNAME=
AFRICASTALKING_FROM=
...
```

The from variable is optional.

## Usage

Now you can use the channel in your `via()` method inside the notification:

``` php
<?php

// app/Notifications/VpsServerOrdered.php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use MShule\AfricasTalking\AfricasTalkingChannel;
use MShule\AfricasTalking\AfricasTalkingMessage;

class VpsServerOrdered extends Notification
{
    public function via($notifiable)
    {
        return [AfricasTalkingChannel::class];
    }

    public function toAfricasTalking($notifiable)
    {
    	return (new AfricasTalkingMessage())->content("Your service was ordered!");
    }
}
```
Additionally you can set from which short code/alphanumeric your message originates from by:
``` php
return (new AfricasTalkingMessage())->content("Your service was ordered!")->from('60606');
```

You can also send a notification to someone who is not stored as a "user" by:
``` php
...
use App\Notifications\VpsServerOrdered;
use Illuminate\Notifications\Notification;
...

Notification::route('africastalking', '+254712345678')->notify(new VpsServerOrdered());

...
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Security

If you discover any security related issues, please email hello@m-shule.com instead of using the issue tracker.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [M-Shule](https://github.com/mshule)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
