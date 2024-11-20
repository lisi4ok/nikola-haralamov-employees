@foreach($data as $project => $item)
    <div>
        Project ID  {{ $project }}
    </div>
    <div>
        <table>
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
                        <td>{{ $employee->EmpID }}</td>
                        <td>{{ $employee->ProjectID }}</td>
                        <td>{{ $employee->DeferenceInDays }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    <hr />
@endforeach
