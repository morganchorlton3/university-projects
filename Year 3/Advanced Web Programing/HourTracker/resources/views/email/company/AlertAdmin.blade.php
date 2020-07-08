@component('mail::message')
<h1 style="text-align: center;">A new company request has been submitted!</h1>

<p>Hi, {{ $user->firstName }}</p>

<p>HourTracker has recived a new company registration request, bellow are the details of the application </p>
<div class="companyTable">
@component('mail::table')
| Name | Reason  |
| :--: | :--------:|
| {{ $company->name}} | {{ $company->reason }}|
@endcomponent
</div>


@component('mail::button', ['url' => route('admin.home')])
View Request
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
