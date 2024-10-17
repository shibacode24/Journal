<table class="table datatable">
    <thead>
        <tr>
            <th>Date of submission</th>
            @php
                $i = 1;
            @endphp
            @foreach ($assign_reviewer->unique('assign_reviewer_id') as $reviewer)
                <th>Reviewer {{ $i }} Status </th>
                @php
                    $i++;
                @endphp
            @endforeach
            <th>Editor Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($assign_reviewer->groupBy('get_menuscript.id') as $menuscript_id => $reviewers)
        {{-- @if ($reviewers->first()->reviewer_status != NULL) --}}
            
            <tr>
                <td>{{ date('d-m-Y',strtotime($reviewers->first()->get_menuscript->date_of_submission))}}</td>
                @foreach ($reviewers->groupBy('assign_reviewer_id') as $assign_reviewer_id => $reviewerGroup)
                    <td>
                        @foreach ($reviewerGroup as $reviewer)
                            {{ $reviewer->reviewer_status }} &nbsp;&nbsp;- &nbsp;&nbsp;{{ $reviewer->updated_at->format('d-m-Y') }}<br>
                            {{-- <small>{{ $reviewer->updated_at->format('Y-m-d') }}</small><br> --}}
                        @endforeach
                    </td>
                @endforeach
                <td>{{ $reviewers->first()->get_menuscript->editor_status }}</td>
            </tr>
        {{-- @endif --}}

        @endforeach
    </tbody>
</table>




{{-- <table class="table datatable">
    <thead>
        <tr>
            <th>Date</th>
            <th>Reviewer1 Status</th>
            <th>Reviewer2 Status</th>
            <th>Editor Status</th>
            <th>Remark</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($assign_reviewer->groupBy('menuscript_id', 'assign_reviewer_id') as $menuscript_id => $reviewers)
            <tr>
                <td>{{ $reviewers->first()->get_menuscript->date_of_submission }}</td>
                @foreach ($reviewers as $reviewer)
                    <td>{{ $reviewer->reviewer_status }}</td>
                @endforeach
                <td>{{ $reviewers->first()->get_menuscript->editor_status }}</td>
                <td>{{ $reviewers->first()->get_menuscript->editor_remark }}</td>
            </tr>
        @endforeach
    </tbody>
</table> --}}
