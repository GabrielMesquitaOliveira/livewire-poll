<div>
    <form action="">
        <label for="title">Poll Title</label>
        <input type="text" wire:model.live="title">
        Current title: <span>{{ $title }}</span>
    </form>
</div>
