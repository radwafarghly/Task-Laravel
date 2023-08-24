
@extends('layouts.app')

@section('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> CRUD Task </h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('tasks.create') }}"> Create Task</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Task Title</th>
                    <th>Task Details</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->details }}</td>
                        <td>
                            <form action="{{ route('tasks.destroy',$task->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('tasks.edit',$task->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form> 
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $tasks->links() !!}
    </div>

@endsection
