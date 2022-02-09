@extends('welcome')

@section('content')
<form action="{{ route('pengguna.store') }}" method="POST">
    @csrf
    <label for="nama">Nama Pengguna</label>
    <input type="text" name="nama" class="form-control" required>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
<hr>
@foreach ($pengguna as $item)
{{ $item->nama }} dengan jumlah buku {{ $item->buku->count() }}<br>
<form action="{{ route('pengguna.destroy', $item->id) }}" method="POST">
    @csrf
    @method('delete')
    <button type="submit">Hapus</button>
</form>
@endforeach
@endsection
