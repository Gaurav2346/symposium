<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $talk->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul class="pl-6 list-disc list-inside">
                            <li>
                                <strong>Title:</strong> {{ $talk->title }}
                            </li>
                            <li>
                                <strong>Type:</strong> {{ $talk->type }}
                            </li>
                            <li>
                                <strong>Length:</strong> {{ $talk->length }}
                            </li>
                            <li>
                                <strong>Abstract:</strong> {{ $talk->abstract }}
                            </li>
                    </ul>      
                    
                    <div class="flex mt-6 flex space-x-9">
                        <a href="{{ route('talks.edit', ['talk' => $talk]) }}" class="mt-3 inline-block px-2 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-500">
                            Edit Talk
                        </a>            
                        <a href="{{ route('talks.index', ['talk' => $talk]) }}" class="mt-3 inline-block px-2 py-1 bg-green-600 text-white rounded-md hover:bg-green-500">
                            Back
                        </a>            
                        <x-delete-item :route="route('talks.destroy', ['talk' => $talk])" text="Delete Talk" /><br>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
