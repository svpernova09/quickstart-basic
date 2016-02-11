<!-- New User Form -->
<form action="/user/{{ $user->id }}/" method="POST" class="form-horizontal">
    {{ csrf_field() }}

            <!-- User Name -->
    <div class="form-group">
        <label for="user-name" class="col-sm-3 control-label">User Name</label>

        <div class="col-sm-6">
            <input type="text" name="name" id="user-name" class="form-control" value="{{ $user->name }}">
        </div>
    </div>

    <!-- User Name -->
    <div class="form-group">
        <label for="user-name" class="col-sm-3 control-label">User Email</label>

        <div class="col-sm-6">
            <input type="text" name="email" id="user-email" class="form-control" value="{{ $user->email }}">
        </div>
    </div>

    <!-- Add User Button -->
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-default">
                <i class="fa fa-plus"></i> Update User
            </button>
        </div>
    </div>
</form>