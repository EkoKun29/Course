<div class="modal modal-blur fade" id="modal-edit-{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Harga</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('harga-course.update', $d->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                <div class="mb-3">
                        <label class="form-label">Jenis Bahasa</label>
                            <select name="bahasa" class="form-control" id="bahasa" value="{{ $d->jenis_bahasa }}">
                                <option disabled selected>Pilih Bahasa</option>
                                <option value="https://img.icons8.com/dusk/64/php-logo.png">PHP</option>
                                <option value="https://img.icons8.com/color/48/javascript--v1.png">JAVASCRIPT</option>
                                <option value="https://img.icons8.com/color/48/html-5--v1.png">HTML</option>
                                <option value="https://img.icons8.com/color/48/vue-js.png">VUE</option>
                            </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" name="example-text-input"
                            placeholder="Nama" required value="{{ $d->nama_courses }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="number" name="harga" class="form-control" name="example-text-input"
                            placeholder="Harga" required value="{{ $d->hargas }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-danger ms-auto">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
