<x-layout>
    <h2>Currently Available Employees</h2>

    <ul>
        @foreach($employees as $employee)
            <li>
                <x-card href="{{ route('employees.show', $employee->id) }}" :highlight="$employee->skill > 70">
                    <div>
                        <h3>{{ $employee->name }}</h3>
                        <p>{{ $employee->group->name }}</p>
                    </div>
                    
                </x-card>
            </li>
        @endforeach
    </ul>

    {{ $employees->links() }}
</x-layout>

