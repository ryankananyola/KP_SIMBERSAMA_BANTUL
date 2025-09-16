@extends('layouts.layout_user')

@section('content')
<div class="container mt-4">
    <div class="card p-4">

        <div class="text-center mb-4">
            <img id="previewImage"
                 src="{{ $user->foto ? asset('storage/' . $user->foto) : asset('assets/images/default-profile.png') }}"
                 alt="Foto Profil"
                 class="rounded-circle mb-3"
                 style="width:120px; height:120px; object-fit:cover;">

            <h5 class="mt-2">{{ $user->username ?? '-' }}</h5>
            <p class="text-muted">{{ $user->nama ?? '-' }}</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('user.update_profile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-bold">Alamat Lengkap</label>
                <p class="form-control-plaintext">
                    {{ collect([
                        $user->alamat,
                        optional($user->padukuhan)->nama,
                        optional($user->kelurahan)->nama,
                        optional($user->kapanewon)->nama,
                        "Bantul",
                        "DI Yogyakarta",
                    ])->filter()->implode(', ') }}
                </p>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">No. HP / WA</label>
                <input type="text" class="form-control" name="nomor_wa" value="{{ old('nomor_wa', $user->nomor_wa) }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Foto Profil</label>
                <input type="file" class="form-control" name="foto" accept="image/*" onchange="previewFoto(event)">
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
