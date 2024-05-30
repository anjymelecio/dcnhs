<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All users</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <!-- Include other CSS files here -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    @include('partials.css')
</head>
<body>

@include('partials.navbar')

<div class="wrapper">
    @include('partials.maincontent')
    <div class="card">
      
        <div class="card-body p-5">
            <h5 class="mb-3 fw-bold text-uppercase">All systsm users</h3>
           
               <form action="{{route('users.export')}}">
            

                <button class="btn btn-success btn-sm">Export</button>
            </form>
            
            <div class="table-responsive">
                <table id="table-user" class="display" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Role</th>
                            <th>Lastname</th>
                            <th>Firstname</th>
                            <th>Middlename</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user['role'] }}</td>
                            <td>{{ $user['lastnames'] }}</td>
                            <td>{{ $user['firstname'] }}</td>
                            <td>{{ $user['middlename'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('partials.script')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.8/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.8/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.8/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>

   <script>
    $(document).ready(function() {
        $('#table-user').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy',
                'excel',
                'csv',
                'pdf'
            ]
        });
    });


</script>


</body>
</html>
