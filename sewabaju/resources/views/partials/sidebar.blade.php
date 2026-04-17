<div class="fixed top-0 left-0 h-full w-[230px] bg-[#192853] text-white flex flex-col shadow-lg">

    <div class="p-5 bg-[#0f1a35] border-b border-yellow-300/20">
        <h2 class="text-yellow-400 font-semibold text-sm">EventiX Admin</h2>
        <p class="text-xs text-white/40">Sistem Manajemen Event</p>
    </div>

    <nav class="flex-1 py-4 text-sm">

        <a href="/" class="flex items-center gap-3 px-5 py-3 {{ request()->is('/') ? 'bg-yellow-400/10 text-yellow-400 border-l-4 border-yellow-400' : 'text-white/60 hover:bg-yellow-400/10 hover:text-white' }}">
            Dashboard
        </a>

        <a href="/pengunjung" class="flex items-center gap-3 px-5 py-3 {{ request()->is('pengunjung') ? 'bg-yellow-400/10 text-yellow-400 border-l-4 border-yellow-400' : 'text-white/60 hover:bg-yellow-400/10 hover:text-white' }}">
            Data Pengunjung
        </a>

    </nav>

</div>