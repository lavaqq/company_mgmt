@php
    $avatars = $getState();
@endphp

<div class="px-4 py-3 flex">
    @foreach ($avatars as $item)
        <div @style(['height: 40px;', 'width: 40px;', 'margin-left: -10px' => !$loop->first]) @class(['overflow-hidden', 'rounded-full'])>
            <img src="{{ Storage::url($item) }}" @style(['height: 40px;', 'width: 40px;']) @class(['object-cover', 'object-center', 'z-' . $loop->index])>
        </div>
    @endforeach
</div>
