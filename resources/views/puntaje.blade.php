@extends('layouts.app')
@section('content')
<div class="container">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">NickName</th>
              <th scope="col">Puntaje</th>
            </tr>
          </thead>
          <tbody>
          @foreach($puntaje as $key =>  $score)
            <tr background-color: #f00;>  
              <td>  {{$score->nickName}}</td>
              <td>{{$score->puntaje}}</td>
        </tr>
            @endforeach
          </tbody>
        </table>
        
      </div>
    </div>
  </div>
</div>
@endsection

