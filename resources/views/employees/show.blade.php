<x-layout>
    <h2>{{ $employee->name }}</h2>

    <div class="bg-gray-200 p-4 rounded">
        <p><strong>Skill level:</strong> {{ $employee->skill }}</p>
        <p><strong>About me:</strong></p>
        <p>{{ $employee->bio }}</p>
    </div>

    <div class="border-2 border-dashed bg-white px-4 pb-4 my-4 rounded">
        <h3>Group Info</h3>
        <p><strong>Group name:</strong> {{ $employee->group->name }}</p>
        <p><strong>Location:</strong> {{ $employee->group->location }}</p>
        <p><strong>About the group:</strong></p>
        <p>{{ $employee->group->description }}</p>
    </div>

    <form action="{{ route('employees.destroy', $employee->id)}}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn my-4">Delete Employee</button>
    </form>
</x-layout>