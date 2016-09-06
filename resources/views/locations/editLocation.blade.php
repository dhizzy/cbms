@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Location
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped publisher-table">
                            <thead>
                                <th>Volume</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            
                            @foreach ($locations as $location)
                                <tr>
                                    <td class="table-text"><div>{{ $location->name }}</div></td>

                                    <!-- Publisher Delete Button -->
                                    <td>
                                        <form action="{{ url('location/update/' . $location->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}

                                            <label>Old Volume Number</label>
                                            <p>{{ $titleVolume->volume }}</p>

                                            <label>New Volume Number</label>
                                            <input type="number" name="volumeNumber" min = '1' id="volume-name" class="form-control" value="{{ old('volume') }}">
                                            <br>

                                            <button type="submit" class="btn btn-info">
                                                <i class="fa fa-btn fa-pencil-square-o"></i>Submit
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
@endsection