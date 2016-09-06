@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add Issue
                </div>

                <div class="panel-body">
                    <p>Issue</p>
                    <p>A comic book issue has a title, volume, issue number, and a publisher.</p>
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Publisher Form -->
                    <form action="{{ url('issues')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Publisher Name -->
                        <div class="form-group">
                            <label for="issue-name" class="col-sm-3 control-label">Issue</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="issue-name" class="form-control" value="{{ old('issues') }}">
                            </div>
                        </div>

                        <!-- Add Publisher Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Issue
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Publishers -->
            @if (count($issues) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Issues
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped issue-table">
                            <thead>
                                <th>Title</th>
                                <th>Volume</th>
                                <th>Issue</th>
                                <th>Publisher</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($issues as $issue)
                                    <tr>

                                        <td class="table-text">
                                            <div>
                                                <a href="{{ url('issue/' . $issue->id . '/volumes') }}">{{ $issue->name }}</a>
                                            </div>
                                        </td>

                                        <td class="table-text">
                                            <div>
                                                <a href="{{ url('issue/' . $issue->id . '/volumes') }}">{{ $issue->volume }}</a>
                                            </div>
                                        </td>

                                        <td class="table-text">
                                            <div>
                                                <a href="{{ url('issue/' . $issue->id . '/volumes') }}">{{ $issue->issue }}</a>
                                            </div>
                                        </td>

                                        <td class="table-text">
                                            <div>
                                                <a href="{{ url('issue/' . $issue->id . '/volumes') }}">{{ $issue->publisherName }}</a>
                                            </div>
                                        </td>

                                        <!-- Publisher Delete Button -->
                                        <td>
                                            <form action="{{ url('titles/'.$issue->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>

                                                <a class="btn btn-info" href="{{ url('issue/update/'.$issue->id) }}">
                                                    <i class="fa fa-btn fa-pencil-square-o"></i>Edit Title
                                                </a>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            @endif
        </div>
    </div>
@endsection