<button class="btn btn-success btn-sm btn-lg pull-right" wire:click="showFormAdd" type="button">{{ trans('parent.add_parent') }}</button><br><br>
<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
           style="text-align: center">
        <thead>
        <tr class="table-success">
            <th>#</th>
            <th>{{ trans('parent.email') }}</th>
            <th>{{ trans('parent.father_name') }}</th>
            <th>{{ trans('parent.father_national_id') }}</th>
            <th>{{ trans('parent.father_passport_id') }}</th>
            <th>{{ trans('parent.father_phone') }}</th>
            <th>{{ trans('parent.father_job') }}</th>
            <th>{{ trans('parent.processes') }}</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach ($parentStudents as $parentStudent)
            <tr>
                <?php $i++; ?>
                <td>{{ $i }}</td>
                <td>{{ $parentStudent->email }}</td>
                <td>{{ $parentStudent->father_name }}</td>
                <td>{{ $parentStudent->father_national_id }}</td>
                <td>{{ $parentStudent->father_passport_id }}</td>
                <td>{{ $parentStudent->father_phone }}</td>
                <td>{{ $parentStudent->father_name }}</td>
                <td>
                    <button wire:click="edit({{ $parentStudent->id }})" title="{{ trans('grades.edit') }}"
                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $parentStudent->id }})" title="{{ trans('grades.delete') }}"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
    </table>
</div>
