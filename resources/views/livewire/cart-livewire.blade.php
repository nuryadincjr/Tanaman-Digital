<div>
    <div class="input-group quantity">
        <div wire:click="decQty({{$post->id}})" class="input-group-prepend decrement-btn" style="cursor: pointer;">
            <span class="input-group-text">-</span>
        </div>
        <input type="text" class="qty-input form-control" maxlength="3" max='10' 
        @if ($dataqty !=null)
            value="{{$dataqty}}" 
        @else 
            value="{{$post->quntity}}" 
        @endif>

        <div wire:click="incQty({{$post->id}})" class="input-group-append increment-btn" style="cursor: pointer;">
            <span class="input-group-text">+</span>
        </div>
    </div>
</div>
