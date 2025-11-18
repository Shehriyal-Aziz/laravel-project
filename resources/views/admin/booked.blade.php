@extends("admin.sidebar")
@section("admin")
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Booked Tables</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Booked Tables</li>
            </ol>

            <!-- Search Filter -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control" id="searchInput" placeholder="Search by name..." />
                                <button class="btn btn-primary" type="button" onclick="filterTable()">
                                    <i class="fas fa-search"></i> Search
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <button class="btn btn-secondary" type="button" onclick="resetFilter()">
                                <i class="fas fa-redo"></i> Reset
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Records Table -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Table Booking Records
                </div>
                <div class="card-body">
                    <table id="bookingTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Persons</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <!-- Sample Data - Replace with backend data -->
                            @foreach($records as $record)


                            <td>{{$record->id}}</td>
                            <td>{{$record->name}}</td>
                            <td>{{$record->num}}</td>
                            <td>{{$record->email}}</td>
                            <td>{{$record->persons}}</td>
                            <td>{{$record->date}}</td>
                            <td> <span class="badge {{ $record->status == 'pending' ? 'bg-warning' : ($record->status == 'approved' ? 'bg-success' : 'bg-danger') }}">
                                    {{ ucfirst($record->status) }}
                                </span></td>
                            <td>
                                <div class="d-flex justify-content-center my-1">
                                    <button class="btn btn-sm btn-success approve-btn" title="Approve" data-id="{{ $record->id }}">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger reject-btn" title="Reject" data-id="{{ $record->id }}">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <button class="btn btn-sm btn-info copy-btn" title="Copy Phone Number" data-phone="{{ $record->num }}">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <form action="/remove/{{ $record->id }}" method="POST" class="w-100" >
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger w-100">Remove</button>
                                    </form>
                                </div>

                            </td>




                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                    <div id="noResults" class="text-center text-muted" style="display: none;">
                        <p>No records found matching your search.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Filter table by name
        function filterTable() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase().trim();
            const table = document.getElementById('bookingTable');
            const tbody = document.getElementById('tableBody');
            const tr = tbody.getElementsByTagName('tr');
            const noResults = document.getElementById('noResults');
            let visibleRows = 0;

            for (let i = 0; i < tr.length; i++) {
                const nameCell = tr[i].getElementsByTagName('td')[1]; // Name column (index 1)

                if (nameCell) {
                    const nameValue = nameCell.textContent || nameCell.innerText;

                    if (nameValue.toLowerCase().indexOf(filter) > -1) {
                        tr[i].style.display = '';
                        visibleRows++;
                    } else {
                        tr[i].style.display = 'none';
                    }
                }
            }

            // Show/hide no results message
            if (visibleRows === 0 && filter !== '') {
                noResults.style.display = 'block';
            } else {
                noResults.style.display = 'none';
            }
        }

        // Reset filter
        function resetFilter() {
            document.getElementById('searchInput').value = '';
            filterTable();
        }

        // Allow Enter key to trigger search
        document.getElementById('searchInput').addEventListener('keyup', function(event) {
            if (event.key === 'Enter') {
                filterTable();
            } else {
                // Real-time search as user types
                filterTable();
            }
        });

        // Action button handlers
        document.addEventListener('DOMContentLoaded', function() {
            // Copy phone number functionality
            document.querySelectorAll('.copy-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const phoneNumber = this.getAttribute('data-phone');

                    // Copy to clipboard
                    navigator.clipboard.writeText(phoneNumber).then(function() {
                        // Show success feedback
                        const originalHTML = button.innerHTML;
                        button.innerHTML = '<i class="fas fa-check"></i>';
                        button.classList.remove('btn-info');
                        button.classList.add('btn-success');

                        setTimeout(function() {
                            button.innerHTML = originalHTML;
                            button.classList.remove('btn-success');
                            button.classList.add('btn-info');
                        }, 2000);


                    }).catch(function(err) {
                        alert('Failed to copy phone number');
                        console.error('Copy failed:', err);
                    });
                });
            });

            // Approve buttons - Change status to Confirmed
            document.querySelectorAll('.approve-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const recordId = this.getAttribute('data-id');


                    // Find the status badge in the same row
                    const row = this.closest('tr');
                    const statusBadge = row.querySelector('td:nth-child(7) span');

                    // Update status to Confirmed
                    statusBadge.className = 'badge bg-success';
                    statusBadge.textContent = 'Confirmed';



                    // TODO: Add backend API call here
                    // Example: updateBookingStatus(recordId, 'confirmed');

                });
            });

            // Reject/Cancel buttons - Change status to Cancelled
            document.querySelectorAll('.reject-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const recordId = this.getAttribute('data-id');
                    const row = this.closest('tr');
                    const statusBadge = row.querySelector('td:nth-child(7) span');

                    statusBadge.className = 'badge bg-danger';
                    statusBadge.textContent = 'Cancelled';


                });
            });
        });
    </script>

    <style>
        #searchInput:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        .table tbody tr {
            transition: background-color 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .btn-sm {
            margin: 0 2px;
        }
    </style>
    @endsection