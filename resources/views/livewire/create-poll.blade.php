<div>
    <form wire:submit.prevent='createPoll'>
        <label for="title">Poll Title</label>
        <input type="text" wire:model.live="title">
        @error('title')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
        <div class="mb-4 mt-4">
            <button class="btn" wire:click.prevent="addOption">Add Option</button>
        </div>
        <div>
            @foreach ($options as $index => $option)
                <div class="mb-4">
                    <label for="">Option {{ $index + 1 }}</label>
                </div>
                <div>
                    <input type="text" wire:model='options.{{ $index }}'>
                    @error("options.{$index}")
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <button class="btn" wire:click.prevent="removeOption({{ $index }})">Remove</button>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn">Create poll</button>
    </form>
</div>
