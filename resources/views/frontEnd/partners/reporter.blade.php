
                
@extends('frontEnd.partner')

@section('partner')

    <div class="dv" style="margin:10px 0; padding: 5px">
        <div class="dv-body ">
            <table id="example1" class="dv-table">
                <thead>
                <tr>
                    <th>
                        <span>TT</span>
                    </th>
                    <th>
                        <span>Đơn vị</span>
                    </th>

                    <th>
                        <span>Họ và Tên</span>
                    </th>

                    <th>
                        <span>Số TNB</span>
                    </th>
                    <th>
                        <span>Điện thoại</span>
                    </th>
                    <th>
                        <span>Email</span>
                    </th>
                </tr>
                </thead>

                <tbody>
                @foreach($Reporters as $pvtt)
                    <tr>
                        <td>{{ $pvtt->id }}</td>
                        <td>{{ $pvtt->cqbc }}</td>
                        <td>{{ $pvtt->pvtt }}</td>
                        <td>{{ $pvtt->sothe }}</td>
                        <td>{{ $pvtt->dienthoai }}</td>
                        <td>{{ $pvtt->email }}</td>
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
