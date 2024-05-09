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
                     <script>
                        var harga = {!! json_encode($harga) !!};

                        function tampilkanHarga() {
                            var select = document.getElementById("nama_course");
                            var hargaInput = document.getElementById("hargas");
                            var selectedValue = select.value;

                            if (selectedValue === "") {
                                hargaInput.value = ""; // Kosongkan nilai jika tidak ada barang yang dipilih
                            } else {
                                // Lakukan pencarian harga berdasarkan nama kursus yang dipilih
                                for (var i = 0; i < harga.length; i++) {
                                    if (harga[i].nama_courses === selectedValue) {
                                        hargaInput.value = harga[i].harga; // Set nilai harga pada input
                                        break;
                                    }
                                }
                            }
                        }
                    </script>

                <div class="form-group">
                    <label class="form-control-label">Nama Course</label>
                    <select id="nama_course" class="js-example-basic-single form-control" name="course" onchange="tampilkanHarga()">
                        <option value="">Pilih Nama Course</option>
                        @foreach($harga as $course)
                            <option value="{{ $course->nama_courses }}">{{ $course->nama_courses }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-control-label">Harga</label>
                    <input type="number" class="form-control" name="harga" id="hargas" readonly>
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

@push('js')
    <Script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
        // RESET FORM INPUT WHEN CREATE MODAL ACTIVE
        $('#createDetailModal').on('show.bs.modal', function() {
            $(this).find('form').trigger('reset');
        })
    </Script>
@endpush

