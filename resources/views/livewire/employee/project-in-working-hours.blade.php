<div clas="font-bold">
    <select name="project" id="project" class="w-full bg-gray-50 uppercase tracking-wider">
        <option value="empty"></option>
        @if ($projects->count())
            @foreach ($projects as $project)
                <option value="projekts1"> {{ $project->title }}</option>
            @endforeach
        @endif
    </select>
</div>
