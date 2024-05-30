<table class="table table-bordered" style="font-size: 14px;" id="studentData">

    <thead>
<tr>
<th>Id</th>
<th scope="col">LRN</th>
<th scope="col">Last name</th>
<th scope="col">First name</th>
<th scope="col">Middle name</th>
<th scope="col">Email</th>
<th scope="col">Sex</th>
<th scope="col">Strand</th>
<th scope="col">Place Birth</th>
<th scope="col">Age</th>
<th scope="col">Street</th>
<th scope="col">Barangay</th>
<th scope="col">City</th>
  <th scope="col">State</th>
<th scope="col">Action</th>
</tr>
</thead>

<tbody>
@foreach ($datas as $data )


<tr>


<td>{{ $data->id }}</td>
<td>{{$data->lrn}}</td>
<td>{{$data->lastname}}</td>
<td>{{$data->firstname}}</td>
<td>{{$data->middlename}}</td>
 <td>{{$data->email}}</td>
 <td>{{$data->sex}}</td>

   <td>{{$data->strand}} - {{$data->level}}</td>
   <td>{{$data->place_birth}}</td>
           <?php

$birthDate = new DateTime($data->date_birth);
$currentDate = new DateTime();
$age = $currentDate->diff($birthDate)->y;
     ?>
   <td>{{$age}}</td>
   <td>{{$data->street == null ? 'N/A' : $data->street }}</td>
   <td>{{$data->brgy == null ? 'N/A' : $data->brgy }}</td>
   <td>{{$data->city == null ? 'N/A' : $data->city }}</td>
   <td>{{$data->state == null ? 'N/A' : $data->state }}</td>
   <td>
   <div class="d-flex gap-3">
   @include('edit.students')
   
   <form action="{{ route('students.data.delete', ['id' => $data->id]) }}" method="POST" class="mt-2">
      @csrf
      @method('DELETE')
      <button class="btn btn-danger btn-sm d-flex gap-2"><i class="fa-solid fa-trash mt-1"></i> Delete</button>
   </form>
     <div class="mt-2">
   <a class="btn btn-success btn-sm d-flex gap-2" href="{{route('admin.student.checklist', ['id' => $data->id])}}"><i class="fa-solid fa-list-check mt-1"></i> Checklist </a>
    </div>
   </div>


   
   
   </td>

    
     

</tr>

@endforeach
</tbody>

</table>