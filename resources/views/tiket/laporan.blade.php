@php

use App\Models\Pemesan;

@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan Tiket') }}
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
					            <th>Status</th>
					        </tr>
					    </thead>
					    <tbody>
					    	@foreach($tikets as $tiket)
					    	@php
					    	$pemesan = Pemesan::where('id', $tiket->id_pemesan)->first();
					    	$status = 'Belum Check-in';
					    	if($tiket->status == 1) {
					    		$status = 'Check-in';
					    	}
					    	@endphp
					        <tr>
					            <td>{{ $loop->index + 1 }}</td>
					            <td>{{ $pemesan->name }}</td>
					            <td>{{ $pemesan->nik }}</td>
					            <td>{{ $pemesan->email }}</td>
					            <td>{{ $tiket->id_ticket }}</td>
					            <td>
					            	@if($tiket->status == 1)
					            	<span class="btn btn-sm btn-primary">{{ $status }}</span>
					            	@else
					            	<span class="btn btn-sm btn-danger">{{ $status }}</span>
					            	@endif
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