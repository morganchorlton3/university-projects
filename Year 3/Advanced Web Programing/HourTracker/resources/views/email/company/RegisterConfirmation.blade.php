@component('mail::message')
<h1 style="text-align: center;">We have recived your request!</h1>

<p>Hi, {{ $user->firstName }}</p>

<p>Can I firstly thank you for registering your company with us we are excited to work with you, you will soon be able to assign your employes to your company, 
    and manage there clocks. You will recive an email with the outcome of your application within 5 working days</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
