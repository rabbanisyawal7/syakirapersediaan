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
                        <form action="{{ route('produksi.store') }}" id="form_validation" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="kode_produksi" class="form-label">Kode Produksi</label>
                                <input type="text" id="kode_produksi" name="kode_produksi" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="id_barang" class="form-label">Nama Barang</label>
                                <select class="form-control" name="id_barang" id="id_barang">
                                    <option value="">-- Pilih Nama Barang--</option>
                                    @foreach ($data_barang as $p)
                                        <option value="{{ $p->id_barang }}">{{ $p->nama_barang }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="tgl_produksi" class="form-label">Tanggal Produksi</label>
                                <input type="date" id="tgl_produksi" name="tgl_produksi" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="jumlah_produksi" class="form-label">Jumlah Produksi</label>
                                <input type="number" id="jumlah_produksi" name="jumlah_produksi" class="form-control">
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
