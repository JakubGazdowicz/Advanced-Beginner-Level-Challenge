<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-validation-errors />
                    <x-success-message />

                    <form method="POST" action="{{ route('tasks.update', $task) }}">
                        @method('PUT')
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <div class="grid grid-rows-2 gap-6">
                                <div class="mb-4">
                                    <x-label for="title" :value="__('Title')" />
                                    <x-input id="title" class="block mt-1 w-full" type="text" name="title" autofocus />
                                </div>
                                <div class="mb-4">
                                    <x-label for="description" :value="__('Description')" />
                                    <x-input id="description" class="block mt-1 w-full" type="text" name="description" autofocus />
                                </div>
                                <div class="mb-4">
                                    <x-label for="user_id" :value="__('Assign User')"></x-label>
                                    <select name="user_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <x-label for="client_id" :value="__('Assign Client')"></x-label>
                                    <select name="client_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->company }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <x-label for="project_id" :value="__('Assign Project')"></x-label>
                                    <select name="project_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        @foreach($projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <x-label for="deadline" :value="__('Deadline')"></x-label>
                                    <x-input id="deadline" class="block mt-1 w-full" type="date" name="deadline" autofocus />
                                </div>
                                <div class="mb-4">
                                    <x-label for="status" :value="__('Status')"></x-label>
                                    <select name="status" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        @foreach($statuses as $status)
                                            <option value="{{ $status }}">{{ $status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{ __('Update Task') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-validation-errors />
                    <x-success-message />

                   <form action="{{ route('media.upload', ['Task', $task]) }}" method="POST" enctype="multipart/form-data">
                       @csrf
                       <div class="grid grid-cols-2 gap-6">
                           <div class="grid grid-rows-2 gap-6">
                               <div class="mb-4">
                                   <x-label for="file" :value="__('Title')" />
                                   <x-input id="file" class="block mt-1 w-full" type="file" name="file" autofocus />
                               </div>
                           </div>
                       </div>
                       <div class="flex items-center justify-end mt-4">
                           <x-button class="ml-3">
                               {{ __('Upload') }}
                           </x-button>
                       </div>
                   </form>

                    <table class="table mt-4">
                        <thead>
                        <tr>
                            <th scope="col">File name</th>
                            <th scope="col">Size</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($task->getMedia() as $media)
                            <tr>
                                <th scope="row">{{ $media->file_name }}</th>
                                <td>{{ $media->human_readable_size }}</td>
                                <td>
                                    <a class="btn btn-xs btn-info" href="{{ route('media.download', $media) }}">
                                        <x-button class="ml-3">
                                            {{ __('Download') }}
                                        </x-button>
                                    </a>
                                    <form action="{{ route('media.delete', ['Project', $task, $media]) }}" method="POST" onsubmit="return confirm('Are your sure?');" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <x-button class="ml-3">
                                            {{ __('DELETE') }}
                                        </x-button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
