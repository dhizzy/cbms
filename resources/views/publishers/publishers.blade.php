@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Publisher
                </div>
                <div class="panel-body">
                    <p>Publisher</p>
                    <p>A comic book publisher is a company or individual that lawfully releases a comic book for release in any media, including print or digital.</p>
                    <p>Enter any comic book publishers of your comic collection in the following fields. With the Comic book management system, you can relate issues in your collection to publishers.</p>
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Publisher Form -->
                    <form action="{{ url('publishers')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Publisher Name -->
                        <div class="form-group">
                            <label for="publisher-name" class="col-sm-3 control-label">Publisher</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="publisher-name" class="form-control" value="{{ old('publishers') }}">
                            </div>
                        </div>

                        <!-- Add Publisher Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Publisher
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Publishers -->
            @if (count($publishers) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Publishers
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped publisher-table">
                            <thead>
                                <th>Publisher</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($publishers as $publisher)
                                    <tr>
                                        <td class="table-text"><div>{{ $publisher->name }}</div></td>

                                        <!-- Publisher Delete Button -->
                                        <td>
                                            <form action="{{ url('publishers/' . $publisher->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>

                                                <a class="btn btn-info" href="{{ url('publisher/update/'.$publisher->id) }}">
                                                    <i class="fa fa-btn fa-pencil-square-o"></i>Edit Publisher
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