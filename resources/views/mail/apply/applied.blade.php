@component('mail::message')
# Introduction

Your application for the {{ $job->name }}  - {{ $job->function }} job was submitted successfully.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
