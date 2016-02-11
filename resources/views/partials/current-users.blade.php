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
                <th>&nbsp;</th>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="table-text"><div>{{ $user->name }}</div></td>
                        <td class="table-text"><div>{{ $user->email }}</div></td>
                        <td class="table-text"><div>{{ count($user->tasks) }}</div></td>

                        <!-- User Edit Button -->
                        <td>
                            <a href="/user/{{ $user->id }}/edit" class="btn btn-warning">
                                <i class="fa fa-pencil"></i> Edit
                            </a>
                        </td>

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