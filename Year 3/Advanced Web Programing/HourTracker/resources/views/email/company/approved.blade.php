@component('mail::message')
<h2 style="text-align: center;">Great News!</h2>

<p>Your company has been successfully registered.

You can now register your staff and manage them all from your portal.</p>

@component('mail::button', ['url' => '/profile'])
Visit Portal
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
