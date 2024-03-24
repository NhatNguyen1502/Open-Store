@extends('layouts.admin')

@section('addbtn')
@endsection

@section('thead')
    <tr class="table-dark">
        <th>ID</th>
        <th>User id</th>
        <th>Phone number</th>
        <th>Address</th>
        <th>Payment method</th>
        <th>status</th>
    </tr>
@endsection

@section('tbody')
    @foreach ($orders as $key => $item)
        <tr class="item-id-{{ $item->id }}">
            <td>{{ $item->id }}</td>
            <td>{{ $item->user_id }}</td>
            <td>{{ $item->phone_number }}</td>
            <td>{{ $item->address }}</td>
            <td>{{ $item->payment_method }}</td>
            <td>
                <form action=" {{ route('orders.update', $item->id) }}" id="updateStatusForm-{{ $item->id }}"
                    method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="btn-group">
                        <input onchange="handleUpdate('{{ $item->id }}')" type="radio" class="btn-check" name="status"
                            id="new-{{ $item->id }}" value="new" {{ $item->status == 'new' ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary" for="new-{{ $item->id }}">New</label>
                        <input onchange="handleUpdate('{{ $item->id }}')" type="radio" class="btn-check"
                            name="status" id="delivering-{{ $item->id }}" value="delivering"
                            {{ $item->status == 'delivering' ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary" for="delivering-{{ $item->id }}">Delivering</label>
                        <input onchange="handleUpdate('{{ $item->id }}')" type="radio" class="btn-check"
                            name="status" id="delivered-{{ $item->id }}" value="delivered"
                            {{ $item->status == 'delivered' ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary" for="delivered-{{ $item->id }}">Delivered</label>
                        <input onchange="handleUpdate('{{ $item->id }}')" type="radio" class="btn-check"
                            name="status" id="canceled-{{ $item->id }}" value="canceled"
                            {{ $item->status == 'canceled' ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary" for="canceled-{{ $item->id }}">Canceled</label>
                    </div>
                </form>
            </td>
        </tr>
    @endforeach
@endsection

<script>
    function handleUpdate(id) {
        var confirmation = confirm("Are you sure you want to update the order status?");
        if (confirmation) {
            document.getElementById(`updateStatusForm-${id}`).submit();
        } else {
            location.reload()
        }
    }
</script>
