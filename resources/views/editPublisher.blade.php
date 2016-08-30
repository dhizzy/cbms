@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <!-- Selected Publisher to Edit -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Publisher
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped publisher-table">
                            <thead>
                                <th>Publisher</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="table-text"><div>{{ $publisher->name }}</div></td>

                                    <!-- Publisher Delete Button -->
                                    <td>
                                        <form action="{{ url('publisher/update/'.$publisher->id).'/name/'.$publisher->name }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}

                                            <label>Old Name</label>
                                            <p>{{ $publisher->name }}</p>

                                            <label>New Name</label>
                                            <input type="text" name="name" id="publisher-name" class="form-control" value="{{ old('publisher') }}">
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