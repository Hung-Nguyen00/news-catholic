<div>
    @include('admin.users.delete_user')
    <table  id="example" class="display" style="min-width: 845px">
        <thead>
        <tr >
            <th>ID</th>
            <th>Tên</th>
            <th>Tên tài khoản</th>
            <th>Số lượng bài viết</th>
            <th>Phân quyền</th>
            <td>Xóa</td>
        </tr>
        </thead>
        <tbody>
        @if($users->count() > 0)
            @php $i = 0 @endphp
            @foreach($users as $user)
                <tr wire:ignore>
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email}}</td>
                    <td>{{ $user->posts->count() }}</td>
                    <td>
                        <select name="role_id" wire:change="changeRole($event.target.value, {{ $user->id }})" class="form-control">
                            @foreach($roles as $role)
                                <option {{ $role->id == $user->role_id ? 'selected' : ''}} value="{{ $role->id }}"> {{ $role->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <button data-toggle="modal" wire:click="edit({{ $user->id }})" data-target="#deleteModal" class="btn btn-danger">&times;</button>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>



</div>