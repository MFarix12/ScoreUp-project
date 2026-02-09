<div class="p-20 max-w-6xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Manage Sports</h1>

    {{-- <form wire:submit.prevent="save" class="mb-6 space-y-4">
        <div>
            <label class="block font-semibold mb-1">Sport Name</label>
            <input type="text" wire:model.defer="sport_name" class="border p-2 rounded w-full">
            @error('sport_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block font-semibold mb-1">Description</label>
            <textarea wire:model.defer="description" class="border p-2 rounded w-full"></textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="flex space-x-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                {{ $editId ? 'Update Sport' : 'Add Sport' }}
            </button>
            @if($editId)
                <button type="button" wire:click="cancelEdit" class="bg-gray-400 text-white px-4 py-2 rounded">
                    Cancel
                </button>
            @endif
        </div>

    </form> --}}

    <form wire:submit.prevent="save" class="mb-6 space-y-4">
        <div>
            <label class="block font-semibold mb-1">Sport Name</label>
            <flux:input type="text" wire:model.defer="sport_name"/>
            @error('sport_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block font-semibold mb-1">Description</label>
            <flux:textarea wire:model.defer="description" class="border p-2 rounded w-full"></flux:textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block font-semibold mb-1">Category</label>
            <flux:select wire:model.defer="gender" class="border p-2 rounded w-full">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Mixed">Mixed</option>
            </flux:select>
            @error('gender') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block font-semibold mb-1">Photo (optional)</label>
            <flux:input type="file" wire:model="photo" class="border p-2 rounded w-full" accept="image/*"/>
            @error('photo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            @if($photo)
                <img src="{{ $photo->temporaryUrl() }}" class="h-16 mt-2">
            @endif
        </div>
        <div class="flex space-x-2">
            <flux:button variant="primary" type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                {{ $editId ? 'Update Sport' : 'Add Sport' }}
            </flux:button>
            @if($editId)
                <flux:button type="button" wire:click="cancelEdit" class="bg-gray-400 text-white px-4 py-2 rounded">
                    Cancel
                </flux:button>
            @endif
        </div>
    </form>

    <h2 class="text-xl font-semibold mb-2">Existing Sports</h2>
    <table class="w-full table-auto border-collapse rounded-2xl overflow-hidden shadow-lg border border-gray-300 mt-6">
        <thead>
            <tr class="bg-gradient-to-r from-yellow-400 via-orange-400 to-red-500 text-black text-lg">
                <th class="border px-4 py-2">Photo</th>
                <th class="border px-4 py-2">Sport Name</th>
                <th class="border px-4 py-2">Gender</th>
                <th class="border px-4 py-2">Description</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sports as $sport)
                <tr class="bg-gradient-to-r from-blue-100 to-purple-100">
                    <td class="border px-4 py-2">
                        @if($sport->photo)
                            <img src="{{ asset('storage/'.$sport->photo) }}" class="w-16 h-16 rounded-full object-cover" alt="Sport Icon">
                        @endif
                    </td>
                    <td class="border px-4 py-2">{{ $sport->sport_name }}</td>
                    <td class="border px-4 py-2">{{ $sport->gender }}</td>
                    <td class="border px-4 py-2">{{ $sport->description }}</td>
                    {{-- <td class="border px-4 py-2">
                        <button wire:click="edit({{ $sport->id }})" class="bg-yellow-400 text-white px-2 py-1 rounded">Edit</button>
                    </td> --}}
                    <td class="border px-4 py-2">
                        <flux:button variant="primary" variant="primary" wire:click="edit({{ $sport->id }})" class="bg-yellow-400 text-white px-2 py-1 rounded">Edit</flux:button>
                        <flux:button variant="primary" color="red" wire:click="delete({{ $sport->id }})" class="bg-red-500 text-white px-2 py-1 rounded ml-2"
                            onclick="return confirm('Are you sure you want to delete this sport?')">Delete</flux:button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center py-4">No sports found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
