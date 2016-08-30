@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <!-- Selected Title to Edit -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Title
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped title-table">
                            <thead>
                                <th>Title</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="table-text">
                                        <label>Old Name</label>
                                        <div>{{ $title->name }}</div>
                                    </td>

                                    <!-- Publisher Delete Button -->
                                    <td>
                                        <form action="{{ url('title/update/'.$title->id).'/name/'.$title->name }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}



                                            <label>New Name</label>
                                            <input type="text" name="name" id="title-name" class="form-control" value="{{ old('title') }}">
                                            <br>

                                            <button type="submit" class="btn btn-info">
                                                <i class="fa fa-btn fa-pencil-square-o"></i>Submit
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
@endsection