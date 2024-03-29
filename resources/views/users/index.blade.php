@extends('layouts.app')

@section('content')

<div class="container">
    <div class="container">
        @include('helpers.flash-messages')   
        <div class="row">
            <div class="col-6">
                <h1><i class="fa-solid fa-users"></i> {{ __('shop.user.index_title') }}</h1>
            </div>
        </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Nazwisko</th>
                <th scope="col">Numer telefonu</th>
                <th scope="col">Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->surname }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>
                        <button class="btn btn-danger btn-sm delete" data-id="{{ $user->id }}">
                            <i class="fa-regular fa-trash-can"></i>
                        </button> 
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>
@endsection
@section('javascript')
  <script>
    let deleteURL = "{{ url('users') }}/";
    const confirmDelete = "{{ __('shop.messages.delete_confirm') }}";
  </script>  
  @stack('scripts')
@endsection
@section('js-files')
  @push('scripts')
    <script src="{{ asset('js/delete.js') }}"></script>
  @endpush
@endsection
