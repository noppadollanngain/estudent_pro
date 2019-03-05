@extends('layouts.templateadmin')
@section('title','Resultesearch Student')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p style="font-size:1.25rem;font-family: 'Athiti', sans-serif;" class="card-title">ผลลัพธ์การค้นหา นักศึกษา</p>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th style="font-size:1.05rem;font-family: 'Athiti', sans-serif;">รหัสนักศึกษา</th>
                    <th style="font-size:1.05rem;font-family: 'Athiti', sans-serif;">รหัสประจำตัวประชาชน</th>
                    <th style="font-size:1.05rem;font-family: 'Athiti', sans-serif;">ชื่อ-สกุล</th>
                    <th style="font-size:1.05rem;font-family: 'Athiti', sans-serif;">สาขา</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $item)
                    <tr onclick="gotoEdit({{$item->id}})">
                        <td style="font-size:1rem;font-family: 'Athiti', sans-serif;">{{$item->stdId}}</td>
                        <td style="font-size:1rem;font-family: 'Athiti', sans-serif;">{{$item->peopleId}}</td>
                        <td style="font-size:1rem;font-family: 'Athiti', sans-serif;">{{$item->name}}</td>
                        <td style="font-size:1rem;font-family: 'Athiti', sans-serif;">{{$item->major}}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
                {!! $data->render() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('scripts')
  @if (session()->has('msg_success'))
  <script>
    swal({
      title: "ยืนยันข้อมูล",
      text: "<?php echo session()->get('msg_success'); ?>",
      timer: 3000,
      type: 'success',
      icon: "success",
      showConfirmButton: false
    });
  </script>
  @elseif(session()->has('msg_error'))
  <script>
      swal({
        title: "เกิดข้อผิดพลาด",
        text: "<?php echo session()->get('msg_error'); ?>",
        timer: 3000,
        type: 'error',
        icon: "error",
        showConfirmButton: false
      });
  </script>
  @endif

  <script>
    function gotoEdit(id){
      window.location.href = '{{asset("/student-edit?id=")}}'+id;
    }
  </script>
@endsection
