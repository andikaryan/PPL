<div>
<div class="mb-3">
    <label for="provinsi" class="form-label">Provinsi</label>
    <select class="form-select" wire:model="provinsi" name="province_id" id="provinsi">  
        <option >Pilih Provinsi</option>
        @foreach ($provinces as $prov)
        <option value="{{ $prov->id }}">{{ $prov->name }}</option>
        @endforeach
    </select> 
    @error('provinsi')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>

  @if(count($kabupatens) >  0)
  <div class="mb-3">
    <label for="kabupaten" class="form-label">kabupaten</label>
    <select class="form-select" wire:model="kabupaten" name="regency_id" id="kabupaten">  
        <option >Pilih kabupaten</option>
        @foreach ($kabupatens as $kab)
        <option value="{{ $kab->id }}">{{ $kab->name }}</option>
    
        @endforeach
    </select>
    @error('kabupaten')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  @endif
  @if(count($kecamatans) >  0)
  <div class="mb-3">
    <label for="kecamatan" class="form-label">kecamatan</label>
    <select class="form-select" wire:model="kecamatan" name="district_id" id="kecamatan">  
        <option >Pilih kecamatan</option>
        @foreach ($kecamatans as $kec)
        <option value="{{ $kec->id }}">{{ $kec->name }}</option>
    
        @endforeach
    </select>
    @error('kecamatan')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  @endif

  @if(count($desas) >  0)
  <div class="mb-3">
    <label for="desa" class="form-label">desa</label>
    <select class="form-select"  name="village_id" id="desa">  
        <option >Pilih desa</option>
        @foreach ($desas as $des)
        <option value="{{ $des->id }}">{{ $des->name }}</option>
    
        @endforeach
    </select>
    @error('desa')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  @endif
</div>