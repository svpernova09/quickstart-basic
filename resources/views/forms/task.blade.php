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