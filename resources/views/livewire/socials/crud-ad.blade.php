<div>
    @include('admin.socials.edit')
    <div class="card-header">
        <h4 class="card-title">Thông tin liên lạc </h4>
        <button data-toggle="modal" data-target="#createModal" class="btn btn-sm btn-primary">
            Thêm mới
        </button>
    </div>
    <div class="card-body" wire:ignore>
        <div class="table-responsive recentOrderTable">
            <table id="example" class="display" style="min-width: 865px">
                <thead>
                <tr >
                    <th style="font-size: 15px;" >STT</th>
                    <th style="font-size: 15px;" class="text-center">Tên mạng xã hội</th>
                    <th style="font-size: 15px;">Tên nhà tài trợ</th>
                    <th style="font-size: 15px;">Chỉnh sửa</th>
                </tr>
                </thead>
                <tbody>
                @php $i = 0 @endphp
                @foreach($all_social as $ad)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-primary">
                                <i class="mdi fs-16 text-white {{ $ad->name_social }}"></i>
                            </button>
                        </td>
                        <td>{{ $ad->url }}</td>
                        <td>
                            <button data-toggle="modal" data-target="#editModal" wire:click="edit({{ $ad->id }})" class="btn btn-sm btn-primary">
                                <i class="la la-pencil"></i>
                            </button>
                            <button wire:click="edit({{ $ad->id }})"  data-toggle="modal" data-target="#deleteModal" class="btn btn-sm btn-danger">
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


