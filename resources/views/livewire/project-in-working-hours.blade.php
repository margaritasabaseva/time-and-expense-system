<div>
    <select name="project" id="project" class="w-full">
        @if ($data->count())
            @foreach ($data as $item)
                <option value="empty" class="hidden"></option>
                <option value="projekts1"> {{ $item->title }}</option>
            @endforeach
        @endif
    </select>
</div>
