@component('mail::message')
# Game Invite

{{ $user->name }} invited you to play a game of Monopoly.

@component('mail::table')
    | Invited Players |
    |:----------------|
    @foreach ($playerNames as $name)
        | {{ $name }} |
    @endforeach
@endcomponent

@component('mail::button', ['url' => config("app.url").$link, 'color' => 'success'])
Accept Invite
@endcomponent

Thanks,<br>
{{ config('app.name') }}-Team
@endcomponent
