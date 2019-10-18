@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>All Questions</h2>
                        <div class="ml-auto">
                            <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">Ask a
                                Question</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('layouts._messages')
                    @foreach ($questions as $question)
                    <div class="media">
                        <div class="d-flex flex-column counters">
                            <div class="vote">
                                <strong>{{ $question->votes }}</strong> {{ \Str::plural('vote', $question->votes) }}
                            </div>
                            <div class="status {{ $question->status }}">
                                <strong>{{ $question->answers }}</strong>
                                {{ \Str::plural('answer', $question->answers) }}
                            </div>
                            <div class="view">
                                {{ $question->views . \Str::plural('view', $question->views) }}
                            </div>
                        </div>
                        <div class="media-body">

                            {{-- <a href="{{ route('questions.show', $question->id) }}">{{ $question->title }}</a>
                            --}}
                            <div class="d-flex align-items-center">
                                <h3 class="mt-0">
                                    <a href="{{ $question->url }}">{{ $question->title }}</a>
                                </h3>
                                <div class="ml-auto">
                                    @can('update', $question)
                                    <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-sm btn-outline-info">Edit</a>
                                    @endcan
                                    @can('delete', $question)
                                    <form class="form-delete" action="{{ route('questions.destroy', $question->id) }}"
                                        method="POST">
                                        @method("DELETE")
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="confirm('Are you sure?'); return false;">Delete</a>
                                    </form>
                                    @endcan
                                </div>
                            </div>
                            <p class="lead">
                                Asked by
                                <a href="{{ $question->user->url }}" class="">{{ $question->user->name }}</a>
                                <small class="text-muted">{{ $question->created_date }}</small>
                            </p>
                            {{ \Str::limit($question->body, 25) }}
                        </div>
                    </div>
                    <hr>
                    @endforeach
                    <div class="mx-auto">
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection