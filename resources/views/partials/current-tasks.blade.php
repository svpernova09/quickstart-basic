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
                <th>&nbsp;</th>
                </thead>
                <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td class="table-text"><div>{{ $task->name }}</div></td>
                        <td class="table-text"><div>{{ $task->user->name }}</div></td>

                        <!-- Task Edit Button -->
                        <td>
                            <a href="/task/{{ $task->id }}/edit" class="btn btn-warning">
                                <i class="fa fa-pencil"></i> Edit
                            </a>
                        </td>

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