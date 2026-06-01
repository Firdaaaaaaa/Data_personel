<x-filament::page>
    <x-filament::card>
        <div class="text-lg font-bold mb-4">Rekap Personel Polsek {{ $polsek->nama }}</div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-sm border">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border p-2">Jumlah Personel</th>
                        <th colspan="2" class="border p-2">DIKTUK</th>
                        <th colspan="2" class="border p-2">DIKBANG / DIKJUR</th>
                        <th colspan="4" class="border p-2">DIKUM TERAKHIR</th>
                    </tr>
                    <tr class="bg-gray-50">
                        <th class="border p-2"></th>
                        <th class="border p-2">SUDAH</th>
                        <th class="border p-2">BELUM</th>
                        <th class="border p-2">SUDAH</th>
                        <th class="border p-2">BELUM</th>
                        <th class="border p-2">SMA/SMK</th>
                        <th class="border p-2">D3</th>
                        <th class="border p-2">S1</th>
                        <th class="border p-2">S2</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <!-- LINK ke DetailPersonelPolsek -->
                        <td class="border p-2">
                            <a href="/admin/detail-personel-polsek?id={{ $polsek->id }}&filter=semua" 
                               class="text-blue-600 font-bold hover:underline">
                                {{ $rekap['jumlah_personel'] }}
                            </a>
                        </td>
                        <td class="border p-2">
                            <a href="/admin/detail-personel-polsek?id={{ $polsek->id }}&filter=diktuk_sudah" 
                               class="text-green-600 font-bold hover:underline">
                                {{ $rekap['diktuk_sudah'] }}
                            </a>
                        </td>
                        <td class="border p-2">
                            <a href="/admin/detail-personel-polsek?id={{ $polsek->id }}&filter=diktuk_belum" 
                               class="text-red-600 font-bold hover:underline">
                                {{ $rekap['diktuk_belum'] }}
                            </a>
                        </td>
                        <td class="border p-2">
                            <a href="/admin/detail-personel-polsek?id={{ $polsek->id }}&filter=dikbang_sudah" 
                               class="text-green-600 font-bold hover:underline">
                                {{ $rekap['dikbang_sudah'] }}
                            </a>
                        </td>
                        <td class="border p-2">
                            <a href="/admin/detail-personel-polsek?id={{ $polsek->id }}&filter=dikbang_belum" 
                               class="text-red-600 font-bold hover:underline">
                                {{ $rekap['dikbang_belum'] }}
                            </a>
                        </td>
                        <td class="border p-2">
                            <a href="/admin/detail-personel-polsek?id={{ $polsek->id }}&filter=smk" 
                               class="text-purple-600 font-bold hover:underline">
                                {{ $rekap['smk'] }}
                            </a>
                        </td>
                        <td class="border p-2">
                            <a href="/admin/detail-personel-polsek?id={{ $polsek->id }}&filter=d3" 
                               class="text-purple-600 font-bold hover:underline">
                                {{ $rekap['d3'] }}
                            </a>
                        </td>
                        <td class="border p-2">
                            <a href="/admin/detail-personel-polsek?id={{ $polsek->id }}&filter=s1" 
                               class="text-purple-600 font-bold hover:underline">
                                {{ $rekap['s1'] }}
                            </a>
                        </td>
                        <td class="border p-2">
                            <a href="/admin/detail-personel-polsek?id={{ $polsek->id }}&filter=s2" 
                               class="text-purple-600 font-bold hover:underline">
                                {{ $rekap['s2'] }}
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </x-filament::card>
</x-filament::page>