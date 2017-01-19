<div class="form-group {{ $errors->has('nome') ? 'has-error' : ''}}">
    {!! Form::label('nome', 'Nome:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nome', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nome', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'E-mail:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('senha') ? 'has-error' : ''}}">
    {!! Form::label('senha', 'Senha:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::password('senha', null, ['class' => 'form-control']) !!}
        {!! $errors->first('senha', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('telefone') ? 'has-error' : ''}}">
    {!! Form::label('telefone', 'Telefone:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('telefone', null, ['class' => 'form-control']) !!}
        {!! $errors->first('telefone', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('data_nascimento') ? 'has-error' : ''}}">
    {!! Form::label('data_nascimento', 'Data de Nascimento:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('data_nascimento', null, ['class' => 'form-control']) !!}
        {!! $errors->first('data_nascimento', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('CPF') ? 'has-error' : ''}}">
    {!! Form::label('CPF', 'CPF:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('CPF', null, ['class' => 'form-control']) !!}
        {!! $errors->first('CPF', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('RG') ? 'has-error' : ''}}">
    {!! Form::label('RG', 'RG:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('RG', null, ['class' => 'form-control']) !!}
        {!! $errors->first('RG', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('data_expedicao') ? 'has-error' : ''}}">
    {!! Form::label('data_expedicao', 'Data de Expedição:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('data_expedicao', null, ['class' => 'form-control']) !!}
        {!! $errors->first('data_expedicao', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('orgao_expedidor') ? 'has-error' : ''}}">
    {!! Form::label('orgao_expedidor', 'Orgão Expedidor:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('orgao_expedidor', null, ['class' => 'form-control']) !!}
        {!! $errors->first('orgao_expedidor', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('estado_civil') ? 'has-error' : ''}}">
    {!! Form::label('estado_civil', 'Estado Civil:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('estado_civil', ['Casado', 'Solteiro', 'Divorciado', 'Viuvo'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('estado_civil', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('categoria') ? 'has-error' : ''}}">
    {!! Form::label('categoria', 'Categoria:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('categoria', ['Empregado', 'Empregador', 'Autonomo', 'Outros'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('categoria', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('empresa_atual') ? 'has-error' : ''}}">
    {!! Form::label('empresa_atual', 'Empresa Atual:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('empresa_atual', null, ['class' => 'form-control']) !!}
        {!! $errors->first('empresa_atual', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('profissao') ? 'has-error' : ''}}">
    {!! Form::label('profissao', 'Profissão:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('profissao', null, ['class' => 'form-control']) !!}
        {!! $errors->first('profissao', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('renda_bruta') ? 'has-error' : ''}}">
    {!! Form::label('renda_bruta', 'Renda Bruta:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('renda_bruta', null, ['class' => 'form-control']) !!}
        {!! $errors->first('renda_bruta', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cep') ? 'has-error' : ''}}">
    {!! Form::label('cep', 'CEP:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('cep', null, ['class' => 'form-control']) !!}
        {!! $errors->first('cep', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('logradouro') ? 'has-error' : ''}}">
    {!! Form::label('logradouro', 'Logradouro:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('logradouro', null, ['class' => 'form-control']) !!}
        {!! $errors->first('logradouro', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('numero') ? 'has-error' : ''}}">
    {!! Form::label('numero', 'Numero:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('numero', null, ['class' => 'form-control']) !!}
        {!! $errors->first('numero', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('complemento') ? 'has-error' : ''}}">
    {!! Form::label('complemento', 'Complemento:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('complemento', null, ['class' => 'form-control']) !!}
        {!! $errors->first('complemento', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('bairro') ? 'has-error' : ''}}">
    {!! Form::label('bairro', 'Bairro:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('bairro', null, ['class' => 'form-control']) !!}
        {!! $errors->first('bairro', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cidade') ? 'has-error' : ''}}">
    {!! Form::label('cidade', 'Cidade:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('cidade', null, ['class' => 'form-control']) !!}
        {!! $errors->first('cidade', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    {!! Form::label('estado', 'Estado:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('estado', null, ['class' => 'form-control']) !!}
        {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Cadastrar', ['class' => 'btn btn-primary']) !!}
    </div>
</div>