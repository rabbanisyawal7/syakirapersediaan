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
                        <form action="{{ route('stok.store') }}" id="form_validation" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="barang_id" class="form-label">Nama Barang</label>
                                <select class="form-control form-control-solid" name="barang_id" id="barang_id">
                                    <option value="">-- Pilih Barang --</option>
                                    @foreach ($data as $p)
                                        <option value="{{ $p->id_barang }}">{{ $p->nama_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="stok_keluar" class="form-label">Stok Keluar</label>
                                <input type="number" id="stok_keluar" class="form-control" name="stok_keluar">
                            </div>
                            <button types="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                        </form>
                    </div>
                    <!-- end row-->

                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div>
    <!-- end row -->
</x-app-layout>
