
<div class="col-md-12">
    <table class="table datatable">
        <thead>
            <tr>
                <th>Date</th>
                <th>Reviewer Status</th>
                <th>Remark</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($assign_reviewer as $assign_reviewers)
            @if ($assign_reviewers->reviewer_status == NULL)

            @else
            <tr>
                <td>{{date('d-m-Y',strtotime($assign_reviewers->updated_at))}}</td>
                <td>{{$assign_reviewers->reviewer_status}}</td>
                <td>{{$assign_reviewers->reviewer_remark}}</td>
            </tr>
            @endif
            @endforeach 
        </tbody>
    </table>
</div> 



