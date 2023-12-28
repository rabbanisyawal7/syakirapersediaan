<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row">
                        <form action="{{ route('barang.update') }}" id="form_validation" method="POST">
                            @csrf
                            <input type="hidden" name="id_barang" id="id_barang" class="form-control"
                                value="{{ $id_barang }}">
                            <div class="mb-3">
                                <label for="kode_barang" class="form-label">Kode Barang</label>
                                <input type="text" id="kode_barang" name="kode_barang" class="form-control"
                                    value="{{ $kode_barang }}">
                            </div>

                            <div class="mb-3">
                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                <input type="text" id="nama_barang" name="nama_barang" class="form-control"
                                    value="{{ $nama_barang }}">
                            </div>

                            <div class="mb-3">
                                <label for="harga_barang" class="form-label">Harga Barang</label>
                                <input type="number" id="harga_barang" name="harga_barang" class="form-control"
                                    value="{{ $harga_barang }}">
                            </div>

                            <div class="mb-3">
                                <label for="jenis_barang" class="form-label">Jenis Barang</label>
                                <input type="text" id="jenis_barang" name="jenis_barang" class="form-control"
                                    value="{{ $jenis_barang }}">
                            </div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>

                        </form>

                        </form>
                    </div>
                    <!-- end row-->

                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div>
    <!-- end row -->
</x-app-layout>
