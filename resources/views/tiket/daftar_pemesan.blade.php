@php

use App\Models\Pemesan;

@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Pemesan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                	<table id="myTable" class="display">
					    <thead>
					        <tr>
					            <th>No</th>
					            <th>Nama</th>
					            <th>NIK</th>
					            <th>Email</th>
					            <th>ID Tiket</th>
					            <th>Aksi</th>
					        </tr>
					    </thead>
					    <tbody>
					    	@foreach($tikets as $tiket)
					    	@php
					    	$pemesan = Pemesan::where('id', $tiket->id_pemesan)->first();
					    	@endphp
					        <tr>
					            <td>{{ $loop->index + 1 }}</td>
					            <td>{{ $pemesan->name }}</td>
					            <td>{{ $pemesan->nik }}</td>
					            <td>{{ $pemesan->email }}</td>
					            <td>{{ $tiket->id_ticket }}</td>
					            <td>
					            	<a href="{{ route('admin.edit', $tiket->id) }}" class="btn btn-primary">Ubah</a>
					            	<a href="{{ route('admin.destroy', $tiket->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus</a>
					            </td>
					        </tr>
					        @endforeach
					    </tbody>
					</table>
				</div>
            </div>
        </div>
    </div>
</x-app-layout>