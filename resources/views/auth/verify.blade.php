@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ПОдтвердите ваш email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('На ваш email была отправлена новая ссылка для подтверждения') }}
                        </div>
                    @endif

                    {{ __('Перед тем как продолжить, пожалуйста проверьте ваш email и перейдите по ссылке для подтверждения') }}
                    {{ __('Если вы не получили email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('нажмите сюда, чтобы получить повторно') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
