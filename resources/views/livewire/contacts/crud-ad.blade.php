<div>
    @include('admin.contacts.edit')
    @include('admin.contacts.edit_image')
    <div class="card-body d-flex flex-wrap">
        <div class="col-md-5">
            <img src="{{ asset( $contact->logo) }}"
                 style="max-width: 100%" alt="">
        </div>
        <div class="col-md-7 text-center">
            <h3 class="text-uppercase font-weight-bold">Thông tin {{ $contact->name_website }}</h3>
            <div class="text-left pt-4">
                <h4 class="font-weight-bold">Mô tả website</h4>
                <p style="text-indent: 40px"> {{ $contact->description }}</p>
                <h4 class="font-weight-bold">Số điện thoại: <span class="text-dark">{{ $contact->number_phone }}</span></h4>
            </div>
            <div class="flex-wrap d-flex justify-content-end" style="margin-top: 150px">
                <button data-toggle="modal"
                        wire:click="edit({{ $contact->id }})"
                        data-target="#editModal"
                        class="btn btn-primary mr-2">
                    Chỉnh sửa thông tin
                </button>
                <button data-toggle="modal"
                        wire:click="edit({{ $contact->id }})"
                        data-target="#editImage"
                        class="btn btn-primary">
                    Cập nhập logo
                </button>
            </div>
        </div>
    </div>
</div>
