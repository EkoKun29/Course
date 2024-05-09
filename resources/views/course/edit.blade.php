<div class="modal modal-blur fade" id="modal-edit-{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('courses.update', $d->id) }}" method="POST">
              @csrf
              @method('PUT')
                <div class="modal-body">
                        <script>
                        var harga = {!! json_encode($harga) !!};

                        function tampilkanHarga() {
                            var select = document.getElementById("nama_barang");
                            var hargaInput = document.getElementById("hargas");
                            var selectedValue = select.value;

                            if (selectedValue === "") {
                            hargaInput.value = ""; // Kosongkan nilai jika tidak ada barang yang dipilih
                            } else {
                            // Lakukan pencarian harga sewa berdasarkan nama barang yang dipilih
                            for (var i = 0; i < harga.length; i++) {
                                if (harga[i].nama_courses === selectedValue) {
                                hargaInput.value = harga[i].hargas; // Set nilai harga pada input
                                break;
                                }
                            }
                            }
                        }
                        </script>

                        <div class="form-group">
                        <label class="form-control-label">Nama Course</label>
                        <select id="nama_barang" class="js-example-basic-single form-control" name="course" onchange="tampilkanHarga()">
                            <option value="">Pilih Nama Barang</option>
                            @foreach($harga as $barang)
                            <option value="{{ $barang->nama_courses }}">{{ $barang->nama_courses }}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                        <label class="form-control-label">Harga</label>
                        <input type="number" class="form-control" name="harga" id="hargas" readonly>
                        </div>
                    <div class="mb-3">
                        <label class="form-label">Kelas</label>
                                    <select name="bank" class="form-control" id="bank" value="{{ $d->kelas }}">
                                        <option disabled selected>Pilih Kelas</option>
                                        <option value="Pagi (08.00-10.00)</">Pagi (08.00-10.00)</option>
                                        <option value="Sore (15.00-17.00)">Sore (15.00-17.00)</</option>
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
