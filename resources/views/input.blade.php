@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto">
        
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-3xl font-semibold text-gray-800">Input Data Hari Ini</h2>
                <p class="text-gray-600">Tambah aktivitas lalu lintas dan kelola petugas shift</p>
            </div>
            <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-gray-700">← Kembali ke Dashboard</a>
        </div>

        <!-- 1. Data Penghuni -->
        <div class="card p-8 mb-8">
            <h3 class="text-xl font-semibold mb-6">🏠 Data Penghuni</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Kapasitas</label>
                    <input type="number" class="w-full px-5 py-3 border border-gray-300 rounded-2xl" value="0">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Isi Saat Ini</label>
                    <input type="number" class="w-full px-5 py-3 border border-gray-300 rounded-2xl" value="0">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Dalam Lapas</label>
                    <input type="number" class="w-full px-5 py-3 border border-gray-300 rounded-2xl" value="0">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Luar Lapas</label>
                    <input type="number" class="w-full px-5 py-3 border border-gray-300 rounded-2xl" value="0">
                </div>
            </div>
        </div>

        <!-- 2. Petugas Jaga (Sesuai Konsep Kamu) -->
        <div class="card p-8 mb-8">
            <h3 class="text-xl font-semibold mb-6">👮 Petugas Jaga</h3>
            
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-600 mb-2">Pilih Rupam</label>
                <select id="rupam-select" class="w-full md:w-1/3 px-5 py-3 border border-gray-300 rounded-2xl focus:border-[#07044f]">
                    <option value="">Pilih Rupam</option>
                    <option value="Rupam 1">Rupam 1</option>
                    <option value="Rupam 2">Rupam 2</option>
                    <option value="Rupam 3">Rupam 3</option>
                    <option value="Rupam 4">Rupam 4</option>
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Karupam -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-2">Karupam</label>
                    <input type="text" id="karupam" placeholder="Nama Karupam" 
                           class="w-full px-5 py-3 border border-gray-300 rounded-2xl">
                </div>
                <!-- Wakarupam -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-2">Wakarupam</label>
                    <input type="text" id="wakarupam" placeholder="Nama Wakarupam" 
                           class="w-full px-5 py-3 border border-gray-300 rounded-2xl">
                </div>
            </div>

            <!-- Petugas P2U -->
            <div class="mt-8">
                <label class="block text-sm font-medium text-gray-600 mb-3">Petugas P2U</label>
                <div id="petugas-p2u-container" class="space-y-3">
                    <!-- Baris petugas akan ditambah di sini -->
                </div>
                <button onclick="addPetugasP2U()" 
                        class="mt-4 px-5 py-2 text-sm bg-gray-100 hover:bg-gray-200 rounded-2xl">
                    + Tambah Petugas P2U
                </button>
            </div>
        </div>

        <!-- 3. Data Lalu Lintas -->
        <div class="card p-8">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-semibold">🚶 Data Lalu Lintas</h3>
                <button onclick="addActivityRow()" class="px-6 py-3 bg-[#07044f] text-white rounded-2xl hover:bg-[#03022a]">
                    + Tambah Aktivitas
                </button>
            </div>
            <div id="activity-container" class="space-y-4"></div>
        </div>

        <!-- Tombol Simpan -->
        <div class="flex justify-end gap-4 pt-10">
            <a href="{{ route('dashboard') }}" class="px-8 py-3.5 text-gray-600 hover:bg-gray-100 rounded-3xl">Batal</a>
            <button onclick="alert('Fitur Simpan akan dibuat di Langkah 8')" 
                    class="px-10 py-3.5 bg-[#07044f] text-white rounded-3xl font-semibold shadow-lg">
                💾 Simpan Semua Data
            </button>
        </div>

    </div>

    <script>
        // Tambah Petugas P2U
        function addPetugasP2U() {
            const container = document.getElementById('petugas-p2u-container');
            const div = document.createElement('div');
            div.className = "flex gap-3";
            div.innerHTML = `
                <input type="text" placeholder="Nama Petugas P2U" 
                       class="flex-1 px-5 py-3 border border-gray-300 rounded-2xl">
                <button onclick="this.parentElement.remove()" 
                        class="px-5 text-red-600 hover:text-red-700">Hapus</button>
            `;
            container.appendChild(div);
        }

        // Tambah Aktivitas Lalu Lintas
        function addActivityRow() {
            const container = document.getElementById('activity-container');
            const div = document.createElement('div');
            div.className = 'border border-gray-200 rounded-2xl p-6 bg-white';
            div.innerHTML = `
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <input type="text" placeholder="Uraian Aktivitas" class="px-4 py-3 border border-gray-300 rounded-xl">
                    <input type="number" placeholder="Jumlah" value="1" class="px-4 py-3 border border-gray-300 rounded-xl">
                    <input type="time" class="px-4 py-3 border border-gray-300 rounded-xl">
                </div>
                <button onclick="this.parentElement.remove()" class="mt-4 text-red-600 hover:text-red-700 text-sm">🗑 Hapus</button>
            `;
            container.appendChild(div);
        }
    </script>
@endsection