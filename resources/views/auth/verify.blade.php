@extends('layouts.app')

@section('content')
    <center> <button style="background-color:#ef5a42; font-size:14px;" class="btn2 btn-danger" data-toggle="modal" data-target="#alert{{1}}">VERIFIKASI EMAIL LEBIH DULU. Klik untuk lebih lanjut</button></center>
  <div class="modal fade" id="alert{{1}}" tabindex="-1" role="dialog" aria-labelledby="alertLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title" id="alertLabel">{{ __('Lakukan Verifikasi Email') }}</h2>
                                        </div>
                                            <div class="modal-body">
                                                @if (session('resent'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ __('Link verifikasi baru telah dikirim ke email tujuan.') }}
                                                </div>
                                            @endif

                                            {{ __('Pastikan telah melakukan verifikasi terhadap email yang digunakan. Cek email untuk memastikan adanya link verifikasi') }}
                                            {{ __('Jika pesan tidak diterima') }}, <a href="{{ route('verification.resend') }}">{{ __('klik untuk kirim ulang verifikasi') }}</a>.
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn2 btn-secondary" data-dismiss="modal">Batal</button>
                                        </div>
                                            
                                </div>
                            </div>
                        </div>
@endsection

