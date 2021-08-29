<div>
    <table class="table verticle-middle table-responsive-md">
        <thead>
        <tr>
            <th scope="col">STT.</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Số bài đã đăng</th>
            <th scope="col">Online</th>
        </tr>
        </thead>
        <tbody>
            @if($users->count() > 0)
                @php $i = 0 @endphp
                @foreach($users as $user)
                    @if(Cache::has('user-is-online-' . $user->id))
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->posts->count() }}</td>
                            <td>
                                <span class="badge badge-rounded badge-primary">Online</span>
                            </td>
                        </tr>
                    @endif
                @endforeach
                @foreach($users as $user)
                    @if(!Cache::has('user-is-online-' . $user->id))
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->posts->count() }}</td>
                            <td>
                                <span class="badge badge-rounded badge-dark">Offline</span>
                            </td>
                        </tr>
                    @endif
                @endforeach
            @endif
        </tbody>
    </table>
</div>
