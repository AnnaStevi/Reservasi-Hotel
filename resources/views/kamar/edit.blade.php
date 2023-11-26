@extends('layouts.admin',['title'=>'Edit Kamar'])

@section('content-header')
<h1 class="m-0"> <i class="fas fa-bed"></i> Kamar </h1>
@endsection

@section('content')
<div class="row">
    <div class="col-6">
     <x-form-edit :action="route('kamar.store')" :upload="true">
     <x-input label="Nama" name="nama_kamar" :value="$row->nama_kamar" />
     @if ($row->foto_kamar)
     <div class="form-group">
        <img src="{{ url('images/kamar/'.$row->foto_kamar) }}" class="img-fluid">
</div>
@endif
        <x-input label="Foto" name="foto_kamar" type="file" keterangan="Foto bertipe : png, jpg, jpeg"/>   
        <x-input label="Jumlah" name="jum_kamar" type="number" :value="$row->jum_kamar"  />
        <x-input label="Harga per Malam" name="harga_kamar" type="number" :value="$row->harga_kamar"  />
        <x-textArea label="Deskripsi" name="deskripsi_kamar" :value="$row->deskripsi_kamar"/>
    </x-form-edit>
</div>
</div>
@endsection