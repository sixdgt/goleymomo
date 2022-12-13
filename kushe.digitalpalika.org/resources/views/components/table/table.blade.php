<table class="table table-hover chalani-data-table">
    <thead>
        <tr>
            @foreach ($tableHeaders as $tableHeader)
                <th>{{ $tableHeader}}</th>
            @endforeach
            <th width="100px">Action</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
