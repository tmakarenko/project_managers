@extends('layouts.main')
@section('title')
    Update project
@endsection
@section('content');
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Редактировать проект</h1>
        <form method="POST" action="/api/projects/{{proj->id}}" id="pj-form" name="pj-form">
            {{ csrf_field() }}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="name">Название проекта</label>
                <input id="name" name="name" type="text" class="form-control" value="{{ old('name') }}{{$proj->name}}">
            </div>
            <div class="form-group">
                <label for="price">Цена</label>
                <input id="price" name="price" type="text" class="form-control" value="{{ old('price') }}{{$proj->price}}">
            </div>
            <div class="form-group">
                <label for="exec">Исполнитель</label>
                <input id="exec" name="executor" type="text" class="form-control" value="{{ old('executor') }}{{$proj->executor}}">
            </div>
            <div class="form-group">
                <label for="start_date">Начало выполнения</label>
                <input id="start_date" name="execution_start_date" type="date" class="form-control" value="{{ old('execution_start_date') }}{{$proj->execution_start_date}}">
            </div>
            <div class="form-group">
                <label for="end_date">Конец выполнения</label>
                <input id="end_date" name="execution_end_date" type="date" class="form-control" value="{{ old('execution_end_date') }}{{$proj->execution_start_date}}">
            </div>
            <input id="submit" type="submit" class="btn btn-submit" value="Сохранить" onclick="onSubmit()">
            
        </form>
        <script>

           
    function onSubmit(){
       

            $("#pj-form").validate({
              rules: {
                name: "required",
                price: {
                  required: true,
                  number: true
                },
                exec:"require",
                start_date:{
                  required: true,
                  date: true
                },
                end_date:{
                  required: true,
                  date: true
                }
              },
              messages:{
                name:"Укажите имя",
                price: {
                  required: "Укажите цену",
                  number: "Цена должна быть числом"
                },
                exec:"Укажите исполнителя",
                start_date:{
                  required: "Укажите начальную дату",
                  date: "Начальная дата должна быть в формате даты"
                },
                end_date:{
                  required: "Укажите конечную дату",
                  date: "Конечная дата должна быть в формате даты"
                }
              },
              submitHandler: function(form) {
                 console.log(form.valid());
                }    
               

            

        });



    }

        </script>
        
        </div>
    </div>
@endsection