<!-- resources/views/hotels/index.blade.php -->

@extends('Admin.layouts.app')
@section('title', 'List service')
@section('content')
    <div class="container" style="padding-top: 20px mb-2">
        <div style="color: #86b817; font-size:80px; text-align:center; margin-top: 5px" class="comfortaa">List Services</div>
        <a href="{{ route('Admin.services.create') }}" class="btn btn-primary mb-3 comfortaa">Create</a>
        <table class="table">
            <thead>
                <tr>
                    <th style="background-color: rgb(224, 228, 31); text-align: center; vertical-align: middle;" scope="col" class="comfortaa">#</th>
                    <th style="background-color: rgb(224, 228, 31); text-align: center; vertical-align: middle;" scope="col" class="comfortaa">Tên dịch vụ</th>
                    <th style="background-color: rgb(224, 228, 31); text-align: center; vertical-align: middle;" scope="col" class="comfortaa">Optionn</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($services as $service)
                    <tr>
                        <th style="background-color: rgb(255, 255, 160); text-align: center; vertical-align: middle;" scope="row">{{ $service->service_id }}</th>
                        <td style="background-color: rgb(255, 255, 160); text-align: center; vertical-align: middle;" >{{ $service->service_name }}</td>

                        <td style="background-color: rgb(255, 255, 160); text-align:center">
                            <a style="padding: 8px; background-color:rgb(76, 209, 250); margin-bottom: 5px; margin-top: 5px" href="{{ route('Admin.services.edit', $service->service_id) }}"
                                class="btn btn-sm btn-primary comfortaa">
                                <i class="fas fa-edit"></i> edit
                            </a>
                            <form action="{{ route('Admin.services.delete', $service->service_id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button style="padding: 8px; background-color:rgb(255, 99, 120); margin-top: 5px" type="submit" class="btn btn-sm btn-danger comfortaa"
                                    onclick="return confirm('Bạn chắc chắn muốn xóa dịch vụ này?')">
                                    <i class="fas fa-trash-alt"></i> delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                @if ($services->onFirstPage())
                    <!-- k hoạt động khi ở trang đầu tiên -->
                    <span><i class="fas fa-arrow-left fa-sm"></i></span>
                @else
                    <!-- chuyển đến trang trước -->
                    <a href="{{ $services->previousPageUrl() }}"><i class="fas fa-arrow-left fa-sm"></i></a>
                @endif
            </div>

            <div>
                @for ($i = 1; $i <= $services->lastPage(); $i++)
                    <a class="pt-3 pb-2 pl-3 pr-3 bg-secondary text-dark m-2 {{ $i == $services->currentPage() ? 'bg-info text-white' : '' }}"
                        href="{{ $services->url($i) }}">{{ $i }}</a>
                @endfor
            </div>

            <div>
                Page {{ $services->currentPage() }} / {{ $services->lastPage() }}
            </div>

            <div>
                @if ($services->hasMorePages())
                    <a href="{{ $services->nextPageUrl() }}"><i class="fas fa-arrow-right fa-sm"></i></a>
                @else
                    <span><i class="fas fa-arrow-right fa-sm"></i></span>
                @endif
            </div>
        </div>

    </div>
@endsection
