<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Table') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <x-success-message /> --}}

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full border-collapse block md:table text-sm text-gray-500">
                    <thead class="block md:table-header-group uppercase">
                        <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                            <th class="bg-gray-100 p-2 text-gray-800 text-xs font-bold md:border md:border-grey-500 text-left block md:table-cell">Name</th>
                            <th class="bg-gray-100 p-2 text-gray-800 text-xs font-bold md:border md:border-grey-500 text-left block md:table-cell">Contact Number</th>
                            <th class="bg-gray-100 p-2 text-gray-800 text-xs font-bold md:border md:border-grey-500 text-left block md:table-cell">Grade or Year Level</th>
                            <th class="bg-gray-100 p-2 text-gray-800 text-xs font-bold md:border md:border-grey-500 text-left block md:table-cell">Date of Selection</th>
                            <th class="bg-gray-100 p-2 text-gray-800 text-xs font-bold md:border md:border-grey-500 text-left block md:table-cell">Interview Date</th>
                            <th class="bg-gray-100 p-2 text-gray-800 text-xs font-bold md:border md:border-grey-500 text-left block md:table-cell">Kawan</th>
                        </tr>
                    </thead>
                    <tbody class="block md:table-row-group">
                        <tr class="bg-white border border-grey-500 md:border-none block md:table-row hover:bg-gray-50">
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell text-base font-semibold text-black uppercase"><span class="inline-block w-1/3 md:hidden font-bold">Name</span>Jamal Rios</td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell uppercase"><span class="inline-block w-1/3 md:hidden font-bold">Contact Number</span>09357145349</td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell uppercase"><span class="inline-block w-1/3 md:hidden font-bold">Grade or Year Level</span>Grade 11</td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell uppercase"><span class="inline-block w-1/3 md:hidden font-bold">Date of Selection</span>01-26-2023</td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell uppercase"><span class="inline-block w-1/3 md:hidden font-bold">Interview Date</span>01-29-2023</td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell uppercase"><span class="inline-block w-1/3 md:hidden font-bold">Kawan</span>Centro</td>   
                        </tr>
                        		
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
