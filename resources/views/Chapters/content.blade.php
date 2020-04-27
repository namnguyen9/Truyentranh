@extends('partials.head');
@section('content')
@include('partials.nav')

<div class="container">
    <table  border="1" width="100%" height="10%" class="w3-table w3-striped w3-bordered" style="background: #d9ffb3;">
      <thead>
        <tr>
          <th>Content</th>
        </tr>
      </thead>
      <tbody>
            @foreach ($chapters as $key => $chapter)
        <tr align="center">
                <td>{!!$chapter->content!!}</td>
        </tr>
            @endforeach
      </tbody>
    </table>
  </div>


