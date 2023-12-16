<x-app-layout>
<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        

                                        <div class="row">
                                            <div class="col-lg-6">
                                            <form action="{{ route('barang.store') }}" id="form_validation" method="POST">
                                                @csrf
                                                    <div class="mb-3">
                                                        <label for="Id" class="form-label">Id</label>
                                                        <input type="text" id="id" class="form-control">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="kode_barang" class="form-label">Kode Barang</label>
                                                        <input type="text" id="kode_barang" class="form-control">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="nama_barang" class="form-label">Nama Barang</label>
                                                        <input type="text" id="nama_barang" class="form-control">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="harga_barang" class="form-label">Harga Barang</label>
                                                        <input type="text" id="harga_barang" class="form-control">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="jenis_barang" class="form-label">Jenis Barang</label>
                                                        <input type="text" id="jenis_barang" class="form-control">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
        
                                                </form>
                                            </div> <!-- end col -->
        
                                                </form>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row-->

                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->
</x-app-layout>