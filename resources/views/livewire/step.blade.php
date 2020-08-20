<div>
    <div class="flex justify-center pb-4 px-4">
        <h2 class="text-lg pb-4">Add steps for task</h2>
        <span wire:click="increment" class="fas fa-plus px-2 cursor-pointer px-2 py-2 text-blue-400"/>
    </div>

    @foreach($steps as $step)
        <div class="flex justify-center py-2" wire:key="{{$loop->index}}">
            <input type="text" name="step[]" class="py-1 px-2 border rounded"
                   placeholder="{{'Describe Step ' . ($loop->index + 1) . '..'}}"/>
        </div>
    @endforeach

    @if(count($steps) > 0)
        <div class="flex justify-center pb-4">
            <span wire:click="remove" class="fas fa-times text-red-400 cursor-pointer"/>
        </div>
    @endif
</div>
