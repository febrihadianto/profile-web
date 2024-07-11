@extends('layouts.app')

@section('content')
<!-- About Section-->
<section class="py-5">
    <div class="container px-5">
        <!-- Contact form-->
        <div class="bg-light rounded-4 py-5 px-4 px-md-5">
            <div class="text-center mb-5">
                <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i
                        class="bi bi-envelope"></i></div>
                <h1 class="fw-bolder">Contact Me</h1>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <table>
                        <tbody>
                            @forelse ($contacts as $contact)
                            <tr>
                                <td class="px-2">{{ $contact->title }}</td>
                                <td>:</td>
                                <td class="px-2">{{ $contact->content }}</td>
                            </tr>
                            @empty
                            <p>Data belum ada</p>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection