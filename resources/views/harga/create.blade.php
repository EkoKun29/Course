<div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('harga-course.store') }}" method="POST">
              @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Kelas</label>
                        <input type="text" name="nama" class="form-control" name="example-text-input"
                            placeholder="Nama" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="number" name="harga" class="form-control" name="example-text-input"
                            placeholder="harga" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Bahasa</label>
                            <select name="bahasa" class="form-control" id="bahasa" >
                                <option disabled selected>Pilih Bahasa</option>
                                <option value="php">PHP</option>
                                <option value="">JavaScript</option>
                                <option value="Sore (15.00-17.00)">HTML</option>
                                <option value="vue">VUE</option>
                            </select>
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
