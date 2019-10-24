@if ($model instanceof App\Question)
@php
$name = 'question';
$firstUriSegment = 'questions';
@endphp
@elseif ($model instanceof App\Answer)
@php
$name = 'answer';
$firstUriSegment = 'answers';
@endphp
@endif
@php
$formId = $name ."-". $model->id;
$formAction = "/".$firstUriSegment."/".$model->id."/vote";
@endphp
<div class="d-flex flex-column vote-controls">
    <a title="This {{ $name }} is useful" class="vote-up {{ Auth::guest() ? 'off' : '' }}"
        onclick="event.preventDefault(); document.getElementById('up-vote-{{ $formId }}').submit();">
        <i class="fas fa-caret-up fa-3x"></i>
    </a>
    <form method="POST" action="{{ $formAction }}" id="up-vote-{{ $formId }}">
        @csrf
        <input type="hidden" name="vote" value="1">
    </form>
    <span class="votes-count">{{ $model->votes_count }}</span>
    <a title="I dont like this {{ $name }}" class="vote-down {{ Auth::guest() ? 'off' : '' }}"
        onclick="event.preventDefault(); document.getElementById('down-vote-{{ $formId }}').submit();">
        <i class="fas fa-caret-down fa-2x"></i>
    </a>
    <form method="POST" action="{{ $formAction }}" id="down-vote-{{ $formId }}">
        @csrf
        <input type="hidden" name="vote" value="-1">
    </form>
    @if ($model instanceOf App\Question)
    <favorite :question="{{ $model }}"></favorite>
    @elseif($model instanceof App\Answer)
    <accept :answer="{{ $model }}"></accept>
    @endif
</div>