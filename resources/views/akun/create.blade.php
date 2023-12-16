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
                        <div class="col-lg-6">
                            <form action="{{ route('akun.store') }}" id="form_validation" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="kode_akun" class="form-label">Kode Akun</label>
                                    <input type="text" name="kode_akun" id="kode_akun" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label for="nama_akun" class="form-label">Nama Akun</label>
                                    <input type="text" id="nama_akun" class="form-control" name="nama_akun">
                                </div>
                                <div class="mb-3">
                                    <label for="header_akun" class="form-label">header akun</label>
                                    <input type="text" id="header_akun" class="form-control" name="header_akun">
                                </div>
                                <button types="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
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