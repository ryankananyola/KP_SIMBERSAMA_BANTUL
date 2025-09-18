@extends('layouts.layout_petugas')

@section('content')
<div class="container mt-4">
    <div class="card p-4">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('petugas.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-bold">Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">No. HP / WA</label>
                <input type="text" class="form-control" name="nomor_wa" value="{{ old('nomor_wa', $user->nomor_wa) }}">
            </div>

            <div class="text-center">
                <button type="submit" class="btn" style="background:#256d5a; color:white;">
                    SIMPAN
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function previewFoto(event) {
    const input = event.target;
    const reader = new FileReader();

    reader.onload = function(){
        const img = document.getElementById('previewImage');
        img.src = reader.result;
    }

    if(input.files[0]){
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
