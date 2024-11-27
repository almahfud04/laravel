<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Data Siswa") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">{{ __("Data Siswa") }}</h3>

                    <!-- Form Pencarian Siswa -->
                    <div class="mb-4">
                        <form action="{{ route('dashboard') }}" method="GET">
                            <input type="text" name="search" placeholder="Cari nama siswa..." 
                                   class="px-4 py-2 border rounded-md" value="{{ request('search') }}">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                                Cari
                            </button>
                        </form>
                    </div>

                    <!-- Button untuk Tambah Siswa -->
                    <div class="mb-4">
                        <a href="{{ route('siswa.create') }}" class="bg-blue-500 text-black px-4 py-2 rounded-md">
                            Tambah Siswa
                        </a>
                    </div>

                    <!-- Tabel data siswa -->
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600">Foto</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600">Nama</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600">Kelas</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600">Umur</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600">Alamat</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600">Email</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $item)
                                <tr>
                                    <!-- Kolom Foto -->
                                    <td class="px-6 py-4 border-b border-gray-300 text-sm">
                                        @if ($item->foto)
                                            <img src=" {{ asset('storage/fotos/' . $item->foto) }}" alt="Foto {{ $item->nama }}" class="w-16 h-16 rounded-full">
                                        @else
                                            <span class="text-gray-500">Tidak ada foto</span>
                                        @endif
                                    </td>

                                    <!-- Kolom Nama -->
                                    <td class="px-6 py-4 border-b border-gray-300 text-sm">{{ $item->nama }}</td>

                                    <!-- Kolom Kelas -->
                                    <td class="px-6 py-4 border-b border-gray-300 text-sm">{{ $item->kelas }}</td>

                                    <!-- Kolom Umur -->
                                    <td class="px-6 py-4 border-b border-gray-300 text-sm">{{ $item->umur }}</td>

                                    <!-- Kolom Alamat -->
                                    <td class="px-6 py-4 border-b border-gray-300 text-sm">{{ $item->alamat }}</td>

                                    <!-- Kolom Email -->
                                    <td class="px-6 py-4 border-b border-gray-300 text-sm">{{ $item->email }}</td>

                                    <!-- Kolom Aksi -->
                                    <td class="px-6 py-4 border-b border-gray-300 text-sm">
                                        <a href="{{ route('siswa.edit', $item->id) }}" class="text-blue-500 mr-2">Edit</a>
                                        <form action="{{ route('siswa.destroy', $item->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500">Hapus</button>
                                        </form>
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
