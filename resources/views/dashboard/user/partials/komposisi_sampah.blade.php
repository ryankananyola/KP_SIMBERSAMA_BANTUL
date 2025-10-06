<h6 class="mt-4">Komposisi Sampah Jenis Organik Berdasarkan Jenis Sumber Sampah</h6>
<div class="row">
    @php
        $organik = [
            'rumah_tangga' => 'Rumah Tangga',
            'pasar' => 'Pasar',
            'kantor' => 'Kantor',
        ];
    @endphp
    @foreach($organik as $key => $label)
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <img src="{{ asset('assets/images/sampah/organik_'.$key.'.jpg') }}" 
                         alt="Organik {{ $label }}" 
                         class="img-fluid mb-3" style="max-height:150px; object-fit:contain;">
                    <h6 class="fw-bold">Sampah Organik : {{ $label }}</h6>
                    <label class="form-label">Quantity (Kg)</label>
                    <input type="number" step="0.01" name="organik_{{ $key }}" class="form-control">
                </div>
            </div>
        </div>
    @endforeach
</div>

<h6 class="mt-4">Komposisi Sampah Jenis Anorganik Berdasarkan Jenis Sumber Sampah</h6>
<div class="row">
    @php
        $anorganik = [
            'rumah_tangga' => 'Rumah Tangga',
            'pasar' => 'Pasar',
            'kantor' => 'Kantor',
        ];
    @endphp
    @foreach($anorganik as $key => $label)
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <img src="{{ asset('assets/images/sampah/anorganik_'.$key.'.jpg') }}" 
                         alt="Anorganik {{ $label }}" 
                         class="img-fluid mb-3" style="max-height:150px; object-fit:contain;">
                    <h6 class="fw-bold">Sampah Anorganik : {{ $label }}</h6>
                    <label class="form-label">Quantity (Kg)</label>
                    <input type="number" step="0.01" name="anorganik_{{ $key }}" class="form-control">
                </div>
            </div>
        </div>
    @endforeach
</div>

<h6 class="mt-4">Komposisi Sampah Jenis B3 Berdasarkan Jenis Sumber Sampah</h6>
<div class="row">
    @php
        $b3 = [
            'rumah_tangga' => 'Rumah Tangga',
            'pasar' => 'Pasar',
            'kantor' => 'Kantor',
        ];
    @endphp
    @foreach($b3 as $key => $label)
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <img src="{{ asset('assets/images/sampah/b3_'.$key.'.jpg') }}" 
                         alt="B3 {{ $label }}" 3
                         class="img-fluid mb-3" style="max-height:150px; object-fit:contain;">
                    <h6 class="fw-bold">Sampah B3 : {{ $label }}</h6>
                    <label class="form-label">Quantity (Kg)</label>
                    <input type="number" step="0.01" name="b3_{{ $key }}" class="form-control">
                </div>
            </div>
        </div>
    @endforeach
</div>
