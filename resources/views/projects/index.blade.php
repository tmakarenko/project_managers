@extends('layouts.main')

@section('title')
    projects
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div id="current-pj" style="display: none">
                <h4>Менеджеры выбраного проекта</h4>
                <ul id="current-pj-ul">
                    
                </ul>
            </div>
            <h2>Все проекты</h2>
            <table class="table table-bordered table-stripped">
                <tr>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Исполнитель</th>
                    <th>Дата начала выполнения</th>
                    <th>Дата окончания выполнения</th>
                </tr>
            @foreach($projects as $proj)
                <tr id={{ $proj->id }}>
                    <td>{{ $proj->name }}</td>
                    <td>{{ $proj->price }}</td>
                    <td>{{ $proj->executor }}</td>
                    <td>{{ $proj->execution_start_date }}</td>
                    <td>{{ $proj->execution_end_date }}</td>
                </tr>
            @endforeach
                
            </table>
        </div>
    </div>
    <script>
        window.onload = function (){
            $('tr').on('click',function(){
                let id = $(this).attr('id');
                fetch('/projects/'+id+'/managers',{
                    method: 'GET'
                })
                .then(response => {
                    return response.json();
                })
                .then(data => {
                     $('#current-pj').css('display','block');
		     $('#current-pj-ul').empty();
                    data.forEach((item) => {
                        $('#current-pj-ul').append(item['id']+" "+item['name']);
                        
                    });
                });
            });
        }
    </script>
@endsection