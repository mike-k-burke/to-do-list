<x-app-layout>
    <div class="max-w-screen-xl mx-auto py-6 px-4 sm:px-6 lg:px-8 sm:grid sm:grid-cols-3 sm:gap-4">
        <div>
            <livewire:create-task />
        </div>
        <div class="sm:col-span-2">
            <livewire:show-tasks />
        </div>
    </div>
</x-app-layout>
