@extends('layouts.main')
@section('title')
    Create manager
@endsection
@section('content');
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Добавить менеджера</h1>
        <form method="POST" action="/managers" enctype="multipart/form-data" id="mg-form">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <label for="name">Имя</label>
                <input id="name" name="name" type="text" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="phone">Контактный номер</label>
                <input id="phone" name="phone" type="text" class="form-control" value="{{ old('phone') }}">
            </div>
            <div class="form-group">
                <label for="company">Компания</label>
                <input id="company" name="company" type="text" class="form-control" value="{{ old('company') }}">
            </div>
            <div class="form-group">
                <label for="photo">Фото</label>
                <input id="photo" name="photo_link" type="file" class="form-control" value="{{ old('photo_link') }}">
                <label id="photo-error" class="error" for="photo" style="display:none">Выберите файл картинку</label>
            </div>
            {{ csrf_field() }}
            <input type="submit" class="btn btn-submit" value="Сохранить" onclick="onSubmit()">
            
        </form>

        <script>

           
    function onSubmit(){
            /*
            submitHandler: function(form) {
                let photo_name = $('#photo').val().split('.').pop().toUpperCase();;
                if(photo_name !== "PNG" || photo_name !== "JPG" || photo_name !== "GIF"){
            
                     $('#photo-error').css('display','block');
                    
                }else{
                    form.submit();
                }            
              },
            */
            $("#mg-form").validate({              
              rules: {
                name: "required",
                email: {
                  required: true,
                  email: true
                },
                phone:{
                    required:true,
                    digits:true
                },
                company:"required",
                photo:{
                  required: true,
                  extension: "png|jpeg|jpg|gif",
                  accept:"image/*"
                }
              },
              messages:{
                name:"Укажите имя",
                email: {
                  required: "Укажите почту",
                  email: "Укажите почту в правильном формате"
                },
                phone:{
                  required:"Укажите исполнителя",
                  digits:"Укажите телефон в правильном формате (0933545717)"
                },
                company:{
                  required: "Укажите компанию"
                },
                photo:{
                  required: "Внесите файл фото",
                  extension: "Фото должно быть в формате картинки (png|jpeg|jpg|gif)",
                  accept:"Формат файла должен быть фото"
                }
              }    
        });
        

    }

        </script>
        </div>
    </div>
@endsection