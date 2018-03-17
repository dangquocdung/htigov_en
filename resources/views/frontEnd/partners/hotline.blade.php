
                
@extends('frontEnd.partner')

@section('partner')

    <div class="dv" style="margin:10px 0; padding: 5px">
        <div class="dv-body">
            <table id="example1" class="dv-table">
                <thead>
                <tr>
                    <th>TT</th>
                    <th>Cơ quan</th>
                    <th>Website</th>
                    <th>Điện thoại</th>
                </tr>
                </thead>

                <tbody>
                
                    @foreach($HotLines->where('nhomcq_id','1') as $cq)
                    <tr>
                        <td>{{ $cq->id }}</td>
                        <td>{{ $cq->name }}</td>
                        <td><a href="{{ $cq->lienket }}" target="_blank">{{ $cq->lienket }}</a></td>
                        <td>{{ $cq->sodt }}</td>
                    </tr>
                    @endforeach
                
                </tbody>
            </table>
        </div>
    </div>

@stop

@section('js')
    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script>
        $(function () {
            $('#example1').DataTable({

                "iDisplayLength": 25,

                "language": {
                    "sProcessing": "Đang xử lý...",
                    "sLengthMenu": "Hiển thị _MENU_ mục",
                    "sInfo": "Đang hiển thị từ mục _START_ đến mục _END_ trong tổng _TOTAL_ mục",
                    "sInfoPostFix": "",
                    "sSearch": "Tìm kiếm:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "oPaginate": {
                        "sFirst": "Đầu tiên",
                        "sLast": "Cuối cùng",
                        "sNext": "Sau",
                        "sPrevious": "Trước"
                    }
                }
            })
        })
    </script>
@stop
