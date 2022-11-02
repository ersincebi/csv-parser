@extends('layout.app')
@section('title', __('Home Page'))
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-5">
                <form id="upload-form" action="{{ route('csv-upload')  }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{ __('Upload File') }}</label>
                        <input id="csvFile" type="file" class="form-control" type="file" name="csvFile" required/>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary btn-block" type="submit">{{ __("Upload") }}</button>
                    </div>
                    <div class="mt-3">
                        <div id="result"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ \App\Constants\EmployeeConstants::EMPLOYEE_ID }}</th>
                    <th scope="col">{{ \App\Constants\EmployeeConstants::NAME }}</th>
                    <th scope="col">{{ \App\Constants\EmployeeConstants::SURNAME }}</th>
                    <th scope="col">{{ \App\Constants\EmployeeConstants::EMAIL }}</th>
                    <th scope="col">{{ \App\Constants\EmployeeConstants::PHONE }}</th>
                    <th scope="col">{{ \App\Constants\EmployeeConstants::POINT }}</th>
                </tr>
            </thead>
            <tbody>
                @if($list)
                    @foreach($list as $key => $row)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $row[\App\Constants\EmployeeConstants::EMPLOYEE_ID] }}</td>
                            <td>{{ $row[\App\Constants\EmployeeConstants::NAME] }}</td>
                            <td>{{ $row[\App\Constants\EmployeeConstants::SURNAME] }}</td>
                            <td>{{ $row[\App\Constants\EmployeeConstants::EMAIL] }}</td>
                            <td>{{ $row[\App\Constants\EmployeeConstants::PHONE] }}</td>
                            <td>{{ $row[\App\Constants\EmployeeConstants::POINT] }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
