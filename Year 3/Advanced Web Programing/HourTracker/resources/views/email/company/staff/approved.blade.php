@component('mail::message')
<h1 style="text-align: center">Your All Set up</h1>

<p style="text-align: center">Your Compnay has Approved you registration request</p>

<p>Now that your company has approved your request you can use your dashboard to monitor your hours worked, view your pays slips and much more! </p>
@component('mail::button', ['url' => route('dashboard.home')])
View dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
