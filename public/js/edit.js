// $(document).ready(function(){
//     var table = $('#dataTable').DataTable({
//         "columns": [
//             { "data": "id" },
//             { "data": "email" },
//             { "data": "name" },
//             { "data": "created_at" },
//             { "data": "email_verified_at" }
//         ]
//     });

//     table.on('click', '.edit', function(){
//         var $tr = $(this).closest('tr');
//         if ($tr.hasClass('child')) {
//             $tr = $tr.prev('.parent');
//         }

//         var data = table.row($tr).data();
//         console.log(data);

//         $('#email').val(data[1]);
//         $('#name').val(data[2]);
//         $('#createdate').val(data[3]);
//         $('#confirm').val(data[4]);

//         // Sửa đoạn này để hiển thị modal
//         $('#editForm').attr('action', '/user/' + data[0]);
//         $('#myModal').modal('show');
//     });
// });
