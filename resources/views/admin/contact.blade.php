@extends('layouts.admin')

@section('addbtn')
@endsection 

@section('thead')
    <tr class="table-dark">
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
        <th>Status</th>
    </tr>
@endsection

@section('tbody')
    @foreach ($contacts as $contact)
        <tr>
            <td>{{ $contact->id }}</td>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->message }}</td>
            <td>
                <form action="{{ route('contact.update', $contact->id) }}" id="updateStatusForm-{{ $contact->id }}"
                    method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="btn-group">
                        <input onchange="handleUpdate('{{ $contact->id }}', 1)" type="radio" class="btn-check"
                            name="is_contact" id="new-{{ $contact->id }}" value="1"
                            {{ $contact->is_contact == 1 ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary" for="new-{{ $contact->id }}">Yes</label>
                        <input onchange="handleUpdate('{{ $contact->id }}', 0)" type="radio" class="btn-check"
                            name="is_contact" id="delivering-{{ $contact->id }}" value="0"
                            {{ $contact->is_contact == 0 ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary" for="delivering-{{ $contact->id }}">No</label>
                    </div>
                </form>
            </td>
        </tr>
    @endforeach
@endsection


@section('script')
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
@endsection
