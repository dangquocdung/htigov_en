@extends('frontEnd.partner')

@section('partner')

    <h4 id="contact_div"><i class="fa fa-envelope"></i> {{ trans('frontLang.getInTouch') }}</h4>

    <div id="sendmessage"><i class="fa fa-check-circle"></i>
        &nbsp;{{ trans('frontLang.youMessageSent') }}</div>
    <div id="errormessage">{{ trans('frontLang.youMessageNotSent') }}</div>

    {{Form::open(['route'=>['contactPage'],'method'=>'POST','class'=>'contactForm'])}}
    <div class="form-group">
        {!! Form::text('contact_name',"", array('placeholder' => trans('frontLang.yourName'),'class' => 'form-control','id'=>'name', 'data-msg'=> trans('frontLang.enterYourName'),'data-rule'=>'minlen:4')) !!}
        <div class="alert alert-warning validation"></div>
    </div>
    <div class="form-group">
        {!! Form::email('contact_email',"", array('placeholder' => trans('frontLang.yourEmail'),'class' => 'form-control','id'=>'email', 'data-msg'=> trans('frontLang.enterYourEmail'),'data-rule'=>'email')) !!}
        <div class="validation"></div>
    </div>
    <div class="form-group">
        {!! Form::text('contact_phone',"", array('placeholder' => trans('frontLang.phone'),'class' => 'form-control','id'=>'phone', 'data-msg'=> trans('frontLang.enterYourPhone'),'data-rule'=>'minlen:4')) !!}
        <div class="validation"></div>
    </div>
    <div class="form-group">
        {!! Form::text('contact_subject',"", array('placeholder' => trans('frontLang.subject'),'class' => 'form-control','id'=>'subject', 'data-msg'=> trans('frontLang.enterYourSubject'),'data-rule'=>'minlen:4')) !!}
        <div class="validation"></div>
    </div>
    <div class="form-group">
        {!! Form::textarea('contact_message','', array('placeholder' => trans('frontLang.message'),'class' => 'form-control','id'=>'message','rows'=>'8', 'data-msg'=> trans('frontLang.enterYourMessage'),'data-rule'=>'required')) !!}
        <div class="validation"></div>
    </div>

    @if(env('NOCAPTCHA_STATUS', false))
        <div class="form-group">
            {!! app('captcha')->display($attributes = [], $lang = trans('backLang.code')) !!}
        </div>
    @endif
    <div>
        <button type="submit" class="btn btn-theme">{{ trans('frontLang.sendMessage') }}</button>
    </div>
    <br>
    {{Form::close()}}

@stop
