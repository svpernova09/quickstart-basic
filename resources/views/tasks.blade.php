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

					<!-- New Task Form -->
					<form action="/task" method="POST" class="form-horizontal">
						{{ csrf_field() }}

						<!-- Task Name -->
						<div class="form-group">
							<label for="task-name" class="col-sm-3 control-label">Task</label>

							<div class="col-sm-6">
								<input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
							</div>
						</div>

						<!-- Task User -->
						<div class="form-group">
							<label for="task-user_id" style="float:left;padding: 6px 12px 2px 70px;">Assign to User</label>

							<div class="col-sm-6">
								<select name="user_id" id="task-user_id" class="form-control">
									@foreach ($users as $user)
										<option value="{{ $user->id }}">{{ $user->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<!-- Add Task Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-plus"></i>Add Task
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					New User
				</div>

				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')

							<!-- New User Form -->
					<form action="/user" method="POST" class="form-horizontal">
						{{ csrf_field() }}

						<!-- User Name -->
						<div class="form-group">
							<label for="user-name" class="col-sm-3 control-label">User Name</label>

							<div class="col-sm-6">
								<input type="text" name="name" id="user-name" class="form-control" value="{{ old('user') }}">
							</div>
						</div>

						<!-- User Name -->
						<div class="form-group">
							<label for="user-name" class="col-sm-3 control-label">User Email</label>

							<div class="col-sm-6">
								<input type="text" name="email" id="user-email" class="form-control" value="{{ old('email') }}">
							</div>
						</div>

						<!-- Add User Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-plus"></i>Add User
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<!-- Current Tasks -->
			@if (count($tasks) > 0)
				<div class="panel panel-default">
					<div class="panel-heading">
						Current Tasks
					</div>

					<div class="panel-body">
						<table class="table table-striped task-table">
							<thead>
								<th>Task</th>
								<th>Assigned To</th>
								<th>&nbsp;</th>
							</thead>
							<tbody>
								@foreach ($tasks as $task)
									<tr>
										<td class="table-text"><div>{{ $task->name }}</div></td>
										<td class="table-text"><div>{{ $task->user->name }}</div></td>

										<!-- Task Delete Button -->
										<td>
											<form action="/task/{{ $task->id }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}

												<button type="submit" class="btn btn-danger">
													<i class="fa fa-trash"></i>Delete
												</button>
											</form>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif
					<!-- Current Users -->
				@if (count($users) > 0)
					<div class="panel panel-default">
						<div class="panel-heading">
							Current Users
						</div>

						<div class="panel-body">
							<table class="table table-striped user-table">
								<thead>
								<th>Name</th>
								<th>Email</th>
								<th>Tasks Assigned</th>
								<th>&nbsp;</th>
								</thead>
								<tbody>
								@foreach ($users as $user)
									<tr>
										<td class="table-text"><div>{{ $user->name }}</div></td>
										<td class="table-text"><div>{{ $user->email }}</div></td>
										<td class="table-text"><div>{{ count($user->tasks) }}</div></td>

										<!-- User Delete Button -->
										<td>
											<form action="/user/{{ $user->id }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}

												<button type="submit" class="btn btn-danger">
													<i class="fa fa-trash"></i>Delete
												</button>
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
