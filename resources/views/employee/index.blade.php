@extends('template')

@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Employee CRUD</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-success" href="{{ route('employee.create') }}"> Input Karyawan</a>
        </div>
    </div>
</div>

@if ($message = Session::get('succes'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th width="20px" class="text-center">No</th>
        <th>NIK</th>
        <th width="280px"class="text-center">Jabatan</th>
        <th width="280px"class="text-center">Jenis Kelamin</th>
        <th width="280px"class="text-center">Level</th>
        <th width="280px"class="text-center">Divisi</th>
    </tr>
    @foreach ($employee as $employees)
    <tr>
        <td class="text-center">{{ ++$i }}</td>
        <td>{{ $employees->NIK }}</td>
        <td>{{ $employees->Jabatan }}</td>
        <td>{{ $employees->JenisKelamin }}</td>
        <td>{{ $employees->level }}</td>
        <td>{{ $employees->divisi }}</td>
        <td class="text-center">
            <form action="{{ route('employee.destroy',$employees->id) }}" method="POST">

                <a class="btn btn-info btn-sm" href="{{ route('employee.show',$employees->id) }}">Show</a>

                <a class="btn btn-primary btn-sm" href="{{ route('employee.edit',$employees->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $employee->links() !!}

@endsection