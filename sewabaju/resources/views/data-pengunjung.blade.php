@extends('layouts.app')

@section('content')

<div class="ml-[230px] p-8">

    <!-- TITLE -->
    <h1 class="text-[20px] font-semibold mb-6 text-[#192853]">
        Data Pengunjung
    </h1>

    <!-- FILTER -->
    <div class="bg-white px-5 py-4 rounded-xl border border-[#c8dff5] shadow-[0_2px_12px_rgba(25,40,83,0.08)] mb-5 flex items-center gap-3">

        <!-- SEARCH -->
        <input id="search" type="text" placeholder="Cari pengunjung..."
            class="px-4 py-[9px] text-[13px] rounded-lg border border-[#c8dff5] focus:outline-none focus:ring-2 focus:ring-yellow-300 w-[220px]">

        <!-- CUSTOM DROPDOWN -->
        <div class="relative w-[170px]">
            <div onclick="toggleDropdown('kategoriDropdown')"
                class="px-4 py-[9px] text-[13px] bg-white border border-[#c8dff5] rounded-lg cursor-pointer flex justify-between items-center">
                <span id="kategoriLabel">Kategori</span>
                <span class="text-xs">▼</span>
            </div>

            <div id="kategoriDropdown"
                class="hidden absolute top-[110%] w-full bg-white border border-[#c8dff5] rounded-lg shadow-md overflow-hidden z-50">

                <div onclick="selectKategori('')" class="px-4 py-2 text-sm hover:bg-[#EFF8FF] cursor-pointer">Semua</div>
                <div onclick="selectKategori('Seminar')" class="px-4 py-2 text-sm hover:bg-[#EFF8FF] cursor-pointer">Seminar</div>
                <div onclick="selectKategori('Workshop')" class="px-4 py-2 text-sm hover:bg-[#EFF8FF] cursor-pointer">Workshop</div>
                <div onclick="selectKategori('Pameran')" class="px-4 py-2 text-sm hover:bg-[#EFF8FF] cursor-pointer">Pameran</div>

            </div>
        </div>

        <div class="relative w-[200px]">
            <div onclick="toggleDropdown('eventDropdown')"
                class="px-4 py-[9px] text-[13px] bg-white border border-[#c8dff5] rounded-lg cursor-pointer flex justify-between items-center">
                <span id="eventLabel">Event</span>
                <span class="text-xs">▼</span>
            </div>

            <div id="eventDropdown"
                class="hidden absolute top-[110%] w-full bg-white border border-[#c8dff5] rounded-lg shadow-md overflow-hidden z-50">

                <div onclick="selectEvent('')" class="px-4 py-2 text-sm hover:bg-[#EFF8FF] cursor-pointer">Semua</div>
                <div onclick="selectEvent('Seminar Kewirausahaan')" class="px-4 py-2 text-sm hover:bg-[#EFF8FF] cursor-pointer">Seminar Kewirausahaan</div>
                <div onclick="selectEvent('Workshop UI/UX Design')" class="px-4 py-2 text-sm hover:bg-[#EFF8FF] cursor-pointer">Workshop UI/UX Design</div>
                <div onclick="selectEvent('Pameran Teknologi')" class="px-4 py-2 text-sm hover:bg-[#EFF8FF] cursor-pointer">Pameran Teknologi</div>

            </div>
        </div>

    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-xl border border-[#c8dff5] shadow-[0_2px_12px_rgba(25,40,83,0.08)] overflow-hidden">

        <table class="w-full text-[13px]">

            <thead class="bg-[#f5f9ff] text-[#8da4bf] font-medium">
                <tr>
                    <th class="px-5 py-3 text-left">No</th>
                    <th class="px-5 py-3 text-left">Nama</th>
                    <th class="px-5 py-3 text-left">Email</th>
                    <th class="px-5 py-3 text-left">NIM</th>
                    <th class="px-5 py-3 text-left">Event</th>
                </tr>
            </thead>

            <tbody id="tableBody">
                @php $no = 1; @endphp
                @foreach ($data as $d)
                <tr class="border-t border-[#eef3f9] hover:bg-[#EFF8FF] transition"
                    data-kategori="{{ $d['kategori'] }}"
                    data-event="{{ $d['event'] }}">

                    <td class="px-5 py-[13px] font-medium">{{ $no++ }}</td>
                    <td class="px-5 py-[13px]">{{ $d['nama'] }}</td>
                    <td class="px-5 py-[13px] text-[#6b7c93]">{{ $d['email'] }}</td>
                    <td class="px-5 py-[13px]">{{ $d['nim'] }}</td>
                    <td class="px-5 py-[13px]">
                        <span class="bg-yellow-200/70 text-[11px] px-3 py-[5px] rounded-full font-medium">
                            {{ $d['event'] }}
                        </span>
                    </td>

                </tr>
                @endforeach
            </tbody>

        </table>

    </div>

</div>

<!-- SCRIPT -->
<script>
let kategori = "";
let event = "";
let search = "";

// dropdown toggle
function toggleDropdown(id){
    document.querySelectorAll('[id$="Dropdown"]').forEach(d=>{
        if(d.id !== id) d.classList.add('hidden');
    });
    document.getElementById(id).classList.toggle('hidden');
}

// select kategori
function selectKategori(val){
    kategori = val;
    document.getElementById('kategoriLabel').innerText = val || 'Kategori';
    document.getElementById('kategoriDropdown').classList.add('hidden');
    filter();
}

// select event
function selectEvent(val){
    event = val;
    document.getElementById('eventLabel').innerText = val || 'Event';
    document.getElementById('eventDropdown').classList.add('hidden');
    filter();
}

// search
document.getElementById('search').onkeyup = function(e){
    search = e.target.value.toLowerCase();
    filter();
}

// filter logic
function filter(){
    document.querySelectorAll('#tableBody tr').forEach(row=>{
        let nama = row.children[1].innerText.toLowerCase();
        let kategoriRow = row.dataset.kategori;
        let eventRow = row.dataset.event;

        let show =
            (kategori=="" || kategori==kategoriRow) &&
            (event=="" || event==eventRow) &&
            nama.includes(search);

        row.style.display = show ? "" : "none";
    });
}

// close dropdown klik luar
window.addEventListener('click', function(e){
    if(!e.target.closest('.relative')){
        document.querySelectorAll('[id$="Dropdown"]').forEach(d=>{
            d.classList.add('hidden');
        });
    }
});
</script>

@endsection