<div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tạo quảng cáo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form >
                    <div class="form-group">
                        <label >Tên quảng cáo</label>
                        <input type="text"
                               class="form-control"
                               wire:model="name"
                               placeholder="Nhập tên">
                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label >Tên nhà quảng cáo</label>
                        <input type="text"
                               class="form-control"
                               wire:model="company_name"
                               placeholder="Nhập tên nhà quảng cáo">
                        @error('company_name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label >Số điện thoại</label>
                        <input type="text"
                               class="form-control"
                               wire:model="number_phone"
                               placeholder="Nhập số điện thoại">
                        @error('number_phone') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label >Hình ảnh</label>
                        <input type="file"
                               class="form-control"
                               wire:model="image"
                               >
                        @error('image') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary" data-dismiss="modal">Thêm</button>
            </div>
        </div>
    </div>
</div>