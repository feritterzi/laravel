@component('mail::message')
# {{__('emails.hello')}},

{{__('emails.created-message-from-site')}}

<!--
@component('mail::button', ['url' => ''])
    Button Text
@endcomponent
-->


## {{__('contact.subject')}} : {{ $contact['subject'] }},

@component('mail::table')
<!--
| Laravel       | Table         | Example  |
| ------------- |:-------------:| --------:|
| Col 3 is      | Right-Aligned | $20      |
-->
|        |         |
| ------------- |:-------------:|
| {{__('auth.name').' '.__('auth.surname')}} | {{ $contact['name'] }} |
| {{__('auth.email-address')}} | {{ $contact['email'] }} |
| {{__('contact.mobilephone')}} | {{ $contact['mobilephone'] }} |
@endcomponent

@component('mail::panel')
{{ $contact['body'] }}
@endcomponent

@component('mail::subcopy')
    Bu mesaj {{ $contact['created_at'] }} tarihinde oluşturulmuştur.
@endcomponent


{{__('emails.thanks')}},<br>
{{ config('app.name') }}
@endcomponent
