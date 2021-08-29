<div>
    @include('admin.advertises.add')
    @include('admin.advertises.edit')
    @include('admin.advertises.delete')
    @include('admin.advertises.edit_image')
        <div class="card-header">
            <h4 class="card-title">Quảng cáo</h4>
            <button data-toggle="modal" data-target="#createModal" class="btn btn-sm btn-primary">
                Thêm mới
            </button>
        </div>
        <div class="card-body" wire:ignore>
            <div class="table-responsive recentOrderTable">
                <table id="example" class="display" style="min-width: 1500px">
                    <thead>
                    <tr >
                        <th scope="col">STT.</th>
                        <th scope="col">Tên quảng cáo</th>
                        <th scope="col">Tên nhà tài trợ</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Chỉnh sửa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 0 @endphp
                    @foreach($all_ad as $ad)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $ad->name }}</td>
                            <td>{{ $ad->company_name }}</td>
                            <td>
                                <img src="https://cf.shopee.vn/file/e99560eba58aacfaaa821bd029e43c52_xxhdpi" style="border-radius: 5px !important; width: 1050px; height: 150px" alt="">
                            </td>
                            <td>
                                <button data-toggle="modal"
                                        data-target="#editModal"
                                        wire:click="edit({{ $ad->id }})"
                                        class="btn btn-sm btn-primary">
                                    <i class="la la-pencil"></i>
                                </button>
                                <button data-toggle="modal" data-target="#editImage"
                                        wire:click="edit({{ $ad->id }})"
                                        class="btn btn-sm btn-primary">
                                    <i class="la la-image"></i>
                                </button>
                                <button wire:click="edit({{ $ad->id }})"
                                        data-toggle="modal" data-target="#deleteModal"
                                        class="btn btn-sm btn-danger">
                                    <i class="la la-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>


