<h1>Faculty</h1>
<a href="{{ route('faculty.create') }}">Create Faculty</a>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Acronym</th>
            <th>Dean Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Logo</th>
            <th>Year Foundation</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($faculty as $faculty)
            <tr>
                <td>{{ $faculty->name_fac }}</td>
                <td>{{ $faculty->acronym_fac }}</td>
                <td>{{ $faculty->dean_name_fac }}</td>
                <td>{{ $faculty->phone_fac }}</td>
                <td>{{ $faculty->email_fac }}</td>
                <td>{{ $faculty->logo_fac }}</td>
                <td>{{ $faculty->year_foundation_fac }}</td>
                <td>
                    <a href="#">Show</a>
                    <a href="#">Edit</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>    