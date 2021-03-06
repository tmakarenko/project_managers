@extends('layouts.main')

@section('title')
    managers
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div id="current-man" style="display:none">
                <h4>Проекты выбраного менеджера</h2>
                <ul id="current-man-ul">
                    
                </ul>
            </div>
            <h2>Все менеджеры</h2>
            <table class="table table-bordered table-stripped">
                <tr>
                    <th>ИД</th>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Телефон</th>
                    <th>Компания</th>
                    <th>Фото</th>
                    <th>Действие</th>
                </tr>
            @foreach($mans as $man)
                <tr id={{ $man->id }}>
                    <td>{{ $man->id }}</td>
                    <td>{{ $man->name }}</td>
                    <td>{{ $man->email }}</td>
                    <td>{{ $man->phone }}</td>
                    <td>{{ $man->company }}</td>
                    <td><img src={{ asset("$man->photo_link") }} style="width:100px; height:100px" /></td>
                    <td><a href="/managers/{{$man->id}}" class="btn btn-info">Редактировать</a></td>
                </tr>
            @endforeach
                
            </table>
        </div>
    </div>
    <script>
        window.onload = function (){
            $('tr').on('click',function(){
                let id = $(this).attr('id');
                fetch('/managers/'+id+'/projects',{
                    method: 'GET'
                })
                .then(response => {
                    return response.json();
                })
                .then(data => {
                     $('#current-man').css('display','block');
		     $('#current-man-ul').empty();
                    data.forEach((item) => {
                        $('#current-man-ul').append("ID: "+item['id']+" Name: "+item['name']);
                    });
                });
            });
        }
    </script>
@endsection