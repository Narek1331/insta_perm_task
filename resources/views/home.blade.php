@extends('layouts.app')

@section('content')
    <div class="container">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">valuteID</th>
      <th scope="col">numCode</th>
      <th scope="col">сharCode</th>
      <th scope="col">name</th>
      <th scope="col">value</th>
      <th scope="col">date</th>
    </tr>
  </thead>
        <tbody>
            @foreach($currencies as $currency)
            <tr>
                <th scope="row">{{$currency['id']}}</th>
                <th>{{$currency['valuteID']}}</th>
                <th>{{$currency['numCode']}}</th>
                <th>{{$currency['сharCode']}}</th>
                <th>{{$currency['name']}}</th>
                <th>{{$currency['value']}}</th>
                <th>{{$currency['date']}}</th>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection
