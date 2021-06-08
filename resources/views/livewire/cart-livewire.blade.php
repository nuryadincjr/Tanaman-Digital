<div>
    <div class="input-group input-group-sm">
        <div wire:click="decQty({{$post->id}})" class="input-group-sm" id="addon-wrapping" style="cursor: pointer;">
            <span class="input-group-text text-white bg-danger">-</span>
        </div>
        <input type="text" class="form-control"
        
        @if ($dataqty !=null)
            value="{{$dataqty}}" 
        @else 
            value="{{$post->quntity}}" 
        @endif
        
        aria-describedby="addon-wrapping">
        <div wire:click="incQty({{$post->id}})" class="input-group-sm" id="addon-wrapping" style="cursor: pointer;">
            <span class="input-group-text text-white bg-success">+</span>
        </div>

    </div>
</div>
