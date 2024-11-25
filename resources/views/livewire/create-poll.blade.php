<div>
    <form action="">
        <label for="title">Poll Title</label>
        <input type="text" wire:model.live="title">
        Current title: <span>{{ $title }}</span>
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
                  <button class="btn" wire:click.prevent="removeOption({{ $index }})">Remove</button>
                </div>
            @endforeach
        </div>
    </form>
</div>
