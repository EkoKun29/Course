<div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Input Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('courses.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Jenis Bahasa</label>
                        <select name="bahasa" class="form-control" id="bahasa" >
                            <option disabled selected>Pilih Bahasa</option>
                            <option value="https://img.icons8.com/dusk/64/php-logo.png">PHP</option>
                            <option value="https://img.icons8.com/color/48/javascript--v1.png">JAVASCRIPT</option>
                            <option value="https://img.icons8.com/color/48/html-5--v1.png">HTML</option>
                            <option value="https://img.icons8.com/color/48/vue-js.png">VUE</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Nama Course</label>
                        <select id="namaModal" class="js-example-basic-single form-control" name="course">
                            <option value="">Pilih Nama Course</option>
                            @foreach($harga as $course)
                                <option value="{{ $course->nama_courses }}">{{ $course->nama_courses }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">Harga</label>
                        <input type="text" class="form-control" name="harga" id="hargaModal" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kelas</label>
                        <select name="kelas" class="form-control" id="kelas" >
                            <option disabled selected>Pilih Kelas</option>
                            <option value="Pagi (08.00-10.00)">Pagi (08.00-10.00)</option>
                            <option value="Sore (15.00-17.00)">Sore (15.00-17.00)</option>
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


<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Objek yang berisi harga barang dari skrip sebelumnya
        var hargaBarang = {!! json_encode($harga->pluck('hargas', 'nama_courses')->all()) !!};

        // Fungsi untuk memperbarui harga saat memilih barang di dalam modal
        function updateHargaModal() {
            var select = document.getElementById("namaModal"); // Ambil elemen select di dalam modal
            var hargaInput = document.getElementById("hargaModal"); // Ambil input harga di dalam modal
            var selectedOption = select.options[select.selectedIndex]; // Ambil opsi yang dipilih
            var namaBarang = selectedOption.value; // Ambil nilai opsi yang dipilih
            var harga = hargaBarang[namaBarang]; // Ambil harga barang sesuai dengan nama barang yang dipilih

            hargaInput.value = harga; // Set nilai input harga dengan harga yang dipilih
        }

        // Tambahkan event listener ke elemen select di dalam modal
        document.getElementById("namaModal").addEventListener("change", updateHargaModal);

        // Reset harga saat modal ditutup
        $('#modal-report').on('hidden.bs.modal', function () {
            document.getElementById("hargaModal").value = ''; // Set nilai input harga kosong saat modal ditutup
        });
    });
</script>
