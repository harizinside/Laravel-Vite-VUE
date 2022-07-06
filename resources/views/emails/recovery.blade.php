@component('mail::message')
## Hai, {{ $rows['name'] }}!

Please click button below to reset your password

@component('mail::button', ['url' => 'https://google.com'])
Reset Password
@endcomponent

If you did not do this, no futher action is required

@component('mail::subcopy')
[Privacy Policy](https://eff.org) | [Terms of Service](https://eff.org)
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
