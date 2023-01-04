@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Resumes</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if (count($resumes) > 0)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resumes as $resume)
                            <tr>
                                <td>{{ $resume->name }}</td>
                                <td>
                                    <a href="{{ url('resumes/show', $resume->id) }}" class="btn btn-secondary btn-sm float-right">View</a>
                                    <a href="{{ url('resumes/edit', $resume->id) }}" class="btn btn-secondary btn-sm float-right mr-2">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>You don't have any resumes yet.</p>
                    <a href="{{ url('resumes/create') }}" class="btn btn-primary">Create Resume</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection