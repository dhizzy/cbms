@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Title
                </div>

                <div class="panel-body">
                    <p>Title</p>
                    <p>A comic book title is any comic book publication. These titles are often released in a series.</p>
                    <p>Add any title in your collection here. Because the header on each comic can be misleading, it is recommended to look at the indicia for the official name of a periodical. The indicia can be located on the inside cover, or first page, of a comic book issue.</p>
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Publisher Form -->
                    <form action="{{ url('titles')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Publisher Name -->
                        <div class="form-group">
                            <label for="title-name" class="col-sm-3 control-label">Title</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="title-name" class="form-control" value="{{ old('titles') }}">
                            </div>
                        </div>

                        <!-- Add Publisher Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Title
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Publishers -->
            @if (count($titles) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Titles
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped title-table">
                            <thead>
                                <th>Title</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($titles as $title)
                                    <tr>
                                        <td class="table-text">
                                        	<div>
                                        		<a href="{{ url('title/' . $title->id . '/volumes/' . $title->name) }}">{{ $title->name }}</a>
                                        	</div>
                                        </td>

                                        <!-- Publisher Delete Button -->
                                        <td>
                                            <form action="{{ url('titles/'.$title->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>

                                                <a class="btn btn-info" href="{{ url('title/update/'.$title->id) }}">
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