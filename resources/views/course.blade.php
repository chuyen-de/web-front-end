@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Danh Sách Khóa Học</div>

                    <div class="panel-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Tên KH</th>
                                <th>Mô tả</th>
                                <th>DS sinh viên</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($result as $rs)
                                <tr class="odd gradeX">
                                    <td>{!! $rs->tenKH !!}</td>
                                    <td>{!! $rs->description !!}</td>
                                    <td><a href="course/{{$rs->_id}}/user">Xem</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection