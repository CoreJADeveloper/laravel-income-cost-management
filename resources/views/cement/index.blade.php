@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cement portion</h1>

    @if(count($records) > 0)
      @foreach ($records as $record) 

      @endforeach
    @else
      <p>No records found</p>
    @endif
</div>
@endsection
