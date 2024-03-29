@extends('layouts.app')
@section('content')
<section class="all">
    <section class="table-events">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>Event</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Price</th>
                    <th>Places</th>
                    <th>Spots</th>
                    <th>Ticket</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->category }}</td>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->time }}</td>
                    <td>{{ $event->price }} $</td>\
                    <td>{{ $event->places }}</td>
                    <td>{{ $event->spots }}</td>
                    <td>
                        @if ($event->status == 0)
                            <p>Pending</p>
                        @elseif ($event->status == 1)
                            <a href="/ticket/{{ $event->reservation_id }}" class="action-btn">Send me the ticket <i class="bi bi-file-earmark-text"></i></a>
                        @endif
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</section>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    });
</script>
@endsection