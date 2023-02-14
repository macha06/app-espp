@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">{{ $title }}</h5>
                <div class="card-body">
                    <a href="{{ route( $routePrefix .'.create') }}" class="btn btn-primary mb-3 btn-sm">Tambah data</a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Wali</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>NIS</th>
                                    <th>Alamat</th>
                                    <th>Kelas</th>
                                    <th>Jurusan</th>
                                    <th>Angkatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($models as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->wali->name }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->nisn }}</td>
                                        <td>{{ $item->nis }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->kelas }}</td>
                                        <td>{{ $item->jurusan }}</td>
                                        <td>{{ $item->angkatan }}</td>
                                        <td>
                                            
                                            {!! Form::open([
                                                'route' => [$routePrefix .'.destroy', $item->id],
                                                'method' => 'DELETE',
                                                'onsubmit' => 'return confirm ("Yakin ingin menghapus data ini ?")',
                                            ]) !!}
                                                <a href="{{ route($routePrefix .'.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                                   <i class="fa fa-edit"></i> Edit
                                                </a>
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">data tidak ada</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {!! $models->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection