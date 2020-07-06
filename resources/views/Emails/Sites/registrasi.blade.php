@component('mail::message')
# Introduction

Selamat anda telah terdaftar di myapps

@component('mail::button', ['url' => 'http://myapps.com'])
Klik disini
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent