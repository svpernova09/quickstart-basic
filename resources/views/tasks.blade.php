@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					New Task
				</div>

				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')

					@include('forms.task')
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					New User
				</div>

				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')

					@include('forms.user')
				</div>
			</div>

			@include('partials.current-tasks')

			@include('partials.current-users')
		</div>
	</div>
@endsection
