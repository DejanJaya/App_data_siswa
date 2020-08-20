@component('mail::message')
# Pendaftaran Siswa

Selamat anda telah terdaftar di SMK PGRI Rawalumbu.

@component('mail::button', ['url' => 'http://smkpgri.com'])
Klik disini
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
