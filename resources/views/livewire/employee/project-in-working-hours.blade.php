<div clas="font-bold">
    <select name="project" id="project" class="w-full bg-gray-50 uppercase tracking-wider form-select text-xs border-l-0 border-r-0 border-t-0 rounded-none">
        <option value="empty"></option>
        @if ($projects->count())
            @foreach ($projects as $project)
                <option value="projekts1"> {{ $project->title }}</option>
            @endforeach
        @endif
    </select>
</div>
