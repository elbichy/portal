@extends('layouts.app', ['title' => 'Applicants - CA I'])

@section('content')
    <div class="my-content-wrapper">
        <div class="content-container">
            <div class="sectionWrap">
                {{-- SALES HEADING --}}
                <h6 class="center sectionHeading">APPLICANTS SORTING - GL 05 (CA I)</h6>

                {{-- SALES TABLE --}}
                <div class="sectionTableWrap z-depth-1">
                    <div class="row topMenuWrap">
                        <button id="deleteBtn" class="btn btn-small darken-2 white-text right"><i class="material-icons right">close</i> Delete</button>
                        <button id="shortlistBtn" class="btn btn-small right"><i class="material-icons right">done_all</i> Shortlist</button>
                    </div>
                    <table class="table centered table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th><input type='checkbox' class='browser-default selectAll'></th>
                                <th>SN</th>
                                <th>ID No.</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>State (Origin)</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>SN</th>
                                <th>ID No.</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>State (Origin)</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="footer z-depth-1">
            <p>&copy; NSCDC ICT & Cybersecurity Department</p>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('#users-table').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'csv', 'excel', 'pdf'
                ],
                "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                processing: true,
                serverSide: true,
                ajax:  `{!! route('getCAI') !!}`,
                columns: [
                    { data: 'checkbox', name: 'checkbox', "orderable": false, "searchable": false},
                    {
                        "data": "id",
                        "title": "SN",
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }, "orderable": false, "searchable": false
                    },
                    { data: 'id', name: 'id' },
                    { data: 'firstname', name: 'firstname' },
                    { data: 'lastname', name: 'lastname' },
                    { data: 'personal.gender', name: 'personal.gender'},
                    { data: 'email', name: 'email', "orderable": false },
                    { data: 'phone', name: 'phone', "orderable": false },
                    { data: 'contact.soon', name: 'contact.soon'},
                ],
                initComplete: function () {
                    this.api().columns().every(function () {
                        var column = this;
                        var input = document.createElement("input");
                        $(input).attr('placeholder', 'Search');
                        $(input).appendTo($(column.footer()).empty())
                        .on('keyup', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });
                    });
                },
                order: [[2, 'asc']]
            });
            $('.dataTables_length > label > select').addClass('browser-default');
        });
    </script>
@endpush