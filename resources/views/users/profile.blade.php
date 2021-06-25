Hello {{ $user->name }} !
@forelse($user->invitations as $invitation)
Invitation au projet : {{ $invitation->project->name }}
{{-- Accept --}}
{!! Form::open(['url' => 'invitations/' . $invitation->id . '/accept', 'method' => 'delete']) !!}
{{ Form::submit('Accept') }}
{!! Form::close() !!}
{{-- Refuse --}}
{!! Form::open(['url' => 'invitations/' . $invitation->id . '/refuse' , 'method' => 'delete']) !!}
{{ Form::submit('Refuse') }}
{!! Form::close() !!}
@empty
<p>No invitations</p>
@endforelse