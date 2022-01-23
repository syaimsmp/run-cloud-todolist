@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Workspace</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action=" {{ route('task.store') }} " method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Workspace Title">
                        </div> <br>
                        <input type="hidden" name="workspace_id" value="{{ $workspace_id }}">
                        <div class="form-group">
                            <label for="">Due Date</label>
                            <input type="datetime-local" name="deadline" class="form-control">
                        </div>
                        <br>
                        <button type="submit" class="mt-2 btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
