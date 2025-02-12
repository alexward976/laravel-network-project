<x-layout>
   
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf

        <h2>Create a New Employee</h2>

        <label for="name">Name</label>
        <input 
            type="text"
            id="name"
            name="name"
            value="{{ old('name')}}"
            required
        >

        <label for="skill">Employee Skill (0-100)</label>
        <input 
            type="number"
            id="skill"
            name="skill"
            value="{{ old('skill')}}"
            required
        >

        <label for="bio">Biography</label>
        <textarea 
            rows="5"
            id="bio"
            name="bio" 
            required
        >{{ old('bio')}}</textarea>

        <label for="group_id">Group:</label>
        <select name="group_id" id="group_id">
            <option value="" disabled selected>Select a group</option>

            @foreach ($groups as $group)
                <option value="{{ $group->id }}" {{$group->id == old('group_id') ? 'selected' : '' }}>{{ $group->name }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn mt-4">Create Employee</button>


        @if ($errors->any()) 
            <ul class="px-4 py-2 bg-red-100">
                @foreach ($errors->all() as $error)
                    <li class="my-2 text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </form>
    
</x-layout>