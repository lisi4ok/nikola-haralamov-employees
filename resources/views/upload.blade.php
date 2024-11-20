@foreach($data as $project => $item)
    <div>
        Project ID  {{ $project }}
    </div>
    <div>
        <table class="table-fixed">
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Project ID</th>
                <th>Deference In Days</th>
            </tr>
        </thead>
            <tbody>
                @foreach($item as $employee)
                    <tr>
                        <td>{{ $employee->employeeId }}</td>
                        <td>{{ $employee->projectId }}</td>
                        <td>{{ $employee->deferenceInDays }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    <hr />
@endforeach
