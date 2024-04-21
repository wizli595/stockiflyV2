<form action="{{ route('users.change_roles_permissions', $user) }}" method="POST">
    @csrf
    <h3>Assign Roles:</h3>
    @foreach($roles as $role)
        <div>
            <input type="checkbox" name="roles[]" value="{{ $role->id }}" {{ in_array($role->id, $userRoles) ? 'checked' : '' }}>
            <label>{{ $role->name }}</label>
        </div>
    @endforeach

    <h3>Assign Permissions:</h3>
    <select name="permissions[]" multiple class="form-control">
        @foreach($permissions as $group => $perms) {{-- Assuming $permissions are grouped --}}
            <optgroup label="{{ $group }}">
                @foreach($perms as $permission)
                    <option value="{{ $permission->id }}" {{ in_array($permission->id, $userPermissions) ? 'selected' : '' }}>{{ $permission->name }}</option>
                @endforeach
            </optgroup>
        @endforeach
    </select>

    <button type="submit" class="btn btn-primary mt-2">Update Roles and Permissions</button>
</form>