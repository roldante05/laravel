<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Usuario') }}
            {{ Form::text('user', $paddlet->user, ['class' => 'form-control' . ($errors->has('user') ? ' is-invalid' : ''), 'placeholder' => 'User']) }}
            {!! $errors->first('user', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Comentar') }}
            {{ Form::text('comment', $paddlet->comment, ['class' => 'form-control' . ($errors->has('comment') ? ' is-invalid' : ''), 'placeholder' => 'Comment']) }}
            {!! $errors->first('comment', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary mt-3">Publicar Paddlet</button>
        <a href=" {{url('/paddlets')}} " class="btn btn-danger mt-3">Volver</a>
    </div>
</div>