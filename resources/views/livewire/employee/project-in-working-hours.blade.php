<div clas="font-bold">
    <select name="project" id="project" class="w-full bg-gray-50 uppercase tracking-wider">
        <option value="empty"></option>
        @if ($data->count())
            @foreach ($data as $item)
                <option value="projekts1"> {{ $item->title }}</option>
            @endforeach
        @endif
    </select>
</div>
