
<div>
<div class="bg-white p-8 rounded-md w-full">
    <div class="relative mt-1">
        <input type="text" id="password" wire:model.debounce.1000ms="searchText" class="w-full pl-3 pr-10 py-2 border-2 border-gray-200 rounded-lg hover:border-gray-300 focus:outline-none focus:border-blue-500 transition-colors" placeholder="Search...">
        <button class="block w-7 h-7 text-center text-xl leading-0 absolute top-2 right-2 text-gray-400 focus:outline-none hover:text-gray-900 transition-colors"><i class="mdi mdi-magnify"></i></button>
        <input type="text" wire:model="name">
    </div>
    <div>
        {{$searchText}}
        <button wire:click="like">Like Post</button>
        My name is chica-chica {{ $name }}

        <button wire:click="doSomething">Do Something</button>
        
        <x-public-project-list />
    </div>
</div>
</div>