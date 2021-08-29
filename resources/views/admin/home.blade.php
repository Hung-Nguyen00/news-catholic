@extends('layouts.st_master')
@section('content')
    <!-- Content body start -->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="widget-stat card bg-primary">
                        <div class="card-body">
                            <div class="media">
                                <span class="mr-3">
                                    <i class="la la-book"></i>
                                </span>
                                <div class="media-body text-white">
                                    <p class="mb-1">Số lượng <br> bài viết</p>
                                    <h5 class="text-white"> {{ $count_post }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="widget-stat card bg-warning">
                        <div class="card-body">
                            <div class="media">
                                <span class="mr-3">
                                    <i class="la la-eye"></i>
                                </span>
                                <div class="media-body text-white">
                                    <p class="mb-1">Số lượng <br> lượt xem</p>
                                    <h5 class="text-white"> {{ $count_view }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="widget-stat card bg-secondary">
                        <div class="card-body">
                            <div class="media">
                                <span class="mr-3">
                                    <i class="la la-home"></i>
                                </span>
                                <div class="media-body text-white">
                                    <p class="mb-1">Số lượng <br> quảng cáo</p>
                                    <h5 class="text-white">{{ $count_advertise }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="widget-stat card bg-danger">
                        <div class="card-body">
                            <div class="media">
                                <span class="mr-3">
                                    <i class="la la-users"></i>
                                </span>
                                <div class="media-body text-white">
                                    <p class="mb-1">Số lượng <br> thành viên </p>
                                    <h5 class="text-white"> {{ $count_user }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tài khoản đang online</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive recentOrderTable">
                                <table  id="example" class="display" style="min-width: 845px">
                                    <thead>
                                    <tr >
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
                                                    <td><span class="badge badge-rounded badge-primary">Online</span></td>
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
                                                    <td><span class="badge badge-rounded badge-dark">Offline</span></td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
    @section('script')
        <script src="{{ URL::to('assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ URL::to('assets/js/plugins-init/datatables.init.js') }}"></script>
    @endsection