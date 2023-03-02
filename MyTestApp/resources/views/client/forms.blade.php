@extends('client.layout')

@section('main')
    <section class="overflow-hidden">
        <div class="container">
            <div class="row g-5">
                <div class="col-12">
                    <x-create-form></x-create-form>
                </div>
                <div class="col-12">
                    <x-set-form></x-set-form>
                </div>
            </div>
        </div>
    </section>
@endsection
