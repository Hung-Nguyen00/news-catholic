<div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chỉnh sửa thông tin liên lạc</h5>
                <button type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Chọn mạng xã hội</label>
                        <select class="form-control" wire:model="name_social">
                            <option value="mdi-facebook">Facebook</option>
                            <option value="mdi-youtube">Youtube</option>
                            <option value="mdi-instagram">Instagram</option>
                            <option value="mdi-twitter">Twitter</option>
                        </select>
                        @error('name_social') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label >Link Url</label>
                        <input type="text"
                               class="form-control"
                               wire:model="url"
                               placeholder="Nhập link liên kết">
                        @error('url') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button"
                        wire:click.prevent="cancel()"
                        class="btn btn-secondary"
                        data-dismiss="modal">Hủy</button>
                <button type="button"
                        wire:click.prevent="update()"
                        class="btn btn-primary">Lưu thay đổi</button>
            </div>
        </div>
    </div>
</div>