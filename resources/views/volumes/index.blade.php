@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
        	@if (isset($titleName))
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    Add New Volume to {{ $titleName }}
	                </div>

	                <div class="panel-body">
	                    <!-- Display Validation Errors -->
	                    @include('common.errors')

	                    <!-- New Publisher Form -->
	                    <form action="{{ url('volumes')}}" method="POST" class="form-horizontal">
	                        {{ csrf_field() }}

							<input type="hidden" name="titleNumber" id="title-number" class="form-control" value= "{{ $titleId }}" readonly="readonly">

	                        <!-- Title Name -->
	                        <div class="form-group">
	                            <label for="title-name" class="col-sm-3 control-label">Title Name</label>

	                            <div class="col-sm-6">
	                            	<input type="text" name="title" id="title-name" class="form-control" value= "{{ $titleName }}" readonly="readonly">
	                            </div>
	                        </div>

	                        <!-- Volume Number -->
	                        <div class="form-group">
	                            <label for="volume-number" class="col-sm-3 control-label">Volume</label>

	                            <div class="col-sm-6">
	                            	<input type="number" min="1" name="number" id="volume-number" class="form-control" value="{{ old('volumes') }}">
	                            </div>
	                        </div>

	                        <!-- Add Publisher Button -->
	                        <div class="form-group">
	                            <div class="col-sm-offset-3 col-sm-6">
	                                <button type="submit" class="btn btn-default">
	                                    <i class="fa fa-btn fa-plus"></i>Add Volume
	                                </button>
	                            </div>
	                        </div>
	                    </form>
	                </div>
	            </div>
	        @endif


            <!-- Current Publishers -->
            @if (count($titleVolumes) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Volumes
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped volume-table">
                            <thead>
                            	<th>Title</th>
                                <th>Volume</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($titleVolumes as $titleVolume)
                                    <tr>
                                        <td class="table-text">
                                        	<div>
                                        		<a href="{{ url('issues/' . $titleVolume->id) }}">{{ $titleVolume->name }}</a>
                                        	</div>
                                        </td>

                                        <td class="table-text">
                                        	<div>
                                                <a href="{{ url('issues/'.$titleVolume->id) }}">
                                                    {{ $titleVolume->volume }}
                                                </a>
                                        	</div>
                                        </td>

                                        <td>
                                            <form action="{{ url('volumes/'.$titleVolume->volid) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>

                                                <a class="btn btn-info" href="{{ url('volume/edit/'.$titleVolume->volid) }}">
                                                    <i class="fa fa-btn fa-pencil-square-o"></i>Edit Volume
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
            <div>
            	<p>This title has no volumes</p>
            </div>
            @endif
        </div>
    </div>
@endsection