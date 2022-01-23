@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h3>Workspaces</h3>
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif
                    <a title="Add Workspace" href="{{ route('workspace.create') }}" class="btn btn-primary" type="button">
                        <span><i class="fa fa-plus"></i></span>
                    </a>
                    <table class="table">
                       <thead>
                           <tr>
                               <th>No. </th>
                               <th> Title </th>
                               <th> Action </th>
                           </tr>
                       </thead>
                       <tbody>
                           @forelse ($listing as $key=>$workspace)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td>
                                        <a href=" {{ route('task.index', [ 'workspace_id'=>$workspace->id ]) }} ">
                                            {{ $workspace->title }}
                                        </a>
                                    </td>
                                    <td>
                                        <form method="POST" action="/workspace/{{ $workspace->id }}">
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
                                    <td colspan="2">No data Available</td>
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
