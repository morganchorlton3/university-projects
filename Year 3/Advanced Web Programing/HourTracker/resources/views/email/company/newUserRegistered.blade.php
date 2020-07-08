@component('mail::message')
Hi, {{$company->name}}

You have a new user to approve

Thanks,<br>
{{ config('app.name') }}
@endcomponent
