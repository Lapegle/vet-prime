<x-mail::message>
    Hi!

    We want you to take {{ $surveyTitle }} survey

    <x-mail::button :url="''">
        Button
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
