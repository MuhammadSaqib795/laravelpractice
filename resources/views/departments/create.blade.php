
@extends('layouts.app')

@section('title', 'Add Department')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-7">

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h4 class="mb-0">Add Department</h4>
            </div>

            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('departments.store') }}"
                      method="POST">

                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Department Name</label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name') }}"
                            placeholder="e.g. IT Department"
                            required>
                    </div>

                   
                    <button type="submit" class="btn btn-primary">
                        Save Department
                    </button>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection
