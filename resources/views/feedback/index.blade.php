@extends('layouts.app')

@section('content')
    <h1>Daftar Feedback Masyarakat</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('feedback.create') }}" class="btn btn-primary mb-3">Tambah Feedback</a>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pengusul</th>
                <th>Kategori</th>
                <th>Pesan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($feedbacks as $feedback)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $feedback->nama_pengusul }}</td>
                    <td>{{ $feedback->kategori }}</td>
                    <td>{{ Str::limit($feedback->pesan, 50) }}</td> 
                    <td>{{ $feedback->status }}</td>
                    <td>
                        <a href="{{ route('feedback.show', $feedback->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('feedback.edit', $feedback->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus feedback ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection