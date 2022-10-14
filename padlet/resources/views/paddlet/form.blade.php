<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Usuario') }}
            {{ Form::text('user', $paddlet->user, ['class' => 'form-control' . ($errors->has('user') ? ' is-invalid' : ''), 'placeholder' => 'Tu nombre']) }}
            {!! $errors->first('user', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Comentar') }}
            {{ Form::textarea ('comment', $paddlet->comment, ['class' => 'form-control' . ($errors->has('comment') ? ' is-invalid' : ''), 'placeholder' => 'Escribe una nota']) }}
            {!! $errors->first('comment', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <style>
            textarea{
                resize: none;
                height: 129px;
            }
        </style>

    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary mt-3">Publicar Paddlet</button>
        <a href=" {{url('/paddlets')}} " class="btn btn-danger mt-3">Volver</a>
    </div>
</div>