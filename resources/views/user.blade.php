@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Danh Sách Sinh Viên</div>

                    <div class="panel-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Ngày sinh</th>
                                <th>Giới Tính</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($result as $rs)
                                <tr class="odd gradeX">
                                    <td>{!! $rs->name !!}</td>
                                    <td>{!! $rs->email !!}</td>
                                    <td>{!! $rs->birthday !!}</td>
                                    <td>{!! $rs->gender === true ? "Nam" : "Nữ" !!}</td>
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