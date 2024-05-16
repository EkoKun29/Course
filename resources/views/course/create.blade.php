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
                    <select id="namaModal" class="js-example-basic-single form-control" name="course" onchange="tampilkanHarga()">
                        <option value="">Pilih Nama Course</option>
                        @foreach($harga as $course)
                            <option value="{{ $course->nama_courses }}">{{ $course->nama_courses }}</option>
                        @endforeach
                    </select>
                </div>

                    <div class="form-group">
                        <label class="form-control-label">Harga</label>
                        <input type="number" class="form-control" name="harga" id="hargaModal" readonly>
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
 <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
        // RESET FORM INPUT WHEN CREATE MODAL ACTIVE
        $('#createDetailModal').on('show.bs.modal', function() {
            $(this).find('form').trigger('reset');
        })
    </script>
    <script>
        $(document).ready(function() {
    $('.js-example-basic-single').on('change', function() {
        var selectedBarang = $(this).val();
        var hargaBarang = getHargaByBarangName(selectedBarang);
        $('input[name="harga"]').val(hargaBarang);
    });

    function getHargaByBarangName(barangName) {
        var dataHarga = {!! json_encode($harga->pluck('hargas', 'nama_courses')->all()) !!};
        return dataHarga[barangName] || 0;
    }
});

    </script>
@endpush
