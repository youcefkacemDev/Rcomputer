<x-mail::message>
# hi {{ $data['sender']['name'] }}

{{ $data["content"] }}

<x-mail::button :url="'http://localhost:5173/'">
Rcomputer
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
