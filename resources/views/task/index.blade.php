@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h3>Tasks</h3>
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif
                    <a title="Add Tasks" href="{{ route('task.create', ['workspace_id'=> Request::get('workspace_id')]) }}" class="btn btn-primary" type="button">
                        <span><i class="fa fa-plus"></i></span>
                    </a>
                    <table class="table">
                       <thead>
                           <tr>
                               <th>No. </th>
                               <th> Title </th>
                               <th> Submit Time </th>
                               <th> Time Remaining </th>
                               <th> Due </th>
                               <th> Actions </th>
                           </tr>
                       </thead>
                       <tbody>
                           @forelse ($listing as $key=>$task)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td> {{ $task->title }} </td>
                                    <td> {{ $task->submission_time }} </td>
                                    <td> {{ $task->time_remaining }} </td>
                                    <td> {{ \Carbon\Carbon::parse( $task->deadline )->format('l d-m-Y h:i:s A') }} </td>
                                    <td>
                                        @if (!$task->finished_on)
                                            <a href="{{ route('task.update-task',[ 'task' => $task->id, 'workspace_id' => Request::get('workspace_id') ]) }}" class="btn btn-success">
                                                <span><i class="fa fa-check"></i></span>
                                            </a>
                                        @endif
                                        <form method="POST" action="{{ route('task.destroy', ['task'=> $task->id, 'workspace_id'=>  Request::get('workspace_id')]) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <div class="form-group">
                                                <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger">
                                                    <span><i class="fa fa-trash"></i></span>
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                           @empty
                                <tr>
                                    <td colspan="4">No data Available</td>
                                </tr>
                           @endforelse
                       </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
