@extends('layouts.admin')


@section('content')

<h1 class="mb-4">User Management</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@php
function can($permission) {
    return auth()->check() && auth()->user()->hasPermission($permission);
}
@endphp

@if(can('manage-users'))
    <a href="/admin/users">Users</a>
@endif

<div class="card shadow-sm">
    <div class="card-body">

        <table class="table table-bordered table-striped table-hover">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th width="150">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>

                        <td>
                            @foreach($user->roles as $role)
                                <span class="badge bg-primary">
                                    {{ $role->name }}
                                </span>
                            @endforeach
                        </td>

                        <td>
                           <button
    class="btn btn-warning btn-sm edit-roles-btn"
    data-user-id="{{ $user->id }}"
    data-user-roles='@json($user->roles->pluck("id"))'
>
    Edit Roles
</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
                <div class="modal fade" id="userRoleModal" tabindex="-1">
                    <div class="modal-dialog">
        <div class="modal-content">

            <form id="userRoleForm" method="POST">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">
                        Edit User Roles
                    </h5>
                </div>

                <div class="modal-body">

                    <div id="role-checkboxes">
                       @foreach($roles as $role)
    <div class="form-check">
        <input
            type="checkbox"
            class="form-check-input"
            name="roles[]"
            value="{{ $role->id }}"
            id="role_{{ $role->id }}"
        >
        <label class="form-check-label" for="role_{{ $role->id }}">
            {{ $role->name }}
        </label>
    </div>
                      @endforeach
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        Save Roles
                    </button>
                </div>

            </form>

        </div>
    </div>
                </div>

    </div>
</div>



<script>
document.addEventListener('DOMContentLoaded', function () {

    // CSRF setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let currentUserId = null;

    // =========================
    // OPEN MODAL + LOAD DATA
    // =========================
    $(document).on('click', '.edit-roles-btn', function () {

        const userId = $(this).data('user-id');
        currentUserId = userId;

        console.log('Clicked user:', userId);

        // Set form action
        $('#userRoleForm').attr(
            'action',
            `/admin/users/${userId}/roles`
        );

        // Clear checkboxes immediately
        $('#userRoleForm input[type="checkbox"]').prop('checked', false);

        // Fetch fresh roles from server
        $.get(`/admin/users/${userId}/roles`, function (res) {

            const userRoles = res.roles || [];

            userRoles.forEach(function (roleId) {
                $('#role_' + roleId).prop('checked', true);
            });

            // Open modal ONLY after data is loaded
            let modal = new bootstrap.Modal(
                document.getElementById('userRoleModal')
            );

            modal.show();
        });
    });

    // =========================
    // SUBMIT FORM (AJAX)
    // =========================
    $('#userRoleForm').on('submit', function (e) {
        e.preventDefault();

        let form = $(this);
        let url = form.attr('action');

        $.ajax({
            url: url,
            method: 'POST',
            data: form.serialize(),

            success: function (response) {

                showToast(response.message, 'success');

                let modalEl = document.getElementById('userRoleModal');
                let modal = bootstrap.Modal.getInstance(modalEl);

                if (modal) {
                    setTimeout(() => {
                        modal.hide();
                        document.activeElement?.blur();
                    }, 100);
                }

                // =========================
                // LIVE UI UPDATE (NO RELOAD)
                // =========================
                let userId = response.user_id;
                let roles = response.roles;

                let row = document.querySelector(
                    `button[data-user-id="${userId}"]`
                ).closest('tr');

                let roleContainer = row.querySelector('td:nth-child(3)');

                roleContainer.innerHTML = '';

                roles.forEach(role => {
                    roleContainer.innerHTML +=
                        `<span class="badge bg-primary me-1">${role}</span>`;
                });
            },

            error: function (xhr) {
                console.log('AJAX ERROR:', xhr.responseText);
                console.log('STATUS:', xhr.status);

                showToast('Something went wrong', 'danger');
            }
        });
    });

});
</script>




@endsection