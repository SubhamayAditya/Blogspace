@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            @include('components.sidebar.adminsidebar')

            <div class="col-md-9 col-lg-10 p-4">
                <h2 class="fw-bold">Mailbox</h2>
                <p class="text-muted">All messages submitted from Contact Form.</p>

                <table class="table table-bordered mt-4">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Sender</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $msg)
                            <tr>
                                <td>{{ $msg->id }}</td>
                                <td>{{ $msg->first_name }} {{ $msg->last_name }}</td>
                                <td><a href="mailto:{{ $msg->email }}">{{ $msg->email }}</a></a></td>
                                <td><a href="tel:{{ $msg->phone }}">{{ $msg->phone ?? 'N/A' }}</a></td>
                                <td>{{ $msg->subject }}</td>
                                {{-- <td>{{ Str::limit($msg->message, 50) }}</td> --}}
                                <td>{{ $msg->message }}</td>
                                <td>{{ $msg->created_at->format('d M, Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $messages->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
